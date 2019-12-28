@extends('admin.auth.master')

@section('title', 'Reset Password')

@section('content')
    <form method="POST" action="{{ route('admin.password.update') }}">
        @csrf
        <h1>{{ __('Reset Password') }}</h1>
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                   name="email"
                   value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus/>

            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                   name="password" required
                   autocomplete="new-password"/>

            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input type="password" class="form-control" placeholder="Confirm Password"
                   name="password_confirmation" required
                   autocomplete="new-password"/>

            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-default">
                {{ __('Reset Password') }}
            </button>
        </div>

        <div class="clearfix"></div>

        <div class="separator">

            <div class="clearfix"></div>
            <br/>

            <div>
                <h1>{{ config('app.name') }}</h1>
                <p>©{{ date('Y') }} All Rights Reserved.</p>
            </div>
        </div>
    </form>
@endsection