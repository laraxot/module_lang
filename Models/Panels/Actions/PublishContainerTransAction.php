<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Panels\Actions;

use Illuminate\Http\RedirectResponse;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Lang\Actions\PublishTranslationAction;
use Modules\Lang\Datas\TranslationData;
use Modules\Lang\Models\Translation;

class PublishContainerTransAction extends XotBasePanelAction
{
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-language"></i>';

    public function handle(): RedirectResponse
    {
        $rows = Translation::where('item', '!=', null)
            ->where('value', '!=', null)
            ->get();

        $rows = TranslationData::collection($rows->all());

        foreach ($rows as $row) {
            app(PublishTranslationAction::class)->execute($row);
        }
        session()->flash('message', 'Post successfully updated.');

        return redirect()->back();
    }

    // end handle
}
