@extends('layouts.master-without-nav')
@section('title')
Register
@endsection
@section('body')
<body class="auth-body-bg">
@endsection
@section('content')
<div class="home-btn d-none d-sm-block">
    <a href="{{url('index')}}"><i class="mdi mdi-home-variant h2 text-white"></i></a>
</div>
<div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center ">
                                        <div>
                                            <a href="{{url('index')}}" class="logo"><img src="{{ URL::asset('/assets/images/logo.png')}}" height="70" alt="logo"></a>
                                        </div>
                                        <h4 class="font-size-18 mt-5">Register account</h4>
                                    </div>

                                    <div class="p-2 mt-5">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row mb-2">
                                                <div class="col-lg-2">
                                                    <i style="color:#5664d2;font-size:1.7em;" class="ri-user-2-line auti-custom-input-icon"></i>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="form-group mb-4">
                                                        <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd M, yyyy" data-date-autoclose="true">
                                                            <input type="text" id="firstName" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus placeholder="First name">
                                                                @error('firstName')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            <input type="text" id="lastName" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus placeholder="Last name">
                                                                @error('lastName')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-lg-2">
                                                    <i style="color:#5664d2;font-size:1.7em;" class="ri-mail-line auti-custom-input-icon"></i>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-lg-2">
                                                    <i style="color:#5664d2;font-size:1.7em;"  class="ri-lock-2-line auti-custom-input-icon"></i>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <div class="col-lg-2">
                                                    <i style="color:#5664d2;font-size:1.7em;"  class="ri-lock-2-line auti-custom-input-icon"></i>
                                                </div>
                                                <div class="col-lg-10">
                                                    <div class="form-group">
                                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-center">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Register') }}</button>
                                            </div>
                                            <!--
                                            <div class="mt-4 text-center">
                                                <p class="mb-0">By registering you agree to the Nazox <a href="#" class="text-primary">Terms of Use</a></p>
                                            </div> !-->

                                        </form>
                                    </div>

                                    <div class="mt-3 text-center">
                                        <p><script>document.write(new Date().getFullYear())</script>© ENCGF</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" style="background-repeat: no-repeat;background-image:url('/assets/images/ENCG-Fes.jpg');background-size: cover;">
                <div class="authentication-bg">
                    <div class="bg-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
