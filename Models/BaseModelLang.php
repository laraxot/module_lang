<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

<<<<<<< HEAD
<<<<<<< HEAD
// //use Laravel\Scout\Searchable;
// ---------- traits
=======
////use Laravel\Scout\Searchable;
//---------- traits
>>>>>>> 13065fd (.)
=======
////use Laravel\Scout\Searchable;
//---------- traits
>>>>>>> 1242904 (.)

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lang\Models\Traits\LinkedTrait;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModelLang.
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * @property string|null $post_type
 */
abstract class BaseModelLang extends Model {
    use HasFactory;
    // use Searchable;
    use LinkedTrait;
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
=======
=======
>>>>>>> 1242904 (.)
 */
abstract class BaseModelLang extends Model
{
    use Updater;
    //use Searchable;
    use LinkedTrait;
    use HasFactory;
<<<<<<< HEAD
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)

    protected $connection = 'mysql'; // this will use the specified database connection

    /**
     * @var string[]
     */
    protected $fillable = ['id'];

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @var array<string, string>
     */
    protected $casts = [
        // 'published_at' => 'datetime:Y-m-d', // da verificare
=======
=======
>>>>>>> 1242904 (.)
     * @var array
     */
    protected $casts = [
        //'published_at' => 'datetime:Y-m-d', // da verificare
<<<<<<< HEAD
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
    ];

    /**
     * @var string[]
     */
    protected $dates = ['published_at', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password'
=======
=======
>>>>>>> 1242904 (.)
     * @var array
     */
    protected $hidden = [
        //'password'
<<<<<<< HEAD
>>>>>>> 13065fd (.)
=======
>>>>>>> 1242904 (.)
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

<<<<<<< HEAD
<<<<<<< HEAD
    // -----------
=======
    //-----------
>>>>>>> 13065fd (.)
=======
    //-----------
>>>>>>> 1242904 (.)
    /*
    protected $id;
    protected $post;
    protected $lang;
    */

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
<<<<<<< HEAD
<<<<<<< HEAD
    protected static function newFactory() {
<<<<<<< HEAD
        return FactoryService::newFactory(static::class);
		// return FactoryService::newFactory(get_called_class());
=======
=======
    protected static function newFactory()
    {
>>>>>>> f7ae34c (.)
        return FactoryService::newFactory(get_called_class());
>>>>>>> 13065fd (.)
=======
    protected static function newFactory()
    {
        return FactoryService::newFactory(get_called_class());
>>>>>>> 1242904 (.)
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

////use Laravel\Scout\Searchable;
//---------- traits

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lang\Models\Traits\LinkedTrait;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModelLang.
 */
abstract class BaseModelLang extends Model
{
    use Updater;
    //use Searchable;
    use LinkedTrait;
    use HasFactory;

    protected $connection = 'mysql'; // this will use the specified database connection

    /**
     * @var string[]
     */
    protected $fillable = ['id'];

    /**
     * @var array
     */
    protected $casts = [
        //'published_at' => 'datetime:Y-m-d', // da verificare
    ];

    /**
     * @var string[]
     */
    protected $dates = ['published_at', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var array
     */
    protected $hidden = [
        //'password'
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

    //-----------
    /*
    protected $id;
    protected $post;
    protected $lang;
    */

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return FactoryService::newFactory(get_called_class());
    }
}
>>>>>>> cfb7936 (.)
