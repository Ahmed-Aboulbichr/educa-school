
@extends('layouts.master-without-nav')

@section('content')
<div class="container bootdey">
    <div class="row invoice row-printable">
        <div class="col-md-10" style="background-color: white;">
            <!-- col-lg-12 start here -->
            <div class="panel panel-default plain" id="dash_0">
                <!-- Start .panel -->
                <div class="panel-body p30">
                    <div class="row">
                        <!-- Start .row -->
                        <div class="col-lg-12 " style="padding: 5px; text-align:center;">
                            <!-- col-lg-6 start here -->
                            <div class="invoice-logo text-center" style="margin: 10px; "><img width="200" src="data:image;base64,{{ $profileImg }}" alt="Invoice logo"></div>
                          <!--  <div class="invoice-logo text-center"><img width="200" src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" alt="Invoice logo"></div>-->

                        </div>
                        <!-- col-lg-6 end here -->

                        <!-- col-lg-6 end here -->
                        <div class="col-lg-12">
                            <!-- col-lg-12 start here -->
                            <div class="invoice-details mt25">

                                <div class="card">
                                    <div class="card-body text-center">
                                        <strong>Informations personnelles</strong>

                                    </div>
                                  </div>

                            </div>
                            <div class="row">
                                <div class="invoice-to mt25 col-lg-6 text-center">
                                    <ul class="list-unstyled">
                                        <li><strong>Détails sur le candidat</strong></li>
                                        <ul class="list-unstyled  row text-left">
                                            <li class="col-lg-6"> Nom : {{($candidat==null)?'':$candidat->nom_fr}}</li>
                                            <li class="col-lg-6">  النسب : {{($candidat==null)?'':$candidat->nom_ar}} </li>
                                            <li class="col-lg-6"> Prenom : {{($candidat==null)?'':$candidat->prenom_fr}}</li>
                                            <li class="col-lg-6">  الإسم : {{($candidat==null)?'':$candidat->prenom_ar}} </li>
                                        </ul>
                                        <ul class="list-unstyled text-left">


                                            <li > Date de naissance : {{($candidat==null)?'':$candidat->date_naiss}}</li>
                                            <li > Lieu  : {{($candidat==null)?'':$candidat->lieu_naiss_fr}}</li>
                                            <li >  Adresse : {{($candidat==null)?'':$candidat->adresse_etd}} </li>
                                            <li >  GSM : {{($candidat==null)?'':$candidat->tel}} </li>
                                        </ul>
                                    </ul>
                                </div>
                                <div class="invoice-to mt25 col-lg-6 text-center">
                                    <ul class="list-unstyled">
                                        <li><strong>Détails sur les parents</strong></li>
                                        <ul class="list-unstyled text-left ">
                                            <li > CIN père : {{($candidat==null)?'':$candidat->CIN_pere}}</li>
                                            <li > Profession  : {{($candidat==null)?'':$candidat->lieu_naiss_fr}}</li>
                                            <li >  CIN mère : {{($candidat==null)?'':$candidat->profession_pere}} </li>
                                            <li > Profession  : {{($candidat==null)?'':$candidat->profession_mere}} </li>
                                            <li > Adresse  : {{($candidat==null)?'':$candidat->adresse_parent}} </li>
                                            <li > Téléphone  : {{($candidat==null)?'':$candidat->tel_parent}} </li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        <div class="invoice-details mt25">

                            <div class="card">
                                <div class="card-body text-center">
                                    <strong>   Cursus scolaire / universitaire</strong>

                                </div>
                              </div>

                         </div>

                         <div class="row">
                                <ul class="list-unstyled col-lg-12">

                                    <ul class="list-unstyled row  " style="padding: 10px">
                                        <li class="text-center col-lg-4"> Type de diplome : Bac</li>
                                        <li class="text-center col-lg-4"> Mention : {{($candidat==null)?'':(($candidat->mention_bac=='P')?'Passable':(($candidat->mention_bac=='AB')?'Assez-Bien':(($candidat->mention_bac=='B')?'Bien':(($candidat->mention_bac=='TB')?'Très Bien':(($candidat->mention_bac=='E')?'Excellent':'')))))}} </li>
                                        <li class="text-center col-lg-4"> Année : {{($candidat==null)?'':$candidat->annee_bac}}</li>
                                    </ul>
                                    <ul class="list-unstyled row  ">
                                        <li class="text-center col-lg-4"> Lycée d'origine : {{($candidat==null)?'':$candidat->lycee_bac}} </li>
                                        <li class="text-center col-lg-4"> Délégation : {{($candidat==null)?'':$candidat->delegation->name}} </li>
                                        <li class="text-center col-lg-4"> Académie : {{($candidat==null)?'':$candidat->academie->name}} </li>
                                    </ul>

                                </ul>
                               @foreach ($candidature->cursus_universitaires as $cursus_univ)
                                   
                              
                                <ul class="list-unstyled col-lg-12">

                                    <ul class="list-unstyled row  " style="padding: 10px">
                                        <li class="text-center col-lg-4"> Niveau d'étude : {{$cursus_univ->niveau_etude->intitule}}</li>
                                        <li class="text-center col-lg-4"> Moyenne génerale : {{($cursus_univ->note_S1+$cursus_univ->note_S2)/2}}</li>
                                        <li class="text-center col-lg-4"> Année universitaires  : {{$cursus_univ->Annee_univ}}</li>
                                    </ul>
                                    <ul class="list-unstyled row  ">
                                        <li class="text-center col-lg-6"> Université : {{$cursus_univ->universite->intitule}} </li>
                                        <li class="text-center col-lg-6"> Spécialité : {{$cursus_univ->specialite}} </li>
                                    </ul>

                                </ul>

                                @endforeach
                         </div>
                            <div class="invoice-items">
                                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                    <table class="table table-bordered">
                                       <tr>

                                                <th class="text-right">Je soussigné, certifie sur I'honneur l'exactitude de ces renseignements</th>

                                            </tr>
                                            <tr>
                                                <th   style="height: 100px;" class="text-right">Signature de l'étudiant</th>

                                            </tr>

                                    </table>
                                </div>
                            </div>
                            <div class="invoice-footer mt25">
                                <p class="text-center">Generated on <script>document.write(new Date().toLocaleDateString() + ' at '+ new Date().toLocaleTimeString())

                                </script>    <a href="{{route('downloadPDF',$candidature->id)}}" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
                            </div>
                        </div>
                        <!-- col-lg-12 end here -->
                    </div>
                    <!-- End .row -->
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->
    </div>
    </div>

    @endsection
