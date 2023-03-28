<?php
namespace Modules\Lang\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Lang\Models\Panels\Policies\TranslationPanelPolicy as Post; 

use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;

class TranslationPanelPolicy extends XotBasePanelPolicy {
}
