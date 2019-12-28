<?php

namespace App\Admin;

use Illuminate\Support\Facades\Route;

class RoleRoute
{
    public static function get()
    {
        return array_filter(Route::getRoutes()->get('GET'), function ($route) {
            return in_array('role', $route->gatherMiddleWare(), true);
        });
    }
}