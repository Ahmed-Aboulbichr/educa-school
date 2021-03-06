@extends('layouts.master')
@section('title') session @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') formations @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') formations @endslot
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
        @elseif( session()->has('exists') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                 {{ session()->get('exists') }}
                </div>
            @endif

        <div class="card">
            <div class="row mb-2 mt-4">
                <div class="col-xl-2 offset-xl-10 offset-lg-9" style="padding-left: 4em;">
                    <button class="btn btn-primary waves-effect waves-light" id="ajoutButton"  data-toggle="modal"><i class="mdi mdi-plus mr-1"></i>Ajouter</button>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 85.0781px;">Session</th>
                                <th>Date Limite</th>
                                <th>Specialite</th>
                                <th style="width: 91.375px;">Type</th>
                                <th>Niveau </br> d'acc??s</th>
                                <th>Niveau </br>pr??-requis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formations as $formation)
                                <tr>
                                    <td>{{$formation->annee_univ}}</td>
                                    <td>{{$formation->dateLimite}}</td>
                                    <td>{{$formation->specialite}}</td>
                                    <td>{{$formation->designation}}</td>
                                    <td>
                                        @if($formation->niveau_acces === 1)
                                            {{$formation->niveau_acces}}??re ann??e </br>({{$formation->duree}} ans d'??tudes)
                                        @else
                                            {{$formation->niveau_acces}}??me ann??e </br>({{$formation->duree}} ans d'??tudes)
                                        @endif
                                    </td>
                                    <td>{{$formation->intitule}}</td>
                                    <td>
                                        <form action="{{ route('formation.destroy', $formation->id) }}" method="POST">
                                            <button class="btn btn-info p-1  btn-edit" type="button" data-route="{{route('formation.edit', $formation->id)}}" ><i class="mdi mdi-22px mdi-file-document-edit-outline"></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning p-1 " name="archive" type="submit"  ><i class="mdi mdi-22px mdi-delete"></i>   </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div>
        <!--Modal Ajout -->
        <div id="ajoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Ajout d'une formation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('formation.store') }}" method="POST">
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
                                <label class="col-md-3 col-form-label">Session</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="session_id" id="date_session">
                                        <option>--- Ann??e universitaire ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Date limite</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="date" name="dateLimite" id="date_limite">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Type</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="type_formation_id" id="type_formations">
                                        <option>--- Type formation ---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Specialite</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="specialite"> </textarea>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Niveau d'acc??s</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="niveau_acces" id="niveau_acces">
                                        <option>--- Niveau d'acc??s ---</option>
                                        <option value="1">1??re ann??e</option>
                                        <option value="2">2??me ann??e</option>
                                        <option value="3">3??me ann??e</option>
                                        <option value="4">4??me ann??e</option>
                                        <option value="5">5??me ann??e</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Duree</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="duree" id="duree">
                                        <option>--- Dur??e ---</option>
                                        <option value="1">1 ans d'??tudes</option>
                                        <option value="2">2 ans d'??tudes</option>
                                        <option value="3">3 ans d'??tudes</option>
                                        <option value="4">4 ans d'??tudes</option>
                                        <option value="5">5 ans d'??tudes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Niveau </br> Pr??-requis</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="niveau_preRequise" id="niveau_preRequise">
                                        <option>--- Niveau pr??-requis ---</option>
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

        <!--Modal modifier -->
        <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Modifier la formation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="editForm" method="POST">
                        @csrf
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="update")
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Session</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="session_id" id="dateSession_selected">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Date Limite</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="date" name="dateLimite" id="dateLimite_selected">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Type</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="type_formation_id" id="typeFormations_selected">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Specialite</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="specialite" id="specialite"> </textarea>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Niveau d'acc??s</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="niveau_acces" id="niveauAcces_selected">
                                        <option>--- Niveau d'acc??s ---</option>
                                        <option value="1">1??re ann??e</option>
                                        <option value="2">2??me ann??e</option>
                                        <option value="3">3??me ann??e</option>
                                        <option value="4">4??me ann??e</option>
                                        <option value="5">5??me ann??e</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Dur??e</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="duree" id="duree_selected">
                                        <option>--- Dur??e ---</option>
                                        <option value="1">1 ans d'??tudes</option>
                                        <option value="2">2 ans d'??tudes</option>
                                        <option value="3">3 ans d'??tudes</option>
                                        <option value="4">4 ans d'??tudes</option>
                                        <option value="5">5 ans d'??tudes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Niveau </br> Pr??-requis</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="niveau_preRequise" id="niveaupreRequise_selected">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Modifier</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>
</div>
@endsection
@section('script')

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="store")
        <script>$('#ajoutModal').modal('toggle');</script>
    @endif
    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
        <script>$('#editModal').modal('toggle');</script>
    @endif
    <script>

        function getTypeFormations(formation){
            var formations = null;
            $.ajax({
                url: config.routes.getTypeFormations,
                type: 'get',
                dataType : 'json',
                success: function(response) {
                    if(formation === null){
                        for(var i=0; i<response.length; i++){
                            option = "<option value='"+response[i].id+"'>"+response[i].designation+"</option>";
                            $("#type_formations").append(option);
                        }
                    }
                    if(formation != null){
                        for(type of response){
                            (formation.type_formation_id == type.id)?option = "<option selected value="+type.id+">"+type.designation+"</option>":option = "<option value='"+type.id+"'>"+type.designation+"</option>";
                             $("#typeFormations_selected").append(option);
                        }
                    }
                }
            });
        }
        function getNiveau(formation){
            $.ajax({
                url: config.routes.getNiveau,
                type: 'get',
                dataType : 'json',
                success: function(response) {

                    if(formation === null){
                        for(var i=0; i<response.length; i++){
                            option = "<option value='"+response[i].id+"'>"+response[i].intitule+"</option>";
                            $("#niveau_preRequise").append(option);
                        }
                    }
                    if(formation != null){
                        for(niveau of response){
                            (formation.niveau_preRequise == niveau.id)?option = "<option selected value="+niveau.id+">"+niveau.intitule+"</option>":option = "<option value='"+niveau.id+"'>"+niveau.intitule+"</option>";
                             $("#niveaupreRequise_selected").append(option);
                        }
                    }
                }
            });
        }
        function getSessions(formation){
            $.ajax({
                url: config.routes.getSessions,
                type: 'get',
                dataType : 'json',
                success: function(response) {
                    if(formation === null){
                        for(var i=0; i<response.length; i++){
                            option = "<option value='"+response[i].id+"'>"+response[i].annee_univ+"</option>";
                            $("#date_session").append(option);
                        }
                    }
                    if(formation != null){
                        for(session of response){
                            (formation.session_id == session.id)?option = "<option selected value="+session.id+">"+session.annee_univ+"</option>":option = "<option value='"+session.id+"'>"+session.annee_univ+"</option>";
                             $("#dateSession_selected").append(option);
                        }
                    }
                }
            });
        }
        var config = {
            routes: {
                getTypeFormations : "{{route('getTypeFormations')}}" ,
                getNiveau: "{{route('getNiveau')}}",
                getSessions: "{{route('getSessions')}}"
            }
        }

        $('.btn-edit').on('click', function () {
            var route = $(this).data('route');
            $.ajax({
                url: route,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    $("#dateSession_selected").empty();
                    $("#typeFormations_selected").empty();
                    $("#niveaupreRequise_selected").empty();
                    formation = response.formation
                    getTypeFormations(formation);
                    getNiveau(formation);
                    getSessions(formation);
                    $("#specialite").val(formation.specialite);
                    $("#dateLimite_selected").val(formation.dateLimite);
                    $('#niveauAcces_selected').find('option[value='+formation.niveau_acces+']').attr('selected','selected');
                    $('#duree_selected').find('option[value="'+formation.duree+'"]').attr('selected','selected');
                    $("#editForm").attr("action",response.route);
                    $("#editModal").modal('show');
                },
                error: function(response){
                    console.log(response.responseText);
                }
            })
        });

        $('#document').ready(function(){
            formation = null;
            getTypeFormations(formation);
            getNiveau(formation);
            getSessions(formation);
        });

        $('#ajoutButton').on('click', function(){
            $("#ajoutModal").modal('show');
        });
    </script>
@endsection
