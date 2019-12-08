<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} | Admin Register</title>

    <!-- Bootstrap -->
    <link href="{{ asset('/assets/admin/vendors') }}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('/assets/admin/vendors') }}/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('/assets/admin/vendors') }}/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('/assets/admin/vendors') }}/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('/assets/admin/build') }}/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div id="register" class="animate form login_form">
            <section class="login_content">
                <form method="POST" action="{{ route('admin.register') }}">
                    @csrf
                    <h1>Admin Register</h1>
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
                    <div style="text-align: left;">
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
            </section>
        </div>
    </div>
</div>
</body>
</html>
