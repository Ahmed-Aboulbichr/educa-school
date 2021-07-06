
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap Css -->

    <style>
        html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}
body {
  margin: 0;
}
strong {
  font-weight: bold;
}
img {
  border: 0;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
}
th {
  padding: 0;
}
/*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */
@media print {
  *,
  *:before,
  *:after {
    background: transparent !important;
    color: #000 !important;
    box-shadow: none !important;
    text-shadow: none !important;
  }
  tr,
  img {
    page-break-inside: avoid;
  }
  img {
    max-width: 100% !important;
  }
  p {
    orphans: 3;
    widows: 3;
  }
  .table {
    border-collapse: collapse !important;
  }
  .table th {
    background-color: #fff !important;
  }
  .table-bordered th {
    border: 1px solid #ddd !important;
  }
}
@font-face {
  font-family: 'Glyphicons Halflings';
  src: url('../fonts/glyphicons-halflings-regular.eot');
  src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
}
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html {
  font-size: 10px;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333333;
  background-color: #fff;
}
img {
  vertical-align: middle;
}
p {
  margin: 0 0 10px;
}
.text-left {
  text-align: left;
}
.text-right {
  text-align: right;
}
.text-center {
  text-align: center;
}
ul {
  margin-top: 0;
  margin-bottom: 10px;
}
ul ul {
  margin-bottom: 0;
}
.list-unstyled {
  padding-left: 0;
  list-style: none;
}
.container {
  margin-right: auto;
  margin-left: auto;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
}
@media (min-width: 992px) {
  .container {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}
.row {
  margin-left: -15px;
  margin-right: -15px;
}
.col-lg-4, .col-lg-6, .col-md-10, .col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
@media (min-width: 992px) {
  .col-md-10 {
    float: left;
  }
  .col-md-10 {
    width: 83.33333333%;
  }
}
@media (min-width: 1200px) {
  .col-lg-4, .col-lg-6, .col-lg-12 {
    float: left;
  }
  .col-lg-12 {
    width: 100%;
  }
  .col-lg-6 {
    width: 50%;
  }
  .col-lg-4 {
    width: 33.33333333%;
  }
}
table {
  background-color: transparent;
}
th {
  text-align: left;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table > tbody > tr > th {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
.table-bordered {
  border: 1px solid #ddd;
}
.table-bordered > tbody > tr > th {
  border: 1px solid #ddd;
}
.table-responsive {
  overflow-x: auto;
  min-height: 0.01%;
}
@media screen and (max-width: 767px) {
  .table-responsive {
    width: 100%;
    margin-bottom: 15px;
    overflow-y: hidden;
    -ms-overflow-style: -ms-autohiding-scrollbar;
    border: 1px solid #ddd;
  }
  .table-responsive > .table {
    margin-bottom: 0;
  }
  .table-responsive > .table > tbody > tr > th {
    white-space: nowrap;
  }
  .table-responsive > .table-bordered {
    border: 0;
  }
  .table-responsive > .table-bordered > tbody > tr > th:first-child {
    border-left: 0;
  }
  .table-responsive > .table-bordered > tbody > tr > th:last-child {
    border-right: 0;
  }
  .table-responsive > .table-bordered > tbody > tr:last-child > th {
    border-bottom: 0;
  }
}
.panel {
  margin-bottom: 20px;
  background-color: #fff;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}
.panel-body {
  padding: 15px;
}
.panel-default {
  border-color: #ddd;
}
.container:before,
.container:after,
.row:before,
.row:after,
.panel-body:before,
.panel-body:after {
  content: " ";
  display: table;
}
.container:after,
.row:after,
.panel-body:after {
  clear: both;
}
@-ms-viewport {
  width: device-width;
}
  
     </style>
</head>
<body>
    <div class="container bootdey" style="float: left;">
        <div class="row invoice row-printable">
            <div class="col-md-10" style="background-color: white;">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default plain" id="dash_0">
                    <!-- Start .panel -->
                    <div class="panel-body p30">
                        <div class="row">
                            <!-- Start .row -->
                            <div class="col-lg-6 text-center" style="padding: 5px">
                                <!-- col-lg-6 start here -->

                                @php $path =($candidat==null)?'':App\docFile::where('candidature_id',$candidat->candidatures->first()->id)->first();
                         
                                @endphp
                                <!--<div class="invoice-logo text-center"><img width="200" src="{{ url("storage/$path") }}" alt="Invoice logo"></div>-->
                                <div class="invoice-logo text-center"><img width="200" src="https://cdn3.iconfinder.com/data/icons/business-avatar-1/512/3_avatar-512.png" alt="Invoice logo"></div>
                                   </div>
                            <!-- col-lg-6 end here -->
      
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-12">
                                <!-- col-lg-12 start here -->
                                <div class="invoice-details mt25">
                
                                    <div class="card">
                                        <div class="card-body text-center" style="padding-bottom: 20px;">
                                            <strong>Informations personnelles</strong>
                                       
                                        </div>
                                      </div>
                                   
                                </div>
                                <div class="row">
                                <div class="invoice-to mt25 col-lg-6 text-center">
                                    <ul class="list-unstyled">
                                        <li><strong>Détails sur le candidat</strong></li>
                                        <ul class="list-unstyled row  text-left">
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
                                
                                        <ul class="list-unstyled row  " style="">
                                            <li class=" col-lg-4"> Type de diplome : {{($candidat==null)?'':$candidat->docFiles->first()->type}}</li>
                                            <li class=" col-lg-4"> Mention : {{($candidat==null)?'':($candidat->mention_bac=='P')?'Passable':($candidat->mention_bac=='AB')?'Assez-Bien':($candidat->mention_bac=='B')?'Bien':($candidat->mention_bac=='TB')?'Très Bien':($candidat->mention_bac=='E')?'Excellent':''}} </li>
                                            <li class="col-lg-4"> Année : {{($candidat==null)?'':$candidat->annee_bac}}</li>
                                        </ul>
                                        <ul class="list-unstyled row  ">
                                            <li class=" col-lg-4"> Lycée d'origine : {{($candidat==null)?'':$candidat->lycee_bac}} </li>
                                            <li class=" col-lg-4"> Délégation : {{($candidat==null)?'':$candidat->delegation->first()->name}} </li>
                                            <li class=" col-lg-4"> Académie : {{($candidat==null)?'':$candidat->academie->first()->name}} </li>
                                        </ul>
                                        
                                    </ul>
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
                                    <p class="text-center">Generated on      {{ $ldate = date('Y-m-d H:i:s')}}</p>
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
</body>
</html>
    

