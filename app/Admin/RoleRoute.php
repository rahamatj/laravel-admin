<?php

namespace App\Admin;

use Illuminate\Support\Facades\Route;

class RoleRoute
{
    public static function get()
    {
        return array_map(function($route) {
            return $route->getName();
        }, array_filter(Route::getRoutes()->get(), function ($route) {
            return in_array('role', $route->gatherMiddleWare(), true);
        }));
    }
}