<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Panels\Policies;

use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
use Modules\Xot\Contracts\UserContract;

class TranslationPanelPolicy extends XotBasePanelPolicy
{
    public function publishItemTrans(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }

    public function publishContainerTrans(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }
}
