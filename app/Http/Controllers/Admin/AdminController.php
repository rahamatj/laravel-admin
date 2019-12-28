<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admins.index', [
            'admins' => Admin::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.admins.show', ['admin' => $admin])
            ->with('alert-success', 'Admin created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        return view('admin.admins.show', [
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,' . $admin->id]
        ])->validate();

        $admin->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('admin.admins.show', ['admin' => $admin])
            ->with('alert-success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.admins.index')
            ->with('alert-danger', 'Admin deleted successfully!');
    }

    public function changePassword(Admin $admin) {
        return view('admin.admins.passwords.change', [
            'admin' => $admin
        ]);
    }

    public function updatePassword(Request $request, Admin $admin) {
        Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ])->validate();

        $admin->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.admins.show', ['admin' => $admin])
            ->with('alert-success', 'Password changed successfully!');
    }

    public function roles(Admin $admin) {
        return view('admin.admins.roles.set', [
            'admin' => $admin,
            'roles' => Role::latest()->get()
        ]);
    }

    public function setRoles(Request $request, Admin $admin) {
        Validator::make($request->all(), [
            'roles' => ['required']
        ])->validate();

        $admin->roles()->detach();
        $admin->roles()->attach($request->roles);

        return redirect()->route('admin.admins.show', ['admin' => $admin])
            ->with('alert-success', 'Designations set successfully!');
    }

}
