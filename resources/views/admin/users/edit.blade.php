@extends('admin.master')

@section('title', 'Users - Edit - ' . $user->name)

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-lg-7">
                                <h2>Users - Edit - {{ $user->name }}</h2>
                            </div>
                            <div class="col-lg-5 text-right">
                                <a href="{{ route('admin.users.show', ['user' => $user]) }}" class="btn btn-info">View</a>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">All</a>
                                <a href="{{ route('admin.users.create') }}" class="btn btn-success">New</a>
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
                        <form action="{{ route('admin.users.update', ['user' => $user]) }}"
                                class="form-horizontal form-label-left" method="post" novalidate>
                            @csrf
                            @method("PATCH")
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                            data-validate-length-range="6" data-validate-words="2"
                                            placeholder="both name(s) e.g Jon Doe"
                                            name="name" required="required" type="text"
                                            value="{{ $user->name }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                    Email <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" required="required"
                                            class="form-control col-md-7 col-xs-12" value="{{ $user->email }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
