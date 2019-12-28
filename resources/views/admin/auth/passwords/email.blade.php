@extends('admin.auth.master')

@section('title', 'Reset Password')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.password.email') }}">
        @csrf
        <h1>{{ __('Reset Password') }}</h1>
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

        <div class="text-left">
            <button type="submit" class="btn btn-default">
                {{ __('Send Password Reset Link') }}
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