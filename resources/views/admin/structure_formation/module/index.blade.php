@extends('layouts.master-educa')
@section('title') Semestres @endsection
@section('css')
    <!-- DataTables -->
    <!-- Sweet Alert-->
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Semestres @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Semestres @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        @if( session()->has('success') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all mr-2"></i>
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="row mb-2 mt-4">
                <div class="col-xl-2 offset-xl-10 offset-lg-9" style="padding-left: 4em;">
                    <button class="btn btn-primary waves-effect waves-light" data-target="#ajoutModal"  data-toggle="modal"><i class="mdi mdi-plus mr-1"></i>Ajouter</button>
                </div>
            </div>
            <div class="card-body">
                <h4 class="card-title"></h4>
                <div class="table-responsive">
                    <table id="datatable" class="table mt-4">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Ref Module</th>
                                <th>Intitulé</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($modules as $module)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$module->id_module}}</td>
                                    <td>{{$module->intitule_module}}</td>
                                    <td class="text-center">
                                        <form action="{{ route('module.destroy', $module->id) }}" method="POST">
                                            <button class="btn btn-info p-1 btn-edit" type="button" data-route="{{route('module.edit', $module->id)}}"><i class="mdi mdi-24px mdi-file-document-edit-outline"></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning p-1 btn-delete" type="submit"><i class="mdi mdi-24px mdi-delete"></i></button>
                                        </form>
                                    </td>
                                <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div>
        <!--Modal Ajout -->
        <div id="ajoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">L'ajout du module</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('module.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="store")
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <input type="hidden" name ="semestre_id" value="{{$semestre_id}}">
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Réference</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="id_module" >
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Intitulé</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="intitule_module" >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        <!--Modal modifier -->
        <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Modifier le module</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="editForm" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="update")
                                @foreach($errors->all() as $error)
                                    <div class="col-6-auto">
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    </div>
                                @endforeach
                            @endif
                            <input type="hidden" name ="semestre_id" value="{{$semestre_id}}">
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Réference</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="id_module" value="" id="idModule_modifier">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Intitulé</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="intitule_module" value="" id="intituleModule_modifier">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Modifier</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>
</div>
@endsection
@section('script')

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js')}}"></script>
    <script>


        $('#ajoutButton').on('click', function(){
            $("#ajoutModal").modal('show');
        });


        $('.btn-delete').on('click', function(event){
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parents('form').submit();
                }
            });
        });


        $('.btn-edit').on('click', function () {
            var route = $(this).data('route');
            $.ajax({
                url: route,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    $('#idModule_modifier').val(response.module.id_module);
                    $('#intituleModule_modifier').val(response.module.intitule_module);
                    $("#editForm").attr("action",response.route);
                    $("#editModal").modal('show');
                },
                error: function(response){
                    console.log(response.responseText);
                }
            })
        });



    </script>

    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="store")
    <script>$('#ajoutModal').modal('toggle');</script>
    @endif
    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
    <script>$('#editModal').modal('toggle');</script>
    @endif

@endsection
