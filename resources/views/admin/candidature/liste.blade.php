@extends('layouts.master-educa')
@section('title') Candidatures @endsection
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

<div class="row" style="margin-top: 2em;">
   {{--  @if(Session::has('validation'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('validation')}}
        </div>
    @endif --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Candidatures non validé</h4>
                {{-- Candidatures non validé --}}
                <div class="table-responsive">
                    <table class="table table-editable table-nowrap" id="datatable-buttons" >
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Labelle</th>
                            <th>Valide</th>
                            <th>Candidat</th>
                            <th>Formation</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        {{-- @if ($candidatures == null)
                            {{ $candidatures = [] }}
                        @endif --}}
                        @foreach ($candidatures as $candidature)
                            @if ($candidature->valide==0)
                        <tr>
                            <td>{{ $candidature->id }}</td>
                            <td data-original-value="11">{{ $candidature->labelle }}</td>
                            <td data-original-value="11">
                                <a href="{{ route('candidatures.editValidation', $candidature->id) }}" class="btn btn-warning waves-effect waves-light btn-sm">
                                    <i class="ri-error-warning-line align-middle mr-2"></i> non validé
                                </a>
                            </td>
                            <td data-original-value="1"><a href="#" data-type="text" data-pk="1" class="editable" data-url="" data-title="Edit Quantity">{{ $candidature->nom_fr }} {{ $candidature->prenom_fr }}</a></td>
                            <td data-original-value="1.99"><a href="#" data-type="text" data-pk="1" class="editable" data-url="" data-title="Edit Quantity">{{ $candidature->specialite }}</a></td>
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
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    
                {{-- Candidatures validé --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Candidatures Validé</h4>
                <div class="table-responsive">
                    <table class="table table-editable table-nowrap" id="datatable-buttons1">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Labelle</th>
                            <th>Valide</th>
                            <th>Candidat</th>
                            <th>Formation</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        {{-- @if ($candidatures == null)
                            {{ $candidatures = [] }}
                        @endif --}}
                        @foreach ($candidatures as $candidature)
                            @if ($candidature->valide!==0)
                        <tr>
                            <td>{{ $candidature->id }}</td>
                            <td data-original-value="11">{{ $candidature->labelle }}</td>
                            <td data-original-value="11">
                                <a href="{{ route('candidatures.editValidation', $candidature->id) }}" class="btn btn-success waves-effect waves-light btn-sm">
                                    <i class="ri-check-line align-middle mr-2"></i> validé
                                </a>
                            </td>
                            <td data-original-value="1"><a href="#" data-type="text" data-pk="1" class="editable" data-url="" data-title="Edit Quantity">{{ $candidature->nom_fr }} {{ $candidature->prenom_fr }}</a></td>
                            <td data-original-value="1.99"><a href="#" data-type="text" data-pk="1" class="editable" data-url="" data-title="Edit Quantity">{{ $candidature->specialite }}</a></td>
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
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end row -->

@endsection
@section('script')

<!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>   
    
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

@endsection
