<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box" style="background-color: #f1f5f7;">
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
        </div>

        <div class="d-flex">
           <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <a type="button" href="{{route('logout')}}" style="padding-top: 1.47em;" class="btn btn-sm btn-link  header-item noti-icon waves-effect">
                    <i class="ri-shut-down-line align-middle mr-1 text-danger"></i>
                </a>
            </div>
        </div>
    </div>
</header>
