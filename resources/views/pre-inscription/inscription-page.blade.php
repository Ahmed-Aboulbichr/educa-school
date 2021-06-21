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
                                <span class="step-title">Seller Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-parent-details" class="nav-link" data-toggle="tab">
                                <span class="step-number">02</span>
                                <span class="step-title">Informations pour les parents
                                </span>
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

                        <!-- Tab 1 -->
                        <div class="tab-pane" id="progress-seller-details">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-firstname-input">Nom</label>
                                            <input type="text" class="form-control" id="progress-basicpill-firstname-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-lastname-input" class="arabic">الإسم</label>
                                            <input type="text" class="form-control rtl" id="progress-basicpill-firstname-ar-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Prénom</label>
                                            <input type="text" class="form-control" id="progress-basicpill-lastname-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input" class="arabic">النسب</label>
                                            <input type="email" class="form-control rtl" id="progress-basicpill-lastname-ar-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Lieu de naissance</label>
                                            <input type="text" class="form-control" id="progress-basicpill-birthplace-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input" class="arabic">مكان الإزدياد</label>
                                            <input type="email" class="form-control rtl" id="progress-basicpill-birthplace-ar-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >CIN</label>
                                            <input type="text" class="form-control" id="progress-basicpill-CIN-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">CNE</label>
                                            <input type="email" class="form-control" id="progress-basicpill-CNE-input">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Date de naissance</label>
                                            <input type="text" class="form-control" id="progress-basicpill-birthday-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Téléphone</label>
                                            <input type="email" class="form-control" id="progress-basicpill-phone-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Situation familiale</label>
                                            {{-- <input type="text" class="form-control" id="progress-basicpill-phoneno-input"> --}}
                                            <select class="form-control">
                                                <option>marié (M)</option>
                                                <option>pacsé (O)</option>
                                                <option>divorcé (D)</option>
                                                <option>séparé (D)</option>
                                                <option>célibataire (C)</option>
                                                <option>veuf (V)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Genre</label>
                                            <div class="row" style="justify-content: space-around">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="masculin" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="masculin">Masculin</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="feminin" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="feminin">Féminin</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Pays</label>
                                            {{-- <input type="text" class="form-control" id="progress-basicpill-phoneno-input"> --}}
                                            <select class="form-control" id="paysOptions">
                                                <option>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Nationalité</label>
                                            <input type="email" class="form-control" id="progress-basicpill-Nationalite-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Ville</label>
                                            <input type="email" class="form-control" id="progress-basicpill-Ville-input">
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
                        <div class="tab-pane" id="progress-parent-details">
                            <form>
                                <div class="row justify-content-between">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">CIN père</label>
                                            <input type="text" class="form-control" id="progress-basicpill-pancard-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">CIN mère</label>
                                            <input type="text" class="form-control" id="progress-basicpill-vatno-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">CAT père</label>
                                            <select name="CAT_PERE" class="custom-select">
                                                <option selected>-----------</option>
                                                <option value="PUBLIC">PUBLIC</option>
                                                <option value="PRIVE">PRIVE</option>
                                                <option value="LIBRE">LIBRE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">Secteur profession père</label>
                                            <select name="CAT_PERE" class="custom-select">
                                                <option selected>-----------</option>
                                                <option value="151">Activités associatives</option>
                                                <option value="413">Activités des ménages en tant qu'employeurs de personnel domestique</option>
                                                <option value="170">Activités extra-territoriales</option>
                                                <option value="110">Activités immobilières </option>
                                                <option value="152">Activités récréatives, culturelles et sportives</option>
                                                <option value="120">Administration publique</option>
                                                <option value="10">Agriculture, chasse</option>
                                                <option value="150">Assainissement, voirie et gestion des déchets </option>
                                                <option value="101">Assurance</option>
                                                <option value="0">Autres</option>
                                                <option value="33">Autres industries extractives</option>
                                                <option value="102">Auxiliaires financiers et d'assurance </option>
                                                <option value="51">Captage, traitement et distribution d'eau</option>
                                                <option value="48">Cokéfaction, raffinage, industries nucléaires</option>
                                                <option value="72">Commerce de détail et réparation d'articles domestiques</option>
                                                <option value="71">Commerce de gros et intermédiaires du commerce</option>
                                                <option value="70">Commerce et réparation automobile</option>
                                                <option value="112">Conseil en systèmes informatiques </option>
                                                <option value="60">Construction</option>
                                                <option value="47">Edition, imprimerie, reproduction</option>
                                                <option value="130">Education</option>
                                                <option value="31">Extraction d'hydrocarbures </option>
                                                <option value="30">Extraction de houille, de lignite et de tourbe</option>
                                                <option value="32">Extraction, exploitation et enrichissement de minerais métalliques</option>
                                                <option value="410">Fabrication d'autres matériels de transport</option>
                                                <option value="401">Fabrication d'autres produits minéraux non métalliques</option>
                                                <option value="408">Fabrication d'instruments médicaux, de précision d'optique et d'horlogerie</option>
                                                <option value="407">Fabrication d'équipements de Radio, Télévision et Communication</option>
                                                <option value="405">Fabrication de machines de bureau et de matériel informatique</option>
                                                <option value="406">Fabrication de machines et appareils électriques</option>
                                                <option value="404">Fabrication de machines et équipements</option>
                                                <option value="411">Fabrication de meubles, industries diverses</option>
                                                <option value="80">Hôtellerie et restauration</option>
                                                <option value="409">Industrie automobile</option>
                                                <option value="49">Industrie chimique</option>
                                                <option value="43">Industrie de l'habillement et des fourrures</option>
                                                <option value="41">Industrie du Tabac</option>
                                                <option value="400">Industrie du caoutchouc et des plastiques</option>
                                                <option value="44">Industrie du cuir et de la chaussure</option>
                                                <option value="46">Industrie du papier et du carton</option>
                                                <option value="42">Industrie textile</option>
                                                <option value="40">Industries alimentaires</option>
                                                <option value="100">Intermédiation financière</option>
                                                <option value="111">Location sans opérateur</option>
                                                <option value="402">Métallurgie</option>
                                                <option value="94">Postes et télécommunications</option>
                                                <option value="50">Production et distribution d'électricité, de gaz et de chaleur </option>
                                                <option value="20">Pêche, aquaculture</option>
                                                <option value="113">Recherche et développement</option>
                                                <option value="412">Récupération</option>
                                                <option value="140">Santé et action sociale</option>
                                                <option value="93">Services auxiliaires des transports </option>
                                                <option value="160">Services domestiques</option>
                                                <option value="114">Services fournis principalement aux entreprises</option>
                                                <option value="153">Services personnels</option>
                                                <option value="11">Sylviculture, exploitation forestière </option>
                                                <option value="92">Transports aériens</option>
                                                <option value="91">Transports par eau </option>
                                                <option value="90">Transports terrestres</option>
                                                <option value="403">Travail des métaux</option>
                                                <option value="45">Travail du bois et fabrication d'articles en bois </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Profession père</label>
                                            <input type="text" class="form-control" id="progress-basicpill-vatno-input">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">CAT mère</label>
                                            <select name="CAT_MERE" class="custom-select">
                                                <option selected>-----------</option>
                                                <option value="PUBLIC">PUBLIC</option>
                                                <option value="PRIVE">PRIVE</option>
                                                <option value="LIBRE">LIBRE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">Secteur profession mère</label>
                                            <select name="CAT_MERE" class="custom-select">
                                                <option selected>-----------</option>
                                                <option value="151">Activités associatives</option>
                                                <option value="413">Activités des ménages en tant qu'employeurs de personnel domestique</option>
                                                <option value="170">Activités extra-territoriales</option>
                                                <option value="110">Activités immobilières </option>
                                                <option value="152">Activités récréatives, culturelles et sportives</option>
                                                <option value="120">Administration publique</option>
                                                <option value="10">Agriculture, chasse</option>
                                                <option value="150">Assainissement, voirie et gestion des déchets </option>
                                                <option value="101">Assurance</option>
                                                <option value="0">Autres</option>
                                                <option value="33">Autres industries extractives</option>
                                                <option value="102">Auxiliaires financiers et d'assurance </option>
                                                <option value="51">Captage, traitement et distribution d'eau</option>
                                                <option value="48">Cokéfaction, raffinage, industries nucléaires</option>
                                                <option value="72">Commerce de détail et réparation d'articles domestiques</option>
                                                <option value="71">Commerce de gros et intermédiaires du commerce</option>
                                                <option value="70">Commerce et réparation automobile</option>
                                                <option value="112">Conseil en systèmes informatiques </option>
                                                <option value="60">Construction</option>
                                                <option value="47">Edition, imprimerie, reproduction</option>
                                                <option value="130">Education</option>
                                                <option value="31">Extraction d'hydrocarbures </option>
                                                <option value="30">Extraction de houille, de lignite et de tourbe</option>
                                                <option value="32">Extraction, exploitation et enrichissement de minerais métalliques</option>
                                                <option value="410">Fabrication d'autres matériels de transport</option>
                                                <option value="401">Fabrication d'autres produits minéraux non métalliques</option>
                                                <option value="408">Fabrication d'instruments médicaux, de précision d'optique et d'horlogerie</option>
                                                <option value="407">Fabrication d'équipements de Radio, Télévision et Communication</option>
                                                <option value="405">Fabrication de machines de bureau et de matériel informatique</option>
                                                <option value="406">Fabrication de machines et appareils électriques</option>
                                                <option value="404">Fabrication de machines et équipements</option>
                                                <option value="411">Fabrication de meubles, industries diverses</option>
                                                <option value="80">Hôtellerie et restauration</option>
                                                <option value="409">Industrie automobile</option>
                                                <option value="49">Industrie chimique</option>
                                                <option value="43">Industrie de l'habillement et des fourrures</option>
                                                <option value="41">Industrie du Tabac</option>
                                                <option value="400">Industrie du caoutchouc et des plastiques</option>
                                                <option value="44">Industrie du cuir et de la chaussure</option>
                                                <option value="46">Industrie du papier et du carton</option>
                                                <option value="42">Industrie textile</option>
                                                <option value="40">Industries alimentaires</option>
                                                <option value="100">Intermédiation financière</option>
                                                <option value="111">Location sans opérateur</option>
                                                <option value="402">Métallurgie</option>
                                                <option value="94">Postes et télécommunications</option>
                                                <option value="50">Production et distribution d'électricité, de gaz et de chaleur </option>
                                                <option value="20">Pêche, aquaculture</option>
                                                <option value="113">Recherche et développement</option>
                                                <option value="412">Récupération</option>
                                                <option value="140">Santé et action sociale</option>
                                                <option value="93">Services auxiliaires des transports </option>
                                                <option value="160">Services domestiques</option>
                                                <option value="114">Services fournis principalement aux entreprises</option>
                                                <option value="153">Services personnels</option>
                                                <option value="11">Sylviculture, exploitation forestière </option>
                                                <option value="92">Transports aériens</option>
                                                <option value="91">Transports par eau </option>
                                                <option value="90">Transports terrestres</option>
                                                <option value="403">Travail des métaux</option>
                                                <option value="45">Travail du bois et fabrication d'articles en bois </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Profession mère</label>
                                            <input type="text" class="form-control" id="progress-basicpill-vatno-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Tel parent</label>
                                            <input type="tel" pattern="\d{10,15}" class="form-control" id="progress-basicpill-vatno-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Pays parent</label>
                                            <select class="form-control" id="paysOptionsParent">
                                                <option>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Ville parent</label>
                                            <select class="form-control" id="villeOptionsParent">
                                                <option>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="progress-basicpill-address-input">Address parent</label>
                                            <textarea id="progress-basicpill-address-input" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

    <script src="{{ URL::asset('/assets/js/pays.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/villes.js')}}"></script>

    <script>
        var config = {
            routes: {
                getPays: "{{route('getPays')}}",
            }
        };


      $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
      });
   </script>
@endsection
