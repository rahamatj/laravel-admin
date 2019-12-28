@extends('admin.auth.master')

@section('title', 'Admin Register')

@section('content')
    <form method="POST" action="{{ route('admin.register') }}">
        @csrf
        <h1>{{ __('Register') }}</h1>
        <div>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   placeholder="Email" name="email" value="{{ old('email') }}" required
                   autocomplete="email"/>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="Password" name="password" required autocomplete="new-password"/>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input type="password" class="form-control"
                   placeholder="Confirm Password" name="password_confirmation" required
                   autocomplete="new-password"/>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-default">
                {{ __('Register') }}
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
