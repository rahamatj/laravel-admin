<?php

use App\Role;
use App\Admin;
use App\Admin\RoleRoute;
use Illuminate\Database\Seeder;
use App\Admin\ArrayChunkWithKey;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
           'name' => 'Admin',
           'description' => 'Admin'
        ]);

        $roleRoutes = array_map(function($route) {
            return $route->uri();
        }, RoleRoute::get());

        $role->permissions()
            ->createMany(ArrayChunkWithKey::create('route', $roleRoutes));

        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
        ]);
        $admin->roles()->attach($role->id);
    }
}
