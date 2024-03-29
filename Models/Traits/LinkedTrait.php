<?php

/**
 * ---.
 */

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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Modules\Cms\Services\PanelService;
use Modules\Cms\Services\RouteService;
use Modules\Lang\Models\Post;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Models\Image;

// per dizionario morph

// ------ traits ---

/**
 * Modules\Lang\Models\Traits\LinkedTrait.
 *
 * @property \Modules\User\Models\User|null $user
 * @property \Modules\Lang\Models\Post      $post
 */
trait LinkedTrait
{
    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return RouteService::inAdmin() ? 'id' : 'guid';
    }

    // ------- relationships ------------

    /**
     * ----.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     */
    public function post(): MorphOne
    {
        $models = TenantService::config('morph_map');
        if (! \is_array($models)) {
            $models = [];
        }
        $class = static::class;
        $alias = collect($models)->search($class);

        if (false === $alias) {
            $data = [];
            $panel = PanelService::make()->get($this);
            $alias = $panel->postType();
            $data[$alias] = $class;
            TenantService::saveConfig('morph_map', $data);
            // throw new Exception('[class: '.$class.'][alias:'.$alias.']['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        if (null === Relation::getMorphedModel((string) $alias)) {
            Relation::morphMap(
                [
                    $alias => $class,
                ]
            );
        }

        return $this->morphOne(Post::class, 'post') // , null, 'id')
            ->where('lang', App::getLocale());
    }

    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'post') // , null, 'id')
            ->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function postLang(string $lang)
    {
        return $this->morphOne(Post::class, 'post') // , null, 'id')
            ->where('lang', $lang);
    }

    /*
        -- spatie
    public function images() {
        return $this->morphMany(Image::class, 'post');
    }
    */

    /**
     * @param object|string $related
     */
    public function getTableMorph($related, bool $inverse): string
    {
        if ($inverse) {
            $pivot = static::class.'Morph';
        } else {
            if (\is_string($related)) {
                $pivot = $related.'Morph';
            } else {
                $pivot = \get_class($related).'Morph';
            }
        }

        return $pivot;
    }

    public function morphRelatedWithKey(string $related, bool $inverse, string $table_key): MorphToMany
    {
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
        $relation = null;

        return $this->morphToMany(
            $related,
            $name,
            $pivot,
            $foreignPivotKey,
            $relatedPivotKey,
            $parentKey,
            $relatedKey,
            $relation,
            $inverse
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function morphRelated(string $related, bool $inverse = false, string $table_key = null)
    {
        $name = 'post';
        $pivot = $this->getTableMorph($related, $inverse);
        $pivot_fields = app($pivot)->getFillable();

        if (null !== $table_key) {
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

    public function postType(): string
    {
        $models = config('morph_map');
        if (! \is_array($models)) {
            $models = [];
        }
        $post_type = collect($models)->search(static::class);
        if (false === $post_type) {
            $post_type = Str::snake(class_basename($this));
        }

        return (string) $post_type;
    }

    public function getUserHandleAttribute(?string $value): ?string
    {
        return $this->user->handle ?? $value;
    }

    public function getPostTypeAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }

        return $this->postType();
        /*
        $post_type = collect(config('morph_map'))->search(static::class);
        if (false === $post_type) {
            $post_type = Str::snake(class_basename($this));
        }

        return (string) $post_type;
        */
    }

    public function getLangAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }

        $lang = App::getLocale();

        return $lang;
    }

    /**
     * ---.
     */
    public function getPostAttr(string $func, ?string $value): ?string
    {
        $str0 = 'get';
        $str1 = 'Attribute';
        $name = substr($func, \strlen($str0), -\strlen($str1));
        $name = Str::snake($name);
        if (null !== $value) {
            return $value;
        }
        if ('Post' === class_basename($this)) {
            return $this->$name;
        }

        if (isset($this->pivot) && Str::startsWith($name, 'pivot_')) { // solo le url dipendono dal pivot
            return $this->pivot->$name; // .'#PIVOT';
        }

        if (isset($this->post) /* && \is_object($this->post) */) {
            return $this->post->$name; // .'#NO-PIVOT';
        }

        if (null == $this->post && null != $this->getKey()) {
            // Xdebug has detected a possible infinite loop, and aborted your script with a stack depth of '256' frames
            // dddx(rowsToSql($this->post()));
            $title = fake()->sentence();

            $data = [
                'post_type' => Str::snake(class_basename($this)),
                'post_id' => $this->getKey(),
                'guid' => Str::slug($title),
                'title' => $title,
                'lang' => app()->getLocale(),
            ];

            /*
             $res=Post::firstOrCreate($data);
             dddx([
                 'sql'=>rowsToSql($this->post()),
                 'data'=>$data,
                 'res'=>$res,
             ]);

             //$res=$this->post()->create(['lang'=>app()->getLocale()]);
             dddx($res);
             //*/
        }

        return $value;
    }

    // ---- da mettere i mancanti ---

    public function getTitleAttribute(?string $value): ?string
    {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    public function getSubtitleAttribute(?string $value): ?string
    {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    public function getGuidAttribute(?string $value): ?string
    {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    public function getImageSrcAttribute(?string $value): ?string
    {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    public function getTxtAttribute(?string $value): ?string
    {
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    /* deprecated
    public function getUrlAttribute($value) {

        //return $this->getPostAttr(__FUNCTION__, $value);
        return PanelService::make()->get($this)->url();
    }

    //*/

    /* deprecated
    public function getRoutenameAttribute($value) {
        return $this->getPostAttr(__FUNCTION__, $value);
    }
    */
    public function setTitleAttribute(?string $value): void
    {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setSubtitleAttribute(?string $value): void
    {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setGuidAttribute(?string $value): void
    {
        if (('' === $value || null === $value) && null !== $this->post) {
            $this->post->guid = Str::slug($this->attributes['title'].' '.$this->attributes['subtitle']);
            $res = $this->post->save();
        }
    }

    /*
    public function setGuidAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }
    */

    public function setImageSrcAttribute(?string $value): void
    {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setTxtAttribute(?string $value): void
    {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setUrlAttribute(?string $value): void
    {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    /**
     * @param mixed $value
     *                     deprecated
     *public function setRoutenameAttribute(?string $value) {
     *    return $this->setPostAttr(__FUNCTION__, $value);
     *}
     */

    /* deprecated
    public function setRoutenameAttribute(?string $value) {
        return $this->setPostAttr(__FUNCTION__, $value);
    }

    */
    // --- attribute e' risertvato

    public function setPostAttr(string $func, $value): void
    {
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
            // dddx($data);
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

    /*//deprecated ??
   public function urlActFunc($func, $value) {
       $str0 = 'get';
       $str1 = 'Attribute';
       $name = substr($func, strlen($str0), -strlen($str1));
       $act = Str::snake($name);
       $act = substr($act, 0, -4);
       $url = RouteService::urlModel(['model' => $this, 'act' => $act]);

       return $url;
   }


   public function getEditUrlAttribute($value) {
       return $this->urlActFunc(__FUNCTION__, $value);
   }

   public function getMoveupUrlAttribute($value) {
       return $this->urlActFunc(__FUNCTION__, $value);
   }

   public function getMovedownUrlAttribute($value) {
       return $this->urlActFunc(__FUNCTION__, $value);
   }

   public function getShowUrlAttribute($value) {
       return $this->urlActFunc(__FUNCTION__, $value);
   }

   public function getIndexEditUrlAttribute($value) {
       return $this->urlActFunc(__FUNCTION__, $value);
   }

   public function getCreateUrlAttribute($value) {
       return $this->urlActFunc(__FUNCTION__, $value);
   }

   public function getUpdateUrlAttribute($value) {
       return $this->urlActFunc(__FUNCTION__, $value);
   }

   public function getDestroyUrlAttribute($value) {
       return $this->urlActFunc(__FUNCTION__, $value);
   }

   public function getDetachUrlAttribute($value) {
       return $this->urlActFunc(__FUNCTION__, $value);
   }
   //*/

    // ----------------------------------------------
    /* deprecated
   public function imageResizeSrc(array $params){
       return '['.__FILE__.']['.__LINE__.']';
       $value = null;
       if (isset($this->post)) {
           $value = $this->post->imageResizeSrc($params);
       }

       return $value;
   }

   public function image_html(array $params){
       $value = null;
       if (isset($this->post)) {
           $value = $this->post->image_html($params);
       }

       return $value;
   }

   public function urlLang(array $params){
       return '['.__FILE__.']['.__LINE__.']';
       if (! isset($this->post)) {
           return '#';
       }

       return $this->post->urlLang($params);
   }
   */
    /** deprecated ??
     * }.
     */
    // ------------------------------------

    /**
     * Undocumented function.
     *
     * @return Model|\Modules\Lang\Models\BaseModelLang|null
     */
    public function item(string $guid)
    {
        $post = app(Post::class);
        $post_table = $post->getTable();
        // $post_table = with(new Post())->getTable();
        if (RouteService::inAdmin()) {
            $rows = $this->join($post_table, $post_table.'.post_id', '=', $this->getTable().'.id')
                ->where('lang', $this->lang)
                ->where($post_table.'.post_id', $guid)
                ->where($post_table.'.post_type', $this->post_type);
        } else {
            $rows = $this->join($post_table, $post_table.'.post_id', '=', $this->getTable().'.id')
                ->where('lang', $this->lang)
                ->where($post_table.'.guid', $guid)
                ->where($post_table.'.post_type', $this->post_type);
        }

        /*
        return $query->join($post_table.' as post', function ($join) {
            $join->on('post.post_id', '=', $this->getTable().'.id')
                ->select('title', 'guid', 'subtitle')
                ->where('lang', $this->lang)
                ->where('post.post_type', $this->post_type)
            ;
        });
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
    public function fixItemLang(string $item_guid): void
    {
        $item_guid = str_replace('%20', '%', $item_guid);
        $item_guid = str_replace(' ', '%', $item_guid);
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
    public function scopeOfItem($query, string $guid)
    {
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
    public function scopeWithPost($query, string $guid)
    {
        return $query; // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        /* depreated ??
        $post_table = with(new Post())->getTable();

        return $query->join($post_table.' as post', function ($join) {
            $join->on('post.post_id', '=', $this->getTable().'.id')
                ->select('title', 'guid', 'subtitle')
                ->where('lang', $this->lang)
                ->where('post.post_type', $this->post_type)
            ;
        });
        */
    }

    // ---------------------------------
    /*
    public function listItemSchemaOrg(array $params){
        $tmp = explode('\\', get_class($this));
        $ns = Str::snake($tmp[1]);
        $pack = Str::snake($tmp[3]);
        $view = $ns.'::schema_org.list_item.'.$pack;
        if (! view()->exists($view)) {
            dddx('not exists ['.$view.']');
        }
        $row = $this;
        foreach ($params as $k => $v) {
            $row->$k = $v;
        }

        return view($view)->with('row', $row);
    }
    */

    /*
     * @param $container
     *
     * @return string
     */
    /* deprecated ?
    public function urlNextContainer($container) {
        //dddx($this->post->pivot);
        //dddx($this->post);
        //$params = optional(\Route::current())->parameters();
        $params = Route::current()->parameters();
        list($containers, $items) = params2ContainerItem($params);
        $container_n = collect($containers)->search($this->post_type);
        $act = 'index';
        $tmp = [];
        for ($i = 0; $i <= $container_n + 1; ++$i) {
            $tmp[] = 'container'.$i;
        }
        $path = implode('.', $tmp);
        //$ns='pub_theme';
        $routename = $path.'.'.$act;
        $parz = $params;
        $parz['item'.($container_n + 0)] = $this;
        $parz['container'.($container_n + 1)] = $container;
        //it/{container0}/{item0}/{container1}/{item1}/{container2}
        $route = route($routename, $parz);

        return $route;
    }
    */
}
