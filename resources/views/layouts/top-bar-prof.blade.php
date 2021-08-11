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
                        <img src="{{ URL::asset('/assets/images/logo-dark.png')}}"  height="35">
                    </span>
                </a>
            </div>

            {{-- <div class="dropdown d-none d-lg-inline-block ml-3">
                <button type="button" onclick="location.href='{{route('cursus_universitaire.index')}}'" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    Consulter mon parcours
                </button>
            </div> --}}
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
                 <a class="dropdown-item text-danger" href={{route('logout')}}><i class="ri-shut-down-line align-middle mr-1 text-danger"></i>Déconnexion</a>
            </div>

        </div>
    </div>
</header>
