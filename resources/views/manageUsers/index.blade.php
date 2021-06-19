@extends('layouts.master')
@section('title') Orders @endsection
@section('css')

@php $locale = session()->get('locale'); @endphp
<!-- DataTables css -->
<link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('/assets/js/users.js')}}" defer></script>
<style>
    .thead-light>tr>th {
        padding: 9.5px !important;
        border: 0px !important;
        background: #f1f5f7 !important;
        border: 0px !important;
    }

    #customDatatable thead tr th:first-child {
        border-radius: 10px 0px 0px 10px !important;
    }

    #customDatatable thead tr th:last-child {
        border-radius: 0px 10px 10px 0px !important;
    }

    .activeRow {
        /* background-color: #eee !important; */
        font-weight: bold;
        border-left: 15px solid #ff3d60;
    }

    tbody tr:hover {
        background-color: #f1f5f7;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
@component('components.breadcrumb')
@slot('title') @lang('manageUsers.utilisateurs') @endslot
@slot('li_1') @lang('manageUsers.utilisateurs') @endslot
@slot('li_2') @lang('manageUsers.liste') @endslot
@endcomponent
<!-- Start row -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body  pt-4">
                <div class="table-responsive">
                    <table class="table table-centered dt-responsive nowrap" id="customDatatable" style=" width: 100%;">
                        <thead class="thead-light">
                            <tr class="trLight">
                                <th>
                                    <h6>@lang('manageUsers.nom_utilisateur')</h6>
                                </th>
                                <th>
                                    <h6>@lang('manageUsers.email')</h6>
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div id="accordion" class="custom-accordion">
                    <div class="row text-right" style="margin-bottom: 18px;">
                        <div class="col-md-12">
                        <form id="userInfoForm" method="post"> 
                            @csrf 
                            <div class='btn-group'>
                            <button type="submit"  name="adduser" class="btn btn-primary btn-sm waves-effect waves-light"><i class='fas fas fa-plus '></i> @lang('manageUsers.nouveau_utilisateur')</button>
                            <button type="submit" name="deleteuser" class="btn btn-danger btn-sm waves-effect waves-light"><i class='fas fas fa-trash-alt'></i> @lang('manageUsers.supprimer_utilisateur')</button>
                            <button type="submit" name="edituser" class="btn btn-warning btn-sm waves-effect waves-light"><i class='fas fas fa-pencil-alt'></i> @lang('manageUsers.modifier_utilisateur')</button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-1 shadow-none">
                        <a href="#collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true">
                            <div class="card-header" id="headingOne">
                                <h6 class="m-0">
                                    @lang('manageUsers.information_personnel')
                                    <i class="mdi mdi-minus float-right accor-plus-icon"></i>
                                </h6>
                            </div>
                        </a>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                            <div class="card-body">
                                @include('manageUsers.formAdd')
                            </div>
                        </div>
                    </div>
                </form>
                    <div class="card mb-1 shadow-none">
                        <a href="#collapseTwo" class="text-dark" data-toggle="collapse" aria-expanded="true">
                            <div class="card-header" id="headingTwo">
                                <h6 class="m-0">
                                    Collapsible Group Item #2
                                    <i class="mdi mdi-minus float-right accor-plus-icon"></i>
                                </h6>
                            </div>
                        </a>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                sunt aliqua put a bird on it squid single-origin coffee
                                nulla assumenda shoreditch et. Nihil anim keffiyeh
                                helvetica, craft beer labore wes anderson cred nesciunt
                                Leggings occaecat craft beer farm-to-table, raw denim
                                accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection
@section('script')
<!-- Required datatable js -->
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

<script src="{{ URL::asset('/assets/js/pages/ecommerce-datatables.init.js')}}"></script>

<script>
    let locale = {!! json_encode($locale) !!};
    let url = '';
    if(locale === "fr"){
        url = "//cdn.datatables.net/plug-ins/1.10.22/i18n/French.json"
    }else{
        url = ""
    }
    var config = {
        routes: {
            getUsers: "{{route('getUsers')}}",
            getUser: "{{route('getUser')}}",
            addUser: "{{route('addUser')}}",
            editUser: "{{route('editUser')}}",
            deleteUser: "{{route('deleteUser')}}",
        }
    };
</script>
@endsection