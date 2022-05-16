<?php

declare(strict_types=1);

namespace Modules\Lang\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class LangField implements CastsAttributes {
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param mixed                               $value
     * @param array                               $attributes
     *
     * @return \App\Models\Address
     */
    public function get($model, $key, $value, $attributes) {
        return $model->post->{$key};
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param \App\Models\Address                 $value
     * @param array                               $attributes
     *
     * @return array
     */
    public function set($model, $key, $value, $attributes) {
        $post = $model->post;
        $post->{$key} = $value;
        $res = tap($post)->save();
        // parent::__construct([]);
        // return [$key => encrypt($value)];
        // return ['created_by' => 'xot'];
        return []; // tolgo l'aggiornamento di questo campo
    }
}