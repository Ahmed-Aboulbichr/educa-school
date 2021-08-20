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
            <h4 class="card-title bg-warning p-2 text-light text-center">Candidatures non validé</h4>
            {{-- Candidatures non validé --}}
            <div class="container">
                <form class="filter" action="{{ url('') }}" method="GET">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                    <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Column</th>
                            <th>Operator</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>
                                    <select name="addMoreInputFields[0][column]" id="" class="filter-key form-control">
                                        <option value=''>Select Column</option>
                                        <option value="ID">ID</option>
                                        <option value="Labelle">Labelle</option>
                                        <option value="Valide">Valide</option>
                                        <option value="Candidat">Candidat</option>
                                        <option value="Formation">Formation</option>
                                        <option value="Action">Action</option>
                                    </select>

                            </td>
                            <td>
                                <select name="addMoreInputFields[0][operator]" id="" class="filter-operator form-control">
                                    <option value=''>Select Operator</option>
                                    <option value="=">=</option>
                                    <option value="!=">!=</option>
                                    <option value="<="><=</option>
                                    <option value=">=">>=</option>
                                    <option value="<"><</option>
                                    <option value=">">></option>
                                </select>

                            </td>

                            <td><input type="text" name="addMoreInputFields[0][value]" placeholder="Enter value"
                                    class="filter-value form-control" />
                            </td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add
                                    Filter</button></td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-outline-success btn-block">Save</button>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-editable table-nowrap" id="datatable-buttons">
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
                            <a href="{{ route('candidatures.editValidation', $candidature->id) }}"
                                class="btn btn-warning waves-effect waves-light btn-sm">
                                <i class="ri-error-warning-line align-middle mr-2"></i> non validé
                            </a>
                        </td>
                        <td data-original-value="1"><a href="#" data-type="text" data-pk="1" class="editable"
                                data-url="" data-title="Edit Quantity">{{ $candidature->nom_fr }}
                                {{ $candidature->prenom_fr }}</a></td>
                        <td data-original-value="1.99"><a href="#" data-type="text" data-pk="1" class="editable"
                                data-url="" data-title="Edit Quantity">{{ $candidature->specialite }}</a></td>
                        <td>
                            <form method="POST" action="{{ route('candidatures.destroy', $candidature->id) }}">
                                <a href="{{ route('candidatures.edit', $candidature->id) }}">
                                    <button type="button" class="btn btn-light waves-effect btn-sm"><i
                                            class="mdi mdi-24px mdi-file-edit"></i></button>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light waves-effect btn-sm"><i
                                        class="mdi mdi-24px mdi-delete-forever"></i></a>
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
            <h4 class="card-title bg-success p-2 text-light text-center">Candidatures Validé</h4>
            <div class="table-responsive">
                <table class="table table-editable table-nowrap" id="datatable-buttons1">
                    <button onclick="affiche()">Make as Etudiant</button>
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
                    <tr class="ligne" data-id="{{ $candidature->id }}" >
                        <td>{{ $candidature->id }}</td>
                        <td data-original-value="11">{{ $candidature->labelle }}</td>
                        <td data-original-value="11">
                            <a href="{{ route('candidatures.editValidation', $candidature->id) }}"
                                class="btn btn-success waves-effect waves-light btn-sm">
                                <i class="ri-check-line align-middle mr-2"></i> validé
                            </a>
                        </td>
                        <td data-original-value="1"><a href="#" data-type="text" data-pk="1" class="editable"
                                data-url="" data-title="Edit Quantity">{{ $candidature->nom_fr }}
                                {{ $candidature->prenom_fr }}</a></td>
                        <td data-original-value="1.99"><a href="#" data-type="text" data-pk="1" class="editable"
                                data-url="" data-title="Edit Quantity">{{ $candidature->specialite }}</a></td>
                        <td>
                            <form method="POST" action="{{ route('candidatures.destroy', $candidature->id) }}">
                                <a href="{{ route('candidatures.edit', $candidature->id) }}">
                                    <button type="button" class="btn btn-light waves-effect btn-sm"><i
                                            class="mdi mdi-24px mdi-file-edit"></i></button>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light waves-effect btn-sm"><i
                                        class="mdi mdi-24px mdi-delete-forever"></i></a>
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
<script src="{{ URL::asset('/assets/libs/datatables/dataTables.select.min.js')}}"></script>

<!-- Datatable init js -->
<script type="text/javascript">
    var i = 0;

    let candidatValid = [];
    let rowsCandidatValid = document.querySelectorAll('.ligne');

    function affiche(){
        for(tr of rowsCandidatValid){
            if(tr.classList.contains("selected")){
                candidatValid.push(tr.getAttribute('data-id'));
            }
        }
        alert("Etudiant id "+candidatValid);
        candidatValid = [];
    }

    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr> <td> <select name="addMoreInputFields['+i+'][column]" id="" class="filter-key form-control"> <option value="null">Select column</option> <option value="ID">ID</option> <option value="Labelle">Labelle</option> <option value="Valide">Valide</option> <option value="Candidat">Candidat</option> <option value="Formation">Formation</option> <option value="Action">Action</option> </select> </td> <td> <select name="addMoreInputFields['+i+'][operator]" id="" class="filter-operator form-control"><option value="">Select Operator</option> <option value="=">=</option> <option value="!=">!=</option> <option value="<="><=</option> <option value=">=">>=</option> <option value="<"><</option> <option value=">">></option> </select> </td><td><input type="text" name="addMoreInputFields[' + i +
            '][value]" placeholder="Enter value" class="filter-value form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    $(document).ready(function() {
        $('#datatable-buttons1').DataTable({
            select: {
                style: 'multi'
            }
        });
    });

</script>
@endsection
