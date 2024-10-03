@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Packages') }}
@endsection
{{-- 
  =====================
  =PAGE CONTENT
  =====================
  --}}
@section('content')
<div class="nk-content ">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">{{ __('package.Packages List') }}</h3>
            </div>
            {{-- .nk-block-head-content --}}

          </div>
        </div>
        {{-- .nk-block-head --}}
        @if ($packages->count()>0)
        <div class="nk-block">
          <div class="row g-gs">
            @foreach ($packages as $package)
            <div class="col-sm-6 col-lg-4 col-xxl-3">
              <div class="card" style="height: 500px!important;">
                <div class="card-inner">
                  <div class="team">

                    @if (array_key_exists($package->id,$subscription))
                    <div class="team-status bg-success text-white"><em class="icon ni ni-check-thick"></em></div>
                    @endif

                    <div class="user-card user-card-s2">
                      <div class="user-avatar md bg-info">
                        <span class="text-uppercase">{{ Str::substr($package->name_en,0,2) }}</span>
                      </div>
                      <div class="user-info">
                        <h6>
                          @if (App::getLocale()=='ar')
                          {{ $package->name_ar }}
                          @else
                          {{ $package->name_en}}
                          @endif
                        </h6>
                      </div>
                    </div>
                    <div class="team-details">
                      <p>
                        @if (App::getLocale()=='ar')
                        {!! $package->features_ar !!}
                        @else
                        {!! $package->features_en !!}
                        @endif
                      </p>
                    </div>
                    <ul class="team-statistics">
                      <li><span>
                          @if ($package->period==0)
                          {{ __('package.Unlimited') }}
                          @else
                          {{ number_format($package->period,0) }}
                          @endif
                        </span><span>{{ __('package.Days') }}</span></li>

                      <li><span>
                          @if ($package->price==0)
                          {{ __('package.Free') }}
                          @else
                          {{ number_format($package->price,2) }}
                          @endif
                        </span><span>{{ __('general.AED') }}</span></li>
                    </ul>
                    <div class="team-view">
                      @if (array_key_exists($package->id,$subscription))
                      <a href="#" class="btn btn-round btn-outline-light w-150px disabled">
                        <span>{{__('package.Subscribe')}}</span>
                      </a>
                      @else
                      @if ($package->price==0)
                      <a href="{{ route('c-company.package.store.free',$package->id) }}"
                        class="btn btn-round btn-outline-light w-150px">
                        <span>{{__('package.Subscribe')}}</span>
                      </a>
                      @else
                      <a href="{{ route('c-company.package.paypal.form',$package->id) }}"
                        class="btn btn-round btn-outline-light w-150px">
                        <span>{{__('package.Subscribe')}}</span>
                      </a>
                      @endif

                      @endif

                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach


          </div>
        </div>
        @endif


      </div>
    </div>
  </div>
</div>
@endsection
{{-- 
  =====================
  =PAGE SCRIPTS
  =====================
  --}}
@section('scripts')

@endsection