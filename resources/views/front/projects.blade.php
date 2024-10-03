@extends('layouts.front')

{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
{{__('general.Projects')}}
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

{{-- Content--}}>
<section id="content">
  <div class="content-wrap pt-3">
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
                  <strong style="font-size: 1.5em; color: blue;">{{ __('general.Projects') }}</strong>
                </li>
              </ol>
            </nav>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2">
          <div id="shortcodes" class="widget widget_links">

            <ul>
              @foreach (projectCats() as $cat)
              <li><a href="{{ route('front.project.category',$cat->id) }}">
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

        <div class="col-lg-10 col-sm-12">

          {{-- COMPANIES --}}
          @if ($projects->count()>0)

          <div class="portfolio row grid-container gutter-10">
            @foreach ($projects as $project)
            <article class="portfolio-item col-12 col-sm-6 col-md-3 col-lg-3 pf-media pf-icons">
              <div class="team card shadow-sm border-1 h-shadow h-translatey-sm all-ts rounded-4 overflow-hidden">
                <div class="portfolio-image">
                  <img src="{{ url('storage/app/public/imgs/projects/'.$project->master_photo) }}"
                    alt="{{ $project->name_en }}">
                </div>
                <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                  <a href="{{ route('front.project.single',$project->id) }}"
                    class="overlay-trigger-icon bg-light text-dark" data-hover-animate="zoomIn"
                    data-hover-animate-out="zoomOut" data-hover-speed="350"><i class="uil uil-ellipsis-h"></i></a>
                </div>
                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>

                <div class="portfolio-desc">
                  <h3 class="mx-2"><a href="{{ route('front.project.single',$project->id) }}" class="text-primary">
                      @if (App::getLocale()=='ar')
                      {{ Str::limit($project->name_ar,8) }}
                      @else
                      {{ Str::limit($project->name_en,8) }}
                      @endif
                    </a></h3>
                  <span class="mx-2 text-danger">
                    @if ($project->city_id!==null)
                    @if (App::getLocale()=='ar')
                    {{ $project->cityProject->name_ar }}
                    @else
                    {{ $project->cityProject->name_en}}
                    @endif
                    @endif
                  </span>
                  <div class="col">
                    <div class="skill-progress mb-4" data-percent="{{ $project->progress }}" data-speed="2000"
                      style="--cnvs-progress-height: 36px; --cnvs-progress-rounded: 50rem;">
                      <div class="skill-progress-bar">
                        <div class="skill-progress-percent gradient-blue-purple"></div>
                        <div
                          class="d-flex position-absolute w-100 h-100 px-3 dark justify-content-between align-items-center">
                          <h5 class="mb-0"></h5>
                          <div class="text-dark">
                            <small class="fw-semibold">
                              <div class="counter counter-inherit counter-instant"><span data-from="0"
                                  data-to="{{ $project->progress }}" data-refresh-interval="30"
                                  data-speed="2000">0</span>%
                              </div>
                            </small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </article>
            @endforeach
            {{ $projects->links('pagination::bootstrap-5') }}
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