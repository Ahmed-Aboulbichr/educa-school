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
                                            <label for="progress-basicpill-firstname-input">Nom <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="text" class="form-control" id="progress-basicpill-firstname-input">
                                            <span class="text-muted">ABOULBICHR</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input" class="arabic"><i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i> النسب</label>
                                            <input type="email" class="form-control rtl" id="progress-basicpill-lastname-ar-input">
                                            <span class="text-muted" style="float: right">أبوالبشر</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Prénom <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="text" class="form-control" id="progress-basicpill-lastname-input">
                                            <span class="text-muted">Ahmed</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-lastname-input" class="arabic"><i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i> الإسم</label>
                                            <input type="text" class="form-control rtl" id="progress-basicpill-firstname-ar-input">
                                            <span class="text-muted"  style="float: right" >أحمد</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Lieu de naissance</label>
                                            <input type="text" class="form-control" id="progress-basicpill-birthplace-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input" class="arabic">مكان الإزدياد</label>
                                            <input type="email" class="form-control rtl" id="progress-basicpill-birthplace-ar-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >CIN <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="text" class="form-control" id="progress-basicpill-CIN-input">
                                            <span class="text-muted">BA7060</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">CNE <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="email" class="form-control" id="progress-basicpill-CNE-input">
                                            <span class="text-muted">R109218391</span>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Date de naissance <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="text" class="form-control" id="progress-basicpill-birthday-input">
                                            <span class="text-muted">JJ/MM/AAAA</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Téléphone <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
                                            <input type="email" class="form-control" id="progress-basicpill-phone-input">
                                            <span class="text-muted">+2126.........</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
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
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Genre <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
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
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Pays</label>
                                            {{-- <input type="text" class="form-control" id="progress-basicpill-phoneno-input"> --}}
                                            <select class="form-control" id="paysOptions">
                                                <option>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Nationalité</label>
                                            {{-- <input type="email" class="form-control" id="progress-basicpill-Nationalite-input"> --}}
                                            <select name="cod_pay_nai"  class="form-control">
                                                <option value="350" selected="">MAROCAIN(E)</option><option value="212">AFGHAN(E)</option><option value="125">ALBANAIS(E)</option><option value="352">ALGERIEN(NE)</option><option value="109">ALLEMAND(E)</option><option value="404">AMERICAIN(E)</option><option value="527">AMERICAIN(E)</option><option value="130">ANDORRAN(NE)</option><option value="395">ANGOLAIS(E)</option><option value="441">ANTIGUA ET BARBUDA</option><option value="415">ARGENTIN(E)</option><option value="252">ARMENIEN(E)</option><option value="501">AUSTRALIEN(NE)</option><option value="110">AUTRICHIEN(NE)</option><option value="253">AZERI(E)</option><option value="436">BAHAMAS</option><option value="434">BARBADE</option><option value="249">BARHEINIEN(NE)</option><option value="131">BELGE</option><option value="429">BELIZE</option><option value="246">BENGALI(E)</option><option value="327">BENINOIS(E)</option><option value="521">BERMUDIEN(NE)</option><option value="214">BHOUTAN</option><option value="148">BIELORUSSE</option><option value="418">BOLIVIEN(NE)</option><option value="118">BOSNIAQUE</option><option value="347">BOTSWANAIS(E)</option><option value="416">BRESILIEN(NE)</option><option value="528">BRITANNIQUE</option><option value="427">BRITANNIQUE</option><option value="132">BRITANNIQUE</option><option value="225">BRUNEI</option><option value="111">BULGARE</option><option value="331">BURKINABE</option><option value="321">BURUNDAIS(E)</option><option value="525">CAEMANAIS(E)</option><option value="533">CALEDONIEN(NE)</option><option value="234">CAMBODGIEN(NE)</option><option value="322">CAMEROUNAIS(E)</option><option value="401">CANADIEN(NE)</option><option value="396">CAP VERDIEN(NE)</option><option value="323">CENTRAFRICAIN(E)</option><option value="417">CHILIEN(NE)</option><option value="216">CHINOIS(E)</option><option value="254">CHYPRIOTE</option><option value="419">COLOMBIEN(NE)</option><option value="397">COMORIEN(NE)</option><option value="324">CONGOLAIS(E)</option><option value="520">CONGOLAISE (R.D.)</option><option value="406">COSTA RICAIN(E)</option><option value="119">CROATE</option><option value="407">CUBAIN(E)</option><option value="101">DANOIS(E)</option><option value="308">DE CHAGOS</option><option value="537">DE SAINT-KITTS-ET-NEVIS</option><option value="538">DE SAINT-SIEGE</option><option value="306">DE STE HELENE</option><option value="247">DES EMIRATS ARABES UNIS</option><option value="526">DES ILES COOK</option><option value="399">DJIBOUTIEN(NE)</option><option value="438">DOMINICAIN(E)</option><option value="408">DOMINICAIN(E)</option><option value="232">DU MACAO</option><option value="224">DU MYANMAR</option><option value="301">EGYPTIEN(NE)</option><option value="414">EL SALVADORIEN(NE)</option><option value="314">EQUATORIAL GUINEEN(NE)</option><option value="420">EQUATORIEN(NE)</option><option value="317">ERYTHREE</option><option value="134">ESPAGNOL(E)</option><option value="106">ESTONIEN(NE)</option><option value="315">ETHIOPIEN(NE)</option><option value="156">EX. REP YOUGO MACEDOINE I</option><option value="508">FIDJI</option><option value="105">FINLANDAIS(E)</option><option value="996">FRANCAIS(E)</option><option value="100">FRANCAIS(E)</option><option value="328">GABONAIS(E)</option><option value="304">GAMBIEN(NE)</option><option value="255">GEORGIEN(NE)</option><option value="329">GHANEEN(NE)</option><option value="133">GIBRALTARIEN</option><option value="126">GREC(QUE)</option><option value="435">GRENADE ETGRENADINES</option><option value="522">GUADELOUPEEN(NE)</option><option value="523">GUAMIEN(NE)</option><option value="409">GUATEMALTEQUE</option><option value="330">GUINEEN(NE)</option><option value="392">GUINEEN(NE) BISSAU</option><option value="428">GUYANAIS(E)</option><option value="524">GUYANNAIS(E)</option><option value="410">HAITIEN(NE)</option><option value="411">HONDURIEN(NE)</option><option value="230">HONG KONG</option><option value="112">HONGROIS(E)</option><option value="515">ILE MARSHALL</option><option value="990">INCONNUE</option><option value="223">INDIEN(NE)</option><option value="231">INDONESIEN(NE)</option><option value="203">IRAKIEN(NE)</option><option value="204">IRANIEN(NE)</option><option value="136">IRLANDAIS(E)</option><option value="102">ISLANDAIS(E)</option><option value="207">ISRAELIEN(NE)</option><option value="127">ITALIEN(NE)</option><option value="326">IVOIRIEN(NE)</option><option value="426">JAMAICAIN(E)</option><option value="217">JAPONAIS(E)</option><option value="222">JORDANIEN(NE)</option><option value="256">KAZAKH</option><option value="332">KENYAN(NE)</option><option value="257">KIRGHIZE</option><option value="513">KIRIBATI</option><option value="240">KOWEITIEN(NE)</option><option value="241">LAOTIEN(NE)</option><option value="348">LESOTHO</option><option value="107">LETTONIEN(NE)</option><option value="205">LIBANAIS(E)</option><option value="302">LIBERIAN(E)</option><option value="316">LIBYEN(NE)</option><option value="113">LIECHTENSTEIN</option><option value="108">LITHUANIEN(NE)</option><option value="137">LUXEMBOURGEOIS(E)</option><option value="227">MALAIS(E)</option><option value="334">MALAWIEN(NE)</option><option value="229">MALDIVES</option><option value="333">MALGACHE</option><option value="335">MALIEN(NE)</option><option value="144">MALTAIS(E)</option><option value="350">MAROCAIN(E)</option><option value="530">MARTINIQUAIS(E)</option><option value="390">MAURICIEN(NE)</option><option value="336">MAURITANIEN(NE)</option><option value="405">MEXICAIN(E)</option><option value="516">MICRONESIEN(NE)</option><option value="151">MOLDAVE</option><option value="138">MONEGASQUE</option><option value="242">MONGOL(E)</option><option value="393">MOZAMBIQUOIS(E)</option><option value="311">NAMIBIEN(NE)</option><option value="507">NAURU</option><option value="135">NEERLANDAIS(E)</option><option value="431">NEERLANDAIS(E)</option><option value="502">NEO ZELANDAIS(E)</option><option value="215">NEPALAIS(E)</option><option value="412">NICARAGUAIS(E)</option><option value="338">NIGERIAN(E)</option><option value="337">NIGERIEN(NE)</option><option value="532">NIOUEEN(NE)</option><option value="238">NORD COREEN(NE)</option><option value="103">NORVEGIEN(NE)</option><option value="250">OMANAIS(E)</option><option value="339">OUGANDAIS(E)</option><option value="258">OUZBEK</option><option value="213">PAKISTANAIS(E)</option><option value="517">PALAOSIEN(NE)</option><option value="519">PALAOSIEN(NE)</option><option value="261">PALESTINIEN(NE)</option><option value="413">PANAMEEN(NE)</option><option value="510">PAPOUASIE</option><option value="421">PARAGUAYEN(NE)</option><option value="422">PERUVIEN(NE)</option><option value="220">PHILIPPIN(NE)</option><option value="122">POLONAIS(E)</option><option value="535">POLYNESIEN(NE)</option><option value="432">PORTORICAIN(NE)</option><option value="139">PORTUGAIS(E)</option><option value="248">QATARI(E)</option><option value="529">REUNIONNAIS(E)</option><option value="114">ROUMAIN(E)</option><option value="340">RUANDAIS(E)</option><option value="123">RUSSE</option><option value="128">SAINT MARIN</option><option value="440">SAINT VINCENTAIS ET GRENADIN</option><option value="439">SAINTE-LUCIEN(E)</option><option value="512">SALOMON</option><option value="540">SAMOAIN(E)</option><option value="506">SAMOAN(NE)</option><option value="394">SAO TOME ET PRINCIPE</option><option value="201">SAOUDIEN(NE)</option><option value="341">SENEGALAIS(E)</option><option value="398">SEYCHELLES</option><option value="342">SIERRA LEONE</option><option value="226">SINGAPOURIEN(NE)</option><option value="117">SLOVAQUE</option><option value="145">SLOVENE</option><option value="318">SOMALIEN(NE)</option><option value="343">SOUDANAIS(E)</option><option value="235">SRI LANKAIS(E)</option><option value="442">ST CHRISTOPHE NIEVES</option><option value="303">SUD AFRICAIN(E)</option><option value="239">SUD COREEN(NE)</option><option value="104">SUEDOIS(E)</option><option value="140">SUISSE</option><option value="437">SURINAMAIS(E)</option><option value="391">SWAZILANDAIS(E)</option><option value="206">SYRIEN(NE)</option><option value="259">TADJIK</option><option value="236">TAIWANIS(E)</option><option value="309">TANZANIEN(NE)</option><option value="344">TCHADIEN(NE)</option><option value="116">TCHEQUE</option><option value="505">TERRITOIRE USA</option><option value="219">THAILANDAIS(E)</option><option value="345">TOGOLAIS(E)</option><option value="509">TONGA OU FRIENDLY</option><option value="433">TRINITE ET TOBAGO</option><option value="351">TUNISIEN(NE)</option><option value="208">TURC (TURQUE)</option><option value="260">TURKMENE</option><option value="511">TUVALU</option><option value="155">UKRAINIEN(NE)</option><option value="423">URUGUAYEN(NE)</option><option value="514">VANUATU</option><option value="129">VATICAN(E)</option><option value="424">VENEZUELIEN(NE)</option><option value="243">VIETNAMIEN(NE)</option><option value="251">YEMENITE</option><option value="121">YOUGOSLAVE</option><option value="312">ZAIROIS(E)</option><option value="346">ZAMBIEN(NE)</option><option value="310">ZIMBABWEIEN(NE)</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-email-input">Ville</label>
                                            <input type="email" class="form-control" id="progress-basicpill-Ville-input">
                                            <span class="text-muted">Casablanca</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-4">
                                        <div class="form-group">
                                            <label for="progress-basicpill-address-input">Address</label>
                                            <textarea id="progress-basicpill-address-input" class="form-control" rows="2"></textarea>
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
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-vatno-input">Tel parent</label>
                                            <input type="tel" pattern="\d{10,15}" class="form-control" id="progress-basicpill-vatno-input">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Pays parent</label>
                                            <select class="form-control" id="paysOptionsParent">
                                                <option>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="progress-basicpill-phoneno-input" >Region parent</label>
                                            <select class="form-control" id="regionOptionsParent">
                                                <option>-----------</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
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
                                                    <option selected>Select ¨Province</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> Delegation </label>
                                                <select class="custom-select" name="delegation" id="delegationsOptions">
                                                    <option selected>Select Delegation</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label> Academie </label>
                                                <select class="custom-select" name="academie" id="academiesOptions">
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
                                                    <option selected>Select Année universitaire</option>

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
                                                    <option selected>Selectionner un Choix de formation</option>
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
                        <li class="next"><a onclick="$('#fichierBac').submit()" href="#">Next</a></li>
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
    
    <script src="{{ URL::asset('/assets/js/condidature.js')}}"></script>

    <script>
          Dropzone.autoDiscover = false;
        var config = {
            routes: {
                getPays: "{{route('getPays')}}",
                getDelegations: "{{route('getDelegations')}}",
                getAcademies: "{{route('getAcademies')}}",
                getProvinces: "{{route('getProvinces')}}",

                saveCandidatStepThree:"{{route('saveCandidatStepThree')}}",
                saveCandidatStepFour:"{{route('saveCandidatStepFour')}}",
                saveCandidatStepFive:"{{route('saveCandidatStepFive')}}",

                
               {{-- saveCandidatStepOne:"{{route('saveCandidatStepOne')}}",
                saveCandidatStepTwo:"{{route('saveCandidatStepTwo')}}",--}}
            }
        };


      $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
      });
   </script>
@endsection
