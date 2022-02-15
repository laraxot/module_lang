<?php

declare(strict_types=1);

namespace Modules\Lang\Models;

// use GeneaLabs\LaravelModelCaching\Traits\Cachable;
// use Laravel\Scout\Searchable;
// ---------- traits

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
<<<<<<< HEAD
abstract class BaseModel extends Model {
=======
abstract class BaseModel extends Model
{
    use Updater;
    //use Searchable;
    //use Cachable;
>>>>>>> f7ae34c (.)
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

    /**
     * @var string
     */
    protected $connection = 'mysql'; // this will use the specified database conneciton

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

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
<<<<<<< HEAD
    protected static function newFactory() {
        return FactoryService::newFactory(static::class);
=======
    protected static function newFactory()
    {
        return FactoryService::newFactory(get_called_class());
>>>>>>> f7ae34c (.)
    }
}
