@extends('layouts.master-educa')
@section('title') session @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Sessions @endslot
    @slot('li_1') Liste @endslot
    @slot('li_2') Sessions @endslot
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
        @elseif( session()->has('exists') )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                 {{ session()->get('exists') }}
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
                                <th>Année universitaire</th>
                                <th>Date session</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($sessions as $session)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$session->annee_univ}}</td>
                                    <td>{{$session->date_session}}</td>
                                    <td>
                                        <form action="{{ route('session.destroy', $session->id) }}" method="POST">
                                            <button class="btn btn-info p-1 btn-edit" type="button" data-route="{{route('session.edit', $session->id)}}" ><i class="mdi mdi-24px mdi-file-document-edit-outline"></i></button>
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
        <!--Modal Ajout -->
        <div id="ajoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Ajout d'une session</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('session.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="store")
                            @foreach($errors->all() as $error)
                                <div class="col-6-auto">
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                </div>
                            @endforeach
                        @endif
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Année universitaire</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="annee_univ">
                                        <option>--- Année universitaire ---</option>
                                        <option value="{{date('Y')}}-{{date('Y')+1}}">{{date('Y')}}-{{date('Y')+1}}</option>
                                        @for ($i = 0; $i <20; $i++)
                                            @php
                                                $currentYear = date('Y');
                                                $year = $currentYear - $i;
                                                $lastYear = $currentYear-($i+1);
                                            @endphp
                                            <option name="annee_univ" value="{{$lastYear}}-{{$year}}">{{$lastYear}}-{{$year}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Date session</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="date" name="date_session" >
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
                        <h5 class="modal-title mt-0" id="myModalLabel">Modifier la session</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="editForm" method="POST">
                        @csrf
                        <div class="modal-body">
                            @if($errors->any() && session()->has('operation') && session()->get('operation') =="update")
                            @foreach($errors->all() as $error)
                                <div class="col-6-auto">
                                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                </div>
                            @endforeach
                        @endif
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Année universitaire</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="annee_univ" id="anneUniv">
                                        <option value="{{date('Y')}}-{{date('Y')+1}}">{{date('Y')}}-{{date('Y')+1}}</option>
                                        @for ($i = 0; $i <20; $i++)
                                            @php
                                                $currentYear = date('Y');
                                                $year = $currentYear - $i;
                                                $lastYear = $currentYear-($i+1);
                                            @endphp
                                            <option  value="{{$lastYear}}-{{$year}}">{{$lastYear}}-{{$year}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-3 col-form-label">Date session</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="date" id="date_session" name="date_session">
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

    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

        <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js')}}"></script>



    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="store")
    <script>$('#ajoutModal').modal('toggle');</script>
    @endif
    @if (count($errors) > 0 && session()->has('operation') && session()->get('operation') =="update")
    <script>$('#editModal').modal('toggle');</script>
    @endif
    <script>
        $('.btn-edit').on('click', function () {
            var route = $(this).data('route');
            $.ajax({
                url: route,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    $("#editModal").modal('show');
                    var optionSelected = "<option selected value="+response.session.annee_univ+">"+response.session.annee_univ+"</option>";
                    $("#editForm").attr("action",response.route);
                    $("#anneUniv").append(optionSelected);
                    $("#date_session").val(response.session.date_session);
                },
                error: function(response){
                    console.log(response.responseText);
                }
            })
        });
    </script>
@endsection
