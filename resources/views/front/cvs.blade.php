@extends('layouts.front')

{{--
======================
=PAGE TITLE
======================
--}}
@section('page-title')
{{__('general.CVs')}}
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

<section id="content">
    <div class="content-wrap d-flex min-vh-100 align-items-center pt-3">
        <div class="container">

            @include('incs.topAds')

            <div class="page-title bg-transparent pb-0">
                <div class="container">
                    <div class="page-title-row">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front') }}">
                                        <strong style="font-size: 1.5em; color: blue;">{{ __('front.Home') }}</strong>
                                    </a></li>

                                <li class="breadcrumb-item active" aria-current="page">
                                    <strong style="font-size: 1.5em; color: blue;"> {{__('general.CVs')}}</strong>
                                </li>
                            </ol>
                        </nav>

                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-2">
                    <div id="shortcodes" class="widget widget_links">

                        <ul>
                            @foreach (jobsCats() as $section)
                            <li><a href="{{ route('front.jobs.category',$section->id) }}">
                                    <div>
                                        @if (App::getLocale()=='ar')
                                        {{ $section->name_ar }}
                                        @else
                                        {{ $section->name_en }}
                                        @endif
                                    </div>
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="line"></div>
                </div>

                <div class="col-md-10 col-sm-12">
                    @if ($jobs->count()>0)
                    <div class="row justify-content-center gutter-50 col-mb-30">
                        @foreach ($jobs as $job)
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <img src="{{ url('imgs/cv.png') }}" alt="{{ $job->name_en }}"
                                        class="rounded-circle me-3" width="64" height="64" />
                                    <div>
                                        <h4 class="text-center mb-0 me-4">
                                            <a href="#" class="text-primary">
                                                @if (App::getLocale()=='ar')
                                                {{ $job->name_ar }}
                                                @else
                                                {{ $job->name_en }}
                                                @endif
                                            </a>

                                        </h4>
                                        <small class="text-muted mb-0 fw-normals">
                                            @if ($job->job_category_id!==null)
                                            @if (App::getLocale()=='ar')
                                            {{ $job->categoryCv->name_ar}}
                                            @else
                                            {{ $job->categoryCv->name_en}}
                                            @endif
                                            @endif
                                            @if ($job->city_id!==null)
                                            @if (App::getLocale()=='ar')
                                            ,{{ $job->cityCv->name_ar }}
                                            @else
                                            ,{{ $job->cityCv->name_en }}
                                            @endif
                                            @endif
                                        </small><br />
                                        <strong>{{ __('job.Experience') }}:</strong><span>{{ $job->experience }}</span>
                                    </div>
                                    <div>
                                        <a href="tel:{{ $job->phone }}"
                                            class="social-icon rounded-circle mb-0 border-transparent text-white bg-facebook">
                                            <i class="fas fa-mobile-android-alt fa-2x "></i>
                                            <i class="fas fa-mobile-android-alt fa-2x  "></i>
                                        </a>
                                        <a href="https://wa.me/{{ $job->whats_app }}"
                                            class="social-icon rounded-circle mb-0 border-transparent text-white bg-success">
                                            <i class="fa-brands fa-whatsapp fa-2x"></i>
                                            <i class="fa-brands fa-whatsapp fa-2x"></i>
                                        </a>
                                        <a href="mailto:{{ $job->email }}"
                                            class="social-icon rounded-circle mb-0 border-transparent text-white bg-facebook">
                                            <i class="far fa-envelope fa-2x "></i>
                                            <i class="far fa-envelope fa-2x "></i>
                                        </a>
                                        <a href="{{ url('storage/app/public/imgs/jobs/'.$job->cv) }}"
                                            class="social-icon rounded-circle mb-0 border-transparent text-white bg-rss">
                                            <i class="fal fa-file-download fa-2x"></i>
                                            <i class="fal fa-file-download fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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