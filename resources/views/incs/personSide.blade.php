<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('front') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ url('imgs/logo.png') }}" srcset="{{ url('imgs/logo.png') }} 2x"
                    alt="logo">
                <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="{{ url('imgs/logo.png') }} 2x"
                    alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="{{ url('imgs/logo.png') }}"
                    srcset="{{ url('imgs/logo.png') }} 2x" alt="logo-small">
            </a>
        </div>

        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                <em class="icon ni ni-arrow-left"></em>
            </a>

            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none
                d-xl-inline-flex" data-target="sidebarMenu">
                <em class="icon ni ni-menu"></em>
            </a>
        </div>
    </div>
    {{-- .nk-sidebar-element --}}
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Use-Case Preview</h6>
                    </li>{{-- .nk-menu-item --}}

                    <li class="nk-menu-item">
                        <a href="{{ route('home') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="icon fad fa-tachometer-alt"></i></span>
                            <span class="nk-menu-text">{{ __('general.Dashboard') }}</span><span
                                class="nk-menu-badge badge-danger">{{ Auth::user()->role_name }}</span>
                        </a>
                    </li>
                    {{-- .nk-menu-item --}}

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">{{ __('general.Applications') }}</h6>
                    </li>
                    {{-- .nk-menu-heading --}}

                    @if (Auth::user()->approval == 1 && Auth::user()->status==1)
                    {{--
                    <li class="nk-menu-item">
                        <a href="======" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-user-chart"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Profile') }}</span>
                        </a>
                    </li>
                    --}}
                    {{-- .nk-menu-item --}}
                    <li class="nk-menu-item">
                        <a href="{{ route('person.vb.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fal fa-file-pdf"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-CV') }}</span>
                        </a>
                    </li>


                    <li class="nk-menu-item">
                        <a href="{{ route('my.classifieds.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fal fa-ad"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Classifieds') }}</span>
                        </a>
                    </li>
                    @endif
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt"></h6>
                    </li>
                    {{-- .nk-menu-heading --}}

                    <li class="nk-menu-item">
                        <a href="{{ route('logout') }}" class="nk-menu-link" onclick="event.preventDefault();
            document.getElementById('logout-frm').submit();">
                            <form id="logout-frm" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <span class="nk-menu-icon">
                                <i class="icon fad fa-sign-out"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Sing Out') }}</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>