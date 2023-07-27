<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Panels\Actions;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Xot\Services\FileService;
use Modules\Xot\Services\ArrayService;
use Modules\Lang\Datas\TranslationData;
use Illuminate\Contracts\Support\Responsable;
use Modules\Lang\Actions\PublishTranslationAction;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

class PublishItemTransAction extends XotBasePanelAction
{
    public bool $onItem = true; // onlyContainer

    public string $icon = '<i class="fas fa-language"></i>';

    /**
     * ---.
     * @return Responsable
     */
    public function handle()
    {
        $row = TranslationData::from($this->row);
        app(PublishTranslationAction::class)->execute($row);
        /*
        $hints=app('translator')->getLoader()->namespaces();
        $path=collect($hints)->get($row->namespace);
        if($path==null){
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $filename=FileService::fixPath($path.'/'.$row->lang.'/'.$row->group.'.php');
        $data=[];
        if(File::exists($filename)){
            $data=File::getRequire($filename);
        }
        $data_up=$data;
        Arr::set($data_up,$row->item,$row->value);
        if($data != $data_up){
            ArrayService::save(['data'=>$data_up,'filename'=>$filename]);
        }
        */
        session()->flash('message', 'Post successfully updated.');

        return redirect()->back();
    }

    // end handle
}
