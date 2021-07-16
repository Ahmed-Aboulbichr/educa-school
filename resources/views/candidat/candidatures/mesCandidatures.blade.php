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
        @if( session()->has('success') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all mr-2"></i>
                {{ session()->get('success') }}
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidatures as $candidature)
                        <tr>
                            <td>{{$candidature->date_session}}</td>
                            <td>{{$candidature->dateLimite}}</td>
                            <td>{{$candidature->specialite}}</td>
                            <td>{{$candidature->designation}}</td>
                            <td>{{$candidature->niveau_acces}}</br>({{$candidature->duree}})</td>
                            @if($candidature->valide === 1)
                                <td>C'est validé </br> un recu ici</td>
                            @else
                                <td>Pas encours</td>
                            @endif
                            <td>
                                <form action="{{ route('candidatures.destroy', $candidature->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" type="submit">
                                    <i class="ri-close-line align-middle mr-2"></i>Annuler
                                  </button>
                                </form>
                            </td>
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

