@extends('layouts.master-educa')
@section('title') Editable Tables @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') candidatures @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Candidatures @endslot
@endcomponent

        <div class="row">
            <div class="col-6">
                <select class="form-control select2" name ="session" id="session" onchange="afficheTypeFormation()">
                    <option value="-1">Séléctionner la session</option>
                        @foreach($sessions as $session)
                            <option value="{{$session->annee_univ}}">{{$session->annee_univ}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-5" id="formations">

        </div>

@endsection
@section('script')

    <script>
            function afficheTypeFormation(){
                var route = "{{route('all_type_formations')}}"
                $.ajax({
                    url: route,
                    type: 'get',
                    data: "session="+$("#session").val(),
                    dataType : 'json',
                    success: function (data){
                        $("#formations").html(data);
                    },
                    error: function(response) {
                        console.log("erreur de la sélectionne");
                    }
                });
            }
    </script>

@endsection
