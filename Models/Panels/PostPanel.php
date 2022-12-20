<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Panels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
// --- Services --

use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Xot\Contracts\RowsContract;

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
     *
     * @param mixed $row
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
        // return $query->where('user_id', $request->user()->id);
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'user_id',
                'comment' => null,
            ],
            (object) [
                'type' => 'Bigint',
                'name' => 'post_id',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'lang',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'guid',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'title',
                'comment' => null,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'subtitle',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'post_type',
                'comment' => null,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'txt',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'image_src',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'image_alt',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'image_title',
                'comment' => null,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'meta_description',
                'comment' => null,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'meta_keywords',
                'comment' => null,
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'author_id',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'url',
                'comment' => null,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'url_lang',
                'comment' => null,
            ],
            (object) [
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
