@extends('layouts.master-without-nav')
@section('title')
Recover Password
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
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                
                                    <div class="text-center">
                                        <div>
                                            <a href="{{url('index')}}" class="logo"><img src="{{ URL::asset('/assets/images/logo.png')}}" height="70" alt="logo"></a>
                                        </div>

                                        <h4 class="font-size-18 mt-4">Verfier votre email</h4>
                                    </div>
                                       <div class="p-2 mt-5">
                                         
                                              <div class="card">
                                                <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                                
                                                <div class="card-body">
                                                    @if (session('resent'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                                        </div>
                                                    @endif
                                
                                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                                    {{ __('If you did not receive the email') }},
                                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                                    </form>
                                                </div>
                                            </div>
                                    
                                            <div class="mt-4 text-center">
                                                <p><a href="{{url('register')}}" class="font-weight-medium text-primary"> Créer votre compte</a> </p>
                                                <p><script>document.write(new Date().getFullYear())</script>© ENCGF</p>
                                            </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="authentication-bg">
                        <div class="bg-overlay"></div>
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