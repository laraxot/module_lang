<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Panels;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Lang\Models\Translation;
use Modules\Xot\Contracts\RowsContract;

class TranslationPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Translation';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [];

    /**
     * The relationships that should be eager loaded on index queries.
     */
    public function with(): array
    {
        return [];
    }

    public function search(): array
    {
        return [];
    }

    /**
     * on select the option label.
     *
     * @param Translation $row
     */
    public function optionLabel($row): string
    {
        return 'To Set';
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?Renderable
    {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public function indexQuery(array $data, $query)
    {
        // return $query->where('user_id', $request->user()->id);
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
     * 'value'=>'..',.
     */
    public function fields(): array
    {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
                'col_size' => 3,
            ],

            (object) [
                'type' => 'String',
                'name' => 'lang',
                'comment' => null,
                'col_size' => 3,
            ],
            /*
  (object) array(
     'type' => 'String',
     'name' => 'key',
     'comment' => NULL,
  ),
  */
            (object) [
                'type' => 'String',
                'name' => 'namespace',
                'rules' => 'required',
                'comment' => null,
                'col_size' => 3,
            ],

            (object) [
                'type' => 'String',
                'name' => 'group',
                'rules' => 'required',
                'comment' => null,
                'col_size' => 3,
            ],

            (object) [
                'type' => 'String',
                'name' => 'item',
                'rules' => 'required',
                'comment' => null,
                'col_size' => 3,
            ],

            (object) [
                'type' => 'Text',
                'name' => 'value',
                'comment' => null,
                'col_size' => 4,
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array
    {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function filters(Request $request = null): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [
            new Actions\PublishItemTransAction(),
            new Actions\PublishContainerTransAction(),
        ];
    }
}
