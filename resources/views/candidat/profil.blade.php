@extends('layouts.master-educa')
@section('title') Candidats @endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/jquery-vectormap/jquery-vectormap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/arabic.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Dashboard @endslot
    @slot('li_1')  @endslot
    @slot('li_2')  @endslot
@endcomponent
    <div>
        <div class="col-lg-9" style="min-width: 100%">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="row no-gutters">
                            @foreach ($formations as $formation)
                            <div class="col-xl-4 col-sm-6">
                                <div class="product-box">
                                    <div class="product-img">
                                        {{-- <div class="product-ribbon badge badge-warning">
                                            Trending
                                        </div> --}}
                                        {{-- <div class="product-like">
                                            <a href="#">
                                                <i class="mdi mdi-heart-outline"></i>
                                            </a>
                                        </div> --}}
                                        <img src="https://place-hold.it/300x200/#C6D9E/black/#19759.png&text={{$formation->intitule}}}&bold&fontsize=20" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                    
                                    <div class="text-center">
                                        {{-- <p class="font-size-12 mb-1">Blue color, T-shirt</p> --}}
                                        <h5 class="font-size-15 mt-3"><a href="{{route('type_formations.show', $formation->id)}}" class="text-dark">{{$formation->intitule}}</a></h5>

                                        {{-- <h5 class="mt-3 mb-0">$240</h5> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end row -->
    @endsection
    

