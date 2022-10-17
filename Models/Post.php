<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
// --- traits ---
use Illuminate\Support\Str;
// use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

class Post extends Model {
    // use Cachable;
    // use Searchable;
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
        // ------ IMAGE ---------
        'image_src', 'image_alt', 'image_title',
        // ------ SEO FIELDS -----
        'meta_description', 'meta_keywords', // seo
        'author_id',
        // ------ BUFFER ----
        'url', 'url_lang', // buffer
        // ------ IMAGE ---------
        'image_src', 'image_alt', 'image_title',
        // ------ SEO FIELDS -----
        'meta_description', 'meta_keywords', // seo
        'author_id',
        // ------ BUFFER ----
        'url', 'url_lang', // buffer
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
     * @var array<string, string>
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
    // -------- relationship ------

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

    // -------------- MUTATORS ------------------

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
            $value = 'u-'.rand(1, 1000);
        }
        $value = Str::slug($value);
        $this->guid = $value;
        $this->save();

        return $value;
    }

    public function getTxtAttribute(?string $value): ?string {
        return null === $value ? '' : $value;
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
}// end class
