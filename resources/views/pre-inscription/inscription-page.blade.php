@extends('layouts.master-without-side-bar')

@section('css')
    <!-- twitter-bootstrap-wizard css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link href="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css')}}" rel="stylesheet" type="text/css" />
   
    <!-- Plugins css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    @endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Form Wizard @endslot
    @slot('li_1') Forms @endslot
    @slot('li_2') Form Wizard @endslot
@endcomponent

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Wizard with progressbar</h4>

                <div id="progrss-wizard" class="twitter-bs-wizard">
                    <ul class="twitter-bs-wizard-nav nav-justified">
                        <li class="nav-item">
                            <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                <span class="step-number">01</span>
                                <span class="step-title">Seller Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-company-document" class="nav-link" data-toggle="tab">
                                <span class="step-number">02</span>
                                <span class="step-title">Company Document</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                <span class="step-number">03</span>
                                <span class="step-title">Bank Details</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="#progress-bac-detail" class="nav-link" data-toggle="tab">
                                <span class="step-number">04</span>
                                <span class="step-title">Bac Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-confirm-detail" class="nav-link" data-toggle="tab">
                                <span class="step-number">05</span>
                                <span class="step-title">Confirm Detail</span>
                            </a>
                        </li>
                    </ul>

                    <div id="bar" class="progress mt-4">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                    </div>
                    <div class="tab-content twitter-bs-wizard-tab-content">
                        <div class="tab-pane" id="progress-seller-details">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-firstname-input">First name</label>
                                            <input type="text" class="form-control" id="progress-basicpill-firstname-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-lastname-input">Last name</label>
                                            <input type="text" class="form-control" id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input">Phone</label>
                                            <input type="text" class="form-control" id="progress-basicpill-phoneno-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Email</label>
                                            <input type="email" class="form-control" id="progress-basicpill-email-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="progress-basicpill-address-input">Address</label>
                                            <textarea id="progress-basicpill-address-input" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-company-document">
                            <div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">PAN Card</label>
                                            <input type="text" class="form-control" id="progress-basicpill-pancard-input">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">VAT/TIN No.</label>
                                            <input type="text" class="form-control" id="progress-basicpill-vatno-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-cstno-input">CST No.</label>
                                            <input type="text" class="form-control" id="progress-basicpill-cstno-input">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-servicetax-input">Service Tax No.</label>
                                            <input type="text" class="form-control" id="progress-basicpill-servicetax-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-companyuin-input">Company UIN</label>
                                            <input type="text" class="form-control" id="progress-basicpill-companyuin-input">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-declaration-input">Declaration</label>
                                            <input type="text" class="form-control" id="progress-basicpill-declaration-input">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

























                        <div class="tab-pane" id="progress-bank-detail">
                            <div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Année baccalauréat</label>
                                                
                                                <input type="text" class="form-control" id="datepicker" >
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Mention baccalauréat</label>
                                                <select class="custom-select">
                                                    <option selected>Select Mention</option>
                                                    <option value="P">Passable</option>
                                                    <option value="AB">Assez-Bien</option>
                                                    <option value="B">Bien</option>
                                                    <option value="TB">Très Bien</option>
                                                    <option value="E">Excellent</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Moyen general de baccalauréat</label>
                                                
                                                <input type="number" min='0' max='20' class="form-control"  >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                       
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="progress-basicpill-cardno-input">Lycée de baccalauréat</label>
                                                <input type="text" class="form-control" id="progress-basicpill-cardno-input">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> ¨Province </label>
                                                <select class="custom-select">
                                                    <option selected>Select ¨Province</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> Delegation </label>
                                                <select class="custom-select">
                                                    <option selected>Select Delegation</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> Academie </label>
                                                <select class="custom-select">
                                                    <option selected>Select Academie</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                
                                                <h4 class="card-title">Upload fichier Bac scanee ( PDF , Max-size : 10Mb )  </h4>
                                                <p class="card-title-desc">DropzoneJS is an open source library
                                                    that provides drag’n’drop file uploads with image previews.
                                                </p>
                                
                                                <div>
                                                    <form action="#" class="dropzone">
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple="multiple">
                                                        </div>
                                                        <div class="dz-message needsclick">
                                                            <div class="mb-3">
                                                                <i class="display-4 text-muted ri-upload-cloud-2-line"></i>
                                                            </div>
                                                            
                                                            <h4>Drop files here or click to upload.</h4>
                                                        </div>
                                                    </form>
                                                </div>
                                
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane" id="progress-bac-detail">
                            <div>
                              
                                   
                                    <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Département</label>
                                                
                                                <select class="custom-select">
                                                    <option selected>Select Département</option>
                                                    <option value="Math-Info">Mathematique-Informatique</option>
                                                    <option value="Ph-Ch">Physique-Chemie</option>
                                                    <option value="Bio-Geo">Biologie-Geologie</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Année universitaire</label>
                                                
                                                <select class="custom-select">
                                                    <option selected>Select Année universitaire</option>
                                                    
                                                    <option value="2021-2022">2021/2022</option>
                                                    <option value="2020-2021">2020/2021</option>
                                                    <option value="2019-2020">2019/2020</option>
                                                    <option value="2018-2019">2018/2019</option>
                                                    <option value="2017-2018">2017/2018</option>
                                                </select>
                                            </div>
                                        </div>
                                      
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Choix de formation</label>
                                                
                                                <select class="custom-select">
                                                    <option selected>Selectionner un Choix de formation</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                            </div>
                        </div>






















                        <div class="tab-pane" id="progress-confirm-detail">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                        </div>
                                        <div>
                                            <h5>Confirm Detail</h5>
                                            <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                        <li class="previous"><a href="#">Previous</a></li>
                        <li class="next"><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')                        
                   
   
    <!-- twitter-bootstrap-wizard js -->
    <script src="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
     <!-- Plugins js -->
     <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js')}}"></script>
    <!-- form wizard init -->
    <script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js')}}"></script>
   <script>

$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
   </script>
@endsection