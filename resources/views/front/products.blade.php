@extends('layouts.front')

{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
{{__('general.Products')}}
@endsection
{{-- 
  ======================
  =PAGE CONTENT
  ======================
  --}}
@section('page-content')
{{-- Slider--}}
@include('incs.slider')

{{-- #Slider End --}}


{{-- Content--}}
<section id="content">
  <div class="content-wrap pt-3">
    <div class="container">

      @include('incs.topAds')

      <div class="page-title bg-transparent">
        <div class="container">
          <div class="page-title-row">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('front') }}"><strong
                      style="font-size: 1.5em; color: blue;">{{ __('front.Home') }}</strong></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  <strong style="font-size: 1.5em; color: blue;">{{ __('general.Products') }}</strong>
                </li>
              </ol>
            </nav>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2">
          <div id="shortcodes" class="widget widget_links">

            <ul>
              @foreach (productCats() as $cat)
              <li><a href="{{ route('front.product.category',$cat->id) }}">
                  <div>
                    @if (App::getLocale()=='ar')
                    {{ $cat->name_ar }}
                    @else
                    {{ $cat->name_en }}
                    @endif
                  </div>
                </a></li>
              @endforeach
            </ul>
          </div>
          <div class="line"></div>
        </div>

        <div class="col col-md-10 col-sm-12">

          {{-- COMPANIES --}}
          @if ($products->count()>0)

          <div id="portfolio" class="portfolio row grid-container gutter-10" data-layout="fitRows">
            @foreach ($products as $product)
            <article class="portfolio-item col col-sm-6 col-md-3 col-lg-3 pf-media pf-icons">
              <div class="team card shadow-sm border-1 h-shadow h-translatey-sm all-ts rounded-4 overflow-hidden">
                <div class="portfolio-image">
                  <img src="{{ url('storage/app/public/imgs/products/'.$product->main_pic) }}"
                    alt="{{ $product->name_en }}">
                  <div class="bg-overlay">
                    <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                      <a href="{{ route('front.product.single',$product->id) }}"
                        class="overlay-trigger-icon bg-light text-dark" data-hover-animate="zoomIn"
                        data-hover-animate-out="zoomOut" data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                    </div>
                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                  </div>
                </div>
                <div class="portfolio-desc">
                  <h3 class="mx-2"><a href="{{ route('front.product.single',$product->id) }}" class="text-primary">
                      @if (App::getLocale()=='ar')
                      {{ $product->name_ar }}
                      @else
                      {{ $product->name_en }}
                      @endif
                    </a></h3>
                  <span class="mx-2 text-danger">
                    {{ number_format($product->price,2) }} {{ __('general.AED') }}
                  </span>
                </div>
              </div>
            </article>
            @endforeach
            {{ $products->links('pagination::bootstrap-5') }}
          </div>

          <div class="clear"></div>
          @endif
          {{-- END COMPANIES --}}
        </div>
      </div>

      @include('incs.bottomAds')

    </div>

  </div>
</section>
{{-- #content end --}}

@endsection