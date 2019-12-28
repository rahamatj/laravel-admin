@extends('admin.master')

@section('title', 'Users - '. $user->name)

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <div class="row">
                <div class="col-lg-5">
                  <h2>Admins - {{ $user->name }}</h2>
                </div>
                <div class="col-lg-7 text-right">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">All</a>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success">New</a>
                    <a href="{{ route('admin.users.edit', ['user' => $user]) }}"
                        class="btn btn-info">Edit</a>
                    <a href="{{ route('admin.users.password.change', ['user' => $user]) }}"
                        class="btn btn-warning">Change Password</a>
                    <a href="javascript:void(0)"
                        class="btn btn-danger"
                        onclick="if(confirm('Are you sure you want to delete this?')) {
                                    event.preventDefault();
                                    document.getElementById('delete-user-form').submit();
                                }">
                      Delete
                    </a>
                    <form id="delete-user-form" method="POST" style="display: none;"
                          action="{{ route('admin.users.destroy', ['user' => $user]) }}">
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
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="col-lg-2">Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
@endsection
