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
>>>>>>> c8a63ea (up)
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
>>>>>>> c8a63ea (up)
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
>>>>>>> c8a63ea (up)
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
>>>>>>> c8a63ea (up)
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            1 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'Integer',
                'name' => 'user_id',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            2 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'Bigint',
                'name' => 'post_id',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            3 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'String',
                'name' => 'lang',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            4 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'String',
                'name' => 'guid',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            5 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'String',
                'name' => 'title',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            6 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'Text',
                'name' => 'subtitle',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            7 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'String',
                'name' => 'post_type',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            8 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'Text',
                'name' => 'txt',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            9 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'String',
                'name' => 'image_src',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            10 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'String',
                'name' => 'image_alt',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            11 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'String',
                'name' => 'image_title',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            12 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'Text',
                'name' => 'meta_description',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            13 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'Text',
                'name' => 'meta_keywords',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            14 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'Integer',
                'name' => 'author_id',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            15 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'String',
                'name' => 'url',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            16 => (object) [
>>>>>>> c8a63ea (up)
                'type' => 'Text',
                'name' => 'url_lang',
                'comment' => null,
            ],
<<<<<<< HEAD
            (object) [
=======
            17 => (object) [
>>>>>>> c8a63ea (up)
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
