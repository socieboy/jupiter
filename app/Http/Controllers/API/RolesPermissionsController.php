<?php

namespace Socieboy\Jupiter\Http\Controllers\API;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Socieboy\Jupiter\Http\Requests\AssignPermissionToRoleRequest;

class RolesPermissionsController extends Controller
{

    /**
     * Update Role with the permissions in the request.
     * @param Role $role
     * @param AssignPermissionToRoleRequest $request
     */
    public function update(Role $role, AssignPermissionToRoleRequest $request)
    {
        $this->authorize('update_roles');
        $permissions = $request->get('permissions[]');
        $role->givePermissionTo($permissions);
    }
}