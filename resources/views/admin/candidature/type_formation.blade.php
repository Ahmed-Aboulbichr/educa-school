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
    @foreach($type_formation as $type)
        <div class="col-lg-4">
            <div class="card border border-primary">
                <div class="card-header bg-transparent border-primary">
                    <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow mr-3"></i>{{$type->designation}}</h5>
                </div>
                <div class="card-body">
                    {{-- <h5 class="card-title mt-0">card title</h5> --}}
                    <p class="card-text">Cliquer pour voir toutes les candidatures du formation {{$type->designation}}.</p>
                    
                </div>
                <a href="{{ route('formation.show', [$type->id]) }}" class="btn btn-primary waves-effect waves-light m-3">Button</a>
            </div>
        </div>
    @endforeach
</div>

@endsection
@section('script')

<!-- Required datatable js -->
            <!-- {{--

<script src="{{ URL::asset('/assets/libs/datatables/dataTables.min.js')}}"></script>

<script src="{{ URL::asset('/assets/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
--}} -->


@endsection
