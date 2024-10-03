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

      <div class="row">
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
      </div>
      <div id="demo-gallery" class="masonry-thumbs grid-container row row-cols-3" data-big="2" data-lightbox="gallery">
        @if ($photos->count()>0)

        @foreach ($photos as $photo)
        <a href="{{ url('storage/app/public/imgs/projects/'.$photo->photo) }}" data-lightbox="gallery-item"
          class="grid-item pf-icons pf-media"><img src="{{ url('storage/app/public/imgs/projects/'.$photo->photo) }}"
            alt="{{ $photo->photo }}">
        </a>
        @endforeach

        @endif

      </div>

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