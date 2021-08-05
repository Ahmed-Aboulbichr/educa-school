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
     
       <div class="col-12 bg-light">
                <div class="d-flex">
                    <div class="col-lg-6">
                        <div class="form-group">
                                <select class="form-control select2" id="annee_univ" name="annee_univ">
                                    <option value="-1">Séléctionner l'année universitaire</option>
                                    @foreach($sessions as $session)
                                        <option value="{{$session->annee_univ}}">{{$session->annee_univ}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                                <select class="form-control select2" id="date_sessions" onchange="$('#session').val(this.value)">
                                    <option value="-1">Séléctionner la date de la session</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-12">
                    <form action="{{ route('all_type_formations')}}" >
                        <input type="text" class="form-control" id="session" name="session">
                        <button type="submit" class="btn btn-secondary waves-effect waves-light mt-2 w-100">les formations</button>
                    </form>
                </div>
        </div>
        
                
</div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#annee_univ').change(function(){
                var anne_univ = $(this).val();
                $('#date_sessions').find('option').not(':first').remove();
                $.ajax({
                    url : '/getSessionsByAnneeUniv/'+anne_univ,
                    
                    type: 'get',
                    dataType: 'json',
                    success: function( result )
                    {
                        $.each( result['date'], function(index,value) {
                            $('#date_sessions').append($('<option>', {value:value.date_session, text:value.date_session}));
                        });
                    },
                    error: function()
                    {
                        alert('error...');
                    }
                });
            });
        });
    </script>
@endsection
