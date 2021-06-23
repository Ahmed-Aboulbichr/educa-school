@extends('layouts.master-without-side-bar')

@section('css')
    <!-- twitter-bootstrap-wizard css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link href="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/arabic.css')}}" rel="stylesheet" type="text/css" />
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
                                <span class="step-title">Vos Informations</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-parent-details" class="nav-link" data-toggle="tab">
                                <span class="step-number">02</span>
                                <span class="step-title">Informations sur les parents
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                <span class="step-number">03</span>
                                <span class="step-title">Details du Baccalauréat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-bac-detail" class="nav-link" data-toggle="tab">
                                <span class="step-number">04</span>
                                <span class="step-title">Choix de formation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-confirm-detail" class="nav-link" data-toggle="tab">
                                <span class="step-number">05</span>
                                <span class="step-title">Confirmation</span>
                            </a>
                        </li>
                    </ul>

                    <div id="bar" class="progress mt-4">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                    </div>
                    <div class="tab-content twitter-bs-wizard-tab-content">

                        <!-- Tab 1 -->
                        <div class="tab-pane" id="progress-seller-details">
                            <form id="infoCandidat">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-nom_fr-input">Nom <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="text" name="nom_fr" class="form-control" id="progress-basicpill-nom_fr-input">
                                            <span class="text-muted">ABOULBICHR</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-nom_ar-input" class="arabic"><i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i> النسب</label>
                                            <input type="email" name="nom_ar" class="form-control rtl" id="progress-basicpill-nom_ar-input">
                                            <span class="text-muted" style="float: right">أبوالبشر</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-prenom_fr-input" >Prénom <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="text" name="prenom_fr" class="form-control" id="progress-basicpill-prenom_fr-input">
                                            <span class="text-muted">Ahmed</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-prenom_ar-input" class="arabic"><i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i> الإسم</label>
                                            <input type="text" name="prenom_ar" class="form-control rtl" id="progress-basicpill-prenom_ar-input">
                                            <span class="text-muted"  style="float: right" >أحمد</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-lieu_naiss_fr-input" >Lieu de naissance</label>
                                            <input type="text" name="lieu_naiss_fr" class="form-control" id="progress-basicpill-lieu_naiss_fr-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-lieu_naiss_ar-ar-input" class="arabic">مكان الإزدياد</label>
                                            <input type="text" name="lieu_naiss_ar" class="form-control rtl" id="progress-basicpill-lieu_naiss_ar-ar-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-CIN-input" >CIN <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="text" name="CIN" class="form-control" id="progress-basicpill-CIN-input">
                                            <span class="text-muted">BA7060</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-CNE-input">CNE <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="email" name="CNE" class="form-control" id="progress-basicpill-CNE-input">
                                            <span class="text-muted">R109218391</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-date_naiss-input" >Date de naissance <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="text" name="date_naiss" class="form-control" id="progress-basicpill-date_naiss-input">
                                            <span class="text-muted">2000-05-18</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-tel-input">Téléphone <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="text" name="tel" class="form-control" id="progress-basicpill-tel-input">
                                            <span class="text-muted">0654682005</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-situation_familiale-input" >Situation familiale</label>
                                            {{-- <input type="text" class="form-control" id="progress-basicpill-phoneno-input"> --}}
                                            <select class="form-control" name="situation_familiale" id="progress-basicpill-situation_familiale-input">
                                                <option>marié (M)</option>
                                                <option>pacsé (O)</option>
                                                <option>divorcé (D)</option>
                                                <option>séparé (D)</option>
                                                <option>célibataire (C)</option>
                                                <option>veuf (V)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Genre <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <div class="row" style="justify-content: space-around">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="masculin" name="sexe" value="Homme" class="custom-control-input">
                                                    <label class="custom-control-label" for="masculin">Masculin</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="feminin" name="sexe" value="Femmme" class="custom-control-input">
                                                    <label class="custom-control-label" for="feminin">Féminin</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="paysOptions" >Pays</label>
                                            {{-- <input type="text" class="form-control" id="progress-basicpill-phoneno-input"> --}}
                                            <select class="form-control" id="paysOptions" name="pay_id">
                                                <option value="">-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="nationalities">Nationalité</label>
                                            {{-- <input type="email" class="form-control" id="progress-basicpill-Nationalite-input"> --}}
                                            <select id="nationalities"  class="form-control" name="nationalite_id">
                                                <option></option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-Ville-input">Ville</label>
                                            <input type="email" name="ville_id_etud" class="form-control" id="progress-basicpill-Ville-input">
                                            <span class="text-muted">Casablanca</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-address-input">Address</label>
                                            <textarea id="progress-basicpill-address-input" name="adresse_etd" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="progress-parent-details">
                            <form  id="infoParent">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">CIN père</label>
                                            <input type="text" name="cin_pere" class="form-control" id="progress-basicpill-pancard-input" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">CIN mère</label>
                                            <input type="text" name="cin_mere" class="form-control" id="progress-basicpill-vatno-input" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">CAT père</label>
                                            <select name="cat_pere" class="custom-select">
                                                <option selected  >-----------</option>
                                                <option value="PUBLIC">PUBLIC</option>
                                                <option value="PRIVE">PRIVE</option>
                                                <option value="LIBRE">LIBRE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">Secteur profession père</label>
                                            <select id="secteur_pere_name" name="secteur_pere_name" class="custom-select">
                                                <option selected>-----------</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Profession père</label>
                                            <input type="text" name="prof_pere" class="form-control" id="progress-basicpill-vatno-input">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">CAT mère</label>
                                            <select name="cat_mere" class="custom-select">
                                                <option selected  >-----------</option>
                                                <option value="PUBLIC">PUBLIC</option>
                                                <option value="PRIVE">PRIVE</option>
                                                <option value="LIBRE">LIBRE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">Secteur profession mère</label>
                                            <select id="secteur_mere_name" name="secteur_mere_name" class="custom-select">
                                                <option selected>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Profession mère</label>
                                            <input type="text" name="prof_mere" class="form-control" id="progress-basicpill-vatno-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Tel parent</label>
                                            <input id="input-mask" inputmode="text" name="tel_parent" class="form-control input-mask" data-inputmask="'mask': '09-99999999'" required>                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Pays parent</label>
                                            <select name="pays_parent" class="form-control" id="paysOptionsParent">
                                                <option>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Region parent</label>
                                            <select name="region_parent" class="form-control" id="regionOptionsParent">
                                                <option>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Ville parent</label>
                                            <select name="ville_parent" class="form-control" id="villeOptionsParent">
                                                <option>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="progress-basicpill-address-input">Adresse parent</label>
                                            <textarea name="adresse_parent" id="progress-basicpill-address-input" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-bank-detail">
                            <div>
                                <form id="infoBaccalaureat">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Année baccalauréat</label>

                                                <input name="annee_bac"  type="text" class="form-control" id="datepicker" >
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Mention baccalauréat</label>
                                                <select name="mention_bac" class="custom-select">
                                                    <option selected  >Select Mention</option>
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

                                                <input type="number" name="mg_bac" min='0' max='20' class="form-control"  >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="progress-basicpill-cardno-input">Lycée de baccalauréat</label>
                                                <input type="text" name="lycee_bac" class="form-control" id="progress-basicpill-cardno-input">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> ¨Province </label>
                                                <select class="custom-select" name="province" id="provincesOptions">
                                                    <option selected  >Select ¨Province</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> Delegation </label>
                                                <select class="custom-select" name="delegation" id="delegationsOptions">
                                                    <option selected  >Select Delegation</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> Academie </label>
                                                <select class="custom-select" name="academie" id="academiesOptions">
                                                    <option selected  >Select Academie</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <h4 class="card-title">Upload fichier Bac scanné ( PDF , Max-size : 10Mb )  </h4>
                                                <p class="card-title-desc"> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                    Quidem autem libero aut laboriosam quibusdam qui repellat. Nulla a ea aspernatur perspiciatis!
                                                </p>

                                                <div>
                                                    <form id="fichierBac"  action="#"  enctype="multipart/form-data" class="dropzone">
                                                        @csrf
                                                        <div class="fallback">
                                                            <input name="bacFile" type="file" multiple="multiple">
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
                                <form id="choixFormation">
                                    @csrf
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">premiere inscription (année universitaire) </label>

                                                <select name="pre_insc_annee_universitaire" class="custom-select">
                                                    <option selected  >Select Année universitaire</option>

                                                    <option value="2021-2022">2021/2022</option>
                                                    <option value="2020-2021">2020/2021</option>
                                                    <option value="2019-2020">2019/2020</option>
                                                    <option value="2018-2019">2018/2019</option>
                                                    <option value="2017-2018">2017/2018</option>
                                                    <option value="2016-2017">2016/2017</option>
                                                    <option value="2015-2016">2015/2016</option>
                                                    <option value="2014-2015">2014/2015</option>
                                                    <option value="2013-2014">2013/2014</option>
                                                    <option value="2012-2013">2012/2013</option>
                                                    <option value="2011-2012">2011/2012</option>
                                                    <option value="2010-2011">2010/2011</option>
                                                    <option value="2009-2010">2009/2010</option>
                                                    <option value="2008-2009">2008/2009</option>
                                                    <option value="2007-2008">2007/2008</option>
                                                    <option value="2006-2007">2006/2007</option>
                                                    <option value="2005-2006">2005/2006</option>
                                                    <option value="2004-2005">2004/2005</option>
                                                    <option value="2003-2004">2003/2004</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">premiere inscription (nom d'université)</label>
                                                <input name="pre_insc_universite" type="text" class="form-control"  >
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">premiere inscription ( département )</label>

                                                <input type="text" name="universite_dip_name" class="form-control"  >

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Choix de formation</label>

                                                <select name="formation" class="custom-select">
                                                    <option selected  >Selectionner un Choix de formation</option>
                                                    <option value="LF">Licence fondamentale</option>
                                                    <option value="Master">Master</option>
                                                    <option value="LP">Licence professionnelle</option>
                                                    <option value="master-specialise">Master spécialisé</option>
                                                    <option value="Doctorat">Doctorat</option>
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
                                            <h5>Confirmation de candidature</h5>
                                            <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                        <li class="previous"><a href="#">Previous</a></li>
                        <li class="" style="float:right;" id="NextStepBtn" onclick="$('#infoCandidat').submit()" ><a href="#">Next</a></li>
                       <!-- <li class="next"><a href="#">Submit</a></li>-->
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

    <script src="{{ URL::asset('/assets/js/pays.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/villes.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/academies.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/delegations.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/provinces.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/secteursProfession.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/condidature.js')}}"></script>

    <script>
          Dropzone.autoDiscover = false;
        var config = {
            routes: {
                getPays: "{{route('getPays')}}",
                getNationality : "{{route('getNationality')}}",
                getDelegations: "{{route('getDelegations')}}",
                getAcademies: "{{route('getAcademies')}}",
                getProvinces: "{{route('getProvinces')}}",
                getSecteurProfessions:"{{route('getSecteurProfessions')}}",
                saveCandidatStepOne:"{{route('saveCandidatStepOne')}}",
                saveCandidatStepTwo:"{{route('saveCandidatStepTwo')}}",
                saveCandidatStepThree:"{{route('saveCandidatStepThree')}}",
                saveCandidatStepFour:"{{route('saveCandidatStepFour')}}",
                saveCandidatStepFive:"{{route('saveCandidatStepFive')}}"
            }
        };


      $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
      });
   </script>
@endsection
