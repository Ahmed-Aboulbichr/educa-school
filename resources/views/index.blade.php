@extends('layouts.master')
@section('title') Dashboard @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Dashboard @endslot
    @slot('li_1') Nazox @endslot
    @slot('li_2') Dashboard @endslot
@endcomponent
    <div class="row">
        <div class="col-xl-8">
            <div class="row">
            </div>

    </div>
    @endsection

    @section('script')
            <!-- plugin js -->
            <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

            <!-- jquery.vectormap map -->
            <script src="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.js')}}"></script>

            <!-- Responsive examples -->
            <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

            <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js')}}"></script>

    @endsection

