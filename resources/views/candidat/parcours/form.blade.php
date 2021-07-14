
@extends('layouts.master-without-side-bar-candidat')

@section('title')
    Candidature
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
                <h4 class="card-title mb-4">Remplir votre cursus universitaire</h4>
                <div>
                    <form id="cursusUniversitaire">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Niveau</label>
                                    <select class="custom-select" name="niveau_etude_id" id="niveauEtude">
                                        <option selected  >Select Niveau d'étude</option>
                                        <option value="1">BAC + 1</option>
                                        <option value="2">BAC + 2</option>
                                        <option value="3">BAC + 3</option>
                                        <option value="4">BAC + 4</option>
                                        <option value="5">BAC + 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Spécialité de vos études</label>
                                    <input value="" type="text" name="specialite" id="specialite" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Année Universitaire</label>
                                    <select name="Annee_univ" id="AnneUniv" class="custom-select">
                                        <option selected  >Select Année universitaire</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2020-2021')?'selected':''--}}    value="2020-2021">2020/2021</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2021-2022')?'selected':''--}}    value="2021-2022">2021/2022</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2019-2020')?'selected':''--}}    value="2019-2020">2019/2020</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2018-2019')?'selected':''--}}    value="2018-2019">2018/2019</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2017-2018')?'selected':''--}}    value="2017-2018">2017/2018</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2016-2017')?'selected':''--}}    value="2016-2017">2016/2017</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2015-2016')?'selected':''--}}    value="2015-2016">2015/2016</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2014-2015')?'selected':''--}}    value="2014-2015">2014/2015</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2013-2014')?'selected':''--}}    value="2013-2014">2013/2014</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2012-2013')?'selected':''--}}    value="2012-2013">2012/2013</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2011-2012')?'selected':''--}}    value="2011-2012">2011/2012</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2010-2011')?'selected':''--}}    value="2010-2011">2010/2011</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2009-2010')?'selected':''--}}    value="2009-2010">2009/2010</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2008-2009')?'selected':''--}}    value="2008-2009">2008/2009</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2007-2008')?'selected':''--}}    value="2007-2008">2007/2008</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2006-2007')?'selected':''--}}    value="2006-2007">2006/2007</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2005-2006')?'selected':''--}}    value="2005-2006">2005/2006</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2004-2005')?'selected':''--}}    value="2004-2005">2004/2005</option>
                                        <option   {{--$candidat==null)?'':$candidat->pre_insc_annee_universitaire=='2003-2004')?'selected':''--}}    value="2003-2004">2003/2004</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Université</label>
                                    <select class="custom-select" id="univNom" name="univ_nom">
                                        <option selected  >Choisir une université   </option>
                                        <option value="1">Univ ibn zohr - Agadir</option>
                                        <option value="2">Univ Hassan 2 - Casablanca</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Note S1</label>
                                    <input  value="" id="noteS1" type="number" name="note_S1" min="0" max="20"class="form-control">
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Note S2</label>
                                    <input  value="" id="noteS2" type="number" name="note_S2" min="0" max="20" class="form-control">
                                </div>
                            </div>
                        </div>

                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Photo de votre relevé de notes de cette année ( PDF , Max-size : 10Mb )  </h4>
                                    <p class="card-title-desc"> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Quidem autem libero aut laboriosam quibusdam qui repellat. Nulla a ea aspernatur perspiciatis!
                                    </p>

                                    <div>
                                        <form id="releveAnnee"  action="#"  enctype="multipart/form-data" class="dropzone">
                                            @csrf
                                            <div class="fallback">
                                                <input  value="" name="releve_annee" type="file" multiple="multiple">
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
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <button type="submit" style="" class="btn btn-primary btn-block  waves-effect btn-sm">Submit</button>
                        </div>
                    </div>
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
    <script src="{{ URL::asset('/assets/js/candidature.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/formation.js')}}"></script>
    {{-- Arabic keyboard --}}
    <script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script>

    <script>



          Dropzone.autoDiscover = false;
        var config = {
            routes: {

                getFormations: "{{route('getFormations')}}",
                saveCandidature:"{{route('saveCandidature')}}",
                showPDF:"",
            }
        };

      $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
      });

   </script>
@endsection
