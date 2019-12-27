@extends('admin.master')

@section('title', 'Roles - All')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-lg-7">
                        <h2>Roles</h2>
                    </div>
                    <div class="col-lg-5 text-right">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-success">New</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive"
                       class="table table-striped table-bordered dt-responsive nowrap"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($sl = 0)
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ ++$sl }}</td>
                            <td>
                                <a title="View"
                                   href="{{ route('admin.roles.show', ['role' => $role]) }}">
                                    {{ $role->name }}
                                </a>
                            </td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a title="View"
                                   href="{{ route('admin.roles.show', ['role' => $role]) }}"
                                   class="btn btn-xs btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a title="Edit"
                                   href="{{ route('admin.roles.edit', ['role' => $role]) }}"
                                   class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Delete"
                                   href="javascript:void(0)"
                                   class="btn btn-xs btn-danger"
                                   onclick="if(confirm('Are you sure you want to delete this?')) {
                                           event.preventDefault();
                                           document.getElementById('delete-role-form-{{ $role->id }}').submit();
                                           }">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="delete-role-form-{{ $role->id }}" method="POST"
                                      style="display: none;"
                                      action="{{ route('admin.roles.destroy', ['role' => $role]) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
