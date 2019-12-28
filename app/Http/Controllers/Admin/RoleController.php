<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create', [
            'roleRoutes' => $this->roleRoutes()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $role->permissions()
            ->createMany($this->createPermissions($request->routes));

        return redirect()->route('admin.roles.show', ['role' => $role])
            ->with('alert-success', 'Role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', [
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'roleRoutes' => $this->roleRoutes(),
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validator($request->all())->validate();
        $role->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        $role->permissions()->delete();
        $role->permissions()
            ->createMany($this->createPermissions($request->routes));

        return redirect()->route('admin.roles.show', ['role' => $role])
            ->with('alert-success', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->routes()->delete();
        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('alert-danger', 'Role deleted successfully!');
    }

    protected function roleRoutes()
    {
        return array_filter(Route::getRoutes()->get('GET'), function ($route) {
            return in_array('role', $route->gatherMiddleWare(), true);
        });
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'description' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'routes' => [
                'required'
            ]
        ]);
    }

    protected function createPermissions($routes)
    {
        return array_map(function ($route) {
            return [
                'route' => $route[0]
            ];
        }, array_chunk($routes, 1));
    }
}
