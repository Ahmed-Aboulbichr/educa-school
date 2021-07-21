@extends('layouts.master-educa')
@section('title') type de formation @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Types des formations @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Formations @endslot
    @slot('li_3') Types @endslot
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
        @elseif( session()->has('notice') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                {{ session()->get('notice') }}
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
                                <th>intitulé</th>
                                <th>Nombre d'années après bac</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                            $i = 0;
                            @endphp
                        <tbody>
                            @foreach ($Type_formations as $Type_formation)
                            <tr>
                            
                                    <td>{{++$i}}</td>
                                    <td>{{$Type_formation->designation}}</td>
                                    <td>{{$Type_formation->annees_post_bac}}</td>
                                    <td>
                                        <form action="{{ route('type_formations.destroy', $Type_formation->id) }}" method="POST">
                                            <button class="btn btn-edit btn-info p-1" type="button" data-route="{{route('type_formations.edit', $Type_formation->id)}}" ><i class="mdi mdi-24px mdi-file-document-edit-outline"></i></button>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning p-1" name="archive" type="submit"  ><i class="mdi mdi-24px mdi-delete"></i>   </button>
                                        </form>
                                    </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div>

        <div id="ajoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Ajout d'un type de formation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('type_formations.store') }}" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="form-group row align-items-center">
                            <label class="col-md-3 col-form-label">intitulé</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="designation">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-md-3 col-form-label">Nombre d'années après bac</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="annees_post_bac" >
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                    </form>
    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>  
        
        <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Modification d'un type de formation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="editForm" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="form-group row align-items-center">
                            <label class="col-md-3 col-form-label">intitulé</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="designation" value="" id="designation">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label class="col-md-3 col-form-label">Nombre d'années après bac</label>
                            <div class="col-md-9">
                                <input class="form-control" type="number" name="annees_post_bac" value="" id="annees_post_bac">
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                    </form>
    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>
</div>
@endsection
@section('script')

        <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

        <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

        <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet alert init js-->
    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js')}}"></script>

    <script>
        $('.btn-edit').on('click', function () {
            var route = $(this).data('route');
            $.ajax({
                url: route,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    $("#editModal").modal('show');
                    $("#editForm").attr("action",response.route);
                    $("#designation").val(response.Type_formation.designation);
                    $("#annees_post_bac").val(response.Type_formation.annees_post_bac);
                },
                error: function(response){
                    console.log(response.responseText);
                }
            })
        });
    </script>

@endsection
