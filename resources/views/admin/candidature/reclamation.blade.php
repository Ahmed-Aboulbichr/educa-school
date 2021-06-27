@extends('layouts.master-educa')
@section('title') Candidature @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Candidature @endslot
    @slot('li_1') Candidature @endslot
    @slot('li_2') Reclamation @endslot
@endcomponent
    <div class="row">

    </div>

    <!-- end row -->
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

