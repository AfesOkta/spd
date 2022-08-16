<div class="app-sidebar sidebar-shadow bg-dark sidebar-text-light">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{ route('home') }}" class="@yield('home-menu')">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Home
                    </a>
                </li>
                <li class="app-sidebar__heading">DATA</li>
                <li>
                    <a href="{{route('personel')}}" lass="@yield('personel-menu')">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Personel
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-suitcase"></i>
                        Pejabat
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Pagu
                    </a>
                </li>
                <li>
                    <a href="{{route('master')}}">
                        <i class="metismenu-icon pe-7s-server"></i>
                        Master Data
                    </a>
                </li>
                <!-- SPD -->
                <li class="app-sidebar__heading">PROSES</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-thumbtack"></i>
                        SPD
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-file-lines"></i>
                        Kwitansi
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-file-lines"></i>
                        Kwitansi LN
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-file-lines"></i>
                        Nominatif
                    </a>
                </li>
                <li class="app-sidebar__heading">Other</li>

                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-file-lines"></i>
                        Laporan
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div> 