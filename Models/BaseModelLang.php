<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

// //use Laravel\Scout\Searchable;
// ---------- traits

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lang\Models\Traits\LinkedTrait;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModelLang.
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
<<<<<<< HEAD
=======
=======
 */
abstract class BaseModelLang extends Model
{
    use Updater;
    //use Searchable;
    use LinkedTrait;
    use HasFactory;
>>>>>>> 13065fd (.)
>>>>>>> a0605d2 (rebase)

    protected $connection = 'mysql'; // this will use the specified database connection

    /**
     * @var string[]
     */
    protected $fillable = ['id'];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        // 'published_at' => 'datetime:Y-m-d', // da verificare
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
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password'
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

    // -----------
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
    protected static function newFactory() {
        return FactoryService::newFactory(static::class);
<<<<<<< HEAD
        // return FactoryService::newFactory(get_called_class());
=======
		// return FactoryService::newFactory(get_called_class());
=======
=======
    protected static function newFactory()
    {
>>>>>>> f7ae34c (.)
        return FactoryService::newFactory(get_called_class());
>>>>>>> 13065fd (.)
>>>>>>> a0605d2 (rebase)
    }
}
