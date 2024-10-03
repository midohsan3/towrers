@extends('layouts.front')
{{-- 
  ======================
  =PAGE STYLES
  ======================
  --}}
@section('page-style')
<link rel="stylesheet" href="{{ asset('front/construction/construction.css') }}">
<style>
  .slider-caption-bg {
    left: 20px;
    bottom: 20px;
  }
</style>
@endsection
{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
@if (App::getLocale()=='ar')
{{ $old_project->userOldProject->companyUser->name_ar }}
@else
{{ $old_project->userOldProject->companyUser->name_en}}
@endif
@endsection
{{-- 
  ======================
  =PAGE CONTENT
  ======================
  --}}
@section('page-content')

<section class="page-title bg-transparent">
  <div class="container">
    <div class="page-title-row">

      <div class="page-title-content">
        <h1><img src="{{ url('storage/app/public/imgs/users/'.$old_project->userOldProject->profile_pic) }}" width="150"
            class="rounded-circle" />
          @if (App::getLocale()=='ar')
          {{ $old_project->userOldProject->companyUser->name_ar }}
          @else
          {{ $old_project->userOldProject->companyUser->name_en}}
          @endif
        </h1>
      </div>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('front') }}">{{ __('front.Home') }}</a></li>

          <li class="breadcrumb-item"><a href="{{ route('front.companies') }}">{{ __('front.Companies') }}</a></li>

          <li class="breadcrumb-item"><a href="{{ route('front.companies') }}">
              @if (App::getLocale()=='ar')
              {{ $old_project->userOldProject->companyUser->sectionCompany->name_ar }}
              @else
              {{ $old_project->userOldProject->companyUser->sectionCompany->name_en }}
              @endif
            </a></li>
          <li class="breadcrumb-item"><a
              href="{{ route('front.companies.single',$old_project->userOldProject->companyUser->id) }}">
              @if (App::getLocale()=='ar')
              {{ $old_project->userOldProject->companyUser->name_ar }}
              @else
              {{ $old_project->userOldProject->companyUser->name_en }}
              @endif
            </a></li>

          <li class="breadcrumb-item active" aria-current="page">
            @if (App::getLocale()=='ar')
            {{ $old_project->name_ar }}
            @else
            {{ $old_project->name_en }}
            @endif

          </li>
        </ol>
      </nav>

    </div>
  </div>
</section>

<section id="content">
  <div class="content-wrap">
    <div class="container">


      <div id="portfolio" class="portfolio row grid-container gutter-20 gutter-sm-50" data-layout="fitRows">

        <article class="portfolio-item col-12 pf-media pf-icons">
          <div class="grid-inner row g-0">
            <div class="col-lg-8">
              <div class="portfolio-image">
                <div class="grid-inner">
                  <a href="{{ route('front.companies.single.o_project.glary',$old_project->id) }}">
                    <img src="{{ url('storage/app/public/imgs/projects/'.$old_project->main_pic) }}" class="w-25"
                      alt="{{ $old_project->name_en }}">
                  </a>
                  <!-- Overlay: Start -->
                  <div class="bg-overlay">
                    <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                      <a href="{{ url('storage/app/public/imgs/projects/'.$old_project->main_pic) }}"
                        class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall"
                        data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image"
                        title="Image"><i class="uil uil-plus"></i></a>
                      <a href="{{ route('front.companies.single.o_project.glary',$old_project->id) }}"
                        class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall"
                        data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"><i
                          class="uil uil-ellipsis-h"></i></a>
                    </div>
                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                  </div>
                  <!-- Overlay: End -->
                </div>
              </div>
            </div>
            <!-- Image: End -->
            <!-- Decription: Start -->
            <div class="portfolio-desc col-lg-4 p-4 px-lg-5">
              <h3>
                @if(App::getLocale()=='ar')
                {{ $old_project->name_ar }}
                @else
                {{ $old_project->name_en }}
                @endif
              </h3>
              <p class="mt-3 d-none d-sm-block">
                @if (App::getLocale()=='ar')
                {{ $old_project->description_ar }}
                @else
                {{ $old_project->description_en}}
                @endif
              </p>
              <ul class="iconlist d-none d-md-block">
                <li><i class="bi-check-lg"></i> <strong>{{ __('front.Company') }}</strong>
                  @if (App::getLocale()=='ar')
                  {{ $old_project->userOldProject->companyUser->name_ar }}
                  @else
                  {{ $old_project->userOldProject->companyUser->name_en }}
                  @endif
                </li>

                <li><i class="bi-check-lg"></i> <strong>{{ __('front.Posted AT') }}:</strong>
                  {{ date('d M, Y',strtotime($old_project->created_at)) }}</li>
              </ul>

              <a href="{{ route('front.companies.single.o_project.glary',$old_project->id) }}"
                class="btn btn-secondary d-none d-sm-inline-block"><i class="bi-arrow-right"></i><span
                  class="visually-hidden">{{ __('general.Details') }}</span></a>
            </div>
            <!-- Description: End -->
          </div>
          <!-- Grid Inner: End -->
        </article>

      </div><!-- #portfolio end -->

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