<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Lang\Datas\TranslationData;
use Modules\Xot\Services\ArrayService;
use Modules\Xot\Services\FileService;
use Spatie\QueueableAction\QueueableAction;

class PublishTranslationAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function execute(TranslationData $row)
    {
        /*
        $hints=app('translator')->getLoader()->namespaces();
        $path=collect($hints)->get($row->namespace);
        if($path==null){
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $filename=FileService::fixPath($path.'/'.$row->lang.'/'.$row->group.'.php');
        */
        $filename = $row->getFilename();
        /*
        $data=[];
        if(File::exists($filename)){
            $data=File::getRequire($filename);
        }
        */
        $data = $row->getData();
        $data_up = $data;
        Arr::set($data_up, $row->item, $row->value);
        if ($data != $data_up) {
            ArrayService::save(['data' => $data_up, 'filename' => $filename]);
        }
    }
}
