<?php

namespace App\Admin;

use App\Role;
use App\Permission;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasOneOfRoles($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

    public function hasPermission($route)
    {
        $permissions = Permission::where('route', $route)->get();

        $roles = $permissions->map(function ($permission) {
            return $permission->role->name;
        });

        if ($this->hasOneOfRoles($roles)) {
            return true;
        } else {
            return false;
        }
    }
}
