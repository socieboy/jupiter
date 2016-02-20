<?php

namespace Socieboy\Jupiter\Contracts;

use App\Models\Role;
use App\Models\Permission;

trait HasRoles
{
    /**
     * A user may have multiple roles.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->with('permissions');
    }

    /**
     * Helper to give Role to User.
     * @mix Role | Array $role
     * @return Model
     */
    public function assignRole($role)
    {
        if($role instanceof Role){
            return $this->roles()->save($role);
        }
        $roles = is_array($role) ? $role : [$role];
        return $this->roles()->sync($roles);

    }

    /**
     * Determine if the user has the given role.
     * @param  mixed $role
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        return !! $role->intersect($this->roles)->count();
    }

    /**
     * Determine if the user may perform the given permission.
     * @param  Permission $permission
     * @return boolean
     */
    public function hasPermission(Permission $permission)
    {
        return $this->hasRole($permission->roles);
    }

    /**
     * Hidde the Super Admin from the list of Users.
     * @return mixed
     */
    public static function withOutSuperAdmin()
    {
        return self::where('id', '<>', 1);
    }
}