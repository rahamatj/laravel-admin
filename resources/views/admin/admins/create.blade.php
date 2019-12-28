@extends('admin.master')

@section('title', 'Admins - New')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="col-lg-7">
                            <h2>Admins - New</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-lg-5 text-right">
                            <a href="{{ route('admin.admins.index') }}"
                                class="btn btn-primary">All</a>
                        </div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('admin.admins.store') }}"
                            class="form-horizontal form-label-left" method="post" novalidate>
                            @csrf

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                    Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"
                                            data-validate-length-range="6" data-validate-words="2"
                                            placeholder="both name(s) e.g Jon Doe"
                                            name="name" required="required" type="text">
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
                                            class="form-control col-md-7 col-xs-12" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

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
                                    <button id="send" type="submit" class="btn btn-success">Register</button>
                                </div>
                            </div>
                    </form>
                    </div>
                </div>
              </div>
        </div>
    </div>
@endsection
