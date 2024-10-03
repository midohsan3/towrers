<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
  <base href="../">
  <meta charset="utf-8">
  <meta name="author" content="Towers">
  <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">
  <meta name="description" content="A powerful and conceptual apps base
      dashboard template that especially build for developers and programmers.">
  {{-- Fav Icon  --}}
  <link rel="shortcut icon" href="./images/favicon.png">

  {{-- CSRF Token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Page Title  --}}
  <title>@yield('title','Towers')</title>
  {{-- StyleSheets  --}}
  @if (App::getLocale()=='ar')
  <link rel="stylesheet" href="{{ asset('/assets/css/dashlite.rtl.css?ver=2.4.0') }}">
  @else
  <link rel="stylesheet" href="{{ asset('/assets/css/dashlite.css?ver=2.4.0') }}">
  @endif

  <link id="skin-default" rel="stylesheet" href="{{ asset('/assets/css/theme.css?ver=2.4.0') }}">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  @yield('page-Styles')

</head>

<body class="nk-body bg-lighter npc-default has-sidebar " @if (App::getLocale()=='ar' ) dir="rtl" @else dir="ltr"
  @endif>
  <div class="nk-app-root">
    {{-- main @s --}}
    <div class="nk-main ">
      {{-- sidebar @s --}}

      @if(Auth::user()->role_name=='Company')
      @include('incs.companySide')
      @elseif(Auth::user()->role_name=='Person')
      @include('incs.personSide')
      @else
      @include('incs.adminSide')
      @endif

      {{-- sidebar @e --}}
      {{-- wrap @s --}}
      <div class="nk-wrap ">
        {{-- main header @s --}}
        @include('incs.header')
        {{-- main header @e --}}

        {{-- content @s --}}
        @yield('content')
        {{-- content @e --}}

        {{-- footer @s --}}
        <div class="nk-footer">
          <div class="container-fluid">
            <div class="nk-footer-wrap">
              <div class="nk-footer-copyright"> &copy; 2023 Towers
                by <a href="https://smart-solutions.live" target="_blank">Smart-Solutions</a>
              </div>
              <div class="nk-footer-links">
                <ul class="nav nav-sm">
                  <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        {{-- footer @e --}}

      </div>

      {{-- wrap @e --}}
    </div>
    {{-- main @e --}}
  </div>
  {{-- app-root @e --}}
  {{-- JavaScript --}}
  <script src="{{ asset('/assets/js/bundle.js?ver=2.4.0') }}"></script>
  <script src="{{ asset('/assets/js/scripts.js?ver=2.4.0') }}"></script>


  @include('sweetalert::alert')

  @yield('scripts')
</body>

</html>