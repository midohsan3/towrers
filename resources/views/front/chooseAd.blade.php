@extends('layouts.front')
{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
{{ __('front.Home') }}
@endsection
{{-- 
  ======================
  =PAGE CONTENT
  ======================
  --}}
@section('page-content')
{{-- Slider--}}
@include('incs.slider')


{{-- Content--}}
<section id="content">
  <div class="content-wrap">
    <div class="fancy-title title-border mt-4 title-center pulse animated">
      <h2 class="text-danger">Choose Size </h2>
    </div>
    <div class="container ">
      <div class="row">
        <div class="col-lg-4">
          <h2>{{ __('front.Ad placement guidelines') }}</h2>
          <ul class="iconlist iconlist-large iconlist-color">
            <li><i class="fa-solid fa-check 2x"></i>
              {{ __('front.Create an account on the site with the correct data for easy communication with you') }}</li>
            <li><i class="fa-solid fa-check"></i> {{ __('front.login') }}</li>
            <li><i class="fa-solid fa-check"></i> {{ __('front.Choose the ad space that best suits your needs.') }}</li>
            <li><i class="fa-solid fa-check"></i>
              {{ __('front.Upload your ad image keeping in mind that it matches the format of the ad space.') }}</li>
            <li><i class="fa-solid fa-check"></i>
              {{ __('front.You can add a link to the advertisement so that customers can reach you.') }}</li>
            <li><i class="fa-solid fa-check"></i>
              {{ __('front.Choose the time in days.') }}</li>
            <li><i class="fa-solid fa-check"></i>
              {{ __('front.By completing the data and pressing the submit button you will be redirected to the payment page.') }}
            </li>
            <li><i class="fa-solid fa-check"></i>
              {{ __('front.You can pay with various payment cards and PayPal.') }}
            </li>
            <li><i class="fa-solid fa-check"></i>
              {{ __('front.Your ad will be published within a maximum period of 6 hours.') }}
            </li>
            <li><i class="fa-solid fa-check"></i>
              {{ __('front.In the event of a delay in the announcement inquiry or complaint please contact us.') }}
            </li>
            <li><i class="fa-solid fa-check"></i>
              {{ __('front.Connect via chat on the site, direct call, or WhatsApp.') }}
            </li>
          </ul>
        </div>


        <div class=" col-8 border border-3 rounded">
          <div class="fancy-title title-border mt-4 title-center pulse animated">
            <h4>Main Sider</h4>
          </div>
          <div class="row shop-categories center px-3">
            <div class="col">
              <div class="border border-3 rounded ">
                <figure dir="ltr">
                  @if (App::getLocale()=='ar')
                  <img src="{{ url('imgs/650x200 r.jpg') }}" class="w-100" alt="Top-Left">
                  @else
                  <img src="{{ url('imgs/650x200.jpg') }}" class="w-100" alt="Top-Left">
                  @endif

                  <figcaption class="figure-caption">1350 X 600 <br />
                    <span>{{ __('general.Contact Us For Posting') }}</span>
                  </figcaption>
                </figure>
              </div>
            </div>

          </div>

          <div class="fancy-title title-border mt-4 title-center pulse animated">
            <h4>First Row</h4>
          </div>
          {{-- Shop Categories--}}
          <div class="row shop-categories center px-3">
            <div class="col-lg-7">
              <div class="border border-3 rounded ">
                <a href="{{ route('ad.create',3) }}">
                  <figure dir="ltr">
                    @if (App::getLocale()=='ar')
                    <img src="{{ url('imgs/650x200 r.jpg') }}" class="w-100" alt="Top-Left">
                    @else
                    <img src="{{ url('imgs/650x200.jpg') }}" class="w-100" alt="Top-Left">
                    @endif

                    <figcaption class="figure-caption">650 X 200 <br />
                      3.00 {{ __('general.AED') }} / {{ __('front.Day') }}
                    </figcaption>
                  </figure>

                </a>
              </div>
            </div>

            <div class="col-lg-5">
              <div class="border border-3 rounded">
                <a href="{{ route('ad.create',4) }}">
                  <figure dir="ltr">
                    @if (App::getLocale()=='ar')
                    <img src="{{ url('imgs/450x200r.jpg') }}" class="w-100" alt="Top-Left">
                    @else
                    <img src="{{ url('imgs/450x200.jpg') }}" class="w-100" alt="Top-Left">
                    @endif

                    <figcaption class="w-100">450 X 200<br />
                      3.00 {{ __('general.AED') }} / {{ __('front.Day') }}
                    </figcaption>
                  </figure>

                </a>
              </div>

            </div>
          </div>

          <div class="fancy-title title-border mt-4 title-center pulse animated">
            <h4>Secound Row</h4>
          </div>

          <div class="row shop-categories center px-3">
            <div class="col-lg-4">
              <div class="border border-3 rounded">
                <a href="{{ route('ad.create',5) }}">
                  <figure dir='ltr'>
                    <img src="{{ url('imgs/350x200.jpg') }}" class="w-100 rounded" alt="Second-Row">
                    <figcaption class="figure-caption">350 X 200<br />
                      2.00 {{ __('general.AED') }} / {{ __('front.Day') }}
                    </figcaption>
                  </figure>

                </a>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="border border-3 rounded">
                <a href="{{ route('ad.create',5) }}">
                  <figure dir='ltr'>
                    <img src="{{ url('imgs/350x200e.jpg') }}" class="w-100 rounded" alt="Second-Row">
                    <figcaption class="figure-caption">350 X 200<br />
                      2.00 {{ __('general.AED') }} / {{ __('front.Day') }}
                    </figcaption>
                  </figure>

                </a>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="border border-3 rounded">
                <a href="{{ route('ad.create',5) }}">
                  <figure dir='ltr'>
                    <img src="{{ url('imgs/350x200.jpg') }}" class="w-100 rounded" alt="Second-Row">
                    <figcaption class="figure-caption">350 X 200<br />
                      2.00 {{ __('general.AED') }} / {{ __('front.Day') }}
                    </figcaption>
                  </figure>

                </a>
              </div>
            </div>

          </div>


          <div class="fancy-title title-border mt-4 title-center pulse animated">
            <h4>Video Row</h4>
          </div>

          <div class="row shop-categories center px-3">
            <div class="col-lg-5">
              <div class="row">
                <div class="col">
                  <div class="border border-3 rounded">
                    <a href="{{ route('ad.create',3) }}">
                      <figure class="figure">
                        <img src="{{ url('imgs/placeAd.jpg') }}" class="figure-img img-fluid rounded" alt="Second-Row">
                        <figcaption class="figure-caption">250 X 430<br />
                          2.00 {{ __('general.AED') }} / {{ __('front.Day') }}
                        </figcaption>
                      </figure>

                    </a>
                  </div>
                </div>
                <div class="col">
                  <div class="border border-3 rounded">
                    <a href="{{ route('ad.create',3) }}">
                      <figure class="figure">
                        <img src="{{ url('imgs/placeAd.jpg') }}" class="figure-img img-fluid rounded" alt="Second-Row">
                        <figcaption class="figure-caption">250 X 430
                          <br />
                          2.00 {{ __('general.AED') }} / {{ __('front.Day') }}
                        </figcaption>
                      </figure>

                    </a>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-lg-7">
              <div class="border border-3 rounded">
                <a href="{{ route('ad.create',6) }}">
                  <figure class="figure">
                    <img src="{{ url('imgs/special.jpg') }}" class="figure-img img-fluid rounded" alt="Second-Row">
                    <figcaption class="figure-caption">Special Video</figcaption>
                  </figure>

                </a>
              </div>
            </div>

          </div>

          <div class="fancy-title title-border mt-4 title-center pulse animated">
            <h4>Single Photo</h4>
          </div>

          <div class="row shop-categories center px-3">
            <div class="col-lg-12">
              <div class="border border-3 rounded">
                <a href="{{ route('ad.create',7) }}">
                  <figure>
                    @if (App::getLocale()=='ar')

                    <img src="{{ url('imgs/e1120x400.jpg') }}" class="w-100" alt="Second-Row" />
                    @else
                    <img src="{{ url('imgs/1120x400.jpg') }}" class="w-100" alt="Second-Row" />
                    @endif

                    <figcaption class="figure-caption">1120 X 400<br />
                      3.00 {{ __('general.AED') }} / {{ __('front.Day') }}

                    </figcaption>
                  </figure>

                </a>
              </div>
            </div>
          </div>

          {{-- Featured Carousel--}}


          <div class="fancy-title title-border mt-4 title-center pulse animated">
            <h4>Last Row</h4>
          </div>
          {{-- Shop Categories--}}
          <div class="row shop-categories center px-3">
            <div class="col-lg-7">
              <div class="border border-3 rounded ">
                <a href="{{ route('ad.create',3) }}">
                  <figure dir="ltr">
                    @if (App::getLocale()=='ar')
                    <img src="{{ url('imgs/650x200 r.jpg') }}" class="w-100" alt="Top-Left">
                    @else
                    <img src="{{ url('imgs/650x200.jpg') }}" class="w-100" alt="Top-Left">
                    @endif

                    <figcaption class="figure-caption">650 X 200 <br />
                      3.00 {{ __('general.AED') }} / {{ __('front.Day') }}
                    </figcaption>
                  </figure>

                </a>
              </div>
            </div>

            <div class="col-lg-5">
              <div class="border border-3 rounded">
                <a href="{{ route('ad.create',4) }}">
                  <figure dir="ltr">
                    @if (App::getLocale()=='ar')
                    <img src="{{ url('imgs/450x200r.jpg') }}" class="w-100" alt="Top-Left">
                    @else
                    <img src="{{ url('imgs/450x200.jpg') }}" class="w-100" alt="Top-Left">
                    @endif

                    <figcaption class="w-100">450 X 200<br />
                      3.00 {{ __('general.AED') }} / {{ __('front.Day') }}
                    </figcaption>
                  </figure>

                </a>
              </div>

            </div>
          </div>



        </div>
      </div>



    </div>





  </div>


</section>
{{-- #content end --}}

@endsection