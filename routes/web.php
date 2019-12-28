<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
], function() {
    Auth::routes([
        'register' => false
    ]);

    Route::middleware('auth:admin')->group(function() {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        Route::middleware('role')->group(function() {
            Route::resource('roles', 'RoleController');

            Route::resource('admins', 'AdminController');

            Route::get('admins/{admin}/password/change', 'AdminController@changePassword')
                ->name('admins.password.change');
            Route::post('admins/{admin}/password/change', 'AdminController@updatePassword')
                ->name('admins.password.update');

            Route::get('admins/{admin}/roles', 'AdminController@roles')
                ->name('admins.roles');
            Route::post('admins/{admin}/roles', 'AdminController@setRoles')
                ->name('admins.roles.set');

            Route::resource('users', 'UserController');

            Route::get('users/{user}/password/change', 'UserController@changePassword')
                ->name('users.password.change');
            Route::post('users/{user}/password/change', 'UserController@updatePassword')
                ->name('users.password.update');
        });
    });
});
