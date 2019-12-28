@extends('admin.master')

@section('title', 'Users - ' . $user->name . ' - Change Password')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-7">
                                <h2>Users - {{ $user->name }} - Change Password</h2>
                            </div>
                            <div class="col-lg-5 text-right">
                                <a href="{{ route('admin.users.show', ['user' => $user]) }}"
                                   class="btn btn-info">View</a>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">All</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('admin.users.password.update', ['user' => $user]) }}"
                            class="form-horizontal form-label-left" method="post" novalidate>
                            @csrf
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                        for="password">Password * :</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password"
                                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                           name="password" data-parsley-trigger="change" required/>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                        for="password-confirm">Confirm Password * :</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="password-confirm"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            name="password_confirmation" data-parsley-trigger="change"
                                            required/>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
