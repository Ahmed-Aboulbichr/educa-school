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
 <div class="row">
            <div class="col-12">
                <div class="modal-content">
                    <form action="{{ route('insertprofesseur') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="store")
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="col-9 form-group row align-items-center ml-auto mr-auto">
                                <label class="col-md-3 col-form-label">Matricule </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="matricule">
                                </div>
                            </div>
                            <div class="col-9 form-group row align-items-center ml-auto mr-auto">
                                <label class="col-md-3 col-form-label">Nom </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="nom">
                                </div>
                            </div>
                            <div class="col-9 form-group row align-items-center ml-auto mr-auto">
                                <label class="col-md-3 col-form-label">Prénom </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="prenom">
                                </div>
                            </div>
                            <div class="col-9 form-group row align-items-center ml-auto mr-auto">
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
                            <div class="col-9 form-group row align-items-center ml-auto mr-auto">
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
                                            <input type="radio" id="femme" name="sexe" value="Femme" class="custom-control-input">
                                            <label class="custom-control-label" for="femme">Femme</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 form-group row align-items-center ml-auto mr-auto">
                                <label class="col-md-3 col-form-label">Télephone </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="tel">
                                </div>
                            </div>
                            <div class="col-9 form-group row align-items-center ml-auto mr-auto">
                                <label class="col-md-3 col-form-label">Adresse </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="adresse">
                                </div>
                            </div>
                            <div class="col-9 form-group row align-items-center ml-auto mr-auto">
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
                            <div class="col-9 form-group row align-items-center ml-auto mr-auto">
                                <label class="col-md-3 col-form-label">Matière</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="matiere_id">
                                        <option></option>
                                        @foreach ($matieres as $mat)
                                            <option value="{{$mat->id}}">{{$mat->intitule}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer col-9">
                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
@endsection

