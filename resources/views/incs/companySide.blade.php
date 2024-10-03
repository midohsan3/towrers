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
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('home') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="icon fad fa-tachometer-alt"></i></span>
                            <span class="nk-menu-text">{{ __('general.Dashboard') }}</span><span
                                class="nk-menu-badge badge-danger">{{
                                Auth::user()->role_name }}</span>
                        </a>
                    </li>
                    {{-- .nk-menu-item --}}

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">{{ __('general.Applications') }}</h6>
                    </li>
                    {{-- .nk-menu-heading --}}

                    @if (Auth::user()->approval == 1 && Auth::user()->status==1)

                    <li class="nk-menu-item">
                        <a href="{{ route('home') }}" class="nk-menu-link disabled">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-user-chart"></i>
                            </span>
                            <span class="nk-menu-text ">{{ __('general.My-Profile') }}</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.order.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-hands-usd"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Enquiry') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.social.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-wifi"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Social Media') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.majors.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-paperclip"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Specialist') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.package.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-watch"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Subscriptions') }}</span>
                        </a>
                    </li>

                    @if (packageCost()>0)
                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.project.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-city"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Projects') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.product.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-badge-dollar"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Products') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.slider.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fad fa-portrait"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Page Slider') }}</span>
                        </a>
                    </li>
                    @else
                    <li class="nk-menu-item">
                        <a class="nk-menu-link " href="{{ route('c-company.project.index') }}">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-city"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Projects') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.product.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-badge-dollar"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Products') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.slider.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fad fa-portrait"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Page Slider') }}</span>
                        </a>
                    </li>
                    @endif

                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.job.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-briefcase"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Jobs') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('my.classifieds.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fal fa-calendar-star"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Classifieds') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('c-company.interest.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fal fa-lightbulb"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.My-Interests') }}</span>
                        </a>
                    </li>

                    @endif
                    {{-- .nk-menu-item --}}

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