<?php
namespace Modules\Lang\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Lang\Models\Panels\Policies\PostPanelPolicy as Panel;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class PostPanelPolicy extends XotBasePanelPolicy {
}
