<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Panels\Actions;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Lang\Models\Translation;
use Modules\Xot\Services\FileService;
use Modules\Xot\Services\ArrayService;
use Modules\Lang\Datas\TranslationData;
use Modules\Lang\Actions\PublishTranslationAction;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

class PublishContainerTransAction extends XotBasePanelAction {
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-language"></i>';


    

    /**
     * @return mixed
     */
    public function handle() {
        $rows=Translation::where('item','!=',null)
            ->where('value','!=',null)
            ->get();
        
        $rows=TranslationData::collection($rows);
        
        foreach($rows as $row){
            app(PublishTranslationAction::class)->execute($row);
        }
        session()->flash('message', 'Post successfully updated.');
        return redirect()->back();
       
    }

    // end handle
}
