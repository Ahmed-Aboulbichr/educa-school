@extends('layouts.master-educa')
@section('title') Mes Candidatures @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Educa School @endslot
    @slot('li_1') Candidat @endslot
    @slot('li_2') Mes Candidatures @endslot
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formations as $formation)
                        <tr>
                            <td>{{$formation->date_session}}</td>
                            <td>{{$formation->dateLimite}}</td>
                            <td>{{$formation->specialite}}</td>
                            <td>{{$formation->designation}}</td>
                            <td>{{$formation->niveau_acces}}</br>({{$formation->duree}})</td>
                            <td>C'est validé </br> un recu ici</td>
                        </tr>
                        @endforeach
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

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

@endsection

