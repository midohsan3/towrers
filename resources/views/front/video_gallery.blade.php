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

{{-- Content--}}

<section id="content" dir="ltr">
    <div class="content-wrap">
        <div class="container">

            <div class="row justify-content-center mb-6">
                <div class="col-xl-6 col-lg-8 text-center">
                    <h3 class="h1 fw-bold mb-4">{{ __('general.Video Gallery') }}</h3>
                    <p></p>
                </div>
            </div>

            <div class="clear"></div>
            @if ($videos->count()>0)
            <div class="row align-items-stretch text-center dark mx-0">

                @foreach ($videos as $video)
                <div class="col-md-4 videoplay-on-hover overflow-hidden rounded-3 mb-3 mb-md-2"
                    style="min-height: 500px;">
                    <div class="vertical-middle mt-5 pt-5">
                        <h7 class="mb-5 ls-1 font-body h2">

                        </h7>
                    </div>

                    <div class="video-wrap no-placeholder position-absolute w-100 h-100 rounded-3 mx-md-3"
                        style="top: 0; left:0;">
                        <video id="slide-video" poster="{{ url('storage/app/public/imgs/videos'.'/'.$video->cover) }}"
                            preload="auto" playsinline>
                            <source src="{{ url('storage/app/public/imgs/videos'.'/'.$video->video) }}"
                                type='video/mp4'>
                        </video>

                        <div class="video-overlay" style="background: rgba(0,0,0,0.2);">
                        </div>
                    </div>
                    <div class="bg-overlay">
                        <div class="bg-overlay-content text-overlay-mask dark align-items-end justify-content-start">
                            <h4 class="ml-3">
                                @if (App::getLocale()=='ar')
                                {{ $video->description_ar }}
                                @else
                                {{ $video->description_en }}
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
                @endforeach




            </div>
            @endif


        </div>
    </div>
</section>

{{-- #content end --}}

@endsection

@section('page-scripts')
<script>
    jQuery(document).ready(function(){
  			jQuery('.videoplay-on-hover').hover( function(){
  				if( jQuery(this).find('video').length > 0 ) {
  					jQuery(this).find('video').get(0).play();
  				}
  			}, function(){
  				if( jQuery(this).find('video').length > 0 ) {
  					jQuery(this).find('video').get(0).pause();
  				}
  			});
  		});
</script>
@endsection
