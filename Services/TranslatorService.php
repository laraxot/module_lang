<?php

/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Translator.php
 */

namespace Modules\Lang\Services;

use Illuminate\Events\Dispatcher;
use Modules\Lang\Models\Translation;
use Illuminate\Translation\Translator as LaravelTranslator;

class TranslatorService extends LaravelTranslator
{

    /** @var  Dispatcher */
    protected $events;

    /**
     * Get the translation for the given key.
     *
     * @param  string  $key
     * @param  array   $replace
     * @param  string  $locale
     * @return string
     */
    public function get($key, array $replace = array(), $locale = null, $fallback = true)
    {
        // Get without fallback
        $result = parent::get($key, $replace, $locale, false);
        if ($result === $key) {
            $this->notifyMissingKey($key);

            // Reget with fallback
            $result = parent::get($key, $replace, $locale, $fallback);
        }

        return $result;
    }
    /*
    public function setTranslationManager(Manager $manager)
    {
        $this->manager = $manager;
    }
    */
    protected function notifyMissingKey($key)
    {
        $lang = app()->getLocale();
        list($namespace, $group, $item) = $this->parseKey($key);
        $data = [
            'lang' => $lang,
            'namespace' => $namespace,
            'group' => $group,
            'item' => $item,
        ];
        Translation::firstOrCreate($data);
    }
}
