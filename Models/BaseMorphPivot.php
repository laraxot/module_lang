<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 7c8dc60 (.)
<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends MorphPivot
{
    use Updater;
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    protected $perPage = 30;
=======

>>>>>>> 13065fd (.)
=======

>>>>>>> 1242904 (.)
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

<<<<<<< HEAD
<<<<<<< HEAD
    // protected $attributes = ['related_type' => 'cuisine_cat'];
=======
    //protected $attributes = ['related_type' => 'cuisine_cat'];
>>>>>>> 13065fd (.)
=======
    //protected $attributes = ['related_type' => 'cuisine_cat'];
>>>>>>> 1242904 (.)

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
<<<<<<< HEAD
=======
=======
>>>>>>> b2f15d7 (.)
<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends MorphPivot
{
    use Updater;

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

    //protected $attributes = ['related_type' => 'cuisine_cat'];

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
<<<<<<< HEAD
>>>>>>> cfb7936 (.)
=======
>>>>>>> b2f15d7 (.)
=======
>>>>>>> 7c8dc60 (.)
