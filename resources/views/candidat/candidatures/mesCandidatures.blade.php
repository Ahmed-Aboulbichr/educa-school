@extends('layouts.master-layouts-candidat')
@section('title')
    Mes Candidatures
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<body data-topbar="dark" data-layout="horizontal">
@endsection
@section('content')
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
                <div class="table-responsive">
                    <table id="datatable" class="table">
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
                                <td>
                                    @if($candidature->niveau_acces === 1)
                                        {{$candidature->niveau_acces}}ére année </br>({{$candidature->duree}} ans d'études)
                                    @else
                                        {{$candidature->niveau_acces}}ème année </br>({{$candidature->duree}} ans d'études)
                                    @endif    
                                </td>
                                @if($candidature->valide === 1)
                                    <td>C'est validé </br> un recu ici</td>
                                @else
                                    <td>Pas encours</td>
                                @endif
                                <td>
                                    <button class="btn btn-danger btn-sm btn-rounded waves-effect waves-light btn-delete"  data-toggle="modal" data-action="{{ route('candidatures.destroy', $candidature->id) }}" data-target="#annule">
                                        <i class="ri-close-line align-middle mr-2"></i>Annuler
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->
<!-- Modal -->
<div class="modal fade" id="annule"  tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Annuler la candidature</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>êtes-vous sûr de vouloir annuler votre candidature ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Non</button>
                <form action="" id="form-delete-candidature" method="post">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger waves-effect waves-light" type="submit">Oui</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $('.btn-delete').on('click', function () {
            $('#form-delete-candidature').attr('action', $(this).data('action'));
        });
    </script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

@endsection

