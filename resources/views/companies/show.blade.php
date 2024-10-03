@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
@if (App::getLocale()=='ar')
{{ $company->name_ar }}
@else
{{ $company->name_en }}
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
              <h3 class="nk-block-title page-title">{{ __('company.Company') }}/ <strong class="text-primary small">
                  @if (App::getLocale()=='ar')
                  {{ $company->name_ar }}
                  @else
                  {{ $company->name_en }}
                  @endif
                </strong></h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('company.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('company.index') }}"
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
                          <span class="profile-ud-value">{{ $company->name_ar }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.English Name') }}</span>
                          <span class="profile-ud-value">{{ $company->name_en }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('section.Section') }}</span>
                          <span class="profile-ud-value">
                            @if (App::getLocale()=='ar')
                            {{ $company->sectionCompany->name_ar }}
                            @else
                            {{ $company->sectionCompany->name_en }}
                            @endif
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label"></span>
                          <span class="profile-ud-value"> </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('package.Package') }}</span>
                          <span class="profile-ud-value">
                            @if (App::getLocale()=='ar')
                            {{ $company->packageCompany->name_ar }}
                            @else
                            {{ $company->packageCompany->name_en }}
                            @endif
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('company.Expired At') }}</span>
                          <span class="profile-ud-value">
                            ========
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.Submitted Date') }}</span>
                          <span class="profile-ud-value">{{ date('d M, Y', strtotime($company->created_at)) }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.Last Update') }}</span>
                          <span class="profile-ud-value">{{ date('d M, Y', strtotime($company->updated_at)) }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('company.Address') }}</span>
                          <span class="profile-ud-value">
                            @if (App::getLocale()=='ar')
                            {{ $company->cityCompany->name_ar }}
                            @else
                            {{ $company->cityCompany->name_ar }}
                            @endif
                            <span>,</span><span>{{ $company->address }}</span>
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.Status') }}</span>
                          @if ($company->userCompany->status==1)
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
                      <h5 class="title">{{ __('company.Arabic About') }}</h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>{{ $company->bio_ar }}</p>
                        </div>

                      </div>
                      {{-- .bq-note-item --}}
                    </div>{{-- .bq-note --}}
                  </div>

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">{{ __('company.English About') }}</h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>{{ $company->bio_en }}</p>
                        </div>

                      </div>
                      {{-- .bq-note-item --}}
                    </div>{{-- .bq-note --}}
                  </div>

                  <div class="nk-divider divider md"></div>

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">{{ __('section.Majors') }}</h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <div class="row">
                            @if ($majors->count()>0)
                            @foreach ($majors as $major)
                            <div class="col-md-3">
                              @if (App::getLocale()=='ar')
                              {{ $major->name_ar }}
                              @else
                              {{ $major->name_en }}
                              @endif
                            </div>
                            @endforeach
                            @endif
                          </div>
                        </div>

                      </div>
                      {{-- .bq-note-item --}}
                    </div>{{-- .bq-note --}}
                  </div>

                  <div class="nk-divider divider md"></div>

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">{{ __('company.Communications') }}</h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <div class="profile-ud-list">
                            @if ($communications->count()>0)
                            @foreach ($communications as $con)
                            <div class="profile-ud-item">
                              <div class="profile-ud wider">
                                <span class="profile-ud-label">
                                  @if ($con->con_type==1)
                                  {{ __('company.Phone') }}
                                  @elseif($con->con_type==2)
                                  {{ __('company.Fax') }}
                                  @elseif($con->con_type==3)
                                  {{ __('company.WhatsApp') }}
                                  @elseif($con->con_type==4)
                                  {{ __('company.Face Book') }}
                                  @elseif($con->con_type==5)
                                  {{ __('company.Twitter') }}
                                  @elseif($con->con_type==6)
                                  {{ __('company.Instagram') }}
                                  @elseif($con->con_type==7)
                                  {{ __('company.Telegram') }}
                                  @elseif($con->con_type==8)
                                  {{ __('company.Tik Tok') }}
                                  @elseif($con->con_type==9)
                                  {{ __('company.SnapChat') }}
                                  @elseif($con->con_type==10)
                                  {{ __('company.Linked In') }}
                                  @endif
                                </span>
                                <span class="profile-ud-value">{{ $con->chanel }}</span>
                              </div>
                            </div>
                          </div>
                          @endforeach
                          @endif
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