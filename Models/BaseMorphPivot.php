<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends MorphPivot {
    use Updater;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 8cd2dc5 (up)
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
<<<<<<< HEAD
<<<<<<< HEAD
     public static $snakeAttributes = true;

    protected $perPage = 30;
=======
/**
 * Indicates whether attributes are snake cased on arrays.
 *
 * @see  https://laravel-news.com/6-eloquent-secrets
* 
 * @var bool
 */
// public static $snakeAttributes = true;

protected $perPage = 30;

>>>>>>> 21b326a (up)
=======
    // public static $snakeAttributes = true;
=======
     public static $snakeAttributes = true;
>>>>>>> f8ed9b1 (up)

    protected $perPage = 30;
>>>>>>> 8cd2dc5 (up)

    protected $connection = 'mysql'; // this will use the specified database connection

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
     * @var bool
     */
    public $timestamps = true;

    // protected $attributes = ['related_type' => 'cuisine_cat'];

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        // 'published_at',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'post_id', 'post_type',
        'related_type',
        'user_id',
        'note',
    ];
}
