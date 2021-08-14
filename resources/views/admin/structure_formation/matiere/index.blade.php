@extends('layouts.master-educa')
@section('title') Modules @endsection
@section('css')
    <!-- DataTables -->
    <!-- Sweet Alert-->
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Modules @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Modules @endslot
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
                                <th>#</th>
                                <th>Ref Matiere</th>
                                <th>Intitulé</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($matieres as $matiere)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$matiere->id_matiere}}</td>
                                    <td>{{$matiere->intitule_matiere}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('matiere.destroy', $matiere->id) }}" method="POST">
                                            <button class="btn btn-info p-1 btn-edit" type="button" data-route="{{route('matiere.edit', $matiere->id)}}"><i class="mdi mdi-24px mdi-file-document-edit-outline"></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning p-1 btn-delete" type="submit"><i class="mdi mdi-24px mdi-delete"></i></button>
                                        </form>
                                    </td>
                                <tr>
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
                        <h5 class="modal-title mt-0" id="myModalLabel">L'ajout de matiere</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('matiere.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="store")
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <input type="hidden" name ="module_id" value="{{$module_id}}">
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Réference</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="id_matiere" >
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Intitulé</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="intitule_matiere" >
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Professeur</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="professeur_id" id="professeur">
                                        <option>--- Enseigné par ---</option>
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
                        <h5 class="modal-title mt-0" id="myModalLabel">Modifier la matiere</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="editForm" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="update")
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <input type="hidden" name ="module_id" value="{{$module_id}}">
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Réference</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="id_matiere" value="" id="idMatiere_modifier">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Intitulé</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="intitule_matiere" value="" id="intituleMatiere_modifier">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Professeur</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="professeur_id" id="professeur_selected">
                                        <option>--- Enseigné par ---</option>
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

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js')}}"></script>
    <script>


        $('#ajoutButton').on('click', function(){
            $("#ajoutModal").modal('show');
        });


        $('.btn-delete').on('click', function(event){
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parents('form').submit();
                }
            });
        });


        $('.btn-edit').on('click', function () {
            var route = $(this).data('route');
            $.ajax({
                url: route,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    $("#professeur_selected").empty();
                    matiere = response.matiere
                    getProfesseurs(matiere);
                    $('#idMatiere_modifier').val(response.matiere.id_matiere);
                    $('#intituleMatiere_modifier').val(response.matiere.intitule_matiere);
                    $("#editForm").attr("action",response.route);
                    $("#editModal").modal('show');
                },
                error: function(response){
                    console.log(response.responseText);
                }
            })
        });

        function getProfesseurs(matiere){
            $.ajax({
                url: "{{route('getProfesseurs')}}",
                type: 'get',
                dataType : 'json',
                success: function(response) {
                    if(matiere === null){
                        for(var i=0; i<response.length; i++){
                            option = "<option value='"+response[i].id+"'>Pr "+response[i].nom.toUpperCase()+" "+response[i].prenom+"</option>";
                            $("#professeur").append(option);
                        }
                    }
                    if(matiere != null){
                        for(professeur of response){
                            (matiere.professeur_id == professeur.id)?option = "<option selected value='"+professeur.id+"'>Pr "+professeur.nom.toUpperCase()+" "+professeur.prenom+"</option>":option = "<optionvalue='"+professeur.id+"'>Pr "+professeur.nom.toUpperCase()+" "+professeur.prenom+"</option>";
                             $("#professeur_selected").append(option);
                        }
                    }
                }
            });
        }

        $('#document').ready(function(){
            matiere = null;
            getProfesseurs(matiere);
        });


    </script>

    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="store")
    <script>$('#ajoutModal').modal('toggle');</script>
    @endif
    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
    <script>$('#editModal').modal('toggle');</script>
    @endif

@endsection
