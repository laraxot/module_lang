<?php

declare(strict_types=1);

namespace Modules\Lang\View\Composers;

use Illuminate\Support\Facades\Route;
use Modules\Lang\Datas\LangData;
use Spatie\LaravelData\DataCollection;

/**
 * --.
 */
class ThemeComposer
{
    /**
     * Undocumented function.
     *
     * @return DataCollection<LangData>
     */
    public function languages(): DataCollection
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
                    $route_name = strval(Route::currentRouteName());
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

        return LangData::collection($langs->all());
    }

    /**
     * Undocumented function.
     *
     *  * @return DataCollection<LangData>
     */
    public function otherLanguages(): DataCollection
    {
        $curr = app()->getLocale();
        $langs = $this->languages()
            ->filter(function ($item) use ($curr) {
                if (! $item instanceof LangData) {
                    throw new \Exception('['.__LINE__.']['.__FILE__.']');
                }

                return $item->id != $curr;
            });

        return $langs;
    }

    public function currentLang(string $field): string
    {
        $curr = app()->getLocale();
        $lang = $this->languages()->first(
            function ($item) use ($curr) {
                if (! $item instanceof LangData) {
                    throw new \Exception('['.__LINE__.']['.__FILE__.']');
                }

                return $item->id == $curr;
            }
        );

        return strval($lang->{$field});
<<<<<<< HEAD
=======
        // return $lang[$field];
>>>>>>> dcdf0a0 (up)
    }
}
