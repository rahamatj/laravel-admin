@extends('admin.auth.master')

@section('title', 'Confirm Password')

@section('content')
    <form method="POST" action="{{ route('admin.password.confirm') }}">
        @csrf
        <h1>{{ __('Confirm Password') }}</h1>
        {{ __('Please confirm your password before continuing.') }}
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

        <div class="text-left">
            <button type="submit" class="btn btn-default">
                {{ __('Confirm Password') }}
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