<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Panels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
<<<<<<< HEAD
// --- Services --

=======
//--- Services --

use Modules\Xot\Contracts\RowsContract;
>>>>>>> 72f9f7b (.)
use Modules\Xot\Models\Panels\XotBasePanel;

class PostPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Lang\Models\Panels\PostPanel';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     */
    public function with(): array {
        return [];
    }

    public function search(): array {
        return [];
    }

    /**
     * on select the option id.
     *
     * quando aggiungi un campo select, è il numero della chiave
     * che viene messo come valore su value="id"
     *
     * @return int|string|null
     */
    public function optionId(Model $row) {
        return $row->getKey();
    }

    /**
     * on select the option label.
<<<<<<< HEAD
     *
     * @param mixed $row
=======
>>>>>>> 72f9f7b (.)
     */
    public function optionLabel($row): string {
        return $row->area_define_name;
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?\Illuminate\Contracts\Support\Renderable {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public static function indexQuery(array $data, $query) {
<<<<<<< HEAD
        // return $query->where('user_id', $request->user()->id);
=======
        //return $query->where('user_id', $request->user()->id);
>>>>>>> 72f9f7b (.)
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array {
        return [
<<<<<<< HEAD
            (object) [
=======
            0 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            1 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Integer',
                'name' => 'user_id',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            2 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Bigint',
                'name' => 'post_id',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            3 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'String',
                'name' => 'lang',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            4 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'String',
                'name' => 'guid',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            5 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'String',
                'name' => 'title',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            6 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Text',
                'name' => 'subtitle',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            7 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'String',
                'name' => 'post_type',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            8 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Text',
                'name' => 'txt',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            9 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'String',
                'name' => 'image_src',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            10 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'String',
                'name' => 'image_alt',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            11 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'String',
                'name' => 'image_title',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            12 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Text',
                'name' => 'meta_description',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            13 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Text',
                'name' => 'meta_keywords',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            14 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Integer',
                'name' => 'author_id',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            15 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'String',
                'name' => 'url',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            16 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Text',
                'name' => 'url_lang',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            17 => (object) [
>>>>>>> 72f9f7b (.)
                'type' => 'Text',
                'name' => 'image_resize_src',
                'comment' => null,
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function filters(Request $request = null): array {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array {
        return [];
    }
}
