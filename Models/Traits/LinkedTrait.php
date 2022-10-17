<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Traits;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;
// use Illuminate\Support\Facades\URL;
// use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\App;
// use Modules\Blog\Models\Favorite;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Support\Str;
use Modules\Cms\Services\RouteService;
use Modules\Lang\Models\Post;
use Modules\Lang\Models\Post;
use Modules\Tenant\Services\TenantService;
// use Illuminate\Support\Facades\URL;
// use Laravel\Scout\Searchable;
// ----- models------
// use Modules\Blog\Models\Favorite;
use Modules\Tenant\Services\TenantService;
// ----- services -----
use Modules\Xot\Models\Image;
use Modules\Xot\Models\Image;
use Modules\Xot\Services\PanelService;
use Modules\Xot\Services\PanelService;
use Modules\Xot\Services\RouteService;

// per dizionario morph

trait LinkedTrait {
    /**
     * @return string
     */
    public function getRouteKeyName() {
        return RouteService::inAdmin() ? 'id' : 'guid';
    }

    // ------- relationships ------------

    /**
     * ----.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     */
    public function post(): MorphOne {
        $models = TenantService::config('morph_map');
        if (! is_array($models)) {
            $models = [];
        }
        // $class = static::class;
        $class = get_class($this);
        $alias = collect($models)->search($class);

        if (false === $alias) {
            $data = [];
            $panel = PanelService::make()->get($this);
            $alias = $panel->postType();
            $data[$alias] = $class;
            TenantService::saveConfig(['name' => 'morph_map', 'data' => $data]);
            // throw new Exception('[class: '.$class.'][alias:'.$alias.']['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        if (null === Relation::getMorphedModel((string) $alias)) {
            Relation::morphMap(
                [
                    $alias => $class,
                ]
            );
        }

        return $this->morphOne(Post::class, 'post')// , null, 'id')
            ->where('lang', App::getLocale());
    }

    public function posts(): MorphMany {
        return $this->morphMany(Post::class, 'post')// , null, 'id')
            ->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function postLang(string $lang) {
        return $this->morphOne(Post::class, 'post')// , null, 'id')
            ->where('lang', $lang);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images() {
        return $this->morphMany(Image::class, 'post');
    }

    /**
     * @param object|string $related
     */
    public function getTableMorph($related, bool $inverse): string {
        if ($inverse) {
            $pivot = static::class.'Morph';
        } else {
            if (is_string($related)) {
                $pivot = $related.'Morph';
            } else {
                $pivot = get_class($related).'Morph';
            }
        }

        return $pivot;
    }

    public function morphRelatedWithKey(string $related, bool $inverse, string $table_key): MorphToMany {
        $name = 'post';
        $pivot = $this->getTableMorph($related, $inverse);
        // $pivot_fields = app($pivot)->getFillable();
        $model_name = Str::snake(class_basename($this));
        $related_name = Str::snake(class_basename($related));
        if ($inverse) {
            $foreignPivotKey = $model_name.'_id';
            $relatedPivotKey = $table_key;
            $parentKey = 'id';
            $relatedKey = $table_key;
        } else {
            $foreignPivotKey = $table_key;
            $relatedPivotKey = $related_name.'_id';
            $parentKey = $table_key;
            $relatedKey = 'id';
        }

        return $this->morphToMany(
            $related,
            $name,
            $pivot,
            $foreignPivotKey,
            $relatedPivotKey,
            $parentKey,
            $relatedKey,
            $inverse
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function morphRelated(string $related, bool $inverse = false, ?string $table_key = null) {
        $name = 'post';
        $pivot = $this->getTableMorph($related, $inverse);
        $pivot_fields = app($pivot)->getFillable();

        if (null != $table_key) {
            $relation = $this->morphRelatedWithKey($related, $inverse, $table_key);
        } else {
            if ($inverse) {
                $relation = $this->morphedByMany($related, $name, $pivot);
            } else {
                $relation = $this->morphToMany($related, $name, $pivot);
            }
        }

        return $relation->using($pivot)
            ->withPivot($pivot_fields)
            ->withTimestamps()
            ->with(['post']) // Eager
        ;
    }

    // ------- mutators -------------

    public function postType(): string {
        $post_type = collect(config('morph_map'))->search(get_class($this));
        if (false === $post_type) {
            $post_type = Str::snake(class_basename($this));
        }

        return (string) $post_type;
    }

    public function getUserHandleAttribute(?string $value): ?string {
        return $this->user->handle ?? $value;
    }

    public function getPostTypeAttribute(?string $value): ?string {
        if (null !== $value) {
            return $value;
        }

        return $this->postType();
    }

    public function getLangAttribute(?string $value): ?string {
        if (null !== $value) {
            return $value;
        }

        $lang = App::getLocale();

        return $lang;
    }

    /**
     * @return string|null
     */
    public function getPostAttr(string $func, ?string $value) {
        $str0 = 'get';
        $str1 = 'Attribute';
        $name = substr($func, strlen($str0), -strlen($str1));
        $name = Str::snake($name);
        if (null !== $value) {
            return $value;
        }
        if ('Post' == class_basename($this)) {
            return $this->$name;
        }

        if (isset($this->pivot) && Str::startsWith($name, 'pivot_')) { // solo le url dipendono dal pivot
            return $this->pivot->$name; // .'#PIVOT';
        }

        if (isset($this->post) && is_object($this->post)) {
            return $this->post->$name; // .'#NO-PIVOT';
        }

        return $value;
    }

    public function getTitleAttribute(?string $value): ?string {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    public function getSubtitleAttribute(?string $value): ?string {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    public function getGuidAttribute(?string $value): ?string {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    public function getImageSrcAttribute(?string $value): ?string {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    public function getTxtAttribute(?string $value): ?string {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    public function setGuidAttribute(?string $value): void {
        if ('' == $value && null != $this->post) {
            $this->post->guid = Str::slug($this->attributes['title'].' '.$this->attributes['subtitle']);
            $res = $this->post->save();
        }
    }

    /*
    public function setGuidAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }
    */

    public function setImageSrcAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setTxtAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setUrlAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }

   /**
    * @param mixed $value
    */
   public function setPostAttr(string $func, $value): void {
       $str0 = 'set';
       $str1 = 'Attribute';
       $name = substr($func, \strlen($str0), -\strlen($str1));
       $name = Str::snake($name);
       $data = [$name => $value];
       $data['lang'] = App::getLocale();
       // $this->post->$name=$value;
       // $res=$this->post->save();
       /*
       Else branch is unreachable because previous condition is always true.
       if (\is_object($this->post)) {
           $this->post->update($data);
       } else {
           $this->post()->updateOrCreate($data);
       }
       */
       $post = $this->post;
       if (null == $post) {
           $this->post()->updateOrCreate($data);
       } else {
           $post->update($data);
       }
       /*
       $rows=$this->post();
       $sql = Str::replaceArray('?', $rows->getBindings(), $rows->toSql());
       dddx(
           [
               'data'=>$data,
               'name'=>$name,
               'res'=>$res->toSql(),
               'this'=>$this,
               'sql'=>$sql,
           ]
       );
       */
       unset($this->attributes[$name]);
   }

    /**
     * Undocumented function.
     *
     * @return Model|\Modules\Lang\Models\BaseModelLang|null
     */
    public function item(string $guid) {
        $post = app(Post::class);
        $post_table = $post->getTable();
        // $post_table = with(new Post())->getTable();
        if (RouteService::inAdmin()) {
            $rows = $this->join($post_table, $post_table.'.post_id', '=', $this->getTable().'.id')
                ->where('lang', $this->lang)
                ->where($post_table.'.post_id', $guid)
                ->where($post_table.'.post_type', $this->post_type)
            ;
        } else {
            $rows = $this->join($post_table, $post_table.'.post_id', '=', $this->getTable().'.id')
                ->where('lang', $this->lang)
                ->where($post_table.'.guid', $guid)
                ->where($post_table.'.post_type', $this->post_type)
            ;
        }

        /*
        return $query->join($post_table.' as post', function ($join) {
            $join->on('post.post_id', '=', $this->getTable().'.id')
                ->select('title', 'guid', 'subtitle')
                ->where('lang', $this->lang)
                ->where('post.post_type', $this->post_type)
        */

        /* -- testare i tempi
        $rows=$this->whereHas('post',function($query) use($guid){
        $query->where('guid',$guid);
        });
         */
        return $rows->first();
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     */
    public function fixItemLang(string $item_guid): void {
        $item_guid = str_replace('%20', '%', $item_guid);
        $item_guid = str_replace(' ', '%', $item_guid);
        $panel = PanelService::make()->get($this);
        $panel = PanelService::make()->get($this);
        $other_lang = Post::query()
            ->where('post_type', $panel->postType())
            ->where('guid', 'like', $item_guid)
            ->first();
        if (\is_object($other_lang)) {
            $up = $other_lang->replicate();
            $up->lang = App::getLocale();
            $up->save();
            // $row = self::firstOrCreate(['post_id' => $up->post_id]);
            // $row = $this->firstOrCreate(['post_id' => $up->post_id]);

            // return $row;
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfItem($query, string $guid) {
        // getRouteKeyName
        if (RouteService::inAdmin()) {
            return $query->where('post_id', $guid);
        // return $query->where('post.post_id',$guid);
        } else {
            return $query->whereHas(
                'post',
                function ($query) use ($guid): void {
                    $query->where('guid', $guid);
                }
            );
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithPost($query, string $guid) {
        return $query; // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        /* depreated ??
        $post_table = with(new Post())->getTable();

        return $query->join($post_table.' as post', function ($join) {
            $join->on('post.post_id', '=', $this->getTable().'.id')
                ->select('title', 'guid', 'subtitle')
                ->where('lang', $this->lang)
                ->where('post.post_type', $this->post_type)
                //->limit(1)
        */
    }
}
