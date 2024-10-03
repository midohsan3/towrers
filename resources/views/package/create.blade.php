@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('package.New Package') }}
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
              <h3 class="nk-block-title page-title"><strong
                  class="text-primary small">{{__('package.New Package')}}</strong>
              </h3>
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
          <div class="card card-preview">
            <div class="card-inner">
              <div class="preview-block">
                <span class="preview-title-lg overline-title">{{ __('general.Main Information') }}</span>
                <form action="{{ route('package.store') }}" method="POST">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="name_ar">{{ __('general.Arabic Name') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="name_ar" name="name_ar"
                            placeholder="{{ __('general.Arabic Name') }}" value="{{ old('name_ar') }}" autocomplete
                            autofocus>
                          @error('name_ar')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="name_en">{{ __('general.English Name') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="name_ar" name="name_en"
                            placeholder="{{ __('general.English Name') }}" value="{{ old('name_en') }}" autocomplete>
                          @error('name_en')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="price">{{ __('package.Price') }}</label>
                        <div class="form-control-wrap">
                          <div class="form-text-hint">
                            <span class="overline-title">{{ __('general.AED') }}</span>
                          </div>
                          <input type="text" class="form-control" id="price" name="price"
                            placeholder="{{ __('general.Arabic Name') }}"
                            value="{{ number_format(old('price',0),2) }}" />
                          @error('price')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="period">{{ __('package.Period') }}</label>
                        <div class="form-control-wrap">
                          <div class="form-text-hint">
                            <span class="overline-title">{{ __('package.Days') }}</span>
                          </div>
                          <input type="text" class="form-control" id="period" name="period"
                            placeholder="{{ __('general.Arabic Name') }}"
                            value="{{ number_format(old('period',0),0) }}" />
                          @error('period')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="feature_ar">{{ __('package.Arabic Features') }}</label>
                        <div class="form-control-wrap">
                          <textarea class="tinymce-basic form-control" name="feature_ar"
                            placeholder="{{ __('package.Arabic Features Here') }}">{{ old('feature_ar') }}</textarea>
                          @error('feature_ar')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="feature_en">{{ __('package.English Features') }}</label>
                        <div class="form-control-wrap">
                          <textarea class="tinymce-basic form-control" name="feature_en"
                            placeholder="{{ __('package.English Features Here') }}">{{ old('feature_en') }}</textarea>
                          @error('feature_en')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                  </div>

                  <hr class="preview-hr">

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="{{ __('general.Submit') }}" />
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>`
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
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
<link rel="stylesheet" href="{{ asset('/assets/css/editors/tinymce.css?ver=2.4.0') }}">
<script src="{{ asset('/assets/js/libs/editors/tinymce.js?ver=2.4.0') }}"></script>
<script src="{{ asset('/assets/js/editors.js?ver=2.4.0') }}"></script>
@endsection