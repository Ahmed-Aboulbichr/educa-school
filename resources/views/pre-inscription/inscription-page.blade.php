@extends('layouts.master-without-side-bar')

@section('css')
    <!-- twitter-bootstrap-wizard css -->
    <link href="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
    @slot('title') Form Wizard @endslot
    @slot('li_1') Forms @endslot
    @slot('li_2') Form Wizard @endslot
@endcomponent

@section('content')
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
                            <a href="#progress-confirm-detail" class="nav-link" data-toggle="tab">
                                <span class="step-number">04</span>
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
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Name on Card</label>
                                                <input type="text" class="form-control" id="progress-basicpill-namecard-input">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Credit Card Type</label>
                                                <select class="custom-select">
                                                    <option selected>Select Card Type</option>
                                                    <option value="AE">American Express</option>
                                                    <option value="VI">Visa</option>
                                                    <option value="MC">MasterCard</option>
                                                    <option value="DI">Discover</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-cardno-input">Credit Card Number</label>
                                                <input type="text" class="form-control" id="progress-basicpill-cardno-input">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-card-verification-input">Card Verification Number</label>
                                                <input type="text" class="form-control" id="progress-basicpill-card-verification-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-expiration-input">Expiration Date</label>
                                                <input type="text" class="form-control" id="progress-basicpill-expiration-input">
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

    <!-- form wizard init -->
    <script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js')}}"></script>

@endsection