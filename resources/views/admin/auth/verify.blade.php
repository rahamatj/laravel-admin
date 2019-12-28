@extends('admin.auth.master')

@section('title', 'Verify Your Email Address')

@section('content')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.verification.resend') }}">
        @csrf
        <h1>{{ __('Verify Your Email Address') }}</h1>
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},

        <div class="text-left">
            <button type="submit" class="btn btn-default">
                {{ __('click here to request another') }}
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