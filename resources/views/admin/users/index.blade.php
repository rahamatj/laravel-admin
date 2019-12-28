@extends('admin.master')

@section('title', 'Users - All')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-lg-7">
                        <h2>Users</h2>
                    </div>
                    <div class="col-lg-5 text-right">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success">New</a>
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
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($sl = 0)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ ++$sl }}</td>
                            <td>
                                <a title="View"
                                   href="{{ route('admin.users.show', ['user' => $user]) }}">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a title="View"
                                   href="{{ route('admin.users.show', ['user' => $user]) }}"
                                   class="btn btn-xs btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a title="Edit"
                                   href="{{ route('admin.users.edit', ['user' => $user]) }}"
                                   class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Delete"
                                   href="javascript:void(0)"
                                   class="btn btn-xs btn-danger"
                                   onclick="if(confirm('Are you sure you want to delete this?')) {
                                           event.preventDefault();
                                           document.getElementById('delete-user-form-{{ $user->id }}').submit();
                                           }">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="delete-user-form-{{ $user->id }}"
                                      method="POST" style="display: none;"
                                      action="{{ route('admin.users.destroy', ['user' => $user]) }}">
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
