<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Socieboy\Jupiter\Contracts\ScopeAdminRoles;

class Role extends Model
{
    /**
     * Fillable fields.
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
    ];

    /**
     * Relationship Role with Permission.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Helper to give Permission to Role.
     * @mix Permission | Array $permission
     * @return Model
     */
    public function givePermissionTo($permission)
    {
        if($permission instanceof Permission){
            return $this->permissions()->save($permission);
        }
        $permissions = is_array($permission) ? $permission : [$permission];
        return $this->permissions()->sync($permissions);
    }

    /**
     * Scope only the roles that are visibles.
     * The CMS protect the roles for the Super Admin.
     * @return mixed
     */
    public static function onlyVisibles()
    {
        return self::where('visible', 1)->with('permissions')->get();
    }
}