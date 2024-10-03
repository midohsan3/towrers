@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Upload Logo') }}
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
              <h3 class="nk-block-title page-title">{{ __('company.Company Logo') }}</h3>
              <div class="nk-block-des text-soft">
                <p>
                </p>
              </div>
            </div>

          </div>
          {{-- .nk-block-between --}}
        </div>
        {{-- .nk-block-head --}}

        <div class="card">
          <div class="card-inner">
            <div class="preview-block">
              <span class="preview-title-lg overline-title">{{ __('company.Upload Logo') }}</span>
              <form action="{{ route('c-company.profile.store.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row gy-4">
                  <div class="col-sm-6">
                    <div class="form-group form-inline">
                      <div class="form-control-wrap">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="logo" />
                          <label class="custom-file-label" for="customFile">{{ __('general.Choose file') }}</label>
                        </div>
                        @error('logo')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group form-inline">
                      @error('photo')
                      <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                      @enderror
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
        </div>

        <div class="card">
          <div class="card-inner">
            <div class="preview-block">

              @if (Auth::user()->profile_pic !== null)
              <div class="row g-3 d-flex justify-content-center">
                <div class="col col-md-3">
                  <div class="card">
                    <img src="{{ url('storage/app/public/imgs/user') . '/' . Auth::user()->profile_pics }}"
                      class="card-img-top" width="200" height="400" alt="{{ Auth::user()->profile_pics }}">
                    <div class="card-inner">

                    </div>
                  </div>
                </div>
              </div>
              @else
              <div class="card">
                <div class="alert alert-icon alert-danger text-center" role="alert">
                  <strong>{{ __('general.No Data Available to Show') }}.</strong>
                </div>
              </div>
              @endif

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection