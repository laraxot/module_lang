<?php

declare(strict_types=1);

namespace Modules\Lang\Datas;

use Spatie\LaravelData\Data;

class LangData extends Data
{
    public string $id;
    public string $name;
    public string $flag;
    public string $url;
}
