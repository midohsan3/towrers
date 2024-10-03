@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
@if (App::getLocale()=='ar')
{{ $package->name_ar }}
@else
{{ $package->name_en }}
@endif
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
          <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">{{ __('package.Package') }}/ <strong class="text-primary small">
                  @if (App::getLocale()=='ar')
                  {{ $package->name_ar }}
                  @else
                  {{ $package->name_en }}
                  @endif
                </strong></h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('package.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('package.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                <em class="icon ni ni-arrow-left"></em>
              </a>

            </div>
          </div>
        </div>
        {{-- .nk-block-head --}}

        <div class="nk-block">
          <div class="card">
            <div class="card-aside-wrap">
              <div class="card-content">

                <div class="card-inner">
                  <div class="nk-block">
                    <div class="nk-block-head">
                      <h5 class="title">{{ __('general.Main Information') }}</h5>
                      <p>{{ __('general.Main Information at our platform') }}.</p>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="profile-ud-list">

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.Arabic Name') }}</span>
                          <span class="profile-ud-value">{{ $package->name_ar }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.English Name') }}</span>
                          <span class="profile-ud-value">{{ $package->name_en }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.Submitted Date') }}</span>
                          <span class="profile-ud-value">{{ date('d M, Y', strtotime($package->created_at)) }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.Last Update') }}</span>
                          <span class="profile-ud-value">{{ date('d M, Y', strtotime($package->updated_at)) }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.Status') }}</span>
                          @if ($package->status==1)
                          <span class="profile-ud-value text-success">
                            {{ __('general.Active') }}
                          </span>
                          @else
                          <span class="profile-ud-value text-danger">
                            {{ __('general.Inactive') }}
                          </span>
                          @endif

                        </div>
                      </div>

                    </div>{{-- .profile-ud-list --}}
                  </div>
                  {{-- .nk-block --}}

                  <div class="nk-divider divider md"></div>

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">{{ __('package.Arabic Features') }}</h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>{!! $package->features_ar !!}</p>
                        </div>

                      </div>
                      {{-- .bq-note-item --}}
                    </div>{{-- .bq-note --}}
                  </div>

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">{{ __('package.English Features') }}</h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>{!! $package->features_en !!}</p>
                        </div>

                      </div>
                      {{-- .bq-note-item --}}
                    </div>{{-- .bq-note --}}
                  </div>


                </div>
                {{-- .card-inner --}}
              </div>
              {{-- .card-content --}}

            </div>
            {{-- .card-aside-wrap --}}

          </div>
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>
@endsection