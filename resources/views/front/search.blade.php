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
  <div class="content-wrap pt-2">

    <div class="container">

      {{-- Shop Categories--}}
      @include('incs.topAds')


      {{-- Featured Carousel--}}
      @if ($projects->count()>0)

      <div class="fancy-title title-border mt-4 title-center pulse animated">
        <h4>{{ __('front.Featured Projects') }}</h4>
      </div>


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
          </div>

      <div class="row d-flex justify-content-end mt-4">
        <div class="col-md-2">
          <a class="btn btn-primary rounded-pill button-change ms-3 px-3" href="{{ route('front.project') }}">
            <span>{{ __('front.see more') }}</span>
          </a>

        </div>
      </div>
      @endif


      {{-- CONSULTANTS --}}
      @if ($consultants->count()>0)
      <div class="fancy-title title-border mt-4 title-center pulse animated">
        <h4>{{ __('front.Most Popular Consultants') }}</h4>
      </div>

      <div class="row pulse animated">

        @foreach ($consultants as $consultant)
        <div class="col-lg-3 col-sm-6 mb-4">
          <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
            <div class="fbox-icon">
              <i><img src="{{ url('storage/app/public/imgs/users/'.$consultant->userCompany->profile_pic) }}"
                  class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
            </div>
            <div class="fbox-content">
              <h3 class="mb-4 text-transform-none ls-0"><a href="{{ route('front.companies.single',$consultant->id) }}"
                  style="color:blue!important; font-size: large;">
                  @if (App::getLocale()=='ar')
                  {{ Str::limit($consultant->name_ar,15) }}
                  @else
                  {{ Str::limit($consultant->name_en,15) }}
                  @endif
                </a>
                <br />
                <small class="subtitle text-transform-none text-danger">
                  @if (App::getLocale()=='ar')
                  {{ $consultant->cityCompany->name_ar }}
                  @else
                  {{ $consultant->cityCompany->name_en }}
                  @endif
                </small>
              </h3>
              <div class="col-12 justify-content-between">
                @foreach ($conns as $con)
                @if ($con->user_id ==$consultant->user_id)
                @if ($con->con_type==1)
                <span><a href=" tel:{{ $con->chanel }}" class="text-primary"><i
                      class=" fas fa-mobile-android-alt fa-2x"></i></a></span>
                @elseif($con->con_type==3)
                <span><a href="https://wa.me/{{ $con->chanel }}" class="text-success"><i
                      class="fab fa-whatsapp fa-2x"></i></a></span>
                @elseif($con->con_type==6)
                <span class="text-danger"><a href="{{ $con->chanel }}"><i class="fab fa-instagram fa-2x"></i></a></span>
                @elseif($con->con_type==11)
                <span><a href="mailto:{{ $con->chanel }}" class="text-primary">
                    <i class="fal fa-envelope fa-2x"></i></a></span>
                @endif
                @endif
                @endforeach

              </div>

            </div>
          </div>
        </div>
        @endforeach

      </div>

      <div class="row d-flex justify-content-end mt-2">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.companies.section',1) }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>
      <div class="clear"></div>
      @endif
      {{-- END CONSULTANTS --}}

      {{-- CONTRACTORS --}}
      @if ($contractors->count()>0)
      <div class="fancy-title title-border mt-4 title-center ">
        <h4>{{ __('front.Most Popular Contractors') }}</h4>
      </div>

      <div class="row">
        @foreach ($contractors as $contractor)
        <div class="col-lg-3 col-sm-6 mb-4">
          <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
            <div class="fbox-icon">
              <i><img src="{{ url('storage/app/public/imgs/users/'.$contractor->userCompany->profile_pic) }}"
                  class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
            </div>
            <div class="fbox-content">
              <h3 class="mb-4 text-transform-none ls-0"><a href="{{ route('front.companies.single',$contractor->id) }}"
                  style="color:blue!important; font-size: large;">
                  @if (App::getLocale()=='ar')
                  {{ Str::limit($contractor->name_ar,15) }}
                  @else
                  {{ Str::limit($contractor->name_en,15) }}
                  @endif
                </a>
                <br />
                <small class="subtitle text-transform-none text-danger">
                  @if (App::getLocale()=='ar')
                  {{ $contractor->cityCompany->name_ar }}
                  @else
                  {{ $contractor->cityCompany->name_en }}
                  @endif
                </small>
              </h3>
              <div class="col-12 justify-content-between">
                @foreach ($conns as $con)
                @if ($con->user_id ==$contractor->user_id)
                @if ($con->con_type==1)
                <span><a href=" tel:{{ $con->chanel }}" class="text-primary"><i
                      class=" fas fa-mobile-android-alt fa-2x"></i></a></span>
                @elseif($con->con_type==3)
                <span><a href="https://wa.me/{{ $con->chanel }}" class="text-success"><i
                      class="fab fa-whatsapp fa-2x"></i></a></span>
                @elseif($con->con_type==6)
                <span class="text-danger"><a href="{{ $con->chanel }}"><i class="fab fa-instagram fa-2x"></i></a></span>
                @elseif($con->con_type==11)
                <span><a href="mailto:{{ $con->chanel}}" class="text-primary">
                    <i class="fal fa-envelope fa-2x"></i></a></span>
                @endif
                @endif
                @endforeach
              </div>

            </div>
          </div>
        </div>
        @endforeach

      </div>

      <div class="row d-flex justify-content-end my-5">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.companies.section',2) }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>
      <div class="clear"></div>
      @endif
      {{-- END CONTRACTORS --}}

      {{-- SUB-CONTRACTORS --}}
      @if ($subcontractors->count()>0)
      <div class="fancy-title title-border mt-4 title-center">
        <h4>{{ __('front.Most Popular Sub-Contractors') }}</h4>
      </div>

      <div class="row ">
        @foreach ($subcontractors as $subcontractor)
        <div class="col-lg-3 col-sm-6 mb-4">
          <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
            <div class="fbox-icon">
              <i><img src="{{ url('storage/app/public/imgs/users/'.$subcontractor->userCompany->profile_pic) }}"
                  class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
            </div>
            <div class="fbox-content">
              <h3 class="mb-4 text-transform-none ls-0"><a
                  href="{{ route('front.companies.single',$subcontractor->id) }}"
                  style="color:blue!important; font-size: large;">
                  @if (App::getLocale()=='ar')
                  {{ Str::limit($subcontractor->name_ar,15) }}
                  @else
                  {{ Str::limit($subcontractor->name_en,15) }}
                  @endif
                </a>
                <br />
                <small class="subtitle text-transform-none text-danger">
                  @if (App::getLocale()=='ar')
                  {{ $subcontractor->cityCompany->name_ar }}
                  @else
                  {{ $subcontractor->cityCompany->name_en }}
                  @endif
                </small>
              </h3>
              <div class="col-12 justify-content-between">
                @foreach ($conns as $con)
                @if ($con->user_id ==$subcontractor->user_id)
                @if ($con->con_type==1)
                <span><a href=" tel:{{ $con->chanel }}" class="text-primary"><i
                      class=" fas fa-mobile-android-alt fa-2x"></i></a></span>
                @elseif($con->con_type==3)
                <span><a href="https://wa.me/{{ $con->chanel }}" class="text-success"><i
                      class="fab fa-whatsapp fa-2x"></i></a></span>
                @elseif($con->con_type==6)
                <span class="text-danger"><a href="{{ $con->chanel }}"><i class="fab fa-instagram fa-2x"></i></a></span>
                @elseif($con->con_type==11)
                <span><a href="mailto:{{$con->chanel }}" class="text-primary">
                    <i class="fal fa-envelope fa-2x"></i></a></span>
                @endif
                @endif
                @endforeach
              </div>

            </div>
          </div>
        </div>
        @endforeach

      </div>

      <div class="row d-flex justify-content-end mx-2">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.companies.section',3) }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>
      <div class="clear"></div>
      @endif
      {{-- END SUB-CONTRACTORS --}}

      {{-- SUPPLIERS --}}
      @if ($suppliers->count()>0)
      <div class="fancy-title title-border mt-4 title-center">
        <h4>{{ __('front.Most Popular Suppliers') }}</h4>
      </div>

      <div class="row">
        @foreach ($suppliers as $supplier)
        <div class="col-lg-3 col-sm-6 mb-4">
          <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
            <div class="fbox-icon">
              <i><img src="{{ url('storage/app/public/imgs/users/'.$supplier->userCompany->profile_pic) }}"
                  class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
            </div>
            <div class="fbox-content">
              <h3 class="mb-4 text-transform-none ls-0"><a href="{{ route('front.companies.single',$supplier->id) }}"
                  style="color:blue!important; font-size: large;">
                  @if (App::getLocale()=='ar')
                  {{ Str::limit($supplier->name_ar,15) }}
                  @else
                  {{ Str::limit($supplier->name_en,15) }}
                  @endif
                </a>
                <br />
                <small class="subtitle text-transform-none text-danger">
                  @if (App::getLocale()=='ar')
                  {{ $supplier->cityCompany->name_ar }}
                  @else
                  {{ $supplier->cityCompany->name_en }}
                  @endif
                </small>
              </h3>
              <div class="col-12 justify-content-between">
                @foreach ($conns as $con)
                @if ($con->user_id ==$supplier->user_id)
                @if ($con->con_type==1)
                <span><a href=" tel:{{ $con->chanel }}" class="text-primary"><i
                      class=" fas fa-mobile-android-alt fa-2x"></i></a></span>
                @elseif($con->con_type==3)
                <span><a href="https://wa.me/{{ $con->chanel }}" class="text-success"><i
                      class="fab fa-whatsapp fa-2x"></i></a></span>
                @elseif($con->con_type==6)
                <span class="text-danger"><a href="{{ $con->chanel }}"><i class="fab fa-instagram fa-2x"></i></a></span>
                @elseif($con->con_type==11)
                <span><a href="mailto:{{ $con->chanell }}" class="text-primary">
                    <i class="fal fa-envelope fa-2x"></i></a></span>
                @endif
                @endif
                @endforeach
              </div>

            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row d-flex justify-content-end mt-2">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.companies.section',4) }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>
      <div class="clear"></div>
      @endif
      {{-- END SUPPLIERS --}}

    </div>

    <div class="container">
      {{-- Building Materials --}}
      @if ($buildingMaterials->count()>0)
      <div class="fancy-title title-border mt-4 title-center">
        <h4>{{ __('front.Most Popular Building-Materials') }}</h4>
      </div>

      <div class="row">
        @foreach ($buildingMaterials as $b_materials)
        <div class="col-lg-3 col-sm-6 mb-4">
          <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
            <div class="fbox-icon">
              <i><img src="{{ url('storage/app/public/imgs/users/'.$b_materials->userCompany->profile_pic) }}"
                  class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
            </div>
            <div class="fbox-content">
              <h3 class="mb-4 text-transform-none ls-0"><a href="{{ route('front.companies.single',$b_materials->id) }}"
                  style="color:blue!important; font-size: large;">
                  @if (App::getLocale()=='ar')
                  {{ Str::limit($b_materials->name_ar,15) }}
                  @else
                  {{ Str::limit($b_materials->name_en,15) }}
                  @endif
                </a>
                <br />
                <small class="subtitle text-transform-none text-danger">
                  @if (App::getLocale()=='ar')
                  {{ $b_materials->cityCompany->name_ar }}
                  @else
                  {{ $b_materials->cityCompany->name_en }}
                  @endif
                </small>
              </h3>
              <div class="col-12 justify-content-between">
                @foreach ($conns as $con)
                @if ($con->user_id ==$b_materials->user_id)
                @if ($con->con_type==1)
                <span><a href=" tel:{{ $con->chanel }}" class="text-primary"><i
                      class=" fas fa-mobile-android-alt fa-2x"></i></a></span>
                @elseif($con->con_type==3)
                <span><a href="https://wa.me/{{ $con->chanel }}" class="text-success"><i
                      class="fab fa-whatsapp fa-2x"></i></a></span>
                @elseif($con->con_type==6)
                <span class="text-danger"><a href="{{ $con->chanel }}"><i class="fab fa-instagram fa-2x"></i></a></span>
                @elseif($con->con_type==11)
                <span><a href="mailto:{{ $con->chanel }}" class="text-primary">
                    <i class="fal fa-envelope fa-2x"></i></a></span>
                @endif
                @endif
                @endforeach
              </div>

            </div>
          </div>
        </div>
        @endforeach

      </div>

      <div class="row d-flex justify-content-end mt-2">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.companies.section',5) }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>
      <div class="clear"></div>
      @endif
      {{--END Building Materials --}}

      {{-- REALESTATE --}}
      @if ($realestates->count()>0)
      <div class="fancy-title title-border mt-4 title-center">
        <h4>{{ __('front.Most Popular Real-Estate') }}</h4>
      </div>

      <div class="row">
        @foreach ($realestates as $realestate)
        <div class="col-lg-3 col-sm-6 mb-4">
          <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
            <div class="fbox-icon">
              <i><img src="{{ url('storage/app/public/imgs/users/'.$realestate->userCompany->profile_pic) }}"
                  class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
            </div>
            <div class="fbox-content">
              <h3 class="mb-4 text-transform-none ls-0"><a href="{{ route('front.companies.single',$realestate->id) }}"
                  style="color:blue!important; font-size: large;">
                  @if (App::getLocale()=='ar')
                  {{ Str::limit($realestate->name_ar,15) }}
                  @else
                  {{ Str::limit($realestate->name_en,15) }}
                  @endif
                </a>
                <br />
                <small class="subtitle text-transform-none text-danger">
                  @if (App::getLocale()=='ar')
                  {{ $realestate->cityCompany->name_ar }}
                  @else
                  {{ $realestate->cityCompany->name_en }}
                  @endif
                </small>
              </h3>
              <div class="col-12 justify-content-between">
                @foreach ($conns as $con)
                @if ($con->user_id ==$realestate->user_id)
                @if ($con->con_type==1)
                <span><a href=" tel:{{ $con->chanel }}" class="text-primary"><i
                      class=" fas fa-mobile-android-alt fa-2x"></i></a></span>
                @elseif($con->con_type==3)
                <span><a href="https://wa.me/{{ $con->chanel }}" class="text-success"><i
                      class="fab fa-whatsapp fa-2x"></i></a></span>
                @elseif($con->con_type==6)
                <span class="text-danger"><a href="{{ $con->chanel }}"><i class="fab fa-instagram fa-2x"></i></a></span>
                @elseif($con->con_type==11)
                <span><a href="mailto:{{ $con->chanel }}" class="text-primary">
                    <i class="fal fa-envelope fa-2x"></i></a></span>
                @endif
                @endif
                @endforeach
              </div>

            </div>
          </div>
        </div>
        @endforeach

      </div>

      <div class="row d-flex justify-content-end mt-2">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.companies.section',6) }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>
      <div class="clear"></div>
      @endif
      {{--END REALESTATE --}}
    </div>

    <div class="container">
      {{-- DESIGNERS --}}
      @if ($designers->count()>0)
      <div class="fancy-title title-border title-center">
        <h4>{{ __('front.Most Popular Interior Desng Decor') }}</h4>
      </div>

      <div class="row">
        @foreach ($designers as $designer)
        <div class="col-lg-3 col-sm-6 mb-4">
          <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
            <div class="fbox-icon">
              <i><img src="{{ url('storage/app/public/imgs/users/'.$designer->userCompany->profile_pic) }}"
                  class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
            </div>
            <div class="fbox-content">
              <h3 class="mb-4 text-transform-none ls-0"><a href="{{ route('front.companies.single',$designer->id) }}"
                  style="color:blue!important; font-size: large;">
                  @if (App::getLocale()=='ar')
                  {{ Str::limit($designer->name_ar,15) }}
                  @else
                  {{ Str::limit($designer->name_en,15) }}
                  @endif
                </a>
                <br />
                <small class="subtitle text-transform-none text-danger">
                  @if (App::getLocale()=='ar')
                  {{ $designer->cityCompany->name_ar }}
                  @else
                  {{ $designer->cityCompany->name_en }}
                  @endif
                </small>
              </h3>
              <div class="col-12 justify-content-between">
                @foreach ($conns as $con)
                @if ($con->user_id ==$designer->user_id)
                @if ($con->con_type==1)
                <span><a href=" tel:{{ $con->chanel }}" class="text-primary"><i
                      class=" fas fa-mobile-android-alt fa-2x"></i></a></span>
                @elseif($con->con_type==3)
                <span><a href="https://wa.me/{{ $con->chanel }}" class="text-success"><i
                      class="fab fa-whatsapp fa-2x"></i></a></span>
                @elseif($con->con_type==6)
                <span class="text-danger"><a href="{{ $con->chanel }}"><i class="fab fa-instagram fa-2x"></i></a></span>
                @elseif($con->con_type==11)
                <span><a href="mailto:{{ $con->chanel }}" class="text-primary">
                    <i class="fal fa-envelope fa-2x"></i></a></span>
                @endif
                @endif
                @endforeach
              </div>

            </div>
          </div>
        </div>
        @endforeach

      </div>

      <div class="row d-flex justify-content-end">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.companies.section',7) }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>
      @endif
      {{--END DESIRERS --}}


      {{-- JOBS START--}}
      @if ($jobs->count()>0)
      <div class="row justify-content-center gutter-50 col-mb-30 mt-5">
        <div class="fancy-title title-border mt-4 title-center">
          <h4>{{ __('general.Jobs') }}</h4>
        </div>
        @foreach ($jobs as $job)
        <div class="col-xl-6">
          <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
              @if ($job->user_id !==null)
              <img src="{{ url('storage/app/public/imgs/users/'.$job->userJob->profile_pic) }}"
                alt="{{ $job->name_en }}" class="rounded-circle me-3" width="64" height="64" />
              @else
              <img src="{{ url('imgs/job.png') }}" alt="{{ $job->name_en }}" class="rounded-circle me-3" width="64"
                height="64" />
              @endif
              <div>
                <h4 class="text-center mb-0 me-4">
                  <a href="{{ route('front.jobs.single',$job->id) }}" class="text-primary">
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
                  {{ $job->categoryJob->name_ar}}
                  @else
                  {{ $job->categoryJob->name_en}}
                  @endif
                  @endif
                  @if ($job->city_id!==null)
                  @if (App::getLocale()=='ar')
                  ,{{ $job->cityJob->name_ar }}
                  @else
                  ,{{ $job->cityJob->name_en }}
                  @endif
                  @endif
                </small>
              </div>
              <div>
                @if ($job->phone!==null)
                <a href="tel:{{ $job->phone }}"
                  class="social-icon rounded-circle mb-0 border-transparent text-white bg-facebook">
                  <i class="fas fa-mobile-android-alt fa-2x "></i>
                  <i class="fas fa-mobile-android-alt fa-2x  "></i>
                </a>
                @endif

                @if ($job->whatsapp!== null)
                <a href="https:://wa.me/{{ $job->whatsapp }}"
                  class="social-icon rounded-circle mb-0 border-transparent text-white bg-success">
                  <i class="fa-brands fa-whatsapp fa-2x"></i>
                  <i class="fa-brands fa-whatsapp fa-2x"></i>
                </a>
                @endif

                @if ($job->email!==null)
                <a href="mailto:{{ $job->email }}"
                  class="social-icon rounded-circle mb-0 border-transparent text-white bg-facebook">
                  <i class="far fa-envelope fa-2x "></i>
                  <i class="far fa-envelope fa-2x "></i>
                </a>
                @endif

              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row d-flex justify-content-end mt-2">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.jobs') }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>

      @endif
      {{-- JOBS END--}}

      {{-- CVS START--}}
      @if ($cvs->count()>0)
      <div class="row justify-content-center gutter-50 col-mb-30 mt-5">
        <div class="fancy-title title-border mt-4 title-center">
          <h4>{{ __('general.CVs') }}</h4>
        </div>
        @foreach ($cvs as $cv)
        <div class="col-xl-6">
          <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
              @if ($cv->user_id !==null)
              <img src="{{ url('storage/app/public/imgs/users/'.$cv->userJob->profile_pic) }}" alt="{{ $cv->name_en }}"
                class="rounded-circle me-3" width="64" height="64" />
              @else
              <img src="{{ url('imgs/cv.png') }}" alt="{{ $job->name_en }}" class="rounded-circle me-3" width="64"
                height="64" />
              @endif
              <div>
                <h4 class="text-center mb-0 me-4">
                  <a href="#" class="text-primary">
                    @if (App::getLocale()=='ar')
                    {{ $cv->name_ar }}
                    @else
                    {{ $cv->name_en }}
                    @endif
                  </a>
                </h4>
                <small class="text-muted mb-0 fw-normals">
                  @if ($cv->job_category_id !==null)
                  @if (App::getLocale()=='ar')
                  {{ $cv->categoryCv->name_ar}}
                  @else
                  {{ $cv->categoryCv->name_en}}
                  @endif
                  @endif
                  @if ($cv->city_id!==null)
                  @if (App::getLocale()=='ar')
                  ,{{ $cv->cityCv->name_ar }}
                  @else
                  ,{{ $cv->cityCv->name_en }}
                  @endif
                  @endif
                </small><br />
                <strong>{{ __('job.Experience') }}:</strong><span>{{ $cv->experience }}</span>
              </div>
              <div>
                <a href="tel:{{ $cv->phone }}"
                  class="social-icon rounded-circle mb-0 border-transparent text-white bg-facebook">
                  <i class="fas fa-mobile-android-alt fa-2x "></i>
                  <i class="fas fa-mobile-android-alt fa-2x  "></i>
                </a>
                <a href="https:://wa.me/{{ $cv->whatsapp }}"
                  class="social-icon rounded-circle mb-0 border-transparent text-white bg-success">
                  <i class="fa-brands fa-whatsapp fa-2x"></i>
                  <i class="fa-brands fa-whatsapp fa-2x"></i>
                </a>
                <a href="mailto:{{ $cv->email }}"
                  class="social-icon rounded-circle mb-0 border-transparent text-white bg-facebook">
                  <i class="far fa-envelope fa-2x "></i>
                  <i class="far fa-envelope fa-2x "></i>
                </a>
                <a href="{{ url('storage/app/public/imgs/jobs/'.$cv->cv) }}"
                  class="social-icon rounded-circle mb-0 border-transparent text-white bg-rss">
                  <i class="fal fa-file-download fa-2x"></i>
                  <i class="fal fa-file-download fa-2x"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="clear"></div>
      </div>

      <div class="row d-flex justify-content-end mt-2">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.cvs') }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>
      @endif
      {{-- CVS END--}}
    </div>

    {{-- PRODUCTS START--}}
    <div class="container">


      @if ($products->count()>0)
      <div class="fancy-title title-border mt-4 mb-4 title-center">
        <div class="fancy-title title-border mt-4 title-center">
          <h4>{{ __('general.Products') }}</h4>
        </div>
      </div>
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

      <div class="row d-flex justify-content-end mt-2">
        <div class="col-md-2">
          <span><a class="btn btn-primary rounded-pill button-change ms-3 px-3"
              href="{{ route('front.product') }}">{{ __('front.see more') }}</a></span>
        </div>
      </div>
    </div>
    @endif

    <div class="container mt-5">
      @include('incs.bottomAds')
    </div>

  </div>
  {{-- PRODUCTS END--}}

  </div>
</section>
{{-- #content end --}}

@endsection