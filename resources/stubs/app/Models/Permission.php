<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * Relationship Permission with Role.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Scope only the permissions that are visibles.
     * The CMS protect the permissions for the Super Admin.
     * @return mixed
     */
    public static function onlyVisibles()
    {
        return self::where('visible', 1)->get();
    }
}