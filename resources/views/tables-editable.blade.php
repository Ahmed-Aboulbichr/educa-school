@extends('layouts.master')
@section('title') Editable Tables @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') candidatures @endslot
    @slot('li_1') Tables @endslot
    @slot('li_2') Editable Tables @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Liste des candidatures</h4>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>labelle</th>
                            <th>valide</th>
                            <th>candidat_id</th>
                            <th>formation_id</th>
                            <th>action</th>
                            </tr>
                        </thead>
                        @foreach ($candidatures as $candidature)
                        <tr>
                            <td>{{ $candidature->id }}</td>
                            <td data-original-value="11">{{ $candidature->labelle }}</td>
                        {{--<form  action="{{ route('setValidate') }}" method="POST">--}}
                            <td data-original-value="11">
                                @if ($candidature->valide=="0")
                                    <button type="submit" class="btn btn-warning waves-effect waves-light btn-sm" id="btnGroupVerticalDrop1"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-error-warning-line align-middle mr-2"></i> non validé
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-success waves-effect waves-light btn-sm">
                                        <i class="ri-check-line align-middle mr-2"></i> validé
                                    </button>
                                @endif
                            </td>
                        {{--</form>--}}
                            <td data-original-value="1"><a href="#" data-type="text" data-pk="1" class="editable" data-url="" data-title="Edit Quantity">{{ $candidature->candidat_id }}</a></td>
                            <td data-original-value="1.99"><a href="#" data-type="text" data-pk="1" class="editable" data-url="" data-title="Edit Quantity">{{ $candidature->formation_id }}</a></td>
                            <td>
                                <form method="POST" action="{{ route('candidatures.destroy', $candidature->id) }}">
                                <a href="{{ route('candidatures.edit', $candidature->id) }}">
                                    <button type="button" class="btn btn-light waves-effect btn-sm"><i class="mdi mdi-24px mdi-file-edit"></i></button>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light waves-effect btn-sm"><i class="mdi mdi-24px mdi-delete-forever"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection
@section('script')

<!-- Required datatable js -->
<script src="{{ URL::asset('/assets/libs/datatables/dataTables.min.js')}}"></script>

<script src="{{ URL::asset('/assets/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script>


@endsection