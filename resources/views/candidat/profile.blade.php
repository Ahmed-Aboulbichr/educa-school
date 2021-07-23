@extends('layouts.master-layouts-candidat')
@section('title')
    Profile
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<body data-topbar="dark" data-layout="horizontal">
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') EDUCA SCHOOL @endslot
    @slot('li_1') Candidat @endslot
    @slot('li_2') Inforamtions @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="product-detail">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                            <div class="product-img">

                                                @php
                                                try {
                                                   //code...
                                                   $path= ($candidat==null)?"NaN":$candidat->docFiles->where('type','ProfileImg')->first()->path;
                                               } catch (\Throwable $th) {

                                             $path= "NaN";
                                               }


                                                @endphp

                                                <img src="{{ url("storage/$path")}}" alt="" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end product img -->
                    </div>
                    <div class="col-xl-9">
                        <div class="mt-4 mt-xl-3">

                               <a href="{{route('getPreInscr')}}">  <button type="button"  class="btn btn-outline-success waves-effect waves-light"><i class="mdi mdi-account-edit mr-2 align-middle"> </i>Edit inforamtion</button></a>

                            <h5 class="mt-1 mb-3"> {{($candidat==null)?'NaN' :Str::upper($candidat->nom_fr) }} {{($candidat==null)?'NaN':$candidat->prenom_fr}}</h5>


                            <h6 class="mt-2 text-muted "> <i class="mdi mdi-phone mr-1 align-middle"></i> {{($candidat==null)?'NaN':$candidat->tel}} </h6>
                            <h6 class="mt-2 text-muted "> <i class="mdi mdi-map-marker mr-1 align-middle"></i> {{($candidat==null)?'NaN':$candidat->adresse_etd}} </h6>
                            <h6 class="mt-2 text-muted "> <i class="mdi mdi-email mr-1 align-middle"></i> {{($candidat==null)?'NaN':$candidat->user->email}} </h6>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <h5 class="font-size-14">Vos inforamtions :</h5>
                                        <ul class="list-unstyled product-desc-list">

                                            <li><i class="mdi mdi-credit-card mr-1 align-middle"></i> CIN : {{($candidat==null)?'NaN':$candidat->CIN}}</li>
                                            <li><i class="mdi mdi-barcode mr-1 align-middle"></i> CNE : {{($candidat==null)?'NaN':$candidat->CNE}}</li>
                                            <li><i class="mdi mdi-calendar mr-1 align-middle"></i> Date de naissance : {{($candidat==null)?'NaN':$candidat->date_naiss}}</li>
                                            <li><i class="mdi mdi-map-marker-radius mr-1 align-middle"></i> Lieu : {{($candidat==null)?'NaN':$candidat->lieu_naiss_fr}}</li>
                                            <li><i class="mdi mdi-flag-variant mr-1 align-middle"></i> Nationalité : {{($candidat==null)?'NaN':$candidat->nationalite->name}} </li>
                                            <li><i class="mdi mdi-gender-male-female mr-1 align-middle"></i> Sexe :  {{($candidat==null)?'NaN':$candidat->sexe}}</li>
                                           </ul>

                                    </div>
                                </div>

                                <div>
                                    <h5 class="font-size-14">Cursus scolaire :</h5>
                                    <ul class="list-unstyled product-desc-list">

                                        <li><i class="mdi mdi-school mr-1 align-middle"></i> Lycée d'origine :  {{($candidat==null)?'NaN':$candidat->lycee_bac}}</li>
                                        <li><i class="mdi mdi-map-marker-radius align-middle"></i> Délégation  : {{($candidat==null)?'NaN':$candidat->delegation->name}}</li>
                                        <li><i class="mdi mdi-map-marker-radius mr-1 align-middle"></i> Académie :  {{($candidat==null)?'NaN':$candidat->academie->name}}</li>
                                        <li><i class="mdi mdi-book-multiple mr-1 align-middle"></i> Type de BAC  : {{($candidat==null)?'NaN':$candidat->type_bac}} </li>
                                        <li><i class="mdi mdi-bookmark-check mr-1 align-middle"></i> Mention  : {{($candidat==null)?'NaN':(($candidat->mention_bac=='P')?'Passable':(($candidat->mention_bac=='AB')?'Assez-Bien':(($candidat->mention_bac=='B')?'Bien':(($candidat->mention_bac=='TB')?'Très Bien':(($candidat->mention_bac=='E')?'Excellent':'')))))}}</li>
                                        <li><i class="mdi mdi-calendar mr-1 align-middle"></i> Année  : {{($candidat==null)?'NaN':$candidat->annee_bac}} </li>
                                       </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="mt-4">
                    <h5 class="font-size-14 mb-3">Fichiers : </h5>
                    <div class="product-desc">
                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="BAC-tab" data-toggle="tab" href="#BACTab" role="tab">Fichiers BAC :</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="CIN-tab" data-toggle="tab" href="#CINTab" role="tab">Fichiers CIN :</a>
                            </li>
                        </ul>
                        <div class="tab-content border border-top-0 p-4">
                            <div class="tab-pane fade" id="BACTab" role="tabpanel">
                                <div class="row">
                                    <div class="product-img col-6">

                                        @php
                                        try {
                                            //code...
                                      $path= ($candidat==null)?"NaN":$candidat->docFiles->where('type','BacRect')->first()->path;
                                        } catch (\Throwable $th) {

                                      $path= "NaN";
                                        }


                                        @endphp

                                        <img src="{{ url("storage/$path")}}" alt="" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png">
                                    </div>
                                    <div class="product-img col-6">

                                        @php
                                         try {
                                            //code...
                                            $path= ($candidat==null)?"NaN":$candidat->docFiles->where('type','BacVers')->first()->path;
                                        } catch (\Throwable $th) {

                                      $path= "NaN";
                                        }



                                        @endphp

                                        <img src="{{ url("storage/$path")}}" alt="" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="CINTab" role="tabpanel">
                                <div class="row">
                                    <div class="product-img col-6">


                                        @php
                                         try {
                                            //code...
                                            $path= ($candidat==null)?"NaN":$candidat->docFiles->where('type','CINRect')->first()->path;
                                        } catch (\Throwable $th) {

                                      $path= "NaN";
                                        }




                                        @endphp

                                        <img src="{{ url("storage/$path")}}" alt="" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png">
                                    </div>

                                    <div class="product-img col-6">
                                        @php
                                        try {
                                           //code...
                                           $path= ($candidat==null)?"NaN":$candidat->docFiles->where('type','CINVers')->first()->path;
                                       } catch (\Throwable $th) {

                                     $path= "NaN";
                                       }




                                        @endphp

                                        <img src="{{ url("storage/$path")}}" alt="" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->

@endsection
