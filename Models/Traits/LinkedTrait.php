<?php
<<<<<<< HEAD
/**
 * ---.
 */
=======
>>>>>>> 13065fd (.)

declare(strict_types=1);

namespace Modules\Lang\Models\Traits;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> 13065fd (.)
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;
<<<<<<< HEAD
// use Illuminate\Support\Facades\URL;
// use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\App;
// use Modules\Blog\Models\Favorite;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Modules\Cms\Services\RouteService;
use Modules\Lang\Models\Post;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Models\Image;
use Modules\Xot\Services\PanelService;

// per dizionario morph

// ------ traits ---

/**
 * Modules\Lang\Models\Traits\LinkedTrait.
=======
use Illuminate\Support\Facades\App;
//use Illuminate\Support\Facades\URL;
//use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
//----- models------
use Illuminate\Support\Facades\Route;
//use Modules\Blog\Models\Favorite;
use Illuminate\Support\Str;
//----- services -----
use Modules\Lang\Models\Post;
use Modules\LU\Models\User;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Models\Image;
use Modules\Xot\Services\PanelService as Panel;
use Modules\Xot\Services\RouteService;

// per dizionario morph

//------ traits ---

/**
<<<<<<< HEAD
 * Modules\Xot\Models\Traits\LinkedTrait.
>>>>>>> 13065fd (.)
=======
 * Modules\Lang\Models\Traits\LinkedTrait.
>>>>>>> 61e900c (.)
 *
 * @property \Modules\LU\Models\User|null $user
 * @property \Modules\Lang\Models\Post    $post
 */
trait LinkedTrait {
    /**
     * @return string
     */
    public function getRouteKeyName() {
        return RouteService::inAdmin() ? 'id' : 'guid';
    }

<<<<<<< HEAD
    // ------- relationships ------------

    /**
     * ----.
     *
=======
    //------- relationships ------------

    /**
>>>>>>> 13065fd (.)
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     */
    public function post(): MorphOne {
        $models = TenantService::config('morph_map');
<<<<<<< HEAD
        if (! is_array($models)) {
            $models = [];
        }
        $class = static::class;
=======
        $class = get_class($this);
>>>>>>> 13065fd (.)
        $alias = collect($models)->search($class);

        if (false === $alias) {
            $data = [];
<<<<<<< HEAD
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
=======
            $panel = Panel::get($this);
            $alias = $panel->postType();
            $data['model'][$alias] = $class;
            TenantService::saveConfig(['name' => 'xra', 'data' => $data]);
        }

        if (null == Relation::getMorphedModel((string) $alias)) {
            Relation::morphMap([
                $alias => $class,
            ]);
        }

        return $this->morphOne(Post::class, 'post')//, null, 'id')
>>>>>>> 13065fd (.)
            ->where('lang', App::getLocale());
    }

    public function posts(): MorphMany {
<<<<<<< HEAD
        return $this->morphMany(Post::class, 'post')// , null, 'id')
=======
        return $this->morphMany(Post::class, 'post')//, null, 'id')
>>>>>>> 13065fd (.)
            ->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function postLang(string $lang) {
<<<<<<< HEAD
        return $this->morphOne(Post::class, 'post')// , null, 'id')
=======
        return $this->morphOne(Post::class, 'post')//, null, 'id')
>>>>>>> 13065fd (.)
            ->where('lang', $lang);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function images() {
        return $this->morphMany(Image::class, 'post');
    }

<<<<<<< HEAD
=======
    /* spostato in Favorite.php
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
    public function favorites() {
        return $this->morphMany(Favorite::class, 'post');
    }
    */

    /* -- messo in hasprofileTrait
    public function user():\Illuminate\Database\Eloquent\Relations\HasOne {
        return $this->hasOne(User::class);
    }

    public function profile() {
        dddx('i');
        $class = TenantService::model('profile');

        return $this->hasOne($class, 'user_id', 'user_id');
    }
    */

    /* spostato in Favorite.php
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany

    public function myFavorites() {
        return $this->morphMany(Favorite::class, 'post')
            ->where('user_id', Auth::id());
    }
     */

    /* spostato in Favorite.php
     * @return bool
    public function isMyFavorited() {
        return $this->favorites()
            ->where('user_id', Auth::id())->count() > 0;
    }
    */

>>>>>>> 13065fd (.)
    /**
     * @param object|string $related
     */
    public function getTableMorph($related, bool $inverse): string {
        if ($inverse) {
<<<<<<< HEAD
            $pivot = static::class.'Morph';
        } else {
            if (\is_string($related)) {
                $pivot = $related.'Morph';
            } else {
                $pivot = \get_class($related).'Morph';
=======
            $pivot = get_class($this).'Morph';
        } else {
            if (is_string($related)) {
                $pivot = $related.'Morph';
            } else {
                $pivot = get_class($related).'Morph';
>>>>>>> 13065fd (.)
            }
        }

        return $pivot;
    }

    public function morphRelatedWithKey(string $related, bool $inverse, string $table_key): MorphToMany {
        $name = 'post';
        $pivot = $this->getTableMorph($related, $inverse);
<<<<<<< HEAD
        // $pivot_fields = app($pivot)->getFillable();
=======
        //$pivot_fields = app($pivot)->getFillable();
>>>>>>> 13065fd (.)
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

<<<<<<< HEAD
        if (null !== $table_key) {
=======
        if (null != $table_key) {
>>>>>>> 13065fd (.)
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
<<<<<<< HEAD
            ->with(['post']) // Eager
        ;
    }

    // ------- mutators -------------

    public function postType(): string {
        $models = config('morph_map');
        if (! is_array($models)) {
            $models = [];
        }
        $post_type = collect($models)->search(static::class);
=======
            ->with(['post']) //Eager
        ;
    }

    //------- mutators -------------

    /**
     * @return bool|mixed|string
     */
    public function postType() {
        $post_type = collect(config('morph_map'))->search(get_class($this));
>>>>>>> 13065fd (.)
        if (false === $post_type) {
            $post_type = Str::snake(class_basename($this));
        }

<<<<<<< HEAD
        return (string) $post_type;
=======
        return $post_type;
>>>>>>> 13065fd (.)
    }

    public function getUserHandleAttribute(?string $value): ?string {
        return $this->user->handle ?? $value;
    }

    public function getPostTypeAttribute(?string $value): ?string {
        if (null !== $value) {
            return $value;
        }
<<<<<<< HEAD

        return $this->postType();
        /*
        $post_type = collect(config('morph_map'))->search(static::class);
=======
        $post_type = collect(config('morph_map'))->search(get_class($this));
>>>>>>> 13065fd (.)
        if (false === $post_type) {
            $post_type = Str::snake(class_basename($this));
        }

        return (string) $post_type;
<<<<<<< HEAD
        */
=======
>>>>>>> 13065fd (.)
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
<<<<<<< HEAD
        $name = substr($func, \strlen($str0), -\strlen($str1));
=======
        $name = substr($func, strlen($str0), -strlen($str1));
>>>>>>> 13065fd (.)
        $name = Str::snake($name);
        if (null !== $value) {
            return $value;
        }
<<<<<<< HEAD
        if ('Post' === class_basename($this)) {
=======
        if ('Post' == class_basename($this)) {
>>>>>>> 13065fd (.)
            return $this->$name;
        }

        if (isset($this->pivot) && Str::startsWith($name, 'pivot_')) { // solo le url dipendono dal pivot
<<<<<<< HEAD
            return $this->pivot->$name; // .'#PIVOT';
        }

        if (isset($this->post) && \is_object($this->post)) {
            return $this->post->$name; // .'#NO-PIVOT';
=======
            return $this->pivot->$name; //.'#PIVOT';
        }

        if (isset($this->post) && is_object($this->post)) {
            return $this->post->$name; //.'#NO-PIVOT';
>>>>>>> 13065fd (.)
        }

        return $value;
    }

<<<<<<< HEAD
    // ---- da mettere i mancanti ---
=======
    //---- da mettere i mancanti ---
>>>>>>> 13065fd (.)

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

<<<<<<< HEAD
    /*
     * param mixed $value
     *
     * throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * throws \ReflectionException
     *
     * return mixed
     *
     * throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * throws \ReflectionException
     *
     * @return mixed
     */
=======
    //*

    //
    // @param mixed $value
    //
    // @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
    // @throws \ReflectionException
    //
    // @return mixed
    //
>>>>>>> 13065fd (.)
    /* deprecated
    public function getUrlAttribute($value) {

        //return $this->getPostAttr(__FUNCTION__, $value);
<<<<<<< HEAD
        return PanelService::make()->get($this)->url();
=======
        return Panel::get($this)->url();
>>>>>>> 13065fd (.)
    }

    //*/

    /* deprecated
    public function getRoutenameAttribute($value) {
        return $this->getPostAttr(__FUNCTION__, $value);
    }
    */
<<<<<<< HEAD
=======
    /*
>>>>>>> 13065fd (.)
    public function setTitleAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setSubtitleAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }
<<<<<<< HEAD

    public function setGuidAttribute(?string $value): void {
        if (('' === $value || null === $value) && null !== $this->post) {
=======
    */
    public function setGuidAttribute(?string $value): void {
        if ('' == $value && null != $this->post) {
>>>>>>> 13065fd (.)
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

    /*
     * @param mixed $value
<<<<<<< HEAD
    * deprecated
    *public function setRoutenameAttribute(?string $value) {
    *    return $this->setPostAttr(__FUNCTION__, $value);
    *}
     */
=======
>>>>>>> 13065fd (.)

    /* deprecated
    public function setRoutenameAttribute(?string $value) {
        return $this->setPostAttr(__FUNCTION__, $value);
    }
<<<<<<< HEAD

    */
    // --- attribute e' risertvato

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
    /* deprecated ??
   public function linkedFormFields():array {
       $roots = Post::getRoots();

        @phpstan-var view-string

       $view = 'blog::admin.partials.'.Str::snake(class_basename($this));

       return view()->make($view)->with('row', $this->post)->with($roots);
   }
   //*/
    // ------------------------------------
=======
    */
    //--- attribute e' risertvato

    /**
     * @param mixed $value
     */
    public function setPostAttr(string $func, $value): void {
        $str0 = 'set';
        $str1 = 'Attribute';
        $name = substr($func, strlen($str0), -strlen($str1));
        $name = Str::snake($name);
        $data = [$name => $value];
        $data['lang'] = App::getLocale();
        //$this->post->$name=$value;
        //$res=$this->post->save();
        $this->post()->updateOrCreate($data);
        //print_r($data);
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

    //----------------------------------------------
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
    /* deprecated ??
    public function linkedFormFields():array {
        $roots = Post::getRoots();
        $view = 'blog::admin.partials.'.Str::snake(class_basename($this));

        return view()->make($view)->with('row', $this->post)->with($roots);
    }
    //*/
    //------------------------------------
>>>>>>> 13065fd (.)

    /**
     * Undocumented function.
     *
     * @return Model|\Modules\Lang\Models\BaseModelLang|null
     */
    public function item(string $guid) {
        $post = app(Post::class);
        $post_table = $post->getTable();
<<<<<<< HEAD
        // $post_table = with(new Post())->getTable();
=======
        //$post_table = with(new Post())->getTable();
>>>>>>> 13065fd (.)
        if (RouteService::inAdmin()) {
            $rows = $this->join($post_table, $post_table.'.post_id', '=', $this->getTable().'.id')
                ->where('lang', $this->lang)
                ->where($post_table.'.post_id', $guid)
<<<<<<< HEAD
                ->where($post_table.'.post_type', $this->post_type);
=======
                ->where($post_table.'.post_type', $this->post_type)
            ;
>>>>>>> 13065fd (.)
        } else {
            $rows = $this->join($post_table, $post_table.'.post_id', '=', $this->getTable().'.id')
                ->where('lang', $this->lang)
                ->where($post_table.'.guid', $guid)
<<<<<<< HEAD
                ->where($post_table.'.post_type', $this->post_type);
=======
                ->where($post_table.'.post_type', $this->post_type)
            ;
>>>>>>> 13065fd (.)
        }

        /*
        return $query->join($post_table.' as post', function ($join) {
            $join->on('post.post_id', '=', $this->getTable().'.id')
                ->select('title', 'guid', 'subtitle')
                ->where('lang', $this->lang)
                ->where('post.post_type', $this->post_type)
<<<<<<< HEAD
=======
                //->limit(1)
>>>>>>> 13065fd (.)
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
    public function fixItemLang(string $item_guid): void {
        $item_guid = str_replace('%20', '%', $item_guid);
        $item_guid = str_replace(' ', '%', $item_guid);
<<<<<<< HEAD
        $panel = PanelService::make()->get($this);
=======
        $panel = Panel::get($this);
>>>>>>> 13065fd (.)
        $other_lang = Post::query()
            ->where('post_type', $panel->postType())
            ->where('guid', 'like', $item_guid)
            ->first();
<<<<<<< HEAD
        if (\is_object($other_lang)) {
            $up = $other_lang->replicate();
            $up->lang = App::getLocale();
            $up->save();
            // $row = self::firstOrCreate(['post_id' => $up->post_id]);
            // $row = $this->firstOrCreate(['post_id' => $up->post_id]);

            // return $row;
=======
        if (is_object($other_lang)) {
            $up = $other_lang->replicate();
            $up->lang = App::getLocale();
            $up->save();
            //$row = self::firstOrCreate(['post_id' => $up->post_id]);
            //$row = $this->firstOrCreate(['post_id' => $up->post_id]);

            //return $row;
>>>>>>> 13065fd (.)
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfItem($query, string $guid) {
<<<<<<< HEAD
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
=======
        //getRouteKeyName
        if (RouteService::inAdmin()) {
            return $query->where('post_id', $guid);
        //return $query->where('post.post_id',$guid);
        } else {
            return $query->whereHas('post', function ($query) use ($guid): void {
                $query->where('guid', $guid);
            });
>>>>>>> 13065fd (.)
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithPost($query, string $guid) {
<<<<<<< HEAD
        return $query; // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
=======
        return $query; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
>>>>>>> 13065fd (.)
        /* depreated ??
        $post_table = with(new Post())->getTable();

        return $query->join($post_table.' as post', function ($join) {
            $join->on('post.post_id', '=', $this->getTable().'.id')
                ->select('title', 'guid', 'subtitle')
                ->where('lang', $this->lang)
                ->where('post.post_type', $this->post_type)
<<<<<<< HEAD
=======
                //->limit(1)
>>>>>>> 13065fd (.)
            ;
        });
        */
    }

<<<<<<< HEAD
    // ---------------------------------
=======
    //---------------------------------
>>>>>>> 13065fd (.)
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

        return view()->make($view)->with('row', $row);
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
