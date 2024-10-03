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
                    @can('company-list')
                    <li class="nk-menu-item has-sub">

                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon fad fa-user-chart"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Companies') }}</span>
                            <span class="badge badge-primary">{{ newCompanies() }} {{ __('general.New') }}</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('company.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.List') }}</span>
                                </a>
                            </li>

                            @can('company-create')
                            <li class="nk-menu-item">
                                <a href="{{ route('company.create') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.New')}}</span>
                                </a>
                            </li>
                            @endcan

                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan

                    @can('persons-list')
                    <li class="nk-menu-item has-sub">

                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-users"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Personal Accounts') }}</span>
                            <span class="badge badge-primary">{{ newPersons() }} {{ __('general.New') }}</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('person.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.List') }}</span>
                                </a>
                            </li>

                            @can('persons-create')
                            <li class="nk-menu-item">
                                <a href="{{ route('person.create') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.New')}}</span>
                                </a>
                            </li>
                            @endcan

                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan

                    @can('staff-list')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon fad fa-user-tie"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.System Admins') }}</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('staff.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.List') }}</span>
                                </a>
                            </li>

                            @can('staff-create')
                            <li class="nk-menu-item">
                                <a href="{{ route('staff.create') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.New')}}</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan


                    @can('role-list')
                    <li class="nk-menu-item has-sub">

                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-user-lock"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Roles') }}</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('role.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.List') }}</span>
                                </a>
                            </li>
                            @can('role-create')
                            <li class="nk-menu-item">
                                <a href="{{ route('role.create') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.New')}}</span>
                                </a>
                            </li>
                            @endcan

                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan

                    @can('projects-list')
                    <li class="nk-menu-item has-sub">

                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon ni ni-tile-thumb-fill"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Projects') }}</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('project.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.List') }}</span>
                                </a>
                            </li>

                            @can('projects-create')
                            <li class="nk-menu-item">
                                <a href="{{ route('project.create') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.New')}}</span>
                                </a>
                            </li>
                            @endcan

                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan


                    @can('product-list')
                    <li class="nk-menu-item has-sub">

                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-pallet-alt"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Products') }}</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('product.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.List') }}</span>
                                </a>
                            </li>

                            @can('product-create')
                            <li class="nk-menu-item">
                                <a href="{{ route('product.create') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.New')}}</span>
                                </a>
                            </li>
                            @endcan


                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan

                    @can('orders-list')
                    <li class="nk-menu-item has-sub">

                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-shield-alt"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Orders') }}</span>
                            <span class="badge badge-warning">{{ newOrders() }} {{ __('general.New') }}</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('order.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.List') }}</span>
                                </a>
                            </li>

                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan


                    @can('subscriptions-list')
                    <li class="nk-menu-item">
                        <a href="{{ route('subscription.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fad fa-shovel-snow"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Subscriptions') }}</span>
                        </a>
                    </li>
                    @endcan


                    <li class="nk-menu-item">
                        <a href="{{ route('classified.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-ad"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Classifieds') }}</span>
                            <span class="badge badge-warning">{{ newAds() }} {{ __('general.New') }}</span>
                        </a>
                    </li>

                    @can('jobs-cvs-list')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-user-tie"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Jobs And Cvs') }}</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('job.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.Jobs') }}</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('cv.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.CVs') }}</span>
                                </a>
                            </li>
                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan


                    {{-- .nk-menu-item --}}

                    @can('front-control')
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">{{ __('general.Front Pages') }}</h6>
                    </li>

                    @can('admin-sliders')
                    <li class="nk-menu-item has-sub">

                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-sliders-h"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Sliders') }}</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('slider.main.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.Home Page') }}</span>
                                </a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('slider.company.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.Companies')}}</span>
                                </a>
                            </li>

                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan


                    <li class="nk-menu-item has-sub">

                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-film-alt"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Videos') }}</span>
                        </a>

                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('video.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.YouTube Videos') }}</span>
                                </a>
                            </li>

                            <li class="nk-menu-item">
                                <a href="{{ route('adVideo.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.Ad Video')}}</span>
                                </a>
                            </li>

                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>



                    @can('news-bar-list')
                    <li class="nk-menu-item">
                        <a href="{{ route('news.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fal fa-newspaper"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.News Bar') }}</span>
                        </a>
                    </li>
                    @endcan
                    @endcan

                    @can('system-helper')
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">{{ __('general.System Helpers') }}</h6>
                    </li>

                    @can('city-list')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon far fa-city"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Cities') }}</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('city.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.List') }}</span>
                                </a>
                            </li>
                            @can('city-create')
                            <li class="nk-menu-item">
                                <a href="{{ route('city.create') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.New')}}</span>
                                </a>
                            </li>
                            @endcan

                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    @endcan

                    {{-- .nk-menu-item --}}

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon fad fa-cubes"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Packages') }}</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('package.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.Subscriptions') }}</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('package.classified.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.Classifieds')}}</span>
                                </a>
                            </li>
                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>
                    {{-- .nk-menu-item --}}

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-briefcase"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Sections') }}</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('section.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.List') }}</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('major.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.Majors') }}</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('section.create') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{__('general.New')}}</span>
                                </a>
                            </li>
                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon">
                                <i class="icon fas fa-suitcase"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Categories') }}</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('project.category.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.Projects') }}</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('product.category.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.Products') }}</span>
                                </a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('job.category.index') }}" class="nk-menu-link">
                                    <span class="nk-menu-text">{{ __('general.Jobs') }}</span>
                                </a>
                            </li>
                        </ul>
                        {{-- .nk-menu-sub --}}
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('interest.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fal fa-broadcast-tower"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Interests') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('instruction.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fal fa-tools"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.System Instructions') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('unit.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fad fa-ruler-triangle"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Units') }}</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('size.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon fal fa-pencil-ruler"></i>
                            </span>
                            <span class="nk-menu-text">{{ __('general.Sizes') }}</span>
                        </a>
                    </li>

                    @endcan

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