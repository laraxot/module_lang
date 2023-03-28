<?php

declare(strict_types=1);

/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Models/Translation.php
 */

namespace Modules\Lang\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

/**
 * Translation model.
 *
 * @property int            $id
 * @property int            $status
 * @property string         $locale
 * @property string         $group
 * @property string         $key
 * @property string         $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Translation extends Model {
    protected $fillable = ['id', 'lang', 'key', 'value', 'created_by', 'updated_by', 'created_at', 'updated_at', 'namespace', 'group', 'item'];

    public const STATUS_SAVED = 0;
    public const STATUS_CHANGED = 1;

    // protected $table = 'ltm_translations';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scopeOfTranslatedGroup($query, $group) {
        return $query->where('group', $group)->whereNotNull('value');
    }

    public function scopeOrderByGroupKeys($query, $ordered) {
        if ($ordered) {
            $query->orderBy('group')->orderBy('key');
        }

        return $query;
    }

    public function scopeSelectDistinctGroup($query) {
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
