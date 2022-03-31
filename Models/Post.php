<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
// --- traits ---
use Illuminate\Support\Str;
// use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

/**
 * Modules\Lang\Models\Post.
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $post_type
 * @property int|null $post_id
 * @property string|null $lang
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $guid
 * @property string|null $txt
 * @property string|null $image_src
 * @property string|null $image_alt
 * @property string|null $image_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property int|null $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $category_id
 * @property string|null $image
 * @property string|null $content
 * @property int|null $published
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $url
 * @property array|null $url_lang
 * @property array|null $image_resize_src
 * @property string|null $linked_count
 * @property string|null $related_count
 * @property string|null $relatedrev_count
 * @property string|null $linkable_type
 * @property int|null $views_count
 * @property-read Model|\Eloquent $linkable
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
=======
=======
>>>>>>> 1242904 (.)
//--- traits ---
use Illuminate\Support\Str;
//use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

//---- services --

//--- models ---

/**
 * NO BaseModel.
 *
 * @property int                             $id
 * @property int|null                        $user_id
 * @property int|null                        $post_id
 * @property string|null                     $lang
 * @property string|null                     $title
 * @property string|null                     $subtitle
 * @property string|null                     $guid
 * @property string|null                     $post_type
 * @property string|null                     $txt
 * @property string|null                     $image_src
 * @property string|null                     $image_alt
 * @property string|null                     $image_title
 * @property string|null                     $meta_description
 * @property string|null                     $meta_keywords
 * @property int|null                        $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null                        $category_id
 * @property string|null                     $image
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null                     $deleted_by
 * @property string|null                     $deleted_ip
 * @property string|null                     $created_ip
 * @property string|null                     $updated_ip
 * @property string|null                     $content
 * @property int|null                        $published
 * @property string|null                     $url
 * @property array|null                      $url_lang
 * @property array|null                      $image_resize_src
 * @property string|null                     $linked_count
 * @property string|null                     $related_count
 * @property string|null                     $relatedrev_count
 * @property string|null                     $linkable_type
 * @property int|null                        $views_count
 * @property Model|\Eloquent                 $linkable
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthUserId($value)
<<<<<<< HEAD
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedBy($value)
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 1242904 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedIp($value)
<<<<<<< HEAD
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageResizeSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLinkableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLinkedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRelatedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRelatedrevCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedBy($value)
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrlLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViewsCount($value)
 * @mixin \Eloquent
 */
class Post extends Model {
    // use Cachable;
    use Updater;
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    protected $perPage = 30;

    // use Searchable;
=======
=======
>>>>>>> 1242904 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrlLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViewsCount($value)
 * @mixin \Eloquent
 * @property string|null $type
 * @property string|null $price
 * @property string|null $price_currency
 * @property int|null    $views
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePriceCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @mixin IdeHelperPost
 * @property int|null $auth_user_id
 */
class Post extends Model {
    //use Cachable;
    use Updater;
    //use Searchable;
<<<<<<< HEAD
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
    /**
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'user_id', 'post_id', 'lang', 'guid',
        'title',
        'subtitle',
        'post_type',
        'txt',
<<<<<<< HEAD
<<<<<<< HEAD
        // ------ IMAGE ---------
        'image_src', 'image_alt', 'image_title',
        // ------ SEO FIELDS -----
        'meta_description', 'meta_keywords', // seo
        'author_id',
        // ------ BUFFER ----
        'url', 'url_lang', // buffer
=======
=======
>>>>>>> 1242904 (.)
        //------ IMAGE ---------
        'image_src', 'image_alt', 'image_title',
        //------ SEO FIELDS -----
        'meta_description', 'meta_keywords', // seo
        'author_id',
        //------ BUFFER ----
        'url', 'url_lang', //buffer
<<<<<<< HEAD
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
        'image_resize_src', // buffer
    ];

    /**
     * @var array
     */
    protected $appends = [];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
        'published_at',
    ];

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @var array<string, string>
=======
     * @var string[]
>>>>>>> 13065fd (.)
=======
     * @var string[]
>>>>>>> 1242904 (.)
     */
    protected $casts = [
        'image_resize_src' => 'array',
        'url_lang' => 'array',
    ];

    /*
    public function getRouteKeyName() {
        return inAdmin() ? 'guid' : 'post_id';
    }
    */
<<<<<<< HEAD
<<<<<<< HEAD
    // -------- relationship ------
=======
    //-------- relationship ------
>>>>>>> 13065fd (.)
=======
    //-------- relationship ------
>>>>>>> 1242904 (.)

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function linkable() {
        return $this->morphTo('post');
    }

    /* deprecated
    public function archive() {
        $lang = $this->lang;
        $post_type = $this->post_type;
        $obj = $this->getLinkedModel();
        $table = $obj->getTable();
        $post_table = with(new Post())->getTable();
        $rows = $obj->join($post_table, $post_table.'.post_id', $table.'.post_id')
                    ->where('lang', $lang)
                    ->where($post_table.'.post_type', $post_type)
                    ->where($post_table.'.guid', '!=', $post_type)
                    ->orderBy($table.'.updated_at', 'desc')
                    ->with('post')
                    ;

        return $rows;
    }
    */

<<<<<<< HEAD
<<<<<<< HEAD
    // end function
    // -------------- MUTATORS ------------------
=======
    //end function
    //-------------- MUTATORS ------------------
>>>>>>> 13065fd (.)
=======
    //end function
    //-------------- MUTATORS ------------------
>>>>>>> 1242904 (.)

    public function setTitleAttribute(string $value): void {
        $this->attributes['title'] = $value;
        $this->attributes['guid'] = Str::slug($value);
    }

    /**
     * Undocumented function.
     */
    public function getTitleAttribute(?string $value): ?string {
        if (null !== $value) {
            return $value;
        }
        if (isset($this->attributes['post_type']) && $this->attributes['post_id']) {
            $value = $this->attributes['post_type'].' '.$this->attributes['post_id'];
        } else {
            $value = $this->post_type.' '.$this->post_id;
        }
        $this->title = $value;
        $this->save();

        return $value;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * ---.
     */
    public function getGuidAttribute(?string $value): ?string {
        if (\is_string($value) && '' !== $value && false === strpos($value, ' ')) {
            return $value;
        }
        $value = $this->title;
        if ('' === $value) {
            $value = $this->attributes['post_type'].' '.$this->attributes['post_id'];
        }
        if (null === $value) {
=======
    public function getGuidAttribute(?string $value): ?string {
=======
    public function getGuidAttribute(?string $value): ?string
    {
>>>>>>> f7ae34c (.)
=======
    public function getGuidAttribute(?string $value): ?string {
>>>>>>> 36a1443 (.)
=======
    public function getGuidAttribute(?string $value): ?string {
>>>>>>> 1242904 (.)
        if (is_string($value) && false === strpos($value, ' ')) {
            return $value;
        }
        //dddx($this->title);
        $value = $this->title;
        if ('' == $value) {
            $value = $this->attributes['post_type'].' '.$this->attributes['post_id'];
        }
        if (null == $value) {
<<<<<<< HEAD
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
            $value = 'u-'.rand(1, 1000);
        }
        $value = Str::slug($value);
        $this->guid = $value;
        $this->save();

        return $value;
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    public function getTxtAttribute(?string $value): ?string {
<<<<<<< HEAD
        return null === $value ? '' : $value;
=======
=======
    public function getTxtAttribute(?string $value): ?string
    {
>>>>>>> f7ae34c (.)
=======
    public function getTxtAttribute(?string $value): ?string {
>>>>>>> 36a1443 (.)
        return null == $value ? '' : $value;
>>>>>>> 13065fd (.)
=======
    public function getTxtAttribute(?string $value): ?string {
        return null == $value ? '' : $value;
>>>>>>> 1242904 (.)
    }

    /*
    public function getUrlAttribute($value) {

    }
    */

    public const SEARCHABLE_FIELDS = ['title', 'guid', 'txt'];

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f348b8b (.)
    /**
     * @return array
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function toSearchableArray() {
<<<<<<< HEAD
        return $this->only(self::SEARCHABLE_FIELDS);
    }
}// end class
=======
    public function toSearchableArray(): array {
=======
>>>>>>> f348b8b (.)
=======
    public function toSearchableArray()
    {
>>>>>>> f7ae34c (.)
=======
    public function toSearchableArray() {
>>>>>>> 36a1443 (.)
        return $this->only(self::SEARCHABLE_FIELDS);
    }
}//end class
>>>>>>> 13065fd (.)
=======
    /**
     * @return array
     */
    public function toSearchableArray() {
        return $this->only(self::SEARCHABLE_FIELDS);
    }
}//end class
>>>>>>> 1242904 (.)
=======
=======
>>>>>>> c2e2665 (.)
<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
//--- traits ---
use Illuminate\Support\Str;
//use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

//---- services --

//--- models ---

/**
 * NO BaseModel.
 *
 * @property int                             $id
 * @property int|null                        $user_id
 * @property int|null                        $post_id
 * @property string|null                     $lang
 * @property string|null                     $title
 * @property string|null                     $subtitle
 * @property string|null                     $guid
 * @property string|null                     $post_type
 * @property string|null                     $txt
 * @property string|null                     $image_src
 * @property string|null                     $image_alt
 * @property string|null                     $image_title
 * @property string|null                     $meta_description
 * @property string|null                     $meta_keywords
 * @property int|null                        $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null                        $category_id
 * @property string|null                     $image
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null                     $deleted_by
 * @property string|null                     $deleted_ip
 * @property string|null                     $created_ip
 * @property string|null                     $updated_ip
 * @property string|null                     $content
 * @property int|null                        $published
 * @property string|null                     $url
 * @property array|null                      $url_lang
 * @property array|null                      $image_resize_src
 * @property string|null                     $linked_count
 * @property string|null                     $related_count
 * @property string|null                     $relatedrev_count
 * @property string|null                     $linkable_type
 * @property int|null                        $views_count
 * @property Model|\Eloquent                 $linkable
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageResizeSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLinkableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLinkedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRelatedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRelatedrevCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrlLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViewsCount($value)
 * @mixin \Eloquent
 * @property string|null $type
 * @property string|null $price
 * @property string|null $price_currency
 * @property int|null    $views
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePriceCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
 * @property int|null $auth_user_id
 * @mixin IdeHelperPost
 */
class Post extends Model {
    //use Cachable;
    use Updater;
    //use Searchable;
    /**
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'user_id', 'post_id', 'lang', 'guid',
        'title',
        'subtitle',
        'post_type',
        'txt',
        //------ IMAGE ---------
        'image_src', 'image_alt', 'image_title',
        //------ SEO FIELDS -----
        'meta_description', 'meta_keywords', // seo
        'author_id',
        //------ BUFFER ----
        'url', 'url_lang', //buffer
        'image_resize_src', // buffer
    ];

    /**
     * @var array
     */
    protected $appends = [];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
        'published_at',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'image_resize_src' => 'array',
        'url_lang' => 'array',
    ];

    /*
    public function getRouteKeyName() {
        return inAdmin() ? 'guid' : 'post_id';
    }
    */
    //-------- relationship ------

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function linkable() {
        return $this->morphTo('post');
    }

    /* deprecated
    public function archive() {
        $lang = $this->lang;
        $post_type = $this->post_type;
        $obj = $this->getLinkedModel();
        $table = $obj->getTable();
        $post_table = with(new Post())->getTable();
        $rows = $obj->join($post_table, $post_table.'.post_id', $table.'.post_id')
                    ->where('lang', $lang)
                    ->where($post_table.'.post_type', $post_type)
                    ->where($post_table.'.guid', '!=', $post_type)
                    ->orderBy($table.'.updated_at', 'desc')
                    ->with('post')
                    ;

        return $rows;
    }
    */

    //end function
    //-------------- MUTATORS ------------------

    public function setTitleAttribute(string $value): void {
        $this->attributes['title'] = $value;
        $this->attributes['guid'] = Str::slug($value);
    }

    /**
     * Undocumented function.
     */
    public function getTitleAttribute(?string $value): ?string {
        if (null !== $value) {
            return $value;
        }
        if (isset($this->attributes['post_type']) && $this->attributes['post_id']) {
            $value = $this->attributes['post_type'].' '.$this->attributes['post_id'];
        } else {
            $value = $this->post_type.' '.$this->post_id;
        }
        $this->title = $value;
        $this->save();

        return $value;
    }

    /**
     * ---
     */
    public function getGuidAttribute(?string $value): ?string {
        if (is_string($value) && $value!='' && false === strpos($value, ' ')) {
            return $value;
        }
        $value = $this->title;
        if ('' == $value) {
            $value = $this->attributes['post_type'].' '.$this->attributes['post_id'];
        }
        if (null == $value) {
            $value = 'u-'.rand(1, 1000);
        }
        $value = Str::slug($value);
        $this->guid = $value;
        $this->save();

        return $value;
    }

    public function getTxtAttribute(?string $value): ?string {
        return null == $value ? '' : $value;
    }

    /*
    public function getUrlAttribute($value) {

    }
    */

    public const SEARCHABLE_FIELDS = ['title', 'guid', 'txt'];

    /**
     * @return array
     */
    public function toSearchableArray() {
        return $this->only(self::SEARCHABLE_FIELDS);
    }
}//end class
<<<<<<< HEAD
>>>>>>> 2a85bc8 (.)
=======
<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
//--- traits ---
use Illuminate\Support\Str;
//use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

//---- services --

//--- models ---

/**
 * NO BaseModel.
 *
 * @property int                             $id
 * @property int|null                        $user_id
 * @property int|null                        $post_id
 * @property string|null                     $lang
 * @property string|null                     $title
 * @property string|null                     $subtitle
 * @property string|null                     $guid
 * @property string|null                     $post_type
 * @property string|null                     $txt
 * @property string|null                     $image_src
 * @property string|null                     $image_alt
 * @property string|null                     $image_title
 * @property string|null                     $meta_description
 * @property string|null                     $meta_keywords
 * @property int|null                        $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null                        $category_id
 * @property string|null                     $image
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null                     $deleted_by
 * @property string|null                     $deleted_ip
 * @property string|null                     $created_ip
 * @property string|null                     $updated_ip
 * @property string|null                     $content
 * @property int|null                        $published
 * @property string|null                     $url
 * @property array|null                      $url_lang
 * @property array|null                      $image_resize_src
 * @property string|null                     $linked_count
 * @property string|null                     $related_count
 * @property string|null                     $relatedrev_count
 * @property string|null                     $linkable_type
 * @property int|null                        $views_count
 * @property Model|\Eloquent                 $linkable
 * @method static \Illuminate\Database\Eloquent\Builder|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereCreatedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDeletedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageResizeSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereImageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLinkableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereLinkedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRelatedCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereRelatedrevCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTxt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUpdatedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUrlLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViewsCount($value)
 * @mixin \Eloquent
 * @property string|null $type
 * @property string|null $price
 * @property string|null $price_currency
 * @property int|null    $views
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post wherePriceCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereUserId($value)
<<<<<<< HEAD
 * @mixin IdeHelperPost
 * @property int|null $auth_user_id
=======
 * @property int|null $auth_user_id
 * @mixin IdeHelperPost
>>>>>>> 2a85bc8 (.)
 */
class Post extends Model {
    //use Cachable;
    use Updater;
    //use Searchable;
    /**
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'user_id', 'post_id', 'lang', 'guid',
        'title',
        'subtitle',
        'post_type',
        'txt',
        //------ IMAGE ---------
        'image_src', 'image_alt', 'image_title',
        //------ SEO FIELDS -----
        'meta_description', 'meta_keywords', // seo
        'author_id',
        //------ BUFFER ----
        'url', 'url_lang', //buffer
        'image_resize_src', // buffer
    ];

    /**
     * @var array
     */
    protected $appends = [];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
        'published_at',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'image_resize_src' => 'array',
        'url_lang' => 'array',
    ];

    /*
    public function getRouteKeyName() {
        return inAdmin() ? 'guid' : 'post_id';
    }
    */
    //-------- relationship ------

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function linkable() {
        return $this->morphTo('post');
    }

    /* deprecated
    public function archive() {
        $lang = $this->lang;
        $post_type = $this->post_type;
        $obj = $this->getLinkedModel();
        $table = $obj->getTable();
        $post_table = with(new Post())->getTable();
        $rows = $obj->join($post_table, $post_table.'.post_id', $table.'.post_id')
                    ->where('lang', $lang)
                    ->where($post_table.'.post_type', $post_type)
                    ->where($post_table.'.guid', '!=', $post_type)
                    ->orderBy($table.'.updated_at', 'desc')
                    ->with('post')
                    ;

        return $rows;
    }
    */

    //end function
    //-------------- MUTATORS ------------------

    public function setTitleAttribute(string $value): void {
        $this->attributes['title'] = $value;
        $this->attributes['guid'] = Str::slug($value);
    }

    /**
     * Undocumented function.
     */
    public function getTitleAttribute(?string $value): ?string {
        if (null !== $value) {
            return $value;
        }
        if (isset($this->attributes['post_type']) && $this->attributes['post_id']) {
            $value = $this->attributes['post_type'].' '.$this->attributes['post_id'];
        } else {
            $value = $this->post_type.' '.$this->post_id;
        }
        $this->title = $value;
        $this->save();

        return $value;
    }

    public function getGuidAttribute(?string $value): ?string {
        if (is_string($value) && false === strpos($value, ' ')) {
            return $value;
        }
        //dddx($this->title);
        $value = $this->title;
        if ('' == $value) {
            $value = $this->attributes['post_type'].' '.$this->attributes['post_id'];
        }
        if (null == $value) {
            $value = 'u-'.rand(1, 1000);
        }
        $value = Str::slug($value);
        $this->guid = $value;
        $this->save();

        return $value;
    }

    public function getTxtAttribute(?string $value): ?string {
        return null == $value ? '' : $value;
    }

    /*
    public function getUrlAttribute($value) {

    }
    */

    public const SEARCHABLE_FIELDS = ['title', 'guid', 'txt'];

    /**
     * @return array
     */
    public function toSearchableArray() {
        return $this->only(self::SEARCHABLE_FIELDS);
    }
}//end class
<<<<<<< HEAD
>>>>>>> cfb7936 (.)
=======
>>>>>>> 409ff992cc550f4020e3e135d12e5befd84dadaf
>>>>>>> 2a85bc8 (.)
=======
>>>>>>> c2e2665 (.)
