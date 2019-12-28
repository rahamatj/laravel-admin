@extends('admin.auth.master')

@section('title', 'Admin Login')

@section('content')
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <h1>{{ __('Login') }}</h1>
        <div>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                   name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus/>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                   name="password" required
                   autocomplete="current-password"/>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="checkbox text-left">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
            </label>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-default">
                {{ __('Login') }}
            </button>
            @if (Route::has('admin.password.request'))
                <a class="reset_pass" href="{{ route('admin.password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
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