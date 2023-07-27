<?php

declare(strict_types=1);

/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Models/Translation.php
 */

namespace Modules\Lang\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Lang\Models\Translation.
 *
 * @property int                             $id
 * @property string|null                     $lang
 * @property string|null                     $key
 * @property string|null                     $value
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $namespace
 * @property string                          $group
 * @property string|null                     $item
 * @method static Builder|Translation newModelQuery()
 * @method static Builder|Translation newQuery()
 * @method static Builder|Translation ofTranslatedGroup(string $group)
 * @method static Builder|Translation orderByGroupKeys(bool $ordered)
 * @method static Builder|Translation query()
 * @method static Builder|Translation selectDistinctGroup()
 * @method static Builder|Translation whereCreatedAt($value)
 * @method static Builder|Translation whereCreatedBy($value)
 * @method static Builder|Translation whereGroup($value)
 * @method static Builder|Translation whereId($value)
 * @method static Builder|Translation whereItem($value)
 * @method static Builder|Translation whereKey($value)
 * @method static Builder|Translation whereLang($value)
 * @method static Builder|Translation whereNamespace($value)
 * @method static Builder|Translation whereUpdatedAt($value)
 * @method static Builder|Translation whereUpdatedBy($value)
 * @method static Builder|Translation whereValue($value)
 * @mixin IdeHelperTranslation
 * @mixin \Eloquent
 */
class Translation extends Model
{
    protected $fillable = ['id', 'lang', 'value', 'created_at', 'updated_at', 'namespace', 'group', 'item'];

    public const STATUS_SAVED = 0;
    public const STATUS_CHANGED = 1;

    // protected $table = 'ltm_translations';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Undocumented function.
     */
    public function scopeOfTranslatedGroup(Builder $query, string $group): Builder
    {
        return $query->where('group', $group)->whereNotNull('value');
    }

    public function scopeOrderByGroupKeys(Builder $query, bool $ordered): Builder
    {
        if ($ordered) {
            $query->orderBy('group')->orderBy('key');
        }

        return $query;
    }

    public function scopeSelectDistinctGroup(Builder $query): Builder
    {
        $select = '';

        switch (\DB::getDriverName()) {
            case 'mysql':
                $select = 'DISTINCT `group`';
                break;
            default:
                $select = 'DISTINCT "group"';
                break;
        }

        return $query->select(\DB::raw($select));
    }

    /*
     * Get the current connection name for the model.
     *
     * @return string|null

    public function getConnectionName()
    {
        if ($connection = config('translation-manager.db_connection')) {
            return $connection;
        }

        return parent::getConnectionName();
    }
    */
}
