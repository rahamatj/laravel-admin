@extends('admin.master')

@section('title', 'Roles - ' . $role->name)

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-lg-7">
                        <h2>Roles - {{ $role->name }}</h2>
                    </div>
                    <div class="col-lg-5 text-right">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">All</a>
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-success">New</a>
                        <a href="{{ route('admin.roles.edit', ['role' => $role]) }}"
                           class="btn btn-info">Edit</a>
                        <a href="javascript:void(0)"
                           class="btn btn-danger"
                           onclick="if(confirm('Are you sure you want to delete this?')) {
                                event.preventDefault();
                                document.getElementById('delete-role-form').submit();
                            }">
                            Delete
                        </a>
                        <form id="delete-designation-form" method="POST" style="display: none;"
                              action="{{ route('admin.roles.destroy', ['role' => $role]) }}">
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
                        <td>{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Description</th>
                        <td>{{ $role->description }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Routes</th>
                        <td>
                            <ul>
                                @foreach($role->permissions as $permission)
                                    <li>{{ $permission->route }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @if($role->admins->isNotEmpty())
                        <tr>
                            <th class="col-lg-2">Admins</th>
                            <td>
                                <ul>
                                    @foreach($role->admins as $admin)
                                        <li>
                                            <a href="{{ route('admin.admins.show', ['admin' => $admin]) }}">
                                                {{ $admin->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
