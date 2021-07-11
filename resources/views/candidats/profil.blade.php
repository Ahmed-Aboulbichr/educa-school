@extends('layouts.master-candidats')
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
                                        <img src="http://127.0.0.1:8000/assets/images/LP.png" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                    
                                    <div class="text-center">
                                        {{-- <p class="font-size-12 mb-1">Blue color, T-shirt</p> --}}
                                        <h5 class="font-size-15 mt-3"><a href="#" class="text-dark">Licence Professionelle</a></h5>

                                        {{-- <h5 class="mt-3 mb-0">$240</h5> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="product-box">
                                    <div class="product-img">
                                        {{-- <div class="product-ribbon badge badge-primary">
                                            - 25 %
                                        </div>
                                        <div class="product-like">
                                            <a href="#">
                                                <i class="mdi mdi-heart-outline"></i>
                                            </a>
                                        </div> --}}
                                        <img src="http://127.0.0.1:8000/assets/images/masterPRO.jpg" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                    
                                    <div class="text-center">
                                        {{-- <p class="font-size-12 mb-1">Half sleeve, T-shirt</p> --}}
                                        <h5 class="font-size-15 mt-3"><a href="#" class="text-dark">Master professionnelle </a></h5>

                                        {{-- <h5 class="mt-3 mb-0"><span class="text-muted mr-2"><del>$240</del></span>$225</h5> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-6">
                                <div class="product-box">
                                    <div class="product-img">
                                        {{-- <div class="product-like">
                                            <a href="#">
                                                <i class="mdi mdi-heart text-danger"></i>
                                            </a>
                                        </div> --}}
                                        <img src="http://127.0.0.1:8000/assets/images/master.jpg" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                    
                                    <div class="text-center">
                                        {{-- <p class="font-size-12 mb-1">Green color, Hoodie</p> --}}
                                        <h5 class="font-size-15 mt-3 "><a href="#" class="text-dark">Master</a></h5>

                                        {{-- <h5 class="mt-3 mb-0"><span class="text-muted mr-2"><del>$290</del></span>$275</h5> --}}
                                    </div>
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
    

