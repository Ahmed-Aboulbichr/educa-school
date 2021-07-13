@extends('layouts.master-educa')
@section('title') Dashboard @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Dashboard @endslot
    @slot('li_1')  @endslot
    @slot('li_2')  @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-title-desc">
                </p>
                <table id="datatable" class="table dt-responsive nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Session</th>
                            <th>Date limite</th>
                            <th>Spécialité</th>
                            <th>Type</th>
                            <th>Niveau d'accès</th>
                            <th>Postuler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2021-08-01</td>
                            <td>2021-07-15</td>
                            <td>Intelligence Économique </br>et prospective des territoires</td>
                            <td>Master</td>
                            <td>1ére année </br> (2 ans d'études)</td>
                            <td colspan="2">
                                <a type="button" href="https://www.google.com" style="color:#fff;"class="btn btn-primary btn-rounded btn-sm waves-effect waves-light">+ Ajouter</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->


@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>
@endsection

