{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('email') }}"  autocomplete="email" autofocus>--}}

                                {{--@error('email')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--@if (Route::has('password.request'))--}}
                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>OKRs Adam Group - Đăng nhập </title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="css/bootstrap-extend.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="css/master_style.css">

    <!-- Minimalelite Admin skins -->
    <link rel="stylesheet" href="css/skins/_all-skins.css">

</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>OKRs</b> AdamGroup</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        @if (session('message'))
            <x-alert :type="session('type')" :message="session('message')" class="mb-4"/>
        @endif
        <p class="login-box-msg">Đăng nhập để bắt đầu</p>
        <form method="POST" action="{{ route('login') }}" class="form-element">
            @csrf
            <div class="form-group has-feedback">
                {{--<input type="email" class="form-control" placeholder="Email">--}}
                <input id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Tên đăng nhập" name="username" value="{{ old('email') }}"  autocomplete="email" autofocus>
                <span class="ion ion-email form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{--<input type="password" class="form-control" placeholder="Password">--}}
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mật khẩu" name="password" required autocomplete="current-password">

                <span class="ion ion-locked form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="checkbox">
                        <input type="checkbox" id="basic_checkbox_1" >
                        <label for="basic_checkbox_1">Nhớ mật khẩu</label>
                    </div>
                </div>
                <!-- /.col -->
                {{--<div class="col-6">--}}
                    {{--<div class="fog-pwd">--}}
                        {{--<a href="javascript:void(0)"><i class="ion ion-locked"></i> Forgot pwd?</a><br>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- /.col -->
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-info btn-block margin-top-10">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        {{--<div class="social-auth-links text-center">--}}
            {{--<p>- OR -</p>--}}
            {{--<a href="#" class="btn btn-social-icon btn-circle btn-facebook"><i class="fa fa-facebook"></i></a>--}}
            {{--<a href="#" class="btn btn-social-icon btn-circle btn-google"><i class="fa fa-google-plus"></i></a>--}}
        {{--</div>--}}
        <!-- /.social-auth-links -->

        <div class="margin-top-30 text-center">
            {{--<p>Don't have an account? <a href="#" class="text-info m-l-5">Sign Up</a></p>--}}
        </div>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>

<!-- popper -->
<script src="assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
