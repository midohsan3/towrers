{{-- Login Modal --}}
<div class="modal1 mfp-hide" id="modal-login">
  <div class="card mx-auto" style="max-width: 540px;">
    <div class="card-header py-3 bg-transparent text-center">
      <h3 class="mb-0 fw-normal">Hello, Welcome Back</h3>
    </div>
    <div class="card-body mx-auto py-5" style="max-width: 70%;">

      <form id="login-form" name="login-form" class="mb-0 row" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="col-12">
          <input type="email" id="login-form-username" name="email" value="{{ old('email') }}"
            class="form-control not-dark" placeholder="Your E-mail Here" />
        </div>

        <div class="col-12 mt-4">
          <input type="password" id="login-form-password" name="password" class="form-control not-dark"
            placeholder="Password" />
        </div>

        <div class="col-12 text-end">
          <a href="#" class="text-dark fw-light mt-2">Forgot Password?</a>
        </div>

        <div class="col-12 mt-4">
          <button type="submit" class="button w-100 m-0" id="login-form-submit" name="login-form-submit"
            value="login">Login</button>
        </div>
      </form>
    </div>
    <div class="card-footer py-4 text-center">
      <p class="mb-0">Dont have an account? <a href="#modal-register" data-lightbox="inline"><u>Sign up</u></a></p>
    </div>
  </div>
</div>

{{-- Register Modal --}}
<div class="modal1 mfp-hide" id="modal-register">
  <div class="card mx-auto" style="max-width: 540px;">
    <div class="card-header py-3 bg-transparent text-center">
      <h3 class="mb-0 fw-normal">Register As</h3>
    </div>
    <div class="card-body mx-auto py-3" style="max-width: 70%;">

      <div class="divider divider-center">
        <span class="position-relative" style="top: -2px">OR</span>
      </div>
      <div class="row">
        <div class="col">
          <a href="{{ route('front.company.register') }}"
            class=" btn btn-lg btn-danger w-100">{{ __('front.Companies') }}
          </a>
        </div>
        <div class="col">
          <a href="{{ route('front.person.register') }}"
            class="col-lg btn btn-lg btn-primary w-100">{{ __('front.Personal') }}
          </a>
        </div>
      </div>

    </div>

  </div>
</div>

{{-- Top Bar--}}


<div id="top-bar" class="dark" style="background-color: #2f638b;">
  <div class="container">

    <div class="row justify-content-between align-items-center" dir="ltr">
      <div class="d-flex col-2 d-lg-none">
        <ul class="top-links">
          <li class="top-links-item">
            @if (App::getLocale()=='ar')
          <li class="top-links-item">
            <a rel="alternate" hreflang="English"
              href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
              English
            </a>
          </li>
          @else
          <li class="top-links-item">
            <a rel="alternate" hreflang="العربية"
              href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">

              العربية

            </a>
          </li>
          @endif
          </li>
        </ul>
      </div>

      <div class="col-9 col-lg-auto">
        <p class="mb-0 d-flex justify-content-center justify-content-lg-start py-3 py-lg-0">
          <strong>{{ __('front.100% Free Now') }}</strong>
        </p>
      </div>


      <div class="d-none col-12 col-lg-auto  d-lg-flex">

        {{-- Top Links--}}
        <div class="top-links">
          <ul class="top-links-container">
            <li class="top-links-item"><a href="#">{{ __('front.About') }}</a></li>
            <li class="top-links-item"><a href="#">{{ __('front.Contact Us') }}</a></li>
            <li class="top-links-item">

              <a href="#">
                @if (App::getLocale()=='ar')
                العربية
                @else
                English
                @endif
              </a>
              <ul class="top-links-sub-menu">
                @if (App::getLocale()=='ar')
                <li class="top-links-item">
                  <a rel="alternate" hreflang="English"
                    href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                    En
                  </a>
                </li>
                @else
                <li class="top-links-item">
                  <a rel="alternate" hreflang="العربية"
                    href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">

                    عربي

                  </a>
                </li>
                @endif
              </ul>
            </li>
          </ul>
        </div>{{-- .top-links end --}}

        {{-- Top Social --}}
        <ul id="top-social">
          <li><a href="https://www.facebook.com/TowerSuae?ref=pages_you_manage" class="h-bg-facebook"><span
                class="ts-icon"><i class="fa-brands fa-facebook-f"></i></span><span class="ts-text">Facebook</span></a>
          </li>
          <li><a href="https://www.instagram.com/towersuae1/" class="h-bg-instagram"><span class="ts-icon"><i
                  class="fa-brands fa-instagram"></i></span><span class="ts-text">Instagram</span></a></li>
          <li><a href="tel:+971524643034" class="h-bg-call"><span class="ts-icon"><i
                  class="fa-solid fa-phone"></i></span><span class="ts-text">+971524643034</span></a></li>
          <li><a href="mailto:info@towersuae.ae" class="h-bg-email3"><span class="ts-icon"><i
                  class="bi-envelope-fill"></i></span><span class="ts-text">info@towersuae.ae</span></a></li>
        </ul><!-- #top-social end -->

      </div>
    </div>

  </div>
</div>

<header id="header" class="full-header header-size-sm">
  <div id="header-wrap">
    <div class="container">
      <div class="header-row justify-content-lg-between">

        {{-- Logo--}}
        <div id="logo" class="col-lg-3 col-12">
          <a href="{{ route('front') }}">
            @if (App::getLocale()=='ar')
            <img class="logo-default " srcset="{{ url('imgs/logoar.png') }}" src="{{ url('imgs/logoar.png') }}"
              alt="Towers Logo">
            @else
            <img class="logo-default " srcset="{{ url('imgs/logo.png') }}" src="{{ url('imgs/logo.png') }}"
              alt="Towers Logo">
            @endif

          </a>
        </div>

        <div class="header-misc">

          {{-- Top Search--}}

          <div id="top-account">
            @guest()
            <a href="#modal-register" data-lightbox="inline">
              <i class="bi-person me-1 position-relative" style="top: 1px;"></i>
              <span
                class=" d-sm-inline-block d-lg-inline-block font-primary fw-medium">{{ __('front.Register') }}</span>
            </a>

            <a href="#modal-login" data-lightbox="inline">
              <i class="fal fa-sign-in me-1 position-relative" style="top: 1px;""></i>
              <span class=" d-sm-inline-block font-primary fw-medium">{{ __('front.Login') }}</span>
            </a>
            @endguest

            @auth()
            <a href="{{ route('home') }}">
              <i class="bi-person me-1 position-relative"></i>
              <span
                class="d-none d-sm-inline-block d-lg-inline-block font-primary fw-medium">{{ __('general.Dashboard') }}</span>
            </a>
            @endauth

          </div>


          {{-- Top Search--}}
          <div id="top-search" class="header-misc-icon">
            <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i class="bi-x-lg"></i></a>
          </div>

          <div><a href="{{ route('ad.choose') }}" class="btn btn-danger">{{ __('front.ADS') }}</a></div>

        </div>

        <div class="primary-menu-trigger">
          <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
            <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
          </button>
        </div>

        <!-- Primary Navigation
						============================================= -->
        <nav class="primary-menu style-3 menu-spacing-margin">

          <ul class="menu-container">
            <li class="menu-item">
              <a class="menu-link" href="{{ route('front') }}">
                <div>{{ __('front.Home') }}</div>
              </a>
            </li>

            <li class="menu-item">
              <a class="menu-link" href="{{ route('front.companies') }}">
                <div>{{ __('general.Companies') }}</div>
              </a>
              @if (sections()->count()>0)
              <ul class="sub-menu-container">
                @foreach (sections() as $section)
                <li class="menu-item">
                  <a class="menu-link" href="{{ route('front.companies.section',$section->id) }}">
                    <div>
                      @if (App::getLocale()=='ar')
                      {{ $section->name_ar }}
                      @else
                      {{ $section->name_en}}
                      @endif
                    </div>
                  </a>
                </li>
                @endforeach
              </ul>
              @endif
            </li>

            <li class="menu-item">
              <a class="menu-link" href="{{ route('front.project') }}">
                <div>{{ __('general.Projects') }}</div>
              </a>
              @if (projectCats()->count()>0)
              <ul class="sub-menu-container">
                @foreach (projectCats() as $p_Category)
                <li class="menu-item">
                  <a class="menu-link" href="{{ route('front.project.category',$p_Category->id) }}">
                    <div>
                      @if (App::getLocale()=='ar')
                      {{ $p_Category->name_ar }}
                      @else
                      {{ $p_Category->name_en}}
                      @endif
                    </div>
                  </a>
                </li>
                @endforeach
              </ul>
              @endif
            </li>

            <li class="menu-item">
              <a class="menu-link" href="{{ route('front.product') }}">
                <div>{{ __('general.Products') }}</div>
              </a>
              @if (productCats()->count()>0)
              <ul class="sub-menu-container">
                @foreach (productCats() as $pdt_Category)
                <li class="menu-item">
                  <a class="menu-link" href="{{ route('front.product.category',$pdt_Category->id) }}">
                    <div>
                      @if (App::getLocale()=='ar')
                      {{ $pdt_Category->name_ar }}
                      @else
                      {{ $pdt_Category->name_en }}
                      @endif
                    </div>
                  </a>
                </li>
                @endforeach
              </ul>
              @endif
            </li>

            <li class="menu-item">
              <a class="menu-link" href="{{ route('front.jobs') }}">
                <div>{{ __('general.Jobs') }}</div>
              </a>
            </li>

            <li class="menu-item">
              <a class="menu-link" href="{{ route('front.cvs') }}">
                <div>{{ __('general.CVs') }}</div>
              </a>
            </li>

            <li class="menu-item">
              <a class="menu-link" href="{{ route('front.videos') }}">
                <div>{{ __('general.Videos') }}</div>
              </a>
            </li>
          </ul>

        </nav>

        {{-- #primary-menu end --}}

        <form class="top-search-form" action="search.html" method="get">
          <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.."
            autocomplete="off">
        </form>



      </div>
    </div>
  </div>
  <div class="header-wrap-clone"></div>
</header>