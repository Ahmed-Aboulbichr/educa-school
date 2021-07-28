@extends('layouts.master-educa')
@section('title') Candidatures Validé @endsection
@section('css')

    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Candidatures Validé  @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Candidatures Validé @endslot
@endcomponent



<div class="row">
    <div class="col-12">

<div class="card">
   
    <div class="card-body">
        <h4 class="card-title"></h4>
        <div class="table-responsive">
            <table id="datatable-buttons" class="table mt-4">
                <thead class="thead-light">
                        <tr>
                        <th>ID</th>
                        <th>Labelle</th>
                        <th>Valide</th>
                        <th>Candidat</th>
                        <th>Formation</th>
                        <th>Action</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($candidatures as $candidature)
                    <tr>
                        <td>{{ $candidature->id }}</td>
                        <td >{{ $candidature->labelle }}</td>
                        <td >

                            @if ($candidature->valide=="0")
                                <a href="{{ route('candidatures.editValidation', $candidature->id) }}" class="btn btn-warning waves-effect waves-light btn-sm">
                                    <i class="ri-error-warning-line align-middle mr-2"></i> non validé
                                </a>
                            @else
                                <a href="{{ route('candidatures.editValidation', $candidature->id) }}" class="btn btn-success waves-effect waves-light btn-sm">
                                    <i class="ri-check-line align-middle mr-2"></i> validé
                                </a>
                            @endif
                        </td>
                        <td >{{ $candidature->nom_fr }} {{ $candidature->prenom_fr }}</td>
                        <td >{{ $candidature->specialite }}</td>
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
                </tbody>
            </table>
        </div>
    </div> <!-- end card body-->
</div>

</div>
</div>

@endsection
@section('script')

<!-- Required datatable js -->
          
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js')}}"></script>




@endsection
