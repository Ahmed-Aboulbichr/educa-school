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
     
       <div class="d-flex col-12 bg-light">
                <div class="col-lg-6">
                    <div class="form-group">
                            <select class="form-control select2" onchange="$('#session').val(this.value)">
                                <option value="-1">Séléctionner la session</option>
                                @foreach($sessions as $session)
                                    <option value="{{$session->annee_univ}}">{{$session->annee_univ}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('all_type_formations')}}" >
                        <input type="text" class="form-control" id="session" name="session">
                        <button type="submit" class="btn btn-secondary waves-effect waves-light mt-2 w-100">les formations</button>
                    </form>
                </div>
        </div>
</div>

@endsection
@section('script')

<!-- Required datatable js -->
            <!-- {{--

<script src="{{ URL::asset('/assets/libs/datatables/dataTables.min.js')}}"></script>

<script src="{{ URL::asset('/assets/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
--}} -->


@endsection
