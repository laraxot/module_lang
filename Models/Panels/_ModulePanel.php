<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Panels;

use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class _ModulePanel.
 */
class _ModulePanel extends XotBasePanel
{
    public function actions(): array
    {
        return [
            // new Actions\TestAction(),
            // new Actions\TestAction(),
        ];
    }
}
