<?php

declare(strict_types=1);

namespace Modules\Lang\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Lang\Models\BaseModelLang;
=======
>>>>>>> 87192de (.)
=======
use Modules\Lang\Models\BaseModelLang;
>>>>>>> 3b26375 (.)

class LangField implements CastsAttributes {
    /**
     * Cast the given value.
     *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 3b26375 (.)
     * @param BaseModelLang $model
     * @param string        $key
     * @param mixed         $value
     * @param array         $attributes
<<<<<<< HEAD
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
=======
     *
     * @return mixed
>>>>>>> 3b26375 (.)
     */
    public function get($model, $key, $value, $attributes) {
        return $model->post->{$key};
    }

    /**
     * Prepare the given value for storage.
     *
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 3b26375 (.)
     * @param BaseModelLang $model
     * @param string        $key
     * @param mixed         $value
     * @param array         $attributes
<<<<<<< HEAD
=======
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string                              $key
     * @param \App\Models\Address                 $value
     * @param array                               $attributes
>>>>>>> 87192de (.)
=======
>>>>>>> 3b26375 (.)
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