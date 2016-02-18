<?php
namespace Socieboy\Jupiter\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;
use Socieboy\Jupiter\Http\Requests\AssignRuleToUserRequest;

class UserRolesController extends Controller
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