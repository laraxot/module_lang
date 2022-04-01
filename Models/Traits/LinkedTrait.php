<?php
<<<<<<< HEAD
=======
/**
 * ---.
 */
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e

declare(strict_types=1);

namespace Modules\Lang\Models\Traits;

<<<<<<< HEAD
=======
use Exception;
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;
<<<<<<< HEAD
use Illuminate\Support\Facades\App;
//use Illuminate\Support\Facades\URL;
//use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
//----- models------
use Illuminate\Support\Facades\Route;
//use Modules\Blog\Models\Favorite;
use Illuminate\Support\Str;
//----- services -----
=======
//use Illuminate\Support\Facades\URL;
//use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
//use Modules\Blog\Models\Favorite;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
use Modules\Lang\Models\Post;
use Modules\LU\Models\User;
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Models\Image;
use Modules\Xot\Services\PanelService;
use Modules\Xot\Services\RouteService;

// per dizionario morph

//------ traits ---

/**
 * Modules\Lang\Models\Traits\LinkedTrait.
 *
 * @property \Modules\LU\Models\User|null $user
 * @property \Modules\Lang\Models\Post    $post
 */
<<<<<<< HEAD
trait LinkedTrait
{
    /**
     * @return string
     */
    public function getRouteKeyName()
    {
=======
trait LinkedTrait {
    /**
     * @return string
     */
    public function getRouteKeyName() {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        return RouteService::inAdmin() ? 'id' : 'guid';
    }

    //------- relationships ------------

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     */
<<<<<<< HEAD
    public function post(): MorphOne
    {
=======
    public function post(): MorphOne {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        $models = TenantService::config('morph_map');
        $class = get_class($this);
        $alias = collect($models)->search($class);

        if (false === $alias) {
            $data = [];
            $panel = PanelService::make()->get($this);
            $alias = $panel->postType();
            $data['model'][$alias] = $class;
<<<<<<< HEAD
=======

            //dddx($data);

            throw new Exception('[class: '.$class.']['.__LINE__.']['.class_basename(__CLASS__).']');
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
            TenantService::saveConfig(['name' => 'xra', 'data' => $data]);
        }

        if (null == Relation::getMorphedModel((string) $alias)) {
            Relation::morphMap(
                [
<<<<<<< HEAD
                $alias => $class,
=======
                    $alias => $class,
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
                ]
            );
        }

        return $this->morphOne(Post::class, 'post')//, null, 'id')
            ->where('lang', App::getLocale());
    }

<<<<<<< HEAD
    public function posts(): MorphMany
    {
=======
    public function posts(): MorphMany {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        return $this->morphMany(Post::class, 'post')//, null, 'id')
            ->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
<<<<<<< HEAD
    public function postLang(string $lang)
    {
=======
    public function postLang(string $lang) {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        return $this->morphOne(Post::class, 'post')//, null, 'id')
            ->where('lang', $lang);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
<<<<<<< HEAD
    public function images()
    {
        return $this->morphMany(Image::class, 'post');
    }

    /* spostato in Favorite.php
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
    public function favorites() {
=======
    public function images() {
        return $this->morphMany(Image::class, 'post');
    }

    /*commento*/

    /* spostato in Favorite.php
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
    public function favorites()  {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
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

    /**
     * @param object|string $related
     */
<<<<<<< HEAD
    public function getTableMorph($related, bool $inverse): string
    {
=======
    public function getTableMorph($related, bool $inverse): string {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        if ($inverse) {
            $pivot = get_class($this).'Morph';
        } else {
            if (is_string($related)) {
                $pivot = $related.'Morph';
            } else {
                $pivot = get_class($related).'Morph';
            }
        }

        return $pivot;
    }

<<<<<<< HEAD
    public function morphRelatedWithKey(string $related, bool $inverse, string $table_key): MorphToMany
    {
=======
    public function morphRelatedWithKey(string $related, bool $inverse, string $table_key): MorphToMany {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        $name = 'post';
        $pivot = $this->getTableMorph($related, $inverse);
        //$pivot_fields = app($pivot)->getFillable();
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
<<<<<<< HEAD
    public function morphRelated(string $related, bool $inverse = false, ?string $table_key = null)
    {
=======
    public function morphRelated(string $related, bool $inverse = false, ?string $table_key = null) {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
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
            ->with(['post']) //Eager
        ;
    }

    //------- mutators -------------

    /**
     * @return bool|mixed|string
     */
<<<<<<< HEAD
    public function postType()
    {
=======
    public function postType() {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        $post_type = collect(config('morph_map'))->search(get_class($this));
        if (false === $post_type) {
            $post_type = Str::snake(class_basename($this));
        }

        return $post_type;
    }

<<<<<<< HEAD
    public function getUserHandleAttribute(?string $value): ?string
    {
        return $this->user->handle ?? $value;
    }

    public function getPostTypeAttribute(?string $value): ?string
    {
=======
    public function getUserHandleAttribute(?string $value): ?string {
        return $this->user->handle ?? $value;
    }

    public function getPostTypeAttribute(?string $value): ?string {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        if (null !== $value) {
            return $value;
        }
        $post_type = collect(config('morph_map'))->search(get_class($this));
        if (false === $post_type) {
            $post_type = Str::snake(class_basename($this));
        }

        return (string) $post_type;
    }

<<<<<<< HEAD
    public function getLangAttribute(?string $value): ?string
    {
=======
    public function getLangAttribute(?string $value): ?string {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        if (null !== $value) {
            return $value;
        }

        $lang = App::getLocale();

        return $lang;
    }

    /**
     * @return string|null
     */
<<<<<<< HEAD
    public function getPostAttr(string $func, ?string $value)
    {
=======
    public function getPostAttr(string $func, ?string $value) {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
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
            return $this->pivot->$name; //.'#PIVOT';
        }

        if (isset($this->post) && is_object($this->post)) {
            return $this->post->$name; //.'#NO-PIVOT';
        }

        return $value;
    }

    //---- da mettere i mancanti ---

<<<<<<< HEAD
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
=======
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
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        return $this->getPostAttr(__FUNCTION__, $value);
    }

    //*

    //
    // @param mixed $value
    //
    // @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
    // @throws \ReflectionException
    //
    // @return mixed
    //
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
    /*
    public function setTitleAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setSubtitleAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }
    */
<<<<<<< HEAD
    public function setGuidAttribute(?string $value): void
    {
        if ('' == $value && null != $this->post) {
=======
    public function setGuidAttribute(?string $value): void {
        if (('' == $value || null == $value) && null != $this->post) {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
            $this->post->guid = Str::slug($this->attributes['title'].' '.$this->attributes['subtitle']);
            $res = $this->post->save();
        }
    }

    /*
    public function setGuidAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }
    */

<<<<<<< HEAD
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
=======
    public function setImageSrcAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setTxtAttribute(?string $value): void {
        $this->setPostAttr(__FUNCTION__, $value);
    }

    public function setUrlAttribute(?string $value): void {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        $this->setPostAttr(__FUNCTION__, $value);
    }

    /*
     * @param mixed $value

    /* deprecated
    public function setRoutenameAttribute(?string $value) {
        return $this->setPostAttr(__FUNCTION__, $value);
    }
    */
    //--- attribute e' risertvato

    /**
     * @param mixed $value
     */
<<<<<<< HEAD
    public function setPostAttr(string $func, $value): void
    {
=======
    public function setPostAttr(string $func, $value): void {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
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

    /**
     * Undocumented function.
     *
     * @return Model|\Modules\Lang\Models\BaseModelLang|null
     */
<<<<<<< HEAD
    public function item(string $guid)
    {
=======
    public function item(string $guid) {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        $post = app(Post::class);
        $post_table = $post->getTable();
        //$post_table = with(new Post())->getTable();
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
<<<<<<< HEAD
                //->limit(1)
=======

>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
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
<<<<<<< HEAD
    public function fixItemLang(string $item_guid): void
    {
=======
    public function fixItemLang(string $item_guid): void {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        $item_guid = str_replace('%20', '%', $item_guid);
        $item_guid = str_replace(' ', '%', $item_guid);
        $panel = PanelService::make()->get($this);
        $other_lang = Post::query()
            ->where('post_type', $panel->postType())
            ->where('guid', 'like', $item_guid)
            ->first();
        if (is_object($other_lang)) {
            $up = $other_lang->replicate();
            $up->lang = App::getLocale();
            $up->save();
            //$row = self::firstOrCreate(['post_id' => $up->post_id]);
            //$row = $this->firstOrCreate(['post_id' => $up->post_id]);

            //return $row;
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
<<<<<<< HEAD
    public function scopeOfItem($query, string $guid)
    {
        //getRouteKeyName
        if (RouteService::inAdmin()) {
            return $query->where('post_id', $guid);
            //return $query->where('post.post_id',$guid);
        } else {
            return $query->whereHas(
                'post', function ($query) use ($guid): void {
=======
    public function scopeOfItem($query, string $guid) {
        //getRouteKeyName
        if (RouteService::inAdmin()) {
            return $query->where('post_id', $guid);
        //return $query->where('post.post_id',$guid);
        } else {
            return $query->whereHas(
                'post',
                function ($query) use ($guid): void {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
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
<<<<<<< HEAD
    public function scopeWithPost($query, string $guid)
    {
=======
    public function scopeWithPost($query, string $guid) {
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
        return $query; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        /* depreated ??
        $post_table = with(new Post())->getTable();

        return $query->join($post_table.' as post', function ($join) {
            $join->on('post.post_id', '=', $this->getTable().'.id')
                ->select('title', 'guid', 'subtitle')
                ->where('lang', $this->lang)
                ->where('post.post_type', $this->post_type)
<<<<<<< HEAD
                //->limit(1)
=======

>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
            ;
        });
        */
    }

    //---------------------------------
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
