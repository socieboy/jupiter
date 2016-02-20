<?php
namespace Socieboy\Jupiter\Http\Controllers\API;

use App\User;
use Socieboy\Jupiter\Http\Controllers\JupiterController;
use Socieboy\Jupiter\Http\Requests\AssignRuleToUserRequest;

class UserRolesController extends JupiterController
{
    /**
     * Update Role with the permissions in the request.
     * @param User $user
     * @param AssignRuleToUserRequest $request
     */
    public function update(User $user, AssignRuleToUserRequest $request)
    {
        $this->authorize('update_users');
        $roles = $request->get('roles[]');
        $user->assignRole($roles);
    }
}