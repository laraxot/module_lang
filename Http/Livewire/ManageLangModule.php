<?php

declare(strict_types=1);

namespace Modules\Lang\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\Xot\Services\ArrayService;
use Modules\Xot\Services\FileService;
use Nwidart\Modules\Facades\Module;

/**
 * Class ManageLangModule.
 */
class ManageLangModule extends Component {
    public string $module_name;
    public string $lang_name;
    public string $path;

    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = ['updateArray'];

    public function mount(string $module_name): void {
        $this->module_name = $module_name;
        $lang = app()->getLocale();
        $path = Module::getModulePath($this->module_name);
        $path .= 'Resources\lang\\'.$lang.'';
        $path = FileService::fixPath($path);
        $this->path = $path;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        // $model->translations  ???

        $files = File::files($this->path);
        $files = collect($files)->filter(
            function ($file) {
                return 'php' === $file->getExtension();
            }
        );

        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();
        $view_params = [
            'view' => $view,
            'files' => $files,
            'prefix' => null,
        ];

        return view($view, $view_params);
    }

    /**
     * Undocumented function.
     */
    public function edit(string $lang_name): void {
        $this->lang_name = $lang_name;
        $mod_trad = $this->module_name.'::'.$this->lang_name;
        $form_data = Lang::get($mod_trad, []); // progressioni::prova

        // $form_data = File::getRequire($this->path.'/'.$lang_name.'.php');

        $this->emit('editModalArray', $form_data);
    }

    /**
     * Undocumented function.
     */
    public function updateArray(array $form_data): void {
        $filename = $this->path.'/'.$this->lang_name.'.php';
        ArrayService::save(['filename' => $filename, 'data' => $form_data]);
    }
}
