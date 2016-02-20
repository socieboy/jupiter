<?php

namespace Socieboy\Jupiter\Http\Controllers\API;

use App\Models\Role;
use Socieboy\Jupiter\Http\Requests\RoleRequest;
use Socieboy\Jupiter\Http\Controllers\JupiterController;

class RolesController extends JupiterController
{

    /**
     * Retrieve Roles.
     * @return mixed
     */
    public function index()
    {
        $this->authorize('read_roles');
        return Role::onlyVisibles();
    }

    /**
     * Store a new Role
     * @param RoleRequest $request
     * @return static
     */
    public function store(RoleRequest $request)
    {
        $this->authorize('create_roles');
        return Role::create([
            'name' => $this->makeRoleName($request->name),
            'label' => $request->label,
        ]);
    }

    /**
     * Update Role
     * @param $role
     * @param RoleRequest $request
     */
    public function update($role, RoleRequest $request)
    {
        $this->authorize('update_roles');
        $role->update([
            'name' => $this->makeRoleName($request->name),
            'label' => $request->label,
        ]);
        $role->save();
    }

    /**
     * Delete Role
     * @param $role
     */
    public function destroy($role)
    {
        $this->authorize('delete_roles');
        $role->delete();
    }

    /**
     * Make a Role name.
     * @param $name
     * @return string
     */
    protected function makeRoleName($name)
    {
        return snake_case(ucwords(strtolower($name)));
    }

}