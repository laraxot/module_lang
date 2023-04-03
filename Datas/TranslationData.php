<?php

declare(strict_types=1);

namespace Modules\Lang\Datas;

use Exception;
use Spatie\LaravelData\Data;
use Modules\Xot\Services\FileService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Xot\Services\ArrayService;



class TranslationData extends Data {

    //public string $id
    public string $lang;
    public string $namespace;
    public string $group;
    public string $item;
    //public string $key;
    public null|int|string $value;



    public function getFilename():string{
        $hints=app('translator')->getLoader()->namespaces();
        $path=collect($hints)->get($this->namespace);
        if($path==null){
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $filename=FileService::fixPath($path.'/'.$this->lang.'/'.$this->group.'.php');
        return $filename;
    }

    public function getData():array {
        $filename=$this->getFilename();
        $data=[];
        if(File::exists($filename)){
            $data=File::getRequire($filename);
        }
        return $data;
    }
}
 
