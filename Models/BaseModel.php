<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

<<<<<<< HEAD
// use GeneaLabs\LaravelModelCaching\Traits\Cachable;
// use Laravel\Scout\Searchable;
// ---------- traits
=======
//use GeneaLabs\LaravelModelCaching\Traits\Cachable;
//use Laravel\Scout\Searchable;
//---------- traits
>>>>>>> 13065fd (.)

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model {
<<<<<<< HEAD
    use HasFactory;
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
=======
    use Updater;
    //use Searchable;
    //use Cachable;
    use HasFactory;
>>>>>>> 13065fd (.)

    /**
     * @var string
     */
    protected $connection = 'mysql'; // this will use the specified database conneciton

    /**
     * @var string[]
     */
    protected $fillable = ['id'];
    /**
<<<<<<< HEAD
     * @var array<string, string>
     */
    protected $casts = [
        // 'published_at' => 'datetime:Y-m-d', // da verificare
=======
     * @var array
     */
    protected $casts = [
        //'published_at' => 'datetime:Y-m-d', // da verificare
>>>>>>> 13065fd (.)
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
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password'
=======
     * @var array
     */
    protected $hidden = [
        //'password'
>>>>>>> 13065fd (.)
    ];
    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory() {
<<<<<<< HEAD
        return FactoryService::newFactory(static::class);
=======
        return FactoryService::newFactory(get_called_class());
>>>>>>> 13065fd (.)
    }
}
