@extends('layouts.master-educa')
@section('title') E-Document @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') Liste des demander traiter ou rejecter @endslot
        @slot('li_1') E-Document @endslot
        @slot('li_2') Archive des demandes @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            {{-- @if (session()->has('success'))
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
            @endif --}}

            <div class="card">

                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table mt-4">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 20%;">Date de demande</th>
                                    <th>Document</th>
                                    <th>Traiter par</th>
                                    <th>Statu</th>
                                    <th style="width: 140px;">Demande info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 19/10/2069 12:61 &emsp;</td>
                                    <td>relever de notes de semistre 1 </td>
                                    <td>Karim tadlawi </td>
                                    <td><span class="badge badge-soft-success">Complated</span></td>
                                    <td><a href="{{ route('edocument.show', 5) }}"><button type="button"
                                                class="btn btn-primary btn-sm">More info -></button></a></td>
                                </tr>
                                <tr>
                                    <td>29/10/2069 12:61</td>
                                    <td>relever de notes de semistre 2</td>
                                    <td>Karim tadlawi </td>
                                    <td><span class="badge badge-soft-warning">Rejected</span></td>
                                    <td><button type="button" class="btn btn-primary btn-sm">More info -></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
