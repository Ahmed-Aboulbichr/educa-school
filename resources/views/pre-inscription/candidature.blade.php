
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
                <h4 class="card-title mb-4">Suivi les étaps d'inscription</h4>
                <div id="progrss-wizard" class="twitter-bs-wizard">
                    <ul class="twitter-bs-wizard-nav nav-justified">
                        <li class="nav-item">
                            <a href="#progress-candidature-last-step" class="nav-link" data-toggle="tab">
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
                        
                    </ul>

                    <div id="bar" class="progress mt-4">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                    </div>
                    <div class="tab-content twitter-bs-wizard-tab-content">





                        
<div class="tab-pane" id="progress-candidature-last-step">
    <div>
        <form id="choixFormation">
            @csrf
                <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="progress-basicpill-namecard-input">premiere inscription ( département )</label>

                        <input   value="{{($candidature==null)?(($formation==null)?'':$formation->id):$candidature->formation_id}}" type="hidden" name="formation" class="form-control"  >

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
<li class="" style="float:right;" id="NextStepBtn" onclick="$('#choixFormation').submit()" ><a id="NextStepBtnA" href="#">Next</a></li>
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