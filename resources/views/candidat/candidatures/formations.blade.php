@extends('layouts.master-educa')
@section('title') Dashboard @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Dashboard @endslot
    @slot('li_1')  @endslot
    @slot('li_2')  @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        @if( session()->has('success') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all mr-2"></i>
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif( session()->has('notice') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                {{ session()->get('notice') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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
                        @foreach ($formations as $formation)
                        <tr>
                            <td>{{$formation->date_session}}</td>
                            <td>{{$formation->dateLimite}}</td>
                            <td>{{$formation->specialite}}</td>
                            <td>{{$formation->designation}}</td>
                            <td>{{$formation->niveau_acces}}</br>({{$formation->duree}})</td>

                            @php $currentDate = date("Y-m-d"); @endphp
                            @if ($formation->dateLimite < $currentDate)
                                <td>Fermé</td>
                            @elseif($formation->dateLimite > $currentDate)
                                <td colspan="2">
                                    <form method="post" action="{{route('candidatures.store')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$formation->id}}">
                                        <button type="submit"  class="btn btn-primary btn-rounded btn-sm waves-effect waves-light">+ Ajouter</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                        <!--
                        <tr>
                            <td>2021-08-01</td>
                            <td>2021-07-15</td>
                            <td>Comptabilité, Contrôle de Gestion et Audit</td>
                            <td>Master</td>
                            <td>1ére année </br> (2 ans d'études)</td>
                            <td colspan="2">
                                <a type="button" href="https://www.google.com" style="color:#fff;"class="btn btn-primary btn-rounded btn-sm waves-effect waves-light">+ Ajouter</a>
                            </td>
                        </tr>
                        -->
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

        <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js')}}"></script>

@endsection

