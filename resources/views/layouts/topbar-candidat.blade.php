<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box" style="background-color: #f1f5f7;">
                <a href="{{url('index')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/images/logo.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/images/logo.png')}} " alt="" height="20">
                    </span>
                </a>

                <a href="{{url('index')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/images/logo.png')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/images/logo.png')}}" alt="" height="55">
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
            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                <i class="ri-settings-2-line"></i>
            </button>
        </div>

        </div>
    </div>
</header>
