@extends('layouts.master-without-nav')
@section('title')
Connexion
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

                                        <h4 class="font-size-18 mt-4">S'authentifier</h4>
                                    </div>

                                    <div class="p-2 mt-4">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-user-2-line auti-custom-input-icon" style="z-index: 1000;"></i>
                                                <label for="email" style="z-index: 1000;">{{ __('E-Mail Address') }}</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-lock-2-line auti-custom-input-icon" style="z-index: 1000;"></i>
                                                <label for="password" style="z-index: 1000;">{{ __('Password') }}</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" >
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Se souvenir de moi</label>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('Connexion') }}</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock mr-1"></i> {{ __('Mot de passe oublié ?') }}</a>
                                                @endif
                                            </div>
                                        </form>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p><a href="{{url('register')}}" class="font-weight-medium text-primary"> Créer votre compte</a> </p>
                                        <p><script>document.write(new Date().getFullYear())</script>© DEVSTTER</p>
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
