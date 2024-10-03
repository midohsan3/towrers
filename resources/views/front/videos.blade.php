@extends('layouts.front')

{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
{{__('general.Videos')}}
@endsection
{{-- 
  ======================
  =PAGE CONTENT
  ======================
  --}}
@section('page-content')

{{-- Slider--}}>
@include('incs.slider')

{{-- #Slider End --}}

<section id="content">
  <div class="content-wrap d-flex min-vh-100 align-items-center">
    <div class="container">

      @include('incs.topAds')

      <div>
        <div class="container">
          <div class="page-title-row">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('front') }}"><strong
                      style="font-size: 1.5em; color: blue;">{{ __('front.Home') }}</strong></a></li>

                <li class="breadcrumb-item active" aria-current="page">
                  <strong style="font-size: 1.5em; color: blue;">{{__('general.Videos')}}</strong>
                </li>
              </ol>
            </nav>

          </div>
        </div>
      </div>

      <div class="row mt-2">


        <div class="col-lg-12">
          @if ($videos->count()>0)
          <div class="row justify-content-center gutter-50 col-mb-30">
            @foreach ($videos as $video)
            <div class="col col-lg-4 ">
              <div class="video-facade position-relative"
                data-video-html='<iframe width="560" height="315" src="{{ $video->link }}" allowfullscreen></iframe>'>
                <div class="video-facade-preview">
                  <img src="{{ url('storage/app/public/imgs/videos/'.$video->cover) }}" alt="Video Facade Video Preview"
                    class="w-100">
                  <div class="bg-overlay">
                    <div class="bg-overlay-content dark">
                      <a href="#" class="overlay-trigger-icon size-lg op-ts op-07 bg-light text-dark"
                        data-hover-animate="op-1" data-hover-animate-out="op-07"><i
                          class="bi-play-fill fs-2 position-relative" style="left:1px"></i></a>
                    </div>
                  </div>
                </div>
                <div class="video-facade-content"></div>
              </div>
            </div>
            @endforeach
            {{ $videos->links('pagination::bootstrap-5') }}
            <div class="clear"></div>
          </div>
          @endif

        </div>
      </div>

      @include('incs.bottomAds')

    </div>
  </div>
</section>
@endsection
{{-- 
  ======================
  =PAGE SCRIPTS
  ======================
  --}}
@section('page-scripts')

@endsection