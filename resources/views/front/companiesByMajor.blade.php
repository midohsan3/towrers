@extends('layouts.front')

{{--
======================
=PAGE TITLE
======================
--}}
@section('page-title')
@if (App::getLocale()=='ar')
{{ $major->name_ar }}
@else
{{ $major->name_en }}
@endif
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
                      style="font-size: 1.5em; color: blue;">{{ __('front.Home') }}</strong></a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('front.companies') }}"><strong
                      style="font-size: 1.3em; color: blue;">{{ __('front.Companies')
                      }}</strong></a>
                </li>

                <li class="breadcrumb-item "> <a href="{{route('front.companies.section',$section->id)}}"><strong
                      style="font-size: 1.1em; color: blue;">
                      @if(App::getLocale()=='ar'))
                      {{$section->name_ar}}

                      @else
                      {{$section->name_en}}
                      @endif
                    </strong> </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><strong style="font-size: 1em; color: blue;">
                    @if (App::getLocale()=='ar')
                    {{ $major->name_ar }}
                    @else
                    {{ $major->name_en }}

                    @endif
                  </strong>
                </li>
              </ol>
            </nav>

          </div>
        </div>


        <div class="row">
          <div class="col-md-2">
            <div id="shortcodes" class="widget widget_links">

              <ul>
                @foreach ($sectionMajors as $section_major)
                <li><a
                    href="{{ route('front.companies.major',['section'=>$section->id,'major'=>$section_major->id]) }}">
                    <div>
                      @if (App::getLocale()=='ar')
                      {{ $section_major->name_ar }}
                      @else
                      {{ $section_major->name_en }}
                      @endif
                    </div>
                  </a></li>
                @endforeach
              </ul>
            </div>
            <div class="line"></div>
          </div>

          <div class="col-md-10 col-sm-12">
            {{-- COMPANIES --}}
            @if ($companies->count()>0)
            <div class="row">
              @foreach ($companies as $company)
              <div class="col-lg-4 col-sm-6">
                <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
                  <div class="fbox-icon">
                    <i><img src="{{ url('storage/app/public/imgs/users/'.$company->userCompany->profile_pic) }}"
                        class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
                  </div>
                  <div class="fbox-content">
                    <h3 class="mb-4 text-transform-none ls-0"><a
                        href="{{ route('front.companies.single',$company->id) }}"
                        style="color:blue!important; font-size: large;">
                        @if (App::getLocale()=='ar')
                        {{ Str::limit($company->name_ar,10) }}
                        @else
                        {{ Str::limit($company->name_en,10) }}
                        @endif
                      </a>
                      <br />
                      <small class="subtitle text-transform-none text-danger">
                        @if (App::getLocale()=='ar')
                        {{ $company->cityCompany->name_ar }}
                        @else
                        {{ $company->cityCompany->name_en }}
                        @endif
                      </small>
                    </h3>
                    <div class="col-12 justify-content-between">
                      @foreach ($conns as $con)
                      @if ($con->user_id ==$company->user_id)
                      @if ($con->con_type==1)
                      <span><a href=" tel:{{ $con->chanel }}" class="text-primary"><i
                            class=" fas fa-mobile-android-alt fa-2x"></i></a></span>
                      @elseif($con->con_type==3)
                      <span><a href="https://wa.me/{{ $con->chanel }}" class="text-success"><i
                            class="fab fa-whatsapp fa-2x"></i></a></span>
                      @elseif($con->con_type==6)
                      <span class="text-danger"><a href="{{ $con->chanel }}"><i
                            class="fab fa-instagram fa-2x"></i></a></span>
                      @elseif($con->con_type==11)
                      <span><a href="mailto:{{ $company->userCompany->email }}" class="text-primary">
                          <i class="fal fa-envelope fa-2x"></i></a></span>
                      @endif
                      @endif
                      @endforeach
                    </div>

                  </div>
                </div>
              </div>
              @endforeach
              {{ $companies->links('pagination::bootstrap-5') }}
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
