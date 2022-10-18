<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Lang\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;
use Modules\Xot\Services\BladeService;

/**
 * Undocumented class.
 */
class LangServiceProvider extends XotBaseServiceProvider
{
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'lang';

    public function bootCallback(): void
    {
        BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Lang');
    }

    public function registerCallback(): void
    {
    }
}
=======
=======
>>>>>>> 7c8dc60 (.)
>>>>>>> 5801be3 (up)
<?php

declare(strict_types=1);

namespace Modules\Lang\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;
use Modules\Xot\Services\BladeService;

/**
 * Undocumented class.
 */
class LangServiceProvider extends XotBaseServiceProvider
{
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'lang';

    public function bootCallback(): void
    {
        BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\Lang');
    }

    public function registerCallback(): void
    {
    }
}