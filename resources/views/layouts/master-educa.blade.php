<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDUCA SCHOOL - @yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('/assets/images/Icon-180x180.png')}}">
    @include('layouts.head')
</head>
@section('body')
@show
<body data-sidebar="dark">
     <!-- Begin page -->
     <div id="layout-wrapper">
        @include('layouts.topbar-educa');
        @if ((Auth::user()==null)?false:(Auth::user()->hasRole('Super Admin')))
             @include('layouts.sidebar-educa-admin');
        @else
            @if ((Auth::user()==null)?false:(Auth::user()->hasRole('User')))
                @include('layouts.sidebar-educa-etud');
            @endif
        @endif
        {{--@include('layouts.sidebar')--}}
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        </div>
</div>
<!-- END layout-wrapper -->


<!-- JAVASCRIPT -->
@include('layouts.vendor-scripts')
</body>
</html>
