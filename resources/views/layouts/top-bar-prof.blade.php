<header id="page-topbar" >
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('index')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/images/Icon-180x180.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/images/logo-dark.png')}} " alt="" height="20">
                    </span>
                </a>

                <a href="{{url('index')}}" class="logo logo-light">
                    <span class="logo-sm"  style="margin-left:-8px;">
                        <img src="{{ URL::asset('/assets/images/Icon-180x180.png')}}" alt="" height="35">
                    </span>
                    <span class="logo-lg" >
                        <img src="{{ URL::asset('/assets/images/logo-topBar.png')}}"  height="35">
                    </span>
                </a>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-3">
                <button type="button" onclick="location.href='{{route('cursus_universitaire.index')}}'" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    Consulter mon parcours
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-3">
                <button type="button" onclick="location.href='{{route('getFormations')}}'" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    Postuler aux formations ouverts
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-3">
                <button type="button" onclick="location.href='{{route('mesCandidatures')}}'" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    Voir mes candidatures
                </button>
            </div>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-list-unordered"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('cursus_universitaire.index')}}"><i class="ri-number-1 align-middle mr-1"></i> Consulter Mon cursus</a>
                    <a class="dropdown-item" href="{{route('getFormations')}}"><i class="ri-number-2 align-middle mr-1"></i> Postuler aux formations ouverts</a>
                    <a class="dropdown-item" href="{{route('mesCandidatures')}}"><i class="ri-number-3 align-middle mr-1"></i> Voir mes Candidatures</a>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            @php
                $candidat = App\Candidat::where('user_id', Auth::id())->orWhere('editor_id',Auth::id())->latest()->first();
                    try {
                    //code...
                    $path= ($candidat==null)?"NaN":$candidat->docFiles->where('type','ProfileImg')->first()->path;
                } catch (\Throwable $th) {
                    $path= "NaN";
                }
            @endphp

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ url("storage/$path")}}" alt="Photo de {{($candidat==null)?'NaN' :Str::upper($candidat->nom_fr) }} {{($candidat==null)?'NaN':$candidat->prenom_fr}}">
                    <span class="d-none d-xl-inline-block ml-1">{{($candidat==null)?'NaN' :Str::upper($candidat->nom_fr) }} {{($candidat==null)?'NaN':$candidat->prenom_fr}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href={{route('profile')}}><i class="ri-user-line align-middle mr-1"></i>Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href={{route('logout')}}><i class="ri-shut-down-line align-middle mr-1 text-danger"></i>Déconnexion</a>
                </div>
            </div>

        </div>
    </div>
</header>
