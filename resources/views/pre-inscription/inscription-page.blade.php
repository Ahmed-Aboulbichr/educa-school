@extends('layouts.master-without-side-bar-candidat')

@section('title')
    Pré-inscription
@endsection
@section('css')
    <!-- twitter-bootstrap-wizard css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link href="{{ URL::asset('/assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css')}}" rel="stylesheet" type="text/css" />

    <!--Arabic Keyboard -->
    <link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">
    <!-- Plugins css -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="{{ URL::asset('/assets/css/arabic.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .card {
          /* Add shadows to create the "card" effect */
          box-shadow: 5px 6px 15px 5px rgba(0.2,0.2,0.2,0.2);
          transition: 0.3s;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
          box-shadow: 10px 18px 28px 10px rgba(0.2,0.2,0.2,0.2);
        }

        /* Add some padding inside the card container */
        .container {
          padding: 2px 16px;
        }
            </style>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Suivi les étaps d'inscription</h4>
                <div id="progrss-wizard" class="twitter-bs-wizard">
                    <ul class="twitter-bs-wizard-nav nav-justified">
                        <li class="nav-item">
                            <a href="#progress-seller-details " class="nav-link remove-events" data-toggle="tab">
                                <span class="step-number">01</span>
                                <span class="step-title">Vos Informations</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-parent-details" class="nav-link remove-events" data-toggle="tab">
                                <span class="step-number">02</span>
                                <span class="step-title">Informations sur les parents
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-bac-detail" class="nav-link remove-events" data-toggle="tab">
                                <span class="step-number">03</span>
                                <span class="step-title">Details du Baccalauréat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#progress-confirm-detail" class="nav-link remove-events" data-toggle="tab">
                                <span class="step-number">04</span>
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
                            <div class="row justify-content-between">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">

                                            <h6 class="card-title">photo de profile  ( Image , Max-size : 5Mb )  </h6>
                                            

                                            <div>
                                                <form id="fichierProfileImg"  action="#"  enctype="multipart/form-data" class="dropzone">
                                                    @csrf
                                                    <div class="fallback">
                                                        <input  value="" name="profileImgFile" type="file" >
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
                            <form id="infoCandidat">
                               
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-firstname-input">Nom <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input   value="{{($candidat==null)?'':$candidat->nom_fr}}" type="text" name="nom_fr"  class="form-control" id="progress-basicpill-firstname-input">
                                            <span class="text-danger error-text nom_fr_error"></span>
                                            <span class="text-muted">ABOULBICHR</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input" class="arabic"><i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i> النسب</label>
                                            <input   value="{{($candidat==null)?'':$candidat->nom_ar}}" type="text" name="nom_ar" class="form-control rtl keyboardInput" id="progress-basicpill-lastname-ar-input">
                                            <span class="text-danger error-text nom_ar_error"></span>
                                            <span class="text-muted" style="float: right">أبوالبشر</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Prénom <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input   value="{{($candidat==null)?'':$candidat->prenom_fr}}" type="text" name="prenom_fr" class="form-control" id="progress-basicpill-lastname-input">
                                            <span class="text-danger error-text prenom_fr_error"></span>
                                            <span class="text-muted">Ahmed</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-lastname-input" class="arabic"><i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i> الإسم</label>
                                            <input   value="{{($candidat==null)?'':$candidat->prenom_ar}}" type="text" name="prenom_ar" class="form-control rtl keyboardInput" id="progress-basicpill-firstname-ar-input">
                                            <span class="text-danger error-text prenom_ar_error"></span>
                                            <span class="text-muted"  style="float: right" >أحمد</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Lieu de naissance</label>
                                           
                                            <input   value="{{($candidat==null)?'':$candidat->lieu_naiss_fr}}" type="text" name="lieu_naiss_fr" class="form-control" id="progress-basicpill-birthplace-input">
                                         <span class="text-danger error-text lieu_naiss_fr_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input" class="arabic">مكان الإزدياد</label>
                                            <input   value="{{($candidat==null)?'':$candidat->lieu_naiss_ar}}" type="text" name="lieu_naiss_ar" class="form-control rtl keyboardInput" id="progress-basicpill-birthplace-ar-input">
                    
                                            <span class="text-danger error-text lieu_naiss_ar_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >CIN <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input   value="{{($candidat==null)?'':$candidat->CIN}}" type="text" name="CIN" class="form-control" id="progress-basicpill-CIN-input">
                                            <span class="text-danger error-text CIN_error"></span>
                                            <span class="text-muted">BA7060</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">CNE <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input   value="{{($candidat==null)?'':$candidat->CNE}}" type="email" name="CNE" class="form-control" id="progress-basicpill-CNE-input">
                                            <span class="text-danger error-text CNE_error"></span>
                                            <span class="text-muted">R109218391</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Date de naissance <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input   value="{{($candidat==null)?'':$candidat->date_naiss}}" type="text" name="date_naiss" class="form-control" id="progress-basicpill-birthday-input">
                                            <span class="text-danger error-text date_naiss_error"></span>
                                            <span class="text-muted">2000-05-18</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Téléphone <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input   value="{{($candidat==null)?'':$candidat->tel}}" type="text" name="tel" class="form-control" id="progress-basicpill-phone-input">
                                            <span class="text-danger error-text tel_error"></span>
                                            <span class="text-muted">0654682005</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Situation familiale</label>
                                            {{-- <input   value="{{($candidat==null)?'':$candidat->}}" type="text" class="form-control" id="progress-basicpill-phoneno-input"> --}}
                                            <select value="{{($candidat==null)?'':$candidat->situation_familiale}}" class="form-control" name="situation_familiale">
                                                <option></option>
                                                <option {{(($candidat==null)?'':$candidat->situation_familiale=='marié (M)')?'selected':''}}>marié (M)</option>
                                                <option {{(($candidat==null)?'':$candidat->situation_familiale=='pacsé (O)')?'selected':''}}>pacsé (O)</option>
                                                <option {{(($candidat==null)?'':$candidat->situation_familiale=='divorcé (D)')?'selected':''}}>divorcé (D)</option>
                                                <option {{(($candidat==null)?'':$candidat->situation_familiale=='séparé (D)')?'selected':''}}>séparé (D)</option>
                                                <option {{(($candidat==null)?'':$candidat->situation_familiale=='célibataire (C)')?'selected':''}}>célibataire (C)</option>
                                                <option {{(($candidat==null)?'':$candidat->situation_familiale=='veuf (V)')?'selected':''}}>veuf (V)</option>
                                            </select>
                                        <span class="text-danger error-text situation_familiale_error"></span>
                                    </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div  class="form-group">
                                            <label for="progress-basicpill-email-input">Genre <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <div class="row" style="justify-content: space-around">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input {{ (($candidat==null)?'': $candidat->sexe=='Homme')? 'checked':'' }}   type="radio" id="masculin" name="sexe" value="Homme" class="custom-control-input">
                                                    <label class="custom-control-label" for="masculin">Masculin</label>
                                                <span class="text-danger error-text sexe_error"></span>
                                            </div>
                                                <div class="custom-control custom-radio mb-3">
                                                    <input  {{ (($candidat==null)?'': $candidat->sexe=='Femme' )? 'checked' : '' }}  type="radio" id="feminin" name="sexe" value="Femmme" class="custom-control-input">
                                                    <label class="custom-control-label" for="feminin">Féminin</label>
                                                <span class="text-danger error-text sexe_error"></span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Pays</label>
                                            <select name="pay_id" class="form-control" id="paysOptionsEtud">
                                                <option value="">-----------</option>
                                            </select>
                                        <span class="text-danger error-text pay_id_error"></span>
                                    </div>
                                    </div>

                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Nationalité</label>
                                            {{-- <input   value="{{($candidat==null)?'':$candidat->}}" type="email" class="form-control" id="progress-basicpill-Nationalite-input"> --}}
                                            <select   id="nationalities"  class="form-control" name="nationalite_id">
                                                <option value=""></option>
                                            </select>
                                        <span class="text-danger error-text nationalite_id_error"></span>

                                    </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Ville</label>
                                            <select name="ville_id_etud" class="form-control" id="villeOptionsEtud">
                                                <option value="">-----------</option>
                                            </select>
                                        <span class="text-danger error-text ville_id_etud_error"></span>
                                    </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-address-input">Adresse</label>
                                            <textarea  id="progress-basicpill-address-input" name="adresse_etd" class="form-control" rows="2">{{($candidat==null)?'':$candidat->adresse_etd}}</textarea>
                                        <span class="text-danger error-text adresse_etd_error"></span>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="progress-parent-details">
                            <form  id="infoParent">
                                @csrf
                                <div class="row justify-content-between">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">CIN père <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input  value="{{($candidat==null)?'':$candidat->CIN_pere}}" type="text" name="cin_pere" class="form-control" id="progress-basicpill-pancard-input" >
                                        <span class="text-danger error-text cin_pere_error"></span>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-inputCIN">CIN mère <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input  value="{{($candidat==null)?'':$candidat->CIN_mere}}" type="text" name="cin_mere" class="form-control" id="progress-basicpill-vatno-inputCIN" >
                                        <span class="text-danger error-text cin_mere_error"></span>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">CAT père <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <select value="{{($candidat==null)?'':$candidat->cat_pere}}" name="cat_pere" class="custom-select">
                                              <!-- {{--   <option {{($candidat==null)?'selected':''}}>-----------</option>  --}} !-->
                                                <option {{(($candidat==null)?'':$candidat->cat_pere=="PUBLIC")?'selected':''}}>PUBLIC</option>
                                                <option {{(($candidat==null)?'':$candidat->cat_pere=="PRIVE")?'selected':''}}>PRIVE</option>
                                                <option {{(($candidat==null)?'':$candidat->cat_pere=="LIBRE")?'selected':''}}>LIBRE</option>
                                            </select>
                                        <span class="text-danger error-text cat_pere_error"></span>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">Secteur profession père <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <select id="secteur_pere_name" name="secteur_pere" class="custom-select">
                                                <option value="">-----------</option>

                                            </select>
                                       <span class="text-danger error-text secteur_pere_error"></span>
                                     </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-inputProfPere">Profession père <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input   value="{{($candidat==null)?'':$candidat->profession_pere}}" type="text" name="prof_pere" class="form-control" id="progress-basicpill-vatno-inputProfPere">
                                       <span class="text-danger error-text prof_pere_error"></span>
                                     </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">CAT mère <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <select value="{{($candidat==null)?'':$candidat->cat_mere}}" name="cat_mere" class="custom-select">
                                                <option {{(($candidat==null)?'':$candidat->cat_mere=="PUBLIC")?'selected':''}}>PUBLIC</option>
                                                <option {{(($candidat==null)?'':$candidat->cat_mere=="PRIVE")?'selected':''}}>PRIVE</option>
                                                <option {{(($candidat==null)?'':$candidat->cat_mere=="LIBRE")?'selected':''}}>LIBRE</option>
                                            </select>
                                       <span class="text-danger error-text cat_mere_error"></span>
                                     </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-pancard-input">Secteur profession mère <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <select id="secteur_mere_name" name="secteur_mere" class="custom-select">
                                                <option value="">-----------</option>

                                            </select>
                                        <span class="text-danger error-text secteur_mere_error"></span>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-inputProfMere">Profession mère <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input  value="{{($candidat==null)?'':$candidat->profession_mere}}" type="text" name="prof_mere" class="form-control" id="progress-basicpill-vatno-inputProfMere">
                                        <span class="text-danger error-text prof_mere_error"></span>
                                    </div>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Tel parent <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input  value="{{($candidat==null)?'':$candidat->tel_parent}}" id="input-mask" inputmode="text" name="tel_parent" class="form-control input-mask" data-inputmask="'mask': '09-99999999'" >                                        </div>
                                    <span class="text-danger error-text tel_parent_error"></span>
                                </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Ville parent <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <select name="ville_parent" class="form-control" id="villeOptionsParent">
                                                <option value="">-----------</option>
                                            </select>
                                       <span class="text-danger error-text ville_parent_error"></span>
                                     </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="progress-basicpill-address-input">Adresse parent</label>
                                            <textarea name="adresse_parent" id="progress-basicpill-addressParent-input" class="form-control" rows="2">{{($candidat==null)?'':$candidat->adresse_parent}}</textarea>
                                        <span class="text-danger error-text adresse_parent_error"></span>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="progress-bac-detail">
                            <div>
                                <form id="infoBaccalaureat">
                                    @csrf
                                    <div class="row">
                                     
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Type de bac</label>

                                                <input   value="{{($candidat==null)?'':$candidat->type_bac}}" name="type_bac"  type="text" class="form-control"  >
                                           <span class="text-danger error-text type_bac_error"></span>
                                         </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Mention baccalauréat</label>
                                                <select name="mention_bac" class="custom-select">
                                                    <option   >Select Mention</option>
                                                    <option  {{(($candidat==null)?'':$candidat->mention_bac=='P')?'selected':''}} value="P">Passable</option>
                                                    <option {{(($candidat==null)?'':$candidat->mention_bac=='AB')?'selected':''}} value="AB">Assez-Bien</option>
                                                    <option {{(($candidat==null)?'':$candidat->mention_bac=='B')?'selected':''}}  value="B">Bien</option>
                                                    <option {{(($candidat==null)?'':$candidat->mention_bac=='TB')?'selected':''}} value="TB">Très Bien</option>
                                                    <option {{(($candidat==null)?'':$candidat->mention_bac=='E')?'selected':''}}  value="E">Excellent</option>
                                                </select>
                                            <span class="text-danger error-text mention_bac_error"></span>
                                        </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Moyen general de baccalauréat</label>

                                                <input   value="{{($candidat==null)?'':$candidat->mg_bac}}" type="number" name="mg_bac" min='0' max='20' class="form-control"  >
                                            <span class="text-danger error-text mg_bac_error"></span>
                                        </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="progress-basicpill-namecard-input">Année baccalauréat</label>

                                                <input   value="{{($candidat==null)?'':$candidat->annee_bac}}" name="annee_bac"  type="text" class="form-control" id="datepicker" >
                                            <span class="text-danger error-text annee_bac_error"></span>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="progress-basicpill-cardno-input">Lycée de baccalauréat</label>
                                                <input   value="{{($candidat==null)?'':$candidat->lycee_bac}}" type="text" name="lycee_bac" class="form-control" id="progress-basicpill-cardno-input">
                                            <span class="text-danger error-text lycee_bac_error"></span>
                                        </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> ¨Province </label>
                                                <select class="custom-select" name="province" id="provincesOptions">
                                                    <option selected  >Select ¨Province</option>
                                                </select>
                                           <span class="text-danger error-text province_error"></span>
                                         </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> Delegation </label>
                                                <select class="custom-select" name="delegation" id="delegationsOptions">
                                                    <option selected  >Select Delegation</option>
                                                </select>
                                            <span class="text-danger error-text delegation_error"></span>
                                        </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> Academie </label>
                                                <select class="custom-select" name="academie" id="academiesOptions">
                                                    <option selected  >Select Academie</option>
                                                </select>
                                           <span class="text-danger error-text academie_error"></span>
                                         </div>
                                        </div>
                                    </div>

                                </form>
                                <div class="row justify-content-between">
                                    <div class="col-lg-3">
                                        <div class="card">
                                            <div class="card-body">

                                                <h6 class="card-title"> Bac Recto scanné ( PDF , Max-size : 10Mb )  </h6>
                                                <p class="card-title-desc"> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                </p>

                                                <div>
                                                    <form id="fichierBacRect"  action="#"  enctype="multipart/form-data" class="dropzone">
                                                        @csrf
                                                        <div class="fallback">
                                                            <input  value="" name="bacFileRect" type="file" >
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
                                    <div class="col-lg-3">
                                        <div class="card">
                                            <div class="card-body">

                                                <h6 class="card-title"> Bac Verso  scanné ( PDF , Max-size : 10Mb )  </h6>
                                                <p class="card-title-desc"> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                </p>

                                                <div>
                                                    <form id="fichierBacVers"  action="#"  enctype="multipart/form-data" class="dropzone">
                                                        @csrf
                                                        <div class="fallback">
                                                            <input  value="" name="bacFileVers" type="file" >
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
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
    
                                                    <h6 class="card-title">CIN Recto scanné ( PDF , Max-size : 10Mb )  </h6>
                                                    <p class="card-title-desc"> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                    </p>
    
                                                    <div>
                                                        <form id="fichierCINRect"  action="#"  enctype="multipart/form-data" class="dropzone">
                                                            @csrf
                                                            <div class="fallback">
                                                                <input  value="" name="CINFileRect" type="file" >
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
                                        <div class="col-lg-3">
                                            <div class="card">
                                                <div class="card-body">
    
                                                    <h6 class="card-title">CIN Verso scanné ( PDF , Max-size : 10Mb )  </h6>
                                                    <p class="card-title-desc"> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                    </p>
    
                                                    <div>
                                                        <form id="fichierCINVers"  action="#"  enctype="multipart/form-data" class="dropzone">
                                                            @csrf
                                                            <div class="fallback">
                                                                <input  value="" name="CINFileVers" type="file" >
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

                

                        <div class="tab-pane" id="progress-confirm-detail">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                        </div>
                                        <div>
                                            <h5>Confirmation de pre-inscription</h5>
                                            <p class="text-muted"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                        <li class="previous" onclick="correctNextBtn();"><a href="#">Previous</a></li>
                        <li class="" style="float:right;" id="NextStepBtn" onclick="$('#infoCandidat').submit()" ><a id="NextStepBtnA" href="#">Next</a></li>
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
    <script src="{{ URL::asset('/assets/js/candidat.js')}}"></script>
    
    {{-- Arabic keyboard --}}
    <script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script>
    @php 
    if($candidat!=null){
        foreach ($candidat->docFiles as $docFile) {
       
       $docFile->path = route('getFiles',[explode('/' ,$docFile->path)[0], explode('/' ,$docFile->path)[1]]);
   }

    }
    

    @endphp 
    <script>
         

         function correctNextBtn(){
             fn = $('#NextStepBtn').attr('onclick').toString();
             function changeFinishBtn(){
                $('#NextStepBtn').attr('onclick',"$('#infoBaccalaureat').submit()");
                $('#NextStepBtnA').attr('href',"#");
                $('#NextStepBtnA').html("Next");
             }
             (fn=="$('#infoParent').submit()")?$('#NextStepBtn').attr('onclick',"$('#infoCandidat').submit()"):((fn=="$('#infoBaccalaureat').submit()")?$('#NextStepBtn').attr('onclick',"$('#infoParent').submit()"):((fn==""&&$('#NextStepBtnA').attr('href')!='#')?changeFinishBtn():null))
         }

    
       
         
        var candidat = null;
        candidat = @json($candidat ?? '');
        var docFiles = null;
        docFiles = @json(($candidat==null)?null:$candidat->docFiles ?? '');
     

          Dropzone.autoDiscover = false;
        var config = {
            routes: {
                getPays: "{{route('getPays')}}",
                getVilles: "{{route('getVilles')}}",
                getNationality : "{{route('getNationality')}}",
                getDelegations: "{{route('getDelegations')}}",
                getAcademies: "{{route('getAcademies')}}",
                getProvinces: "{{route('getProvinces')}}",
                getSecteurProfessions:"{{route('getSecteurProfessions')}}",
                saveCandidatStepOne:"{{route('saveCandidatStepOne')}}",
                saveCandidatStepTwo:"{{route('saveCandidatStepTwo')}}",
                saveCandidatStepThree:"{{route('saveCandidatStepThree')}}",
                saveCandidatBacRect:"{{route('saveCandidatStepFour','BacRect')}}",
                saveCandidatBacVers:"{{route('saveCandidatStepFour','BacVers')}}",
                saveCandidatCINRect:"{{route('saveCandidatStepFour','CINRect')}}",
                saveCandidatCINVers:"{{route('saveCandidatStepFour','CINVers')}}",
                saveCandidatProfileImg:"{{route('saveCandidatStepFour','ProfileImg')}}",
                Finish:"",
            }
        };

      $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
      });

   </script>
@endsection
