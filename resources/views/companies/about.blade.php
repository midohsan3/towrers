@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('company.About') }}
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
                </strong>
              </h3>
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
          <div class="card card-preview">
            <div class="card-inner">
              <div class="preview-block">
                <span class="preview-title-lg overline-title">{{ __('general.Main Information') }}</span>
                <form action="{{ route('company.about.update') }}" method="POST">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <input hidden class="form-control form-control-sm" id="company" name="company"
                            value="{{ $company->id }}" />
                          @error('company')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-label" for="about_ar">{{ __('company.Arabic About') }}</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control" name="about_ar"
                            placeholder="{{ __('company.About In Arabic Here') }}">{{ old('about_ar',$company->bio_ar) }}</textarea>
                          @error('about_ar')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-label" for="about_en">{{ __('company.English About') }}</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control" name="about_en"
                            placeholder="{{ __('company.About In English Here') }}">{{ old('about_en', $company->bio_en) }}</textarea>
                          @error('about_en')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="{{ __('general.Update') }}" />
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>
@endsection