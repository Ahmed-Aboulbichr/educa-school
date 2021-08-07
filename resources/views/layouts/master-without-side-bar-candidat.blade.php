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
        @include('layouts.topbar-candidat')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="page-content">
            <div class="container">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        </div>
        <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
@include('layouts.vendor-scripts')
</body>
</html>
