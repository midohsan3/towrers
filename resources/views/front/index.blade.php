<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=PT+Serif:ital@0;1&display=swap"
    rel="stylesheet">

  {{-- Core Style --}}
  <link rel="stylesheet" href="{{ asset('front/style.css') }}">

  {{-- Font Icons --}}
  <link rel="stylesheet" href="{{ asset('/front/css/font-icons.css') }}">

  {{-- Plugins/Components CSS --}}
  <link rel="stylesheet" href="{{ asset('/front/css/swiper.css') }}">

  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{ asset('/front/css/custom.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Document Title--}}
  <title>@yield('title','Towers')</title>

</head>

<body class="stretched">

  {{-- Document Wrapper--}}
  <div id="wrapper">

    {{-- Header--}}
    <header id="header" class="full-header">
      <div id="header-wrap">
        <div class="container">
          <div class="header-row">

            {{-- Logo--}}

            <div id="logo">
              <a href="index.html">
                <img class="logo-default" srcset="{{ url('imgs/logo.png') }}, {{ url('imgs/logo.png') }} 2x"
                  src="{{ url('imgs/logo.png') }}" alt="Towers-ae" />
                <img class="logo-dark" srcset="{{ url('imgs/logo.png') }},{{url('imgs/logo.png')}} 2x"
                  src="{{ url('imgs/log.png') }}" alt="Towers-ae">
              </a>
            </div>{{-- #logo end --}}

            <div class="header-misc">

              {{-- Top Search--}}
              <div id="top-search" class="header-misc-icon">
                <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i class="bi-x-lg"></i></a>
              </div>{{-- #top-search end --}}

              {{-- Top Cart--}}
              <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                <a href="#" id="top-cart-trigger"><i class="uil uil-shopping-bag"></i><span
                    class="top-cart-number">5</span></a>
                <div class="top-cart-content">
                  <div class="top-cart-title">
                    <h4>Shopping Cart</h4>
                  </div>
                  <div class="top-cart-items">
                    <div class="top-cart-item">
                      <div class="top-cart-item-image">
                        <a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt"></a>
                      </div>
                      <div class="top-cart-item-desc">
                        <div class="top-cart-item-desc-title">
                          <a href="#">Blue Round-Neck Tshirt with a Button</a>
                          <span class="top-cart-item-price d-block">$19.99</span>
                        </div>
                        <div class="top-cart-item-quantity">x 2</div>
                      </div>
                    </div>
                    <div class="top-cart-item">
                      <div class="top-cart-item-image">
                        <a href="#"><img src="images/shop/small/6.jpg" alt="Light Blue Denim Dress"></a>
                      </div>
                      <div class="top-cart-item-desc">
                        <div class="top-cart-item-desc-title">
                          <a href="#">Light Blue Denim Dress</a>
                          <span class="top-cart-item-price d-block">$24.99</span>
                        </div>
                        <div class="top-cart-item-quantity">x 3</div>
                      </div>
                    </div>
                  </div>
                  <div class="top-cart-action">
                    <span class="top-checkout-price">$114.95</span>
                    <a href="#" class="button button-3d button-small m-0">View Cart</a>
                  </div>
                </div>
              </div>{{-- #top-cart end --}}

            </div>

            <div class="primary-menu-trigger">
              <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
              </button>
            </div>

            {{-- Primary Navigation--}}

            <nav class="primary-menu">

              <ul class="menu-container">
                <li class="menu-item">
                  <a class="menu-link" href="index.html">
                    <div>Home</div>
                  </a>
                  <ul class="sub-menu-container">
                    <li class="menu-item">
                      <a class="menu-link" href="intro.html#section-niche">
                        <div>Niche Demos</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="intro.html#section-onepage">
                        <div>One-Page Demos</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="index-corporate.html">
                        <div>Home - Corporate</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="index-corporate.html">
                            <div>Corporate - Layout 1</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-corporate-2.html">
                            <div>Corporate - Layout 2</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-corporate-3.html">
                            <div>Corporate - Layout 3</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-corporate-4.html">
                            <div>Corporate - Layout 4</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="index-portfolio.html">
                        <div>Home - Portfolio</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="index-portfolio.html">
                            <div>Portfolio - Layout 1</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-portfolio-2.html">
                            <div>Portfolio - Layout 2</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-portfolio-3.html">
                            <div>Portfolio - Masonry</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-portfolio-4.html">
                            <div>Portfolio - AJAX</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="index-blog.html">
                        <div>Home - Blog</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="index-blog.html">
                            <div>Blog - Layout 1</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-blog-2.html">
                            <div>Blog - Layout 2</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-blog-3.html">
                            <div>Blog - Layout 3</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="index-shop.html">
                        <div>Home - Shop</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="index-shop.html">
                            <div>Shop - Layout 1</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-shop-2.html">
                            <div>Shop - Layout 2</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="index-magazine.html">
                        <div>Home - Magazine</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="index-magazine.html">
                            <div>Magazine - Layout 1</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-magazine-2.html">
                            <div>Magazine - Layout 2</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-magazine-3.html">
                            <div>Magazine - Layout 3</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="landing.html">
                        <div>Home - Landing Page</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="landing.html">
                            <div>Landing Page - Layout 1</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="landing-2.html">
                            <div>Landing Page - Layout 2</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="landing-3.html">
                            <div>Landing Page - Layout 3</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="landing-4.html">
                            <div>Landing Page - Layout 4</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="landing-5.html">
                            <div>Landing Page - Layout 5</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="index-fullscreen-image.html">
                        <div>Home - Full Screen</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="index-fullscreen-image.html">
                            <div>Full Screen - Image</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-fullscreen-slider.html">
                            <div>Full Screen - Slider</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-fullscreen-video.html">
                            <div>Full Screen - Video</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="index-onepage.html">
                        <div>Home - One Page</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="index-onepage.html">
                            <div>One Page - Default</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-onepage-2.html">
                            <div>One Page - Submenu</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="index-onepage-3.html">
                            <div>One Page - Dots Style</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item mega-menu mega-menu-small">
                      <a class="menu-link" href="#">
                        <div>Extras</div>
                      </a>
                      <div class="mega-menu-content">
                        <div class="row mx-0">
                          <ul class="sub-menu-container mega-menu-column col">
                            <li class="menu-item">
                              <a class="menu-link" href="index-wedding.html">
                                <div>Wedding</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="index-restaurant.html">
                                <div>Restaurant</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="index-events.html">
                                <div>Events</div>
                              </a>
                            </li>
                          </ul>
                          <ul class="sub-menu-container mega-menu-column col">
                            <li class="menu-item">
                              <a class="menu-link" href="index-parallax.html">
                                <div>Parallax</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="index-app-showcase.html">
                                <div>App Showcase</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="index-boxed.html">
                                <div>Boxed Layout</div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="#">
                    <div>Features</div>
                  </a>
                  <ul class="sub-menu-container">
                    <li class="menu-item">
                      <a class="menu-link" href="#">
                        <div><i class="bi-hypnotize"></i>Sliders</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="slider-revolution.html">
                            <div>Revolution Slider</div>
                          </a>
                          <ul class="sub-menu-container">
                            <li class="menu-item">
                              <a class="menu-link" href="rs-demos.html">
                                <div>Premium Templates</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-revolution.html">
                                <div>Full Screen</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-revolution-fullwidth.html">
                                <div>Full Width</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-revolution-kenburns.html">
                                <div>Kenburns Effect</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-revolution-html5-videos.html">
                                <div>HTML5 Video</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="slider-canvas.html">
                            <div>Canvas Slider</div>
                          </a>
                          <ul class="sub-menu-container">
                            <li class="menu-item">
                              <a class="menu-link" href="slider-canvas.html">
                                <div>Full Width</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-canvas-fade.html">
                                <div>Fade Transition</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-canvas-autoplay.html">
                                <div>Autoplay Feature</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-canvas-video-event.html">
                                <div>Custom Video Event</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-canvas-pagination.html">
                                <div>Pagination Navigation</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-canvas-3.html">
                                <div>3 Columns</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-canvas-4.html">
                                <div>4 Columns</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-canvas-5.html">
                                <div>5 Columns</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="slider-flex.html">
                            <div>Flex Slider</div>
                          </a>
                          <ul class="sub-menu-container">
                            <li class="menu-item">
                              <a class="menu-link" href="slider-flex.html">
                                <div>Default Layout</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-flex-thumbs.html">
                                <div>with Thumbs</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="slider-owl.html">
                            <div>Owl Slider</div>
                          </a>
                          <ul class="sub-menu-container">
                            <li class="menu-item">
                              <a class="menu-link" href="slider-owl-full.html">
                                <div>Full Width</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-owl.html">
                                <div>Boxed Width</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="slider-owl-videos.html">
                                <div>Video Slider</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="static-parallax.html">
                            <div>Static Media</div>
                          </a>
                          <ul class="sub-menu-container">
                            <li class="menu-item">
                              <a class="menu-link" href="static-parallax.html">
                                <div>Static - Parallax</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="static-image.html">
                                <div>Static - Image</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="static-thumbs-grid.html">
                                <div>Static - Thumb Gallery</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="static-html5-video.html">
                                <div>Static - HTML5 Video</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="static-embed-video.html">
                                <div>Static - Embedded Video</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="#">
                        <div><i class="bi-menu-button-wide-fill"></i>Headers</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="header-light.html">
                            <div>Light Version</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="header-dark.html">
                            <div>Dark Version</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="header-transparent.html">
                            <div>Transparent</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="header-semi-transparent.html">
                            <div>Semi Transparent</div>
                          </a>
                          <ul class="sub-menu-container">
                            <li class="menu-item">
                              <a class="menu-link" href="header-semi-transparent.html">
                                <div>Light Version</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="header-semi-transparent-dark.html">
                                <div>Dark Version</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="header-side-left.html">
                            <div>Left Side Header</div>
                          </a>
                          <ul class="sub-menu-container">
                            <li class="menu-item">
                              <a class="menu-link" href="header-side-left.html">
                                <div>Fixed Position</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="header-side-left-open.html">
                                <div>OnClick Open</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="header-side-left-open-push.html">
                                <div>Push Content</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="header-side-right.html">
                            <div>Right Side Header</div>
                          </a>
                          <ul class="sub-menu-container">
                            <li class="menu-item">
                              <a class="menu-link" href="header-side-right.html">
                                <div>Fixed Position</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="header-side-right-open.html">
                                <div>OnClick Open</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="header-side-right-open-push.html">
                                <div>Push Content</div>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="header-floating.html">
                            <div>Floating Version</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="static-sticky.html">
                            <div>Static Sticky</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="responsive-sticky.html">
                            <div>Responsive Sticky</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="logo-changer.html">
                            <div>Alternate Logos</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="alternate-mobile-menu.html">
                            <div>Alternate Mobile Menu</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item mega-menu mega-menu-small">
                      <a class="menu-link" href="#">
                        <div><i class="bi-border-style"></i>Menu Styles</div>
                      </a>
                      <div class="mega-menu-content">
                        <div class="row mx-0">
                          <ul class="sub-menu-container mega-menu-column col">
                            <li class="menu-item">
                              <a class="menu-link" href="header-light.html">
                                <div>Default Layout</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="menu-2.html">
                                <div>Alternate Layout</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="menu-3.html">
                                <div>Pill Style</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="menu-4.html">
                                <div>Border Style</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="menu-5.html">
                                <div>Large Icon Menu</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="split-menu.html">
                                <div>Split Layout</div>
                              </a>
                            </li>
                          </ul>
                          <ul class="sub-menu-container mega-menu-column col">
                            <li class="menu-item">
                              <a class="menu-link" href="menu-6.html">
                                <div>Scaling Border</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="menu-subtitle.html">
                                <div>Sub-Title Menu</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="menu-7.html">
                                <div>Extended Menu 1</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="menu-8.html">
                                <div>Extended Menu 2</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="menu-9.html">
                                <div>Extended Menu 3</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="menu-10.html">
                                <div>Overlay Menu</div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="mega-menu.html">
                        <div><i class="bi-layout-split"></i>Mega Menu</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="mega-menu.html">
                            <div>Widgetized</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="mega-menu-full.html">
                            <div>Full-Width</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="mega-menu-tab.html">
                            <div>Tabbed</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="mega-menu-side-tab.html">
                            <div>Side-Tabs (onClick)</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="forms.html">
                        <div><i class="bi-postcard"></i>Forms</div>
                      </a>
                    </li>
                    <li class="menu-item mega-menu mega-menu-small">
                      <a class="menu-link" href="widgets.html">
                        <div><i class="bi-boxes"></i>Widgets</div>
                      </a>
                      <div class="mega-menu-content">
                        <div class="row mx-0">
                          <ul class="sub-menu-container mega-menu-column col">
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Links</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Flickr Photostream</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Dribbble Shots</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Subscribers</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Posts List</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Twitter Feed</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Tabbed Widgets</div>
                              </a>
                            </li>
                          </ul>
                          <ul class="sub-menu-container mega-menu-column col">
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Carousel</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Social Icons</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Testimonials</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Quick Contact</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Tags Cloud</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Video Embeds</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="widgets.html">
                                <div>Raw HTML</div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="menu-item mega-menu mega-menu-small">
                      <a class="menu-link" href="#">
                        <div><i class="bi-textarea-t"></i>Page Titles</div>
                      </a>
                      <div class="mega-menu-content">
                        <div class="row mx-0">
                          <ul class="sub-menu-container mega-menu-column col-5">
                            <li class="menu-item">
                              <a class="menu-link" href="page.html">
                                <div>Left Align</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="page-title-right.html">
                                <div>Right Align</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="page-title-center.html">
                                <div>Center Align</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="page-title-dark.html">
                                <div>Dark Style</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="page-title-pattern.html">
                                <div>BG Pattern</div>
                              </a>
                            </li>
                          </ul>
                          <ul class="sub-menu-container mega-menu-column col-7">
                            <li class="menu-item">
                              <a class="menu-link" href="page-title-parallax.html">
                                <div>Parallax - Default</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="page-title-parallax-header.html">
                                <div>Parallax - Transparent</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="page-title-video.html">
                                <div>HTML5 Video</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="page-title-nobg.html">
                                <div>No Background</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="page-title-mini.html">
                                <div>Mini Version</div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="side-panel.html">
                        <div><i class="bi-layout-sidebar-inset-reverse"></i>Side Panel</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="side-panel-left-overlay.html">
                            <div>Left Overlay</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="side-panel-left-push.html">
                            <div>Left Push</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="side-panel-right-overlay.html">
                            <div>Right Overlay</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="side-panel.html">
                            <div>Right Push</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="side-panel-light.html">
                            <div>Light Background</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="modal-onload.html">
                        <div><i class="bi-front"></i>Modal OnLoad</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="modal-onload.html">
                            <div>Default Layout</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="modal-onload-iframe.html">
                            <div>Video iFrame</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="modal-onload-subscribe.html">
                            <div>Subscription Form</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="modal-onload-common-height.html">
                            <div>Common Height</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="modal-onload-cookie.html">
                            <div>Cookies Enabled</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item mega-menu mega-menu-small">
                      <a class="menu-link" href="#footer" data-scrollto="#footer">
                        <div><i class="bi-layer-forward"></i>Footers</div>
                      </a>
                      <div class="mega-menu-content">
                        <div class="row mx-0">
                          <ul class="sub-menu-container mega-menu-column col">
                            <li class="menu-item">
                              <a class="menu-link" href="sticky-footer.html">
                                <div>Sticky</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="#footer" data-scrollto="#footer">
                                <div>Layout 1</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="footer-2.html#footer">
                                <div>Layout 2</div>
                              </a>
                            </li>
                          </ul>
                          <ul class="sub-menu-container mega-menu-column col">
                            <li class="menu-item">
                              <a class="menu-link" href="footer-3.html#footer">
                                <div>Layout 3</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="footer-4.html#footer">
                                <div>Layout 4</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="footer-5.html#footer">
                                <div>Layout 5</div>
                              </a>
                            </li>
                          </ul>
                          <ul class="sub-menu-container mega-menu-column col">
                            <li class="menu-item">
                              <a class="menu-link" href="footer-6.html#footer">
                                <div>Layout 6</div>
                              </a>
                            </li>
                            <li class="menu-item">
                              <a class="menu-link" href="footer-7.html#footer">
                                <div>Layout 7</div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="menu-item mega-menu">
                  <a class="menu-link" href="#">
                    <div>Pages</div>
                  </a>
                  <div class="mega-menu-content mega-menu-style-2">
                    <div class="container">
                      <div class="row">
                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Introductory</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="about.html">
                                  <div>About Us</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="about.html">
                                      <div>Main Layout</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="about-2.html">
                                      <div>Alternate Layout</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="about-me.html">
                                      <div>About Me</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="team.html">
                                      <div>Team Members</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="gdpr.html">
                                  <div>GDPR Compliance</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="gdpr.html">
                                      <div>Default</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="gdpr-small.html">
                                      <div>Small</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="jobs.html">
                                  <div>Careers</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="profile.html">
                                  <div>User Profile</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Utility &amp; Specials</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="services.html">
                                  <div><i class="bi-asterisk"></i>Services Pages</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="services.html">
                                      <div>Layout 1</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="services-2.html">
                                      <div>Layout 2</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="services-3.html">
                                      <div>Layout 3</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="#">
                                  <div><i class="bi-calendar"></i>Events</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="events-list.html">
                                      <div>Events List</div>
                                    </a>
                                    <ul class="sub-menu-container mega-menu-dropdown">
                                      <li class="menu-item">
                                        <a class="menu-link" href="events-list.html">
                                          <div>Right Sidebar</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="events-list-left-sidebar.html">
                                          <div>Left Sidebar</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="events-list-both-sidebar.html">
                                          <div>Both Sidebar</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="events-list-fullwidth.html">
                                          <div>Full Width</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="events-list-parallax.html">
                                          <div>Parallax List</div>
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="event-single.html">
                                      <div>Single Event</div>
                                    </a>
                                    <ul class="sub-menu-container mega-menu-dropdown">
                                      <li class="menu-item">
                                        <a class="menu-link" href="event-single-right-sidebar.html">
                                          <div>Right Sidebar</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="event-single-left-sidebar.html">
                                          <div>Left Sidebar</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="event-single-both-sidebar.html">
                                          <div>Both Sidebar</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="event-single.html">
                                          <div>Full Width</div>
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="event-single-full-width-image.html">
                                      <div>Single Event - Full</div>
                                    </a>
                                    <ul class="sub-menu-container mega-menu-dropdown">
                                      <li class="menu-item">
                                        <a class="menu-link" href="event-single-full-width-image.html">
                                          <div>Parallax Image</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="event-single-full-width-map.html">
                                          <div>Google Map</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="event-single-full-width-slider.html">
                                          <div>Slider Gallery</div>
                                        </a>
                                      </li>
                                      <li class="menu-item">
                                        <a class="menu-link" href="event-single-full-width-video.html">
                                          <div>HTML5 Video</div>
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="events-calendar.html">
                                      <div>Full Width Calendar</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="contact.html">
                                  <div><i class="bi-envelope-at"></i>Contact Pages</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="contact.html">Main Layout</a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="contact-2.html">Grid Layout</a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="contact-3.html">Right Sidebar</a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="contact-4.html">Both Sidebars</a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="contact-5.html">Modal Form</a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="contact-6.html">Form Overlay</a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="contact-7.html">Form Overlay Mini</a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="faqs.html">
                                  <div><i class="bi-question-circle"></i>FAQs Pages</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="faqs.html">
                                      <div>Layout 1</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="faqs-2.html">
                                      <div>Layout 2</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="faqs-3.html">
                                      <div>Layout 3</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="faqs-4.html">
                                      <div>Layout 4</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Layouts &amp; PageNavs</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="full-width.html">
                                  <div>Full Width</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="full-width.html">
                                      <div>Default Width</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="full-width-wide.html">
                                      <div>Wide Width</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="#">
                                  <div>Sidebars</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="right-sidebar.html">
                                      <div>Right Sidebar</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="left-sidebar.html">
                                      <div>Left Sidebar</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="both-sidebar.html">
                                      <div>Both Sidebar</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="both-right-sidebar.html">
                                      <div>Both Right Sidebar</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="both-left-sidebar.html">
                                      <div>Both Left Sidebar</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="page-submenu.html">
                                  <div>Page Submenu</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="side-navigation.html">
                                  <div>Side Navigation</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Miscellaneous</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="login-register.html">
                                  <div>Login/Register</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="login-register.html">
                                      <div>Default Layout</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="login-register-2.html">
                                      <div>Tabbed Login</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="login-register-3.html">
                                      <div>Login Accordion</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="login-1.html">
                                      <div>Dark BG Login</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="login-2.html">
                                      <div>Image BG Login</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="coming-soon.html">
                                  <div>Coming Soon</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="coming-soon.html">
                                      <div>Default Layout</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="coming-soon-2.html">
                                      <div>Parallax Image</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="coming-soon-3.html">
                                      <div>HTML5 Video</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="404.html">
                                  <div>404 Pages</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="404.html">
                                      <div>Default Layout</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="404-2.html">
                                      <div>Parallax Image</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="404-3.html">
                                      <div>HTML5 Video</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="#">
                                  <div>Extras</div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown">
                                  <li class="menu-item">
                                    <a class="menu-link" href="blank-page.html">
                                      <div>Blank Page</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="maintenance.html">
                                      <div>Maintenance Page</div>
                                    </a>
                                  </li>
                                  <li class="menu-item">
                                    <a class="menu-link" href="sitemap.html">
                                      <div>Sitemap</div>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="menu-item mega-menu">
                  <a class="menu-link" href="#">
                    <div>Portfolio</div>
                  </a>
                  <div class="mega-menu-content mega-menu-style-2">
                    <div class="container">
                      <div class="row">
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Grids</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-1.html">
                                  <div>1 Column</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-2.html">
                                  <div>2 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-3.html">
                                  <div>3 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio.html">
                                  <div>4 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-5.html">
                                  <div>5 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-6.html">
                                  <div>6 Columns</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Masonry</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-mixed-masonry.html">
                                  <div>Mixed Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-2-masonry.html">
                                  <div>2 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-3-masonry.html">
                                  <div>3 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-masonry.html">
                                  <div>4 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-5-masonry.html">
                                  <div>5 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-6-masonry.html">
                                  <div>6 Columns</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Loading Styles</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio.html">
                                  <div>jQuery Filter</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-jpagination.html">
                                  <div>jQuery Pagination</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-infinity-scroll.html">
                                  <div>Infinity Scroll</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-ajax.html">
                                  <div>AJAX In Page</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-ajax-in-modal.html">
                                  <div>AJAX In Modal</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-filter-styles.html">
                                  <div>Filter Styles</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Single Project</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-single-extended.html">
                                  <div>Extended Item</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-single-fullwidth.html">
                                  <div>Parallax Image</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-single-gallery-full.html">
                                  <div>Slider Gallery</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-single-video-fullwidth-left-sidebar.html">
                                  <div>HTML5 Video</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-single-thumbs-right-sidebar.html">
                                  <div>Masonry Thumbs</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-single-video-both-sidebar.html">
                                  <div>Embed Video</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Layouts</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-nomargin.html">
                                  <div>Default</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-1-alt-right-sidebar.html">
                                  <div>Right Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-3-left-sidebar.html">
                                  <div>Left Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-2-both-sidebar.html">
                                  <div>Both Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-fullwidth-notitle.html">
                                  <div>100% Width</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="portfolio-parallax.html">
                                  <div>Parallax</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="menu-item mega-menu">
                  <a class="menu-link" href="#">
                    <div>Blog</div>
                  </a>
                  <div class="mega-menu-content mega-menu-style-2">
                    <div class="container">
                      <div class="row">
                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Default</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="blog.html">
                                  <div>Right Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-left-sidebar.html">
                                  <div>Left Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-both-sidebar.html">
                                  <div>Both Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-full-width.html">
                                  <div>Full Width</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Timeline</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="blog-timeline-right-sidebar.html">
                                  <div>Right Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-timeline-left-sidebar.html">
                                  <div>Left Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-timeline.html">
                                  <div>Full Width</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Masonry</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="blog-masonry.html">
                                  <div>4 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-masonry-3.html">
                                  <div>3 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-masonry-2.html">
                                  <div>2 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-masonry-full.html">
                                  <div>100% Width</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Grid</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="blog-grid.html">
                                  <div>4 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-grid-3.html">
                                  <div>3 Columns</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-grid-2.html">
                                  <div>2 Columns</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Small Thumbs</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="blog-small-left-sidebar.html">
                                  <div>Left Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-small.html">
                                  <div>Right Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-small-both-sidebar.html">
                                  <div>Both Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-small-full-width.html">
                                  <div>Full Width</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-small-alt.html">
                                  <div>Alternate Layout</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Item Splitting</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="blog-grid.html">
                                  <div>Pagination</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-masonry.html">
                                  <div>Infinite Scroll</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Single</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="blog-single.html">
                                  <div>Default Layout</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-single-left-sidebar.html">
                                  <div>Left Sidebar</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-single-full.html">
                                  <div>Full Width</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-single-small.html">
                                  <div>Small Image</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-single-split-right-sidebar.html">
                                  <div>Split Layout</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                          <li class="menu-item mega-menu-title">
                            <a class="menu-link" href="#">
                              <div>Comments Module</div>
                            </a>
                            <ul class="sub-menu-container">
                              <li class="menu-item">
                                <a class="menu-link" href="blog-single-left-sidebar.html#comments">
                                  <div>Facebook Comments</div>
                                </a>
                              </li>
                              <li class="menu-item">
                                <a class="menu-link" href="blog-single-small.html#comments">
                                  <div>Disqus Comments</div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="menu-item">
                  <a class="menu-link" href="shop.html">
                    <div>Shop</div>
                  </a>
                  <ul class="sub-menu-container">
                    <li class="menu-item">
                      <a class="menu-link" href="shop.html">
                        <div>4 Columns</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="shop-3.html">
                        <div>3 Columns</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="shop-3.html">
                            <div>Full Width</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-3-right-sidebar.html">
                            <div>Right Sidebar</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-3-left-sidebar.html">
                            <div>Left Sidebar</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="shop-2.html">
                        <div>2 Columns</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="shop-2-right-sidebar.html">
                            <div>Right Sidebar</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-2-left-sidebar.html">
                            <div>Left Sidebar</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-2-both-sidebar.html">
                            <div>Both Sidebar</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="shop-1.html">
                        <div>1 Columns</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="shop-1.html">
                            <div>Full Width</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-1-right-sidebar.html">
                            <div>Right Sidebar</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-1-left-sidebar.html">
                            <div>Left Sidebar</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-1-both-sidebar.html">
                            <div>Both Sidebar</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="shop-category-parallax.html">
                        <div>Categories - Parallax</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="shop-combination-filter.html">
                        <div>Combination Filter</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="shop-single.html">
                        <div>Single Product</div>
                      </a>
                      <ul class="sub-menu-container">
                        <li class="menu-item">
                          <a class="menu-link" href="shop-single.html">
                            <div>Full Width</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-single-right-sidebar.html">
                            <div>Right Sidebar</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-single-left-sidebar.html">
                            <div>Left Sidebar</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-single-both-sidebar.html">
                            <div>Both Sidebar</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-single-color.html">
                            <div>Color Options</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-single-sticky.html">
                            <div>Sticky Aside</div>
                          </a>
                        </li>
                        <li class="menu-item">
                          <a class="menu-link" href="shop-single-list.html">
                            <div>Feature List</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="cart.html">
                        <div>Cart</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a class="menu-link" href="checkout.html">
                        <div>Checkout</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item mega-menu">
                  <a class="menu-link" href="#">
                    <div>Shortcodes</div>
                  </a>
                  <div class="mega-menu-content">
                    <div class="container">
                      <div class="row">
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item">
                            <a class="menu-link" href="animations.html">
                              <div><i class="bi-magic"></i>Animations</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="buttons.html">
                              <div><i class="bi-square"></i>Buttons</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="carousel.html">
                              <div><i class="bi-arrow-left-right"></i>Carousel</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="charts.html">
                              <div><i class="bi-graph-up-arrow"></i>Charts</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="clients.html">
                              <div><i class="bi-grip-horizontal"></i>Clients</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="columns-grids.html">
                              <div><i class="bi-grid-1x2"></i>Columns</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="counters.html">
                              <div><i class="bi-clock-history"></i>Counters</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="read-more.html">
                              <div><i class="bi-three-dots"></i>Read More<span class="visually-hidden"> Shortcode</span>
                              </div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="component-datatable.html">
                              <div><i class="bi-table"></i>Data Tables</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="component-datepicker.html">
                              <div><i class="bi-calendar-plus"></i>Date &amp; Time Pickers</div>
                            </a>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item">
                            <a class="menu-link" href="dividers.html">
                              <div><i class="bi-hr"></i>Dividers</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="featured-boxes.html">
                              <div><i class="bi-lightbulb"></i>Icon Boxes</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="gallery.html">
                              <div><i class="bi-images"></i>Galleries</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="headings-dropcaps.html">
                              <div><i class="bi-type-h1"></i>Heading Styles</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="icon-lists.html">
                              <div><i class="bi-list-stars"></i>Icon Lists</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="gradients.html">
                              <div><i class="bi-droplet-half"></i>Gradients</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="lightbox.html">
                              <div><i class="bi-pip"></i>Lightbox</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="item-overlays.html">
                              <div><i class="bi-border-outer"></i>Item Overlays</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="form-elements.html">
                              <div><i class="bi-input-cursor-text"></i>Form Elements</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="component-uploads.html">
                              <div><i class="bi-upload"></i>File Uploads</div>
                            </a>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item">
                            <a class="menu-link" href="lists-cards.html">
                              <div><i class="bi-card-list"></i>Lists &amp; Cards</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="maps.html">
                              <div><i class="bi-geo-fill"></i>Maps</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="media-embeds.html">
                              <div><i class="bi-collection-play"></i>Media Embeds</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="modal-popovers.html">
                              <div><i class="bi-subtract"></i>Modal Boxes</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="navigation.html">
                              <div><i class="bi-list"></i>Navigations</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="pagination-progress.html">
                              <div><i class="bi-123"></i>Pagination</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="pie-skills.html">
                              <div><i class="bi-pie-chart"></i>Pies &amp; Skills</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="shape-dividers.html">
                              <div><i class="bi-circle-square"></i>Shape Dividers</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="component-range-slider.html">
                              <div><i class="bi-sliders"></i>Range Slider</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="component-ratings.html">
                              <div><i class="bi-star-half"></i>Star Ratings</div>
                            </a>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item">
                            <a class="menu-link" href="pricing.html">
                              <div><i class="bi-currency-dollar"></i>Pricing Boxes</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="process-steps.html">
                              <div><i class="bi-bar-chart-steps"></i>Process Steps</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="promo-boxes.html">
                              <div><i class="bi-card-heading"></i>Promo Boxes</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="quotes-blockquotes.html">
                              <div><i class="bi-blockquote-left"></i>Blockquotes</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="responsive.html">
                              <div><i class="bi-display"></i>Responsive</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="sections.html">
                              <div><i class="bi-window-desktop"></i>Sections</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="social-icons.html">
                              <div><i class="bi-instagram"></i>Social Icons</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="hover-animations.html">
                              <div><i class="bi-hand-index-thumb"></i>Hover Animations</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="component-select-picker.html">
                              <div><i class="bi-menu-button"></i>Select Picker</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="component-select-box.html">
                              <div><i class="bi-layout-three-columns"></i>Select Boxes</div>
                            </a>
                          </li>
                        </ul>
                        <ul class="sub-menu-container mega-menu-column col">
                          <li class="menu-item">
                            <a class="menu-link" href="style-boxes.html">
                              <div><i class="bi-exclamation-circle"></i>Alert Boxes</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="styled-icons.html">
                              <div><i class="bi-flower2"></i>Styled Icons</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="tables.html">
                              <div><i class="bi-table"></i>Tables</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="tabs.html">
                              <div><i class="bi-segmented-nav"></i>Tabs</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="testimonials-twitter.html">
                              <div><i class="bi-chat-left-quote"></i>Testimonials</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="thumbnails-slider.html">
                              <div><i class="bi-image"></i>Thumbnails</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="toggles-accordions.html">
                              <div><i class="bi-caret-down-square"></i>Toggles</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="lazy-loading.html">
                              <div><i class="fa-solid fa-spinner"></i>Lazy Loading</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="component-radios-switches.html">
                              <div><i class="bi-toggle-off"></i>Radios &amp; Switches</div>
                            </a>
                          </li>
                          <li class="menu-item">
                            <a class="menu-link" href="flip-cards.html">
                              <div><i class="bi-arrow-repeat"></i>Flip Cards</div>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>

            </nav>{{-- #primary-menu end --}}

            <form class="top-search-form" action="search.html" method="get">
              <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.."
                autocomplete="off">
            </form>

          </div>
        </div>
      </div>
      <div class="header-wrap-clone"></div>
    </header>{{-- #header end --}}

    <section id="slider" class="slider-element slider-parallax swiper_wrapper vh-75">
      <div class="slider-inner">

        <div class="swiper-container swiper-parent">
          <div class="swiper-wrapper">
            <div class="swiper-slide dark">
              <div class="container">
                <div class="slider-caption slider-caption-center">
                  <h2 data-animate="fadeInUp">Welcome to Canvas</h2>
                  <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Create just what you need for
                    your Perfect Website. Choose from a wide range of Elements &amp; simply put them on our Canvas.</p>
                </div>
              </div>
              <div class="swiper-slide-bg" style="background-image: url('{{ url('imgs/slider/1.jpg') }}');"></div>
            </div>
            <div class="swiper-slide dark">
              <div class="container">
                <div class="slider-caption slider-caption-center">
                  <h2 data-animate="fadeInUp">Beautifully Flexible</h2>
                  <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Looks beautiful &amp;
                    ultra-sharp on Retina Screen Displays. Powerful Layout with Responsive functionality that can be
                    adapted to any screen size.</p>
                </div>
              </div>
              <div class="video-wrap no-placeholder">
                <video poster="images/videos/explore-poster.jpg" preload="auto" loop autoplay muted playsinline>
                  <source src='{{ url('imgs/videos/explore.mp4') }}' type='video/mp4'>
                  <source src='{{ url('imgs/videos/explore.webm') }}' type='video/webm'>
                </video>
                <div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="container">
                <div class="slider-caption">
                  <h2 data-animate="fadeInUp">Great Performance</h2>
                  <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Youll be surprised to see the
                    Final Results of your Creation &amp; would crave for more.</p>
                </div>
              </div>
              <div class="swiper-slide-bg"
                style="background-image: url('{{ url('imgs/slider/3.jpg') }}'); background-position: center top;"></div>
            </div>
          </div>
          <div class="slider-arrow-left"><i class="uil uil-angle-left-b"></i></div>
          <div class="slider-arrow-right"><i class="uil uil-angle-right-b"></i></div>/div>
          <div class="slide-number">
            <div class="slide-number-current"></div><span>/</span>
            <div class="slide-number-total"></div>
          </div>
        </div>

      </div>
    </section>

    {{-- Content--}}

    <section id="content">
      <div class="content-wrap">

        <div class="promo promo-light promo-full mb-6 header-stick border-top-0 p-5">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-12 col-lg">
                <h3>Try Premium Free for <span>30 Days</span> and youll never regret it!</h3>
                <span>Starts at just <em>$0/month</em> afterwards. No Ads, No Gimmicks and No SPAM. Just Real
                  Content.</span>
              </div>
              <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                <a href="#" class="button button-large button-circle m-0">Start Trial</a>
              </div>
            </div>
          </div>
        </div>

        <div class="container">


          <div class="section bg-transparent" style="padding: 60px 0 40px;">
            <div class="container">

              <div class="heading-block border-bottom-0 mb-5 text-center">
                <h3>Most Popular Instructors</h3>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla natus mollitia ipsum.
                  Voluptatibus,
                  perspiciatis placeat.</span>
              </div>

              <div class="clear"></div>

              <div class="row">

                <!-- Instructors 1
          							============================================= -->
                @if ($companies->count()>0)
                @foreach ($companies as $company)
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
                    <div class="fbox-icon">
                      <i><img src="{{ url('storage/app/public/imgs/users/'.$company->userCompany->profile_pic) }}"
                          class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
                    </div>
                    <div class="fbox-content">
                      <h3 class="mb-4 text-transform-none ls-0"><a href="{{ route('front.company',$company->id) }}"
                          class="text-dark">Dylan
                          Meringue</a><br><small
                          class="subtitle text-transform-none color">{{ $company->name_en }}</small>
                      </h3>
                      <p class="text-dark"><strong>2342</strong> Students</p>
                      <p class="text-dark mt-0"><strong>23</strong> Courses</p>
                    </div>
                  </div>
                </div>
                @endforeach
                @endif


                <!-- Instructors 2
          							============================================= -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
                    <div class="fbox-icon">
                      <i><img src="demos/course/images/instructor/2.jpg" class="border-0 bg-transparent shadow-sm"
                          style="z-index: 2;" alt="Image"></i>
                    </div>
                    <div class="fbox-content">
                      <h3 class="mb-4 text-transform-none ls-0"><a href="#" class="text-dark">Alan Fresco</a><br><small
                          class="subtitle text-transform-none color">Health &amp; Fitness</small></h3>
                      <p class="text-dark"><strong>7563</strong> Students</p>
                      <p class="text-dark mt-0"><strong>29</strong> Courses</p>
                    </div>
                  </div>
                </div>

                <!-- Instructors 3
          							============================================= -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
                    <div class="fbox-icon">
                      <i><img src="demos/course/images/instructor/3.jpg" class="border-0 bg-transparent shadow-sm"
                          style="z-index: 2;" alt="Image"></i>
                    </div>
                    <div class="fbox-content">
                      <h3 class="mb-4 text-transform-none ls-0"><a href="#" class="text-dark">Gunther
                          Beard</a><br><small class="subtitle text-transform-none color">Photography</small></h3>
                      <p class="text-dark"><strong>1131</strong> Students</p>
                      <p class="text-dark mt-0"><strong>11</strong> Courses</p>
                    </div>
                  </div>
                </div>

                <!-- Instructors 4
          							============================================= -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
                    <div class="fbox-icon">
                      <i><img src="demos/course/images/instructor/4.jpg" class="border-0 bg-transparent shadow-sm"
                          style="z-index: 2;" alt="Image"></i>
                    </div>
                    <div class="fbox-content">
                      <h3 class="mb-4 text-transform-none ls-0"><a href="#" class="text-dark">Desmond
                          Eagle</a><br><small class="subtitle text-transform-none color">Lifestyle</small></h3>
                      <p class="text-dark"><strong>1232</strong> Students</p>
                      <p class="text-dark mt-0"><strong>12</strong> Courses</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <section id="section-team" class="page-section mt-6">

            <div class="heading-block text-center">
              <h2>Our Team</h2>
              <span>People who have contributed enormously to our Company.</span>
            </div>

            <div class="container">

              <div class="row col-mb-50 mb-0">

                @foreach ($projects as $project)
                <div class="col-lg-6">
                  <div class="team team-list row align-items-center">
                    <div class="team-image col-sm-6">
                      <img src="{{ url('storage/app/public/imgs/projects/'.$project->master_photo) }}" height="319"
                        alt="{{ $project->name_en }}" class="rounded-6">
                    </div>
                    <div class="team-desc col-sm-6">
                      <div class="team-title">
                        <h4>{{ $project->name_en }}</h4><span>{{ $project->cityProject->name_en }}</span>
                      </div>
                      <div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat
                        assumenda
                        similique unde mollitia.</div>
                      <div class="d-flex mt-4">
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-facebook">
                          <i class="fa-brands fa-facebook-f"></i>
                          <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-twitter">
                          <i class="fa-brands fa-twitter"></i>
                          <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-google">
                          <i class="fa-brands fa-google"></i>
                          <i class="fa-brands fa-google"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach



                <div class="col-lg-6">
                  <div class="team team-list row align-items-center">
                    <div class="team-image col-sm-6">
                      <img src="images/team/4.jpg" alt="Nix Maxwell" class="rounded-6">
                    </div>
                    <div class="team-desc col-sm-6">
                      <div class="team-title">
                        <h4>Nix Maxwell</h4><span>Co-Founder</span>
                      </div>
                      <div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat
                        assumenda
                        similique unde mollitia.</div>
                      <div class="d-flex mt-4">
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-forrst">
                          <i class="fa-solid fa-tree"></i>
                          <i class="fa-solid fa-tree"></i>
                        </a>
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-skype">
                          <i class="fa-brands fa-skype"></i>
                          <i class="fa-brands fa-skype"></i>
                        </a>
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-flickr">
                          <i class="fa-brands fa-flickr"></i>
                          <i class="fa-brands fa-flickr"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="w-100"></div>

                <div class="col-lg-6">
                  <div class="team team-list row align-items-center">
                    <div class="team-image col-sm-6">
                      <img src="images/team/2.jpg" alt="Josh Clark" class="rounded-6">
                    </div>
                    <div class="team-desc col-sm-6">
                      <div class="team-title">
                        <h4>Josh Clark</h4><span>Developer</span>
                      </div>
                      <div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat
                        assumenda
                        similique unde mollitia.</div>
                      <div class="d-flex mt-4">
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-dribbble">
                          <i class="fa-brands fa-dribbble"></i>
                          <i class="fa-brands fa-dribbble"></i>
                        </a>
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-twitter">
                          <i class="fa-brands fa-twitter"></i>
                          <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-github">
                          <i class="fa-brands fa-github"></i>
                          <i class="fa-brands fa-github"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="team team-list row align-items-center">
                    <div class="team-image col-sm-6">
                      <img src="images/team/8.jpg" alt="Mary Jane" class="rounded-6">
                    </div>
                    <div class="team-desc col-sm-6">
                      <div class="team-title">
                        <h4>Mary Jane</h4><span>Support</span>
                      </div>
                      <div class="team-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat
                        assumenda
                        similique unde mollitia.</div>
                      <div class="d-flex mt-4">
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-facebook">
                          <i class="fa-brands fa-facebook-f"></i>
                          <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-linkedin">
                          <i class="fa-brands fa-linkedin"></i>
                          <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="#" class="social-icon rounded-circle si-small text-white bg-twitter">
                          <i class="fa-brands fa-twitter"></i>
                          <i class="fa-brands fa-twitter"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="section my-0 mt-lg-5">
                <div class="container mw-sm">
                  <div class="row gx-5 justify-content-center align-items-center">

                    <div class="col mb-10">
                      <p class="color text-uppercase ls-3 small mb-3">Our Products</p>
                      <h3 class="display-5 mb-5">Products to make your everyday life easier.</h3>
                    </div>
                  </div>
                </div>

                <div id="oc-products"
                  class="owl-carousel owl-carousel-full products-carousel carousel-widget owl-nav-hover-fixed "
                  data-loop="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3"
                  data-items-lg="3">
                  @foreach ($projects as $project)
                  <div class="oc-item">
                    <div class="product">
                      <div class="product-image mb-2">
                        <img src="{{ url('storage/app/public/imgs/projects/'.$project->master_photo) }}" height="400"
                          alt="...">
                        <div class="sale-flash badge bg-color rounded-0 fw-normal p-2">{{ $project->progress }} %</div>
                        <div class="bg-overlay">
                          <div class="bg-overlay-content align-items-end justify-content-end"
                            data-hover-animate="fadeIn">
                            <a href="demo-skincare-single.html"
                              class="d-block positon-absolute top-0 start-0 w-100 h-100 z-1"><span
                                class="visually-hidden">{{ $project->name_en }}</span></a>
                            <a href="#" class="btn bg-color bg-opacity-75 text-light me-2 z-2"><i
                                class="bi-basket"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="product-desc text-center">
                        <div class="product-title">
                          <h3><a href="demo-skincare-single.html" class="color">Mitzee Cream</a></h3>
                        </div>
                        <div class="product-price fw-normal mt-0 mb-2"><del class="op-07">$24.99</del> <ins>$12.49</ins>
                        </div>
                        <a href="demo-skincare-cart.html"
                          class="button button-small px-5 button-border border-color m-0 color h-bg-color h-text-light mt-2">Add
                          to
                          cart</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <div class="oc-item">
                    <div class="product">
                      <div class="product-image mb-2">
                        <img src="demos/skincare/images/products/10.jpg" alt="...">
                        <div class="sale-flash badge bg-color rounded-0 fw-normal p-2">50% Off*</div>
                        <div class="bg-overlay">
                          <div class="bg-overlay-content align-items-end justify-content-end"
                            data-hover-animate="fadeIn">
                            <a href="demo-skincare-single.html"
                              class="d-block positon-absolute top-0 start-0 w-100 h-100 z-1"><span
                                class="visually-hidden">Product Link</span></a>
                            <a href="#" class="btn bg-color bg-opacity-75 text-light me-2 z-2"><i
                                class="bi-basket"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="product-desc text-center">
                        <div class="product-title">
                          <h3><a href="demo-skincare-single.html" class="color">Mitzee Cream</a></h3>
                        </div>
                        <div class="product-price fw-normal mt-0 mb-2"><del class="op-07">$24.99</del> <ins>$12.49</ins>
                        </div>
                        <a href="demo-skincare-cart.html"
                          class="button button-small px-5 button-border border-color m-0 color h-bg-color h-text-light mt-2">Add
                          to
                          cart</a>
                      </div>
                    </div>
                  </div>

                  <div class="oc-item">
                    <div class="product">
                      <div class="product-image mb-2">
                        <a href="demo-skincare-single.html"><img src="demos/skincare/images/products/11.jpg"
                            alt="..."></a>
                        <div class="bg-overlay">
                          <div class="bg-overlay-content align-items-end justify-content-end"
                            data-hover-animate="fadeIn">
                            <a href="demo-skincare-single.html"
                              class="d-block positon-absolute top-0 start-0 w-100 h-100 z-1"><span
                                class="visually-hidden">Product Link</span></a>
                            <a href="#" class="btn bg-color bg-opacity-75 text-light me-2 z-2"><i
                                class="bi-basket"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="product-desc text-center">
                        <div class="product-title">
                          <h3><a href="demo-skincare-single.html" class="color">Clove Tonka Oil</a></h3>
                        </div>
                        <div class="product-price fw-normal mt-0 mb-2">$39.99</div>
                        <a href="demo-skincare-cart.html"
                          class="button button-small px-5 button-border border-color m-0 color h-bg-color h-text-light mt-2">Add
                          to
                          cart</a>
                      </div>
                    </div>
                  </div>

                  <div class="oc-item">
                    <div class="product">
                      <div class="product-image mb-2">
                        <a href="demo-skincare-single.html"><img src="demos/skincare/images/products/15.jpg"
                            alt="..."></a>
                        <div class="bg-overlay">
                          <div class="bg-overlay-content align-items-end justify-content-end"
                            data-hover-animate="fadeIn">
                            <a href="demo-skincare-single.html"
                              class="d-block positon-absolute top-0 start-0 w-100 h-100 z-1"><span
                                class="visually-hidden">Product Link</span></a>
                            <a href="#" class="btn bg-color bg-opacity-75 text-light me-2 z-2"><i
                                class="bi-basket"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="product-desc text-center">
                        <div class="product-title">
                          <h3><a href="demo-skincare-single.html" class="color">Stockholm Hair Oil</a></h3>
                        </div>
                        <div class="product-price fw-normal mt-0 mb-2">$19.95</div>
                        <a href="demo-skincare-cart.html"
                          class="button button-small px-5 button-border border-color m-0 color h-bg-color h-text-light mt-2">Add
                          to
                          cart</a>
                      </div>
                    </div>
                  </div>

                  <div class="oc-item">
                    <div class="product">
                      <div class="product-image mb-2">
                        <a href="demo-skincare-single.html"><img src="demos/skincare/images/products/13.jpg"
                            alt="..."></a>
                        <div class="sale-flash badge bg-color rounded-0 fw-normal p-2">Sale!</div>
                        <div class="bg-overlay">
                          <div class="bg-overlay-content align-items-end justify-content-end"
                            data-hover-animate="fadeIn">
                            <a href="demo-skincare-single.html"
                              class="d-block positon-absolute top-0 start-0 w-100 h-100 z-1"><span
                                class="visually-hidden">Product Link</span></a>
                            <a href="#" class="btn bg-color bg-opacity-75 text-light me-2 z-2"><i
                                class="bi-basket"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="product-desc text-center">
                        <div class="product-title">
                          <h3><a href="demo-skincare-single.html" class="color">Romi Moisture</a></h3>
                        </div>
                        <div class="product-price fw-normal mt-0 mb-2"><del class="op-07">$19.99</del> <ins>$11.99</ins>
                        </div>
                        <a href="demo-skincare-cart.html"
                          class="button button-small px-5 button-border border-color m-0 color h-bg-color h-text-light mt-2">Add
                          to
                          cart</a>
                      </div>
                    </div>
                  </div>

                  <div class="oc-item">
                    <div class="product">
                      <div class="product-image mb-2">
                        <a href="demo-skincare-single.html"><img src="demos/skincare/images/products/5.jpg"
                            alt="..."></a>
                        <div class="bg-overlay">
                          <div class="bg-overlay-content align-items-end justify-content-end"
                            data-hover-animate="fadeIn">
                            <a href="demo-skincare-single.html"
                              class="d-block positon-absolute top-0 start-0 w-100 h-100 z-1"><span
                                class="visually-hidden">Product Link</span></a>
                            <a href="#" class="btn bg-color bg-opacity-75 text-light me-2 z-2"><i
                                class="bi-basket"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="product-desc text-center">
                        <div class="product-title">
                          <h3><a href="demo-skincare-single.html" class="color">Ouiao Super Serum</a></h3>
                        </div>
                        <div class="product-price fw-normal mt-0 mb-2">$9.99</div>
                        <a href="demo-skincare-cart.html"
                          class="button button-small px-5 button-border border-color m-0 color h-bg-color h-text-light mt-2">Add
                          to
                          cart</a>
                      </div>
                    </div>
                  </div>

                  <div class="oc-item">
                    <div class="product">
                      <div class="product-image mb-2">
                        <a href="demo-skincare-single.html"><img src="demos/skincare/images/products/14.jpg"
                            alt="..."></a>
                        <div class="bg-overlay">
                          <div class="bg-overlay-content align-items-end justify-content-end"
                            data-hover-animate="fadeIn">
                            <a href="demo-skincare-single.html"
                              class="d-block positon-absolute top-0 start-0 w-100 h-100 z-1"><span
                                class="visually-hidden">Product Link</span></a>
                            <a href="#" class="btn bg-color bg-opacity-75 text-light me-2 z-2"><i
                                class="bi-basket"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="product-desc text-center">
                        <div class="product-title">
                          <h3><a href="demo-skincare-single.html" class="color">Tainyc Polish</a></h3>
                        </div>
                        <div class="product-price fw-normal mt-0 mb-2">$129.99</div>
                        <a href="demo-skincare-cart.html"
                          class="button button-small px-5 button-border border-color m-0 color h-bg-color h-text-light mt-2">Add
                          to
                          cart</a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="row g-5 mb-5">
                @foreach($projects as $project)
                <div class="col-lg-4 col-md-6">

                  <div class="team">
                    <div class="team-image">
                      <img src="{{ url('storage/app/public/imgs/projects/'.$project->master_photo) }}" alt="John Doe">
                    </div>
                    <div class="team-desc team-desc-bg">
                      <div class="team-title">
                        <h4>John Doe</h4><span>CEO</span>
                      </div>
                      <div class="d-flex justify-content-center mt-4">
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-facebook">
                          <i class="fa-brands fa-facebook-f"></i>
                          <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-twitter">
                          <i class="fa-brands fa-twitter"></i>
                          <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-google">
                          <i class="fa-brands fa-google"></i>
                          <i class="fa-brands fa-google"></i>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>
                @endforeach

                <div class="col-lg-3 col-md-6">

                  <div class="team">
                    <div class="team-image">
                      <img src="images/team/3.jpg" alt="John Doe">
                    </div>
                    <div class="team-desc team-desc-bg">
                      <div class="team-title">
                        <h4>John Doe</h4><span>CEO</span>
                      </div>
                      <div class="d-flex justify-content-center mt-4">
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-facebook">
                          <i class="fa-brands fa-facebook-f"></i>
                          <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-twitter">
                          <i class="fa-brands fa-twitter"></i>
                          <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-google">
                          <i class="fa-brands fa-google"></i>
                          <i class="fa-brands fa-google"></i>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-lg-3 col-md-6">

                  <div class="team">
                    <div class="team-image">
                      <img src="images/team/2.jpg" alt="Josh Clark">
                    </div>
                    <div class="team-desc team-desc-bg">
                      <div class="team-title">
                        <h4>Josh Clark</h4><span>Co-Founder</span>
                      </div>
                      <div class="d-flex justify-content-center mt-4">
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-facebook">
                          <i class="fa-brands fa-facebook-f"></i>
                          <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-twitter">
                          <i class="fa-brands fa-twitter"></i>
                          <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-google">
                          <i class="fa-brands fa-google"></i>
                          <i class="fa-brands fa-google"></i>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-lg-3 col-md-6">

                  <div class="team">
                    <div class="team-image">
                      <img src="images/team/8.jpg" alt="Mary Jane">
                    </div>
                    <div class="team-desc team-desc-bg">
                      <div class="team-title">
                        <h4>Mary Jane</h4><span>Sales</span>
                      </div>
                      <div class="d-flex justify-content-center mt-4">
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-facebook">
                          <i class="fa-brands fa-facebook-f"></i>
                          <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-twitter">
                          <i class="fa-brands fa-twitter"></i>
                          <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-google">
                          <i class="fa-brands fa-google"></i>
                          <i class="fa-brands fa-google"></i>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-lg-3 col-md-6">

                  <div class="team">
                    <div class="team-image">
                      <img src="images/team/4.jpg" alt="Nix Maxwell">
                    </div>
                    <div class="team-desc team-desc-bg">
                      <div class="team-title">
                        <h4>Nix Maxwell</h4><span>Support</span>
                      </div>
                      <div class="d-flex justify-content-center mt-4">
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-facebook">
                          <i class="fa-brands fa-facebook-f"></i>
                          <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-twitter">
                          <i class="fa-brands fa-twitter"></i>
                          <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon si-small bg-light rounded-circle h-bg-google">
                          <i class="fa-brands fa-google"></i>
                          <i class="fa-brands fa-google"></i>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>

              </div>



              <div class="fancy-title title-border title-center mt-4">
                <h4>Skills we are Perfect in</h4>
              </div>

              <div class="row col-mb-30">
                <div class="col-sm-6 col-lg-3 text-center">
                  <div class="rounded-skill" data-color="#D01C1C" data-size="150" data-percent="90" data-width="2"
                    data-animate="3000">
                    <div class="counter counter-inherit"><span data-from="1" data-to="90" data-refresh-interval="50"
                        data-speed="3000"></span>%</div>
                  </div>
                  <h5>HTML5</h5>
                </div>

                <div class="col-sm-6 col-lg-3 text-center">
                  <div class="rounded-skill" data-color="#1770A4" data-size="150" data-percent="75" data-width="2"
                    data-animate="3000">
                    <div class="counter counter-inherit"><span data-from="1" data-to="75" data-refresh-interval="50"
                        data-speed="3000"></span>%</div>
                  </div>
                  <h5>CSS3</h5>
                </div>

                <div class="col-sm-6 col-lg-3 text-center">
                  <div class="rounded-skill" data-color="#6A89AA" data-size="150" data-percent="85" data-width="2"
                    data-animate="3000">
                    <div class="counter counter-inherit"><span data-from="1" data-to="85" data-refresh-interval="50"
                        data-speed="3000"></span>%</div>
                  </div>
                  <h5>PHP</h5>
                </div>

                <div class="col-sm-6 col-lg-3 text-center">
                  <div class="rounded-skill" data-color="#248673" data-size="150" data-percent="80" data-width="2"
                    data-animate="3000">
                    <div class="counter counter-inherit"><span data-from="1" data-to="80" data-refresh-interval="50"
                        data-speed="3000"></span>%</div>
                  </div>
                  <h5>jQuery</h5>
                </div>
              </div>

            </div>

            <div class="section parallax py-6">
              <img src="images/parallax/3.jpg" class="parallax-bg">
              <div class="heading-block text-center border-bottom-0 mb-0">
                <h2>"Everything is designed, but some things are designed well."</h2>
              </div>
            </div>

          </section>


          <div class="row align-items-stretch g-4">

            @if ($companies->count()>0)
            @foreach ($companies as $company)
            <div class="col-lg-3 col-md-6">
              <div class="feature-box media-box fbox-bg h-100">
                <div class="fbox-media">
                  <a href="#"><img src="{{url('storage/app/public/imgs/users/'.$company->userCompany->profile_pic)}}"
                      alt="Featured Box Image"></a>
                </div>
                <div class="fbox-content border-0">
                  <h3 class="text-transform-none ls-0 fw-semibold">{{ $company->name_en }}<span
                      class="subtitle fw-light ls-0">{{Str::limit($company->bio_en,50)}}</span></h3>
                  <a href="#" class="button-link border-0 color">Read More</a>
                </div>
              </div>
            </div>
            @endforeach
            @endif


            <div class="col-lg-3 col-md-6">
              <div class="feature-box media-box fbox-bg h-100">
                <div class="fbox-media">
                  <a href="#"><img src="demos/pet/images/services/2.jpg" alt="Featured
													Box Image"></a>
                </div>
                <div class="fbox-content border-0">
                  <h3 class="text-transform-none ls-0 fw-semibold">Pet Nutritionists<span
                      class="subtitle fw-light ls-0">Energistically visualize
                      market-driven.</span></h3>
                  <a href="#" class="button-link border-0 color">Read More</a>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="feature-box media-box fbox-bg h-100">
                <div class="fbox-media">
                  <a href="#"><img src="demos/pet/images/services/3.jpg" alt="Featured
													Box Image"></a>
                </div>
                <div class="fbox-content border-0">
                  <h3 class="text-transform-none ls-0 fw-semibold">Find a Pet Sitter<span
                      class="subtitle fw-light ls-0">Enthusiastically iterate enabled
                      portals after.</span></h3>
                  <a href="#" class="button-link border-0 color">Read More</a>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="feature-box media-box fbox-bg h-100">
                <div class="fbox-media">
                  <a href="#"><img src="demos/pet/images/services/4.jpg" alt="Featured
													Box Image"></a>
                </div>
                <div class="fbox-content border-0">
                  <h3 class="text-transform-none ls-0 fw-semibold">Health &amp;
                    Wellbeing<span class="subtitle fw-light ls-0">Enthusiastically
                      iterate enabled portals after.</span></h3>
                  <a href="#" class="button-link border-0 color">Read More</a>
                </div>
              </div>
            </div>
          </div>





          <div class="row col-mb-50">
            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                <div class="fbox-icon">
                  <a href="#"><i class="i-alt border-0 bi-cart"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>e-Commerce Solutions<span class="subtitle">Start your Own Shop today</span></h3>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                <div class="fbox-icon">
                  <a href="#"><i class="i-alt border-0 bi-wallet"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>Easy Payment Options<span class="subtitle">Credit Cards &amp; PayPal Support</span></h3>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                <div class="fbox-icon">
                  <a href="#"><i class="i-alt border-0 bi-megaphone"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>Instant Notifications<span class="subtitle">Realtime Email &amp; SMS Support</span></h3>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-center fbox-light fbox-effect border-bottom-0">
                <div class="fbox-icon">
                  <a href="#"><i class="i-alt border-0 bi-fire"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>Hot Offers Daily<span class="subtitle">Upto 50% Discounts</span></h3>
                </div>
              </div>
            </div>
          </div>

          <div class="line"></div>

          <div class="row col-mb-50">
            <div class="col-md-5">
              <a href="https://vimeo.com/101373765" class="d-block position-relative rounded overflow-hidden"
                data-lightbox="iframe">
                <img src="images/others/1.jpg" alt="Image" class="w-100">
                <div class="bg-overlay">
                  <div class="bg-overlay-content dark">
                    <i class="i-circled i-light uil uil-play m-0"></i>
                  </div>
                  <div class="bg-overlay-bg op-06 dark"></div>
                </div>
              </a>
            </div>

            <div class="col-md-7">
              <div class="heading-block">
                <h2>Globally Preferred Ecommerce Platform</h2>
              </div>

              <p>Worldwide John Lennon, mobilize humanitarian; emergency response donors; cause human experience effect.
                Volunteer Action Against Hunger Aga Khan safeguards women's.</p>

              <div class="row col-mb-30">
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <ul class="iconlist iconlist-color mb-0">
                    <li><i class="fa-solid fa-caret-right"></i> Responsive Ready Layout</li>
                    <li><i class="fa-solid fa-caret-right"></i> Retina Display Supported</li>
                    <li><i class="fa-solid fa-caret-right"></i> Powerful &amp; Optimized Code</li>
                    <li><i class="fa-solid fa-caret-right"></i> 380+ Templates Included</li>
                  </ul>
                </div>

                <div class="col-sm-6 col-md-12 col-lg-6">
                  <ul class="iconlist iconlist-color mb-0">
                    <li><i class="fa-solid fa-caret-right"></i> 12+ Headers &amp; Menu Designs</li>
                    <li><i class="fa-solid fa-caret-right"></i> Premium Sliders Included</li>
                    <li><i class="fa-solid fa-caret-right"></i> Light &amp; Dark Colors</li>
                    <li><i class="fa-solid fa-caret-right"></i> e-Commerce Design Included</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="section mt-6">
          <div class="container">

            <div class="heading-block text-center">
              <h2>Features that you are gonna Love</h2>
              <span>Canvas comes with 100+ Feature oriented Shortcodes that are easy to use too.</span>
            </div>

            <div class="row justify-content-center col-mb-50">
              <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn">
                  <div class="fbox-icon">
                    <a href="#"><i class="bi-phone"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Responsive Layout</h3>
                    <p>Powerful Layout with Responsive functionality that can be adapted to any screen size.</p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="200">
                  <div class="fbox-icon">
                    <a href="#"><i class="bi-eye"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Retina Ready Graphics</h3>
                    <p>Looks beautiful &amp; ultra-sharp on Retina Displays with Retina Icons, Fonts &amp; Images.</p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="400">
                  <div class="fbox-icon">
                    <a href="#"><i class="bi-star"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Powerful Performance</h3>
                    <p>Optimized code that are completely customizable and deliver unmatched fast performance.</p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="600">
                  <div class="fbox-icon">
                    <a href="#"><i class="bi-camera-video"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>HTML5 Video</h3>
                    <p>Canvas provides support for Native HTML5 Videos that can be added to a Full Width Background.</p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="800">
                  <div class="fbox-icon">
                    <a href="#"><i class="bi-mouse"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Parallax Support</h3>
                    <p>Display your Content attractively using Parallax Sections that have unlimited customizable areas.
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="1000">
                  <div class="fbox-icon">
                    <a href="#"><i class="bi-fire"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Endless Possibilities</h3>
                    <p>Complete control on each &amp; every element that provides endless customization possibilities.
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="1200">
                  <div class="fbox-icon">
                    <a href="#"><i class="bi-lightbulb"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Light &amp; Dark Color Schemes</h3>
                    <p>Change your Website's Primary Scheme instantly by simply adding the dark class to the body.</p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="1400">
                  <div class="fbox-icon">
                    <a href="#"><i class="bi-heart"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Boxed &amp; Wide Layouts</h3>
                    <p>Stretch your Website to the Full Width or make it boxed to surprise your visitors.</p>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-lg-4">
                <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="1600">
                  <div class="fbox-icon">
                    <a href="#"><i class="bi-card-text"></i></a>
                  </div>
                  <div class="fbox-content">
                    <h3>Extensive Documentation</h3>
                    <p>We have covered each &amp; everything in our Documentation including Videos &amp; Screenshots.
                    </p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="container">

          <div class="heading-block text-center">
            <h3>Some of our <span>Featured</span> Works</h3>
            <span>We have worked on some Awesome Projects that are worth boasting of.</span>
          </div>

          <div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="1"
            data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-sm="2" data-items-md="3"
            data-items-xl="4">

            <div class="portfolio-item">
              <div class="portfolio-image">
                <a href="portfolio-single.html">
                  <img src="images/portfolio/4/1.jpg" alt="Open Imagination">
                </a>
                <div class="bg-overlay">
                  <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
                    <a href="images/portfolio/full/1.jpg" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350"
                      data-lightbox="image"><i class="uil uil-plus"></i></a>
                    <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall"
                      data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
                </div>
              </div>
              <div class="portfolio-desc">
                <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                <span><a href="#">Media</a>, <a href="#">Icons</a></span>
              </div>
            </div>

            <div class="portfolio-item">
              <div class="portfolio-image">
                <a href="portfolio-single.html">
                  <img src="images/portfolio/4/2.jpg" alt="Locked Steel Gate">
                </a>
                <div class="bg-overlay">
                  <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
                    <a href="images/portfolio/full/2.jpg" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350"
                      data-lightbox="image"><i class="uil uil-plus"></i></a>
                    <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall"
                      data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
                </div>
              </div>
              <div class="portfolio-desc">
                <h3><a href="portfolio-single.html">Locked Steel Gate</a></h3>
                <span><a href="#">Illustrations</a></span>
              </div>
            </div>
            <div class="portfolio-item">
              <div class="portfolio-image">
                <a href="#">
                  <img src="images/portfolio/4/3.jpg" alt="Mac Sunglasses">
                </a>
                <div class="bg-overlay">
                  <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
                    <a href="https://vimeo.com/89396394" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall" data-hover-speed="350"
                      data-lightbox="iframe"><i class="uil uil-play"></i></a>
                    <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall"
                      data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350"></div>
                </div>
              </div>
              <div class="portfolio-desc">
                <h3><a href="portfolio-single-video.html">Mac Sunglasses</a></h3>
                <span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
              </div>
            </div>
            <div class="portfolio-item">
              <div class="portfolio-image">
                <a href="#">
                  <img src="images/portfolio/4/4.jpg" alt="Morning Dew">
                </a>
                <div class="bg-overlay" data-lightbox="gallery">
                  <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                    <a href="images/portfolio/full/4.jpg" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                      data-hover-speed="350" data-lightbox="gallery-item"><i class="uil uil-images"></i></a>
                    <a href="images/portfolio/full/4-1.jpg" class="d-none" data-lightbox="gallery-item"></a>
                    <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                      data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                </div>
              </div>
              <div class="portfolio-desc">
                <h3><a href="portfolio-single-gallery.html">Morning Dew</a></h3>
                <span><a href="#">Icons</a>, <a href="#">Illustrations</a></span>
              </div>
            </div>
            <div class="portfolio-item">
              <div class="portfolio-image">
                <a href="portfolio-single.html">
                  <img src="images/portfolio/4/5.jpg" alt="Console Activity">
                </a>
                <div class="bg-overlay">
                  <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                    <a href="images/portfolio/full/5.jpg" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                      data-hover-speed="350" data-lightbox="image" title="Image"><i class="uil uil-plus"></i></a>
                    <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                      data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                </div>
              </div>
              <div class="portfolio-desc">
                <h3><a href="portfolio-single.html">Console Activity</a></h3>
                <span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
              </div>
            </div>
            <div class="portfolio-item">
              <div class="portfolio-image">
                <a href="portfolio-single-gallery.html">
                  <img src="images/portfolio/4/6.jpg" alt="Shake It!">
                </a>
                <div class="bg-overlay" data-lightbox="gallery">
                  <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                    <a href="images/portfolio/full/6.jpg" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                      data-hover-speed="350" data-lightbox="gallery-item"><i class="uil uil-images"></i></a>
                    <a href="images/portfolio/full/6-1.jpg" class="d-none" data-lightbox="gallery-item"></a>
                    <a href="images/portfolio/full/6-2.jpg" class="d-none" data-lightbox="gallery-item"></a>
                    <a href="images/portfolio/full/6-3.jpg" class="d-none" data-lightbox="gallery-item"></a>
                    <a href="portfolio-single-gallery.html" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                      data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                </div>
              </div>
              <div class="portfolio-desc">
                <h3><a href="portfolio-single-gallery.html">Shake It!</a></h3>
                <span><a href="#">Illustrations</a>, <a href="#">Graphics</a></span>
              </div>
            </div>
            <div class="portfolio-item">
              <div class="portfolio-image">
                <a href="portfolio-single-video.html">
                  <img src="images/portfolio/4/7.jpg" alt="Backpack Contents">
                </a>
                <div class="bg-overlay">
                  <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                    <a href="https://www.youtube.com/watch?v=kuceVNBTJio"
                      class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall"
                      data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="iframe"><i
                        class="uil uil-play"></i></a>
                    <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                      data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                </div>
              </div>
              <div class="portfolio-desc">
                <h3><a href="portfolio-single-video.html">Backpack Contents</a></h3>
                <span><a href="#">UI Elements</a>, <a href="#">Icons</a></span>
              </div>
            </div>
            <div class="portfolio-item">
              <div class="portfolio-image">
                <a href="portfolio-single.html">
                  <img src="images/portfolio/4/8.jpg" alt="Sunset Bulb Glow">
                </a>
                <div class="bg-overlay">
                  <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                    <a href="images/portfolio/full/8.jpg" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                      data-hover-speed="350" data-lightbox="image" title="Image"><i class="uil uil-plus"></i></a>
                    <a href="portfolio-single.html" class="overlay-trigger-icon bg-light text-dark"
                      data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                      data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                  </div>
                  <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                </div>
              </div>
              <div class="portfolio-desc">
                <h3><a href="portfolio-single.html">Sunset Bulb Glow</a></h3>
                <span><a href="#">Graphics</a></span>
              </div>
            </div>

          </div>
        </div>

        <div class="section mt-4 mb-0">

          <div class="container">

            <div class="heading-block text-center">
              <h3>Testimonials</h3>
              <span>Check out some of our Client Reviews</span>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 align-items-stretch">
              <div class="col">
                <div class="card rounded-6 shadow-sm overflow-hidden h-100">
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-auto pt-2">
                        <img class="rounded-circle" src="images/testimonials/1.jpg" width="64" height="64"
                          alt="Customer Testimonails">
                      </div>
                      <div class="col">
                        <p class="mb-3 font-secondary fst-italic">Incidunt deleniti blanditiis quas aperiam recusandae
                          consequatur ullam quibusdam cum libero illo rerum repellendus!</p>
                        <h4 class="h6 mb-0 fw-medium">John Doe</h4>
                        <small class="text-muted">XYZ Inc.</small>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon bi-star-fill op-02"></div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-6 shadow-sm overflow-hidden h-100">
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-auto pt-2">
                        <img class="rounded-circle" src="images/testimonials/1.jpg" width="64" height="64"
                          alt="Customer Testimonails">
                      </div>
                      <div class="col">
                        <p class="mb-3 font-secondary fst-italic">Natus voluptatum enim quod necessitatibus quis
                          expedita harum provident eos obcaecati id culpa corporis molestias.</p>
                        <h4 class="h6 mb-0 fw-medium">Collis Ta'eed</h4>
                        <small class="text-muted">Envato Inc.</small>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon bi-star-fill op-02"></div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-6 shadow-sm overflow-hidden h-100">
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-auto pt-2">
                        <img class="rounded-circle" src="images/testimonials/1.jpg" width="64" height="64"
                          alt="Customer Testimonails">
                      </div>
                      <div class="col">
                        <p class="mb-3 font-secondary fst-italic">Fugit officia dolor sed harum excepturi ex iusto
                          magnam asperiores molestiae qui natus obcaecati facere sint amet.</p>
                        <h4 class="h6 mb-0 fw-medium">Mary Jane</h4>
                        <small class="text-muted">Google Inc.</small>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon bi-star-fill op-02"></div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-6 shadow-sm overflow-hidden h-100">
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-auto pt-2">
                        <img class="rounded-circle" src="images/testimonials/1.jpg" width="64" height="64"
                          alt="Customer Testimonails">
                      </div>
                      <div class="col">
                        <p class="mb-3 font-secondary fst-italic">Similique fugit repellendus expedita excepturi iure
                          perferendis provident quia eaque. Repellendus, vero numquam?</p>
                        <h4 class="h6 mb-0 fw-medium">Steve Jobs</h4>
                        <small class="text-muted">Apple Inc.</small>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon bi-star-fill op-02"></div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-6 shadow-sm overflow-hidden h-100">
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-auto pt-2">
                        <img class="rounded-circle" src="images/testimonials/1.jpg" width="64" height="64"
                          alt="Customer Testimonails">
                      </div>
                      <div class="col">
                        <p class="mb-3 font-secondary fst-italic">Lorem ipsum dolor sit amet, consectetur adipisicing
                          elit. Minus, perspiciatis illum totam dolore deleniti labore.</p>
                        <h4 class="h6 mb-0 fw-medium">Jamie Morrison</h4>
                        <small class="text-muted">Apple Inc.</small>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon bi-star-fill op-02"></div>
                </div>
              </div>
              <div class="col">
                <div class="card rounded-6 shadow-sm overflow-hidden h-100">
                  <div class="card-body p-4">
                    <div class="row">
                      <div class="col-auto pt-2">
                        <img class="rounded-circle" src="images/testimonials/1.jpg" width="64" height="64"
                          alt="Customer Testimonails">
                      </div>
                      <div class="col">
                        <p class="mb-3 font-secondary fst-italic">Porro dolorem saepe reiciendis nihil minus neque.
                          Ducimus rem necessitatibus repellat laborum nemo quod.</p>
                        <h4 class="h6 mb-0 fw-medium">Cyan Ta'eed</h4>
                        <small class="text-muted">TutsPlus+</small>
                      </div>
                    </div>
                  </div>
                  <div class="bg-icon bi-star-fill op-02"></div>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="container">

          <div id="oc-clients" class="owl-carousel owl-carousel-full image-carousel carousel-widget" data-margin="30"
            data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xs="2" data-items-sm="3"
            data-items-md="4" data-items-lg="5" data-items-xl="6" style="padding: 20px 0;">

            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/1.png" alt="Clients"></a></div>
            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/2.png" alt="Clients"></a></div>
            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/3.png" alt="Clients"></a></div>
            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/4.png" alt="Clients"></a></div>
            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/5.png" alt="Clients"></a></div>
            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/6.png" alt="Clients"></a></div>
            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/7.png" alt="Clients"></a></div>
            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/8.png" alt="Clients"></a></div>
            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/9.png" alt="Clients"></a></div>
            <div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/10.png" alt="Clients"></a>
            </div>

          </div>

        </div>

        <a href="#" class="button button-full text-center text-end footer-stick">
          <div class="container">
            Canvas comes with Unlimited Customizations &amp; Options. <strong>Check Out</strong> <i
              class="fa-solid fa-caret-right" style="top:4px;"></i>
          </div>
        </a>

      </div>
    </section><!-- #content end -->

    <!-- Footer
		============================================= -->
    <footer id="footer" class="dark">
      <div class="container">

        <!-- Footer Widgets
				============================================= -->
        <div class="footer-widgets-wrap">

          <div class="row col-mb-50">
            <div class="col-lg-8">

              <div class="row col-mb-50">
                <div class="col-md-4">

                  <div class="widget">

                    <img src="images/footer-widget-logo.png" alt="Image" class="footer-logo">

                    <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong>
                      Design Standards.</p>

                    <div
                      style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
                      <address>
                        <strong>Headquarters:</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                      </address>
                      <abbr title="Phone Number"><strong>Phone:</strong></abbr> (1) 8547 632521<br>
                      <abbr title="Fax"><strong>Fax:</strong></abbr> (1) 11 4752 1433<br>
                      <abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
                    </div>

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="widget widget_links">

                    <h4>Blogroll</h4>

                    <ul>
                      <li><a href="https://codex.wordpress.org/">Documentation</a></li>
                      <li><a href="https://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
                      <li><a href="https://wordpress.org/extend/plugins/">Plugins</a></li>
                      <li><a href="https://wordpress.org/support/">Support Forums</a></li>
                      <li><a href="https://wordpress.org/extend/themes/">Themes</a></li>
                      <li><a href="https://wordpress.org/news/">Canvas Blog</a></li>
                      <li><a href="https://planet.wordpress.org/">Canvas Planet</a></li>
                    </ul>

                  </div>

                </div>

                <div class="col-md-4">

                  <div class="widget">
                    <h4>Recent Posts</h4>

                    <div class="posts-sm row col-mb-30" id="post-list-footer">
                      <div class="entry col-12">
                        <div class="grid-inner row">
                          <div class="col">
                            <div class="entry-title">
                              <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                            </div>
                            <div class="entry-meta">
                              <ul>
                                <li>10th July 2021</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="entry col-12">
                        <div class="grid-inner row">
                          <div class="col">
                            <div class="entry-title">
                              <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                            </div>
                            <div class="entry-meta">
                              <ul>
                                <li>10th July 2021</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="entry col-12">
                        <div class="grid-inner row">
                          <div class="col">
                            <div class="entry-title">
                              <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                            </div>
                            <div class="entry-meta">
                              <ul>
                                <li>10th July 2021</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
                        <div class="counter counter-small"><span data-from="50" data-to="15065421"
                            data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                        <h5 class="mb-0">Total Downloads</h5>
                      </div>

                      <div class="col-lg-6">
                        <div class="counter counter-small"><span data-from="100" data-to="18465"
                            data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                        <h5 class="mb-0">Clients</h5>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-5 col-lg-12">
                  <div class="widget subscribe-widget">
                    <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside
                      Scoops:</h5>
                    <div class="widget-subscribe-form-result"></div>
                    <form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
                      <div class="input-group mx-auto">
                        <div class="input-group-text"><i class="bi-envelope-plus"></i></div>
                        <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email"
                          class="form-control required email" placeholder="Enter your Email">
                        <button class="btn btn-success" type="submit">Subscribe</button>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="col-md-3 col-lg-12">
                  <div class="widget">

                    <div class="row col-mb-30">
                      <div class="col-6 col-md-12 col-lg-6 d-flex align-items-center">
                        <a href="#" class="social-icon text-white border-transparent bg-facebook me-2 mb-0 float-none">
                          <i class="fa-brands fa-facebook-f"></i>
                          <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="ms-1"><small class="d-block"><strong>Like Us</strong><br>on
                            Facebook</small></a>
                      </div>
                      <div class="col-6 col-md-12 col-lg-6 d-flex align-items-center">
                        <a href="#" class="social-icon text-white border-transparent bg-rss me-2 mb-0 float-none">
                          <i class="fa-solid fa-rss"></i>
                          <i class="fa-solid fa-rss"></i>
                        </a>
                        <a href="#" class="ms-1"><small class="d-block"><strong>Subscribe</strong><br>to RSS
                            Feeds</small></a>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

            </div>
          </div>

        </div><!-- .footer-widgets-wrap end -->

      </div>

      <!-- Copyrights
			============================================= -->
      <div id="copyrights">
        <div class="container">

          <div class="row col-mb-30">

            <div class="col-md-6 text-center text-md-start">
              Copyrights &copy; 2023 All Rights Reserved by Canvas Inc.<br>
              <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
            </div>

            <div class="col-md-6 text-center text-md-end">
              <div class="d-flex justify-content-center justify-content-md-end mb-2">
                <a href="#" class="social-icon border-transparent si-small h-bg-facebook">
                  <i class="fa-brands fa-facebook-f"></i>
                  <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#" class="social-icon border-transparent si-small h-bg-twitter">
                  <i class="fa-brands fa-twitter"></i>
                  <i class="fa-brands fa-twitter"></i>
                </a>

                <a href="#" class="social-icon border-transparent si-small h-bg-google">
                  <i class="fa-brands fa-google"></i>
                  <i class="fa-brands fa-google"></i>
                </a>

                <a href="#" class="social-icon border-transparent si-small h-bg-pinterest">
                  <i class="fa-brands fa-pinterest-p"></i>
                  <i class="fa-brands fa-pinterest-p"></i>
                </a>

                <a href="#" class="social-icon border-transparent si-small h-bg-vimeo">
                  <i class="fa-brands fa-vimeo-v"></i>
                  <i class="fa-brands fa-vimeo-v"></i>
                </a>

                <a href="#" class="social-icon border-transparent si-small h-bg-github">
                  <i class="fa-brands fa-github"></i>
                  <i class="fa-brands fa-github"></i>
                </a>

                <a href="#" class="social-icon border-transparent si-small h-bg-yahoo">
                  <i class="fa-brands fa-yahoo"></i>
                  <i class="fa-brands fa-yahoo"></i>
                </a>

                <a href="#" class="social-icon border-transparent si-small me-0 h-bg-linkedin">
                  <i class="fa-brands fa-linkedin"></i>
                  <i class="fa-brands fa-linkedin"></i>
                </a>
              </div>

              <i class="bi-envelope"></i> info@canvas.com <span class="middot">&middot;</span> <i
                class="fa-solid fa-phone"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i
                class="bi-skype"></i> CanvasOnSkype
            </div>

          </div>

        </div>
      </div><!-- #copyrights end -->
    </footer><!-- #footer end -->

  </div><!-- #wrapper end -->

  <!-- Go To Top
	============================================= -->
  <div id="gotoTop" class="uil uil-angle-up"></div>

  <!-- JavaScripts
	============================================= -->
  <script src="js/functions.js"></script>

</body>

</html>