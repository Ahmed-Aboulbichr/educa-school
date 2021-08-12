@extends('layouts.master-educa')
@section('title') Emploi du temps @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Emploi du temps @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Filieres @endslot
@endcomponent

        <div class="row">
            <div class="col-3">
                <select class="form-control select2" required name ="session" id="session" onchange="afficheSemestres()">
                    <option value="-1">Séléctionner la session</option>
                        @foreach($sessions as $session)
                            <option value="{{$session->annee_univ}}">{{$session->annee_univ}}</option>
                        @endforeach
                </select>
            </div>
            <div class="col-3">
                <select class="form-control select2" required name ="semestre" id="semestre" onchange="afficheGroupes()">
                    <option value="-1">Séléctionner le semestre</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control select2" required name ="groupe" id="groupe" onchange="afficheSousGroupes()">
                    <option value="-1">Séléctionner le groupe</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control select2" name ="sousGroupe" id="sousGroupe" >
                    <option value="-1">Séléctionner le sous groupe</option>
                </select>
            </div>
        </div>

@endsection
@section('script')

    <script>
            function afficheSemestres(){
                var route = "{{route('custom_semestres')}}"
                $.ajax({
                    url: route,
                    type: 'get',
                    data: "session="+$("#session").val(),
                    dataType : 'json',
                    success: function (data){
                        $("#semestre").html(data);
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                });
            }
            function afficheGroupes(){
                var route = "{{route('custom_groupes')}}"
                $.ajax({
                    url: route,
                    type: 'get',
                    data: "semestre="+$("#semestre").val(),
                    dataType : 'json',
                    success: function (data){
                        $("#groupe").html(data);
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                });
            }
            function afficheGroupes(){
                var route = "{{route('custom_sousgroupes')}}"
                $.ajax({
                    url: route,
                    type: 'get',
                    data: "groupe="+$("#groupe").val(),
                    dataType : 'json',
                    success: function (data){
                        $("#sousGroupe").html(data);
                    },
                    error: function(response) {
                        console.log(response.responseText)
                    }
                });
            }
    </script>

@endsection
