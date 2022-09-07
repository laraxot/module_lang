<?php

declare(strict_types=1);

namespace Modules\Lang\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
<<<<<<< HEAD
use Modules\Lang\Models\BaseModelLang;
=======
>>>>>>> 87192de (.)

class LangField implements CastsAttributes {
    /**
     * Cast the given value.
     *
<<<<<<< HEAD
     * @param BaseModelLang $model
     * @param string        $key
     * @param mixed         $value
     * @param array         $attributes
     *
     * @return mixed
=======
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param mixed                               $value
     * @param array                               $attributes
     *
     * @return \App\Models\Address
>>>>>>> 87192de (.)
     */
    public function get($model, $key, $value, $attributes) {
        return $model->post->{$key};
    }

    /**
     * Prepare the given value for storage.
     *
<<<<<<< HEAD
     * @param BaseModelLang $model
     * @param string        $key
     * @param mixed         $value
     * @param array         $attributes
=======
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param \App\Models\Address                 $value
     * @param array                               $attributes
>>>>>>> 87192de (.)
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