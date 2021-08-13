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
    @slot('li_2') Formation @endslot
@endcomponent

        <div class="row">
            <div class="col-6">
                <select class="form-control select2" name ="session" id="session" onchange="getFormations()">
                    <option value="-1">Séléctionner la session</option>
                </select>
            </div>
        </div>
        <div class="mt-5" id="formations">

        </div>

@endsection
@section('script')

    <script>

        var config = {
            routes: {
                getFormations : "{{route('getFormationsBySession')}}" ,
                getSessions: "{{route('getSessions')}}" ,
            }
        }


        function getFormations(){
            let html = '<div class="row">';
            $("#formations").empty();
            $.ajax({
                url: config.routes.getFormations,
                data: "session="+$("#session").val(),
                type: 'get',
                dataType : 'json',
                success: function(response) {
                    for(var i=0; i<response.length; i++){
                        var c = i+1;
                        html += '<div class="col-lg-4"><div class="card border border-primary"><div class="card-header bg-transparent border-primary"><h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow mr-3"></i>'+response[i].specialite+'</h5></div><div class="card-body"><p class="card-text">Cliquer pour voir toutes les semestres du formation '+response[i].specialite+' </p></div><form action="'+"{{route('semestre.index')}}"+'"><input type="hidden" name="formation_id" value="'+response[i].id+'"><button type="submit" class="btn btn-primary waves-effect waves-light m-3">Les semestres</button></form></div></div>';
                        if(c === 3){
                            html +='</div><div class="row">';
                            c = 0;
                        }
                    }
                    $("#formations").append(html);
                    html = '';
                },
                error: function(response) {
                    console.log("erreur de la sélectionne");
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
