<<<<<<< HEAD
<?php
<<<<<<< HEAD

declare(strict_types=1);

namespace Modules\Lang\Models\Panels\Policies;

=======
namespace Modules\Lang\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Lang\Models\Panels\Policies\_ModulePanelPolicy as Panel;

>>>>>>> 72f9f7b (.)
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class _ModulePanelPolicy extends XotBasePanelPolicy {
}
=======
<?php
namespace Modules\Lang\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Lang\Models\Panels\Policies\_ModulePanelPolicy as Panel;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class _ModulePanelPolicy extends XotBasePanelPolicy {
}
>>>>>>> cfb7936 (.)
