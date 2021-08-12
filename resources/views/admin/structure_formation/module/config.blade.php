@extends('layouts.master-educa')
@section('title') Editable Tables @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Structure Formation @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Semestres @endslot
@endcomponent

        <div class="row">
            <div class="col-4">
                <select class="form-control select2" name ="session" id="session" onchange="getFormations()">
                    <option value="-1">Séléctionner la session</option>
                </select>
            </div>
            <div class="col-4">
                <select class="form-control select2" name ="formation" id="formation" onchange="getSemestres()">
                    <option value="-1">Séléctionner la formation</option>
                </select>
            </div>
        </div>
        <div class="row mt-5" id="semestres">

        </div>

@endsection
@section('script')

    <script>

        var config = {
            routes: {
                getSessions: "{{route('getSessions')}}" ,
                getFormations : "{{route('getFormationsBySession')}}" ,
                getSemestres: "{{route('getSemestresByFormation')}}" ,
            }
        }

        var html = '';

        function getSemestres(){
            $("#semestres").empty();
            $.ajax({
                url: config.routes.getSemestres,
                data: "formation="+$("#formation").val(),
                type: 'get',
                dataType : 'json',
                success: function(response) {
                    for(var i=0; i<response.length; i++){
                        html += '<div class="col-lg-4"><div class="card border border-primary"><div class="card-header bg-transparent border-primary"><h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow mr-3"></i>'+response[i].intitule_semestre+'</h5></div><div class="card-body"><p class="card-text">Cliquer pour voir toutes les modules du formation '+response[i].intitule_semestre+' </p></div><form action="'+"{{route('module.index')}}"+'"><input type="hidden" name="formation_id" value="'+response[i].id+'"><button type="submit" class="btn btn-primary waves-effect waves-light m-3">Les modules</button></div>';
                    }
                    $("#semestres").append(html);
                    html = '';
                },
                error: function(response) {
                    console.log("erreur de la sélectionne");
                }
            });
        }

        function getFormations(){
            $("#formation").empty();
            $.ajax({
                url: config.routes.getFormations,
                data: "session="+$("#session").val(),
                type: 'get',
                dataType : 'json',
                success: function(response) {
                    for(var i=0; i<response.length; i++){
                        option = "<option value='"+response[i].id+"'>"+response[i].specialite+"</option>";
                        $("#formation").append(option);
                    }
                }
            });
        }

        function getSessions(){
            $.ajax({
                url: config.routes.getSessions,
                type: 'get',
                dataType : 'json',
                success: function(response) {
                    for(var i=0; i<response.length; i++){
                        option = "<option value='"+response[i].id+"'>"+response[i].annee_univ+"</option>";
                        $("#session").append(option);
                    }
                }
            });
        }

        $('#document').ready(function(){
            getSessions();
        });

    </script>

@endsection
