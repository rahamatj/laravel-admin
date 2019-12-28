<?php

namespace App\Admin;

use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Route;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasOneOfRoles($roles)
    {
        if (!$roles->isEmpty()) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
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
        }

        return false;
    }
}
