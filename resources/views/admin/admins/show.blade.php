@extends('admin.master')

@section('title', 'Admins - '. $admin->name)

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <div class="row">
                <div class="col-lg-5">
                  <h2>Admins - {{ $admin->name }}</h2>
                </div>
                <div class="col-lg-7 text-right">
                    <a href="{{ route('admin.admins.index') }}" class="btn btn-primary">All</a>
                    <a href="{{ route('admin.admins.create') }}" class="btn btn-success">New</a>
                    <a href="{{ route('admin.admins.edit', ['admin' => $admin]) }}"
                        class="btn btn-info">Edit</a>
                    <a href="{{ route('admin.admins.roles', ['admin' => $admin]) }}"
                        class="btn btn-success">Set Designation</a>
                    <a href="{{ route('admin.admins.password.change', ['admin' => $admin]) }}"
                        class="btn btn-warning">Change Password</a>
                    <a href="javascript:void(0)"
                        class="btn btn-danger"
                        onclick="if(confirm('Are you sure you want to delete this?')) {
                                    event.preventDefault();
                                    document.getElementById('delete-admin-form').submit();
                                }">
                      Delete
                    </a>
                    <form id="delete-admin-form" method="POST" style="display: none;"
                          action="{{ route('admin.admins.destroy', ['admin' => $admin]) }}">
                          @csrf
                          @method('DELETE')
                    </form>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-responsive"
                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <th class="col-lg-2">Name</th>
                        <td>{{ $admin->name }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Email</th>
                        <td>{{ $admin->email }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Roles</th>
                        <td>
                            <ul>
                                @foreach($admin->roles as $role)
                                    <li>
                                        <a href="{{ route('admin.roles.show', ['role' => $role]) }}">
                                            {{ $role->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
@endsection
