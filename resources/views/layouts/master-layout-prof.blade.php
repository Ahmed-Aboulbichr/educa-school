<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>EDUCA SCHOOL - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('/assets/images/Icon-180x180.png')}}">
        @include('layouts.head')
        <style>
            body[data-layout=horizontal] .page-content {
            margin-top: 30px;
            padding: calc(55px + 24px) calc(24px / 2) 60px calc(24px / 2);
            }
        </style>
    </head>

    @yield('body')
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.top-bar-prof')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>
            @include('layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    @include('layouts.vendor-scripts')
    </body>
</html>
