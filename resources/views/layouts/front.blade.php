<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if (App::getLocale()=='ar' ) dir="rtl" @else dir="ltr"
    @endif>

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="SemiColonWeb">
    <meta name="description"
        content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today.">

    {{-- Font Imports --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Montserrat:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;1,300;1,400&display=swap"
        rel="stylesheet">

    {{-- Core Style --}}
    <link rel="stylesheet" href="{{ asset('front/style.css') }}">

    {{-- Font Icons --}}
    <link rel="stylesheet" href="{{ asset('front/css/font-icons.css') }}">

    {{-- Plugins/Components CSS --}}
    <link rel="stylesheet" href="{{ asset('front/css/swiper.css') }}">

    {{-- Niche Demos --}}
    <link rel="stylesheet" href="{{ asset('front/shop/shop.css') }}">

    @yield('page-style')

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">


    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Document Title--}}
    <title>@yield('page-title','Towers')</title>

    {{--Start of Tawk.to Script--}}
    {{--
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/63fa2a8831ebfa0fe7ef49c5/1gq4jccj4';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
    </script>
    --}}
    {{--End of Tawk.to Script--}}

    {{-- Google tag (gtag.js) --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GW1Y44G3ZV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-GW1Y44G3ZV');
    </script>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1058797884174611"
        crossorigin="anonymous"></script>

</head>

<body class="stretched">

    {{-- Document Wrapper--}}
    <div id="wrapper">

        @include('incs.frontNave')
        {{-- Header--}}

        @yield('page-content')

        {{-- Footer--}}
        <footer id="footer" class="dark">
            <div class="container">

                {{-- Footer Widgets--}}
                <div class="footer-widgets-wrap">

                    <div class="row col-mb-50">
                        <div class="col-lg-8">

                            <div class="row col-mb-50">
                                <div class="col-md-4">

                                    <div class="widget">

                                        @if (App::getLocale()=='ar')
                                        <img src="{{ url('imgs/logoar.png') }}" alt="Image" class="footer-logo">
                                        @else
                                        <img src="{{ url('imgs/logo.png') }}" alt="Image" class="footer-logo">
                                        @endif


                                        <p class="text-justify">
                                            {{__('front.It is your guide and platform to spread your business products
                                            and services and enable customers and users to communicate with each
                                            other')}}.
                                        </p>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="widget widget_links">

                                        <h4>{{ __('front.LATEST COMPANIES') }}</h4>

                                        <ul>
                                            @if (lastCompanies()->count()>0)
                                            @foreach (lastCompanies() as $lCompany)
                                            <li><a href="{{route('front.companies.single',$lCompany->id)}}">
                                                    @if (App::getLocale()=='ar')
                                                    {{ $lCompany->name_ar }}
                                                    @else
                                                    {{ $lCompany->name_en}}
                                                    @endif
                                                </a></li>
                                            @endforeach
                                            @endif

                                        </ul>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="widget widget_links">

                                        <h4>{{ __('front.LATEST PROJECTS') }}</h4>

                                        <ul>
                                            @if (lastProjects()->count()>0)
                                            @foreach (lastProjects() as $lProject)
                                            <li><a href="{{route('front.project.single',$lProject->id)}}">
                                                    @if (App::getLocale()=='ar')
                                                    {{ $lProject->name_ar }}
                                                    @else
                                                    {{ $lProject->name_en}}
                                                    @endif
                                                </a></li>
                                            @endforeach
                                            @endif

                                        </ul>

                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="row col-mb-50">
                                <div class="col-md-4 col-lg-12">
                                    <div class="widget">

                                        <div class="row col-mb-30">
                                            <div class="col-lg-6">
                                                <div class="counter counter-small"><span data-from="50"
                                                        data-to="15065421" data-refresh-interval="80" data-speed="3000"
                                                        data-comma="true"></span></div>
                                                <h5 class="mb-0">{{ __('general.Companies') }}</h5>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="counter counter-small"><span data-from="100" data-to="18465"
                                                        data-refresh-interval="50" data-speed="2000"
                                                        data-comma="true"></span></div>
                                                <h5 class="mb-0">{{ __('general.Projects') }}</h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-5 col-lg-12">
                                    <div class="widget subscribe-widget">
                                        <h5><strong>{{ __('general.Subscribe') }}</strong></h5>
                                        <div class="widget-subscribe-form-result"></div>
                                        <form id="widget-subscribe-form" action="" method="post" class="mb-0">
                                            <div class="input-group mx-auto">
                                                <div class="input-group-text"><i class="bi-envelope-plus"></i></div>
                                                <input type="email" id="widget-subscribe-form-email"
                                                    name="widget-subscribe-form-email"
                                                    class="form-control required email" placeholder="Enter your Email">
                                                <button class="btn btn-success" type="submit">{{ __('general.Subscribe')
                                                    }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-3 col-lg-12">
                                    <div class="widget">

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>{{-- .footer-widgets-wrap end --}}

            </div>

            {{-- Copyrights--}}
            <div id="copyrights">
                <div class="container">

                    <div class="row col-mb-30">

                        <div class="col-md-6 text-center text-md-start">
                            Copyrights &copy; 2023 All Rights Reserved .<br>
                            <div class="copyright-links"><a href="#">Towers UAE</a> / <a
                                    href="https://smart-solutions.live/">By-Smart-solutions Systems</a></div>
                        </div>

                        <div class="col-md-6 text-center text-md-end">
                            <div class="d-flex justify-content-center justify-content-md-end mb-2">
                                <a href="https://www.facebook.com/TowerSuae?ref=pages_you_manage"
                                    class="social-icon border-transparent si-small h-bg-facebook">
                                    <i class="fa-brands fa-facebook-f"></i>
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>

                                <a href="https://twitter.com/towersuae1"
                                    class="social-icon border-transparent si-small h-bg-twitter">
                                    <i class="fa-brands fa-twitter"></i>
                                    <i class="fa-brands fa-twitter"></i>
                                </a>

                                <a href="https://www.youtube.com/channel/UCw41ERkdumOzGr_C262Xsmw"
                                    class="social-icon border-transparent si-small h-bg-youtube">
                                    <i class="fa-brands fa-youtube"></i>
                                    <i class="fa-brands fa-youtube"></i>
                                </a>

                                <a href="https://www.linkedin.com/in/towers-uae-314b73240/"
                                    class="social-icon border-transparent si-small h-bg-linkedin">
                                    <i class="fa-brands fa-linkedin"></i>
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>

                                <a href="https://www.instagram.com/towersuae1/"
                                    class="social-icon border-transparent si-small h-bg-instagram">
                                    <i class="fa-brands fa-instagram"></i>
                                    <i class="fa-brands fa-instagram"></i>
                                </a>

                                <a href="https://wa.me/971524643034"
                                    class="social-icon border-transparent si-small h-bg-whatsapp">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>

                                <a href="mailto:info@towersuae.ae"
                                    class="social-icon border-transparent si-small h-bg-envelope">
                                    <i class="fa-brands fa-envelope"></i>
                                    <i class="fa-brands fa-envelope"></i>
                                </a>
                            </div>

                            <i class="bi-envelope"></i> info@towersuae.ae <span class="middot">&middot;</span dir="ltr">
                            <i class="fa-solid fa-phone"></i> +971524643034 <span class="middot">&middot;</span>

                        </div>

                    </div>

                </div>
            </div><!-- #copyrights end -->
        </footer>

    </div>

    {{-- Go To Top--}}
    <div id="gotoTop" class="bi-arrow-up"></div>

    {{-- JavaScripts--}}
    <script src="{{ asset('front/js/jquery.js') }}"></script>
    <script src="{{ asset('front/js/functions.js') }}"></script>

    @include('sweetalert::alert')

    @yield('page-scripts')

</body>

</html>