<?php

declare(strict_types=1);

namespace Modules\Lang\Providers;

use Modules\Xot\Providers\XotBaseRouteServiceProvider;

class RouteServiceProvider extends XotBaseRouteServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     */
    protected string $moduleNamespace = 'Modules\Lang\Http\Controllers';

    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public function bootCallback(): void
    {
        $this->registerLang();
    }

    public function registerCallback(): void
    {
        // $this->registerLang();
    }

    public function registerLang(): void
    {
        $locales = config('laravellocalization.supportedLocales');
        if (! \is_array($locales)) {
            // throw new \Exception('[.__LINE__.]['.class_basename(__CLASS__).']');
            $locales = ['it' => 'it', 'en' => 'en'];
        }
        $langs = array_keys($locales);

        if (! \is_array($langs)) {
            throw new \Exception('[.__LINE__.]['.class_basename(__CLASS__).']');
        }
        $route_params = \getRouteParameters();
        $n = 1;
        if (inAdmin()) {
            $n = 3;
        }

        if (\in_array(request()->segment($n), $langs, true)) {
            $lang = request()->segment($n);
            if (null !== $lang) {
                // App::setLocale($lang);

                app()->setLocale($lang);
            }
        }
    }
}
