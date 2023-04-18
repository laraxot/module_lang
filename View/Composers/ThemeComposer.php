<?php

declare(strict_types=1);

namespace Modules\Lang\View\Composers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

/**
 * --.
 */
class ThemeComposer
{
    public function languages(): Collection
    {
        $lang = app()->getLocale();
        $langs = config('laravellocalization.supportedLocales');
        if (! is_array($langs)) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $langs = collect($langs)->map(
            function ($item, $k) {
                $reg = collect(explode('_', $item['regional']))->first();
                if ('en' == $reg) {
                    $reg = 'gb';
                }
                $url = '#'; // devo fare ancora front
                if (inAdmin()) {
                    $route_name = Route::currentRouteName();
                    $route_parameters = getRouteParameters();
                    $data = request()->all();
                    $route_parameters['lang'] = $k;
                    $url = route($route_name, $route_parameters);
                    $url = \Illuminate\Http\Request::create($url)->fullUrlWithQuery($data);
                }

                return [
                    'id' => $k,
                    'name' => $item['name'],
                    'flag' => '<div class="iti__flag-box"><div class="iti__flag iti__'.$reg.'"></div></div>',
                    'url' => $url,
                ];
            }
        );

        return $langs;
    }

    public function otherLanguages()
    {
        $curr = app()->getLocale();
        $langs = $this->languages()
            ->filter(function ($item) use ($curr) {
                return $item['id'] != $curr;
            });

        return $langs;
    }

    public function currentLang(string $field)
    {
        $curr = app()->getLocale();
        $lang = $this->languages()->get($curr);

        return $lang[$field];
    }
}
