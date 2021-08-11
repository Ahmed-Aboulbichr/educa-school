@extends('layouts.master-layout-prof')

@section('title') Professeurs @endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Plugin css -->
    <link href="{{ URL::asset('/assets/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('body')
<body data-topbar="light" data-layout="horizontal">
@endsection
@section('content')
{{-- <div class="row">
    <div class="col-12">
        {{-- @if( session()->has('success') )
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
        @elseif( session()->has('exists') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                 {{ session()->get('exists') }}
                </div>
            @endif -
    <div class="card">
            <div class="row mb-2 mt-4">
                <div class="col-xl-2 offset-xl-10 offset-lg-9" style="padding-left: 4em;">
                    <button class="btn btn-primary waves-effect waves-light" data-target="#ajoutModal"  data-toggle="modal"><i class="mdi mdi-plus mr-1"></i>Ajouter</button>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <table id="datatable" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th>matricule</th>
                                <th>Nom Prénom</th>
                                <th>Post</th>
                                <th>Télephone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($professeurs as $prof)
                                <tr>
                                    <td>{{$prof->matricule}}</td>
                                    <td>{{$prof->nom}} {{prof->prenom}}</td>
                                    <td>{{$prof->post}}</td>
                                    <td>{{$prof->tel}}</td>
                                    <td>
                                        <form action="{{ route('professeurs.destroy', $prof->id) }}" method="POST">
                                            <button class="btn btn-info p-1 btn-edit" type="button" data-route="{{route('professeurs.edit', $prof->id)}}" ><i class="mdi mdi-24px mdi-file-document-edit-outline"></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning p-1" name="archive" type="submit"  ><i class="mdi mdi-24px mdi-delete"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div>

        {{-- Modal pour l'ajout d'un prof 
         <div id="ajoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Ajout d'un Professeur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('professeurs.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="store")
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Matricule </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="matricule">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Nom </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nom">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Prénom </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="prenom">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Etat Civile </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="etat_civile">
                                        <option></option>
                                        <option >marié (M)</option>
                                        <option >pacsé (O)</option>
                                        <option >divorcé (D)</option>
                                        <option >séparé (D)</option>
                                        <option >célibataire (C)</option>
                                        <option >veuf (V)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Sexe </label>
                                <div class="col-md-9 d-flex justify-content-around">
                                    <div class="row" style="justify-content: space-around">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="masculin" name="sexe" value="Homme" class="custom-control-input">
                                            <label class="custom-control-label" for="masculin">Masculin</label>
                                        </div>
                                    </div>
                                    <div class="row" style="justify-content: space-around">
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="masculin" name="sexe" value="Homme" class="custom-control-input">
                                            <label class="custom-control-label" for="masculin">Masculin</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Télephone </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="tel">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Adresse </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="adresse">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Ville </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="ville_id">
                                        <option></option>
                                        @foreach ($villes as $ville)
                                            <option value="{{$ville->id}}">{{$ville->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Matière</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="matiere_id">
                                        <option></option>
                                        @foreach ($matieres as $mat)
                                            <option value="{{$mat->id}}">{{$mat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

</div> --}}
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            
                            <a class="btn btn-outline-success waves-effect waves-light nav-link mb-2 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                            <a class="btn btn-outline-success waves-effect waves-light nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Séances</a>
                        {{-- <a class="btn btn-outline-success waves-effect waves-light nav-link mb-2" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                        <a class="btn btn-outline-success waves-effect waves-light nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> --}}
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="col-md-6">
                                    <div>
                                        <ul class="list-unstyled product-desc-list">

                                            <li><i class="mdi mdi-credit-card mr-1 align-middle"></i>Matricule : {{ $prof->matricule }}</li>
                                            <li><i class="mdi mdi-barcode mr-1 align-middle"></i>Nom : {{ $prof->nom }}</li>
                                            <li><i class="mdi mdi-calendar mr-1 align-middle"></i>Prénom : {{ $prof->prenom }}</li>
                                            <li><i class="mdi mdi-map-marker-radius mr-1 align-middle"></i>Etat Civile : {{ $prof->etat_civile }}</li>
                                            <li><i class="mdi mdi-phone mr-1 align-middle"></i>Téléphone : {{ $prof->tel }}</li>
                                            <li><i class="mdi mdi-gender-male-female mr-1 align-middle"></i>Sexe :  {{ $prof->sexe }}</li>
                                           </ul>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled product-desc-list">

                                        <li><i class="mdi mdi-map-marker-radius align-middle"></i>Adresse : {{ $prof->adresse }} </li>
                                        <li><i class="mdi mdi-school mr-1 align-middle"></i>Matière : {{ $matiere }}</li>
                                        <li><i class="mdi mdi-email mr-1 align-middle"></i>Email : {{ $prof->email }}</li>
                                       </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                
                                <div id='calendar'></div>

                                <div style='clear:both'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>
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
    
    <!-- plugin js -->
    <script src="{{ URL::asset('/assets/libs/moment/moment.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>

    <!-- Calendar init -->
    <script src="{{ URL::asset('/assets/js/pages/calendar.init.js')}}"></script>

    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="store")
    <script>$('#ajoutModal').modal('toggle');</script>
    @endif
    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
    <script>$('#editModal').modal('toggle');</script>
    @endif
@endsection
