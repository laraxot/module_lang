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
>>>>>>> 7d158231dbb15c2a7f78061d1759eaca0a8a011e
