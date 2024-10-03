@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Glary') }}
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
              <h3 class="nk-block-title page-title"></h3>

            </div>

          </div>
          {{-- .nk-block-between --}}
        </div>
        {{-- .nk-block-head --}}

        <div class="card">
          <div class="card-inner">
            <div class="preview-block">
              <span class="preview-title-lg overline-title">{{ __('project.Upload Photo') }}</span>
              <form action="{{ route('slider.company.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row gy-4">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input hidden class="form-control" id="slider" name="slider" value="{{ $slider->id }}" />
                        @error('slider')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row gy-4">
                  <div class="col-sm-6">
                    <div class="form-group form-inline">
                      <div class="form-control-wrap">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="photo" />
                          <label class="custom-file-label" for="customFile">{{ __('general.Choose file') }}</label>

                          <input hidden name="old_photo" value="{{ $slider->photo }}" />
                        </div>
                        @error('photo')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-control-wrap">
                        <input type="submit" class="btn btn-primary" value="{{ __('general.Update') }}" />
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

              </form>

            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-inner">
            <div class="preview-block">
              <span class="preview-title-lg overline-title">{{ __('project.Projects Glary') }}</span>


              <div class="row g-3 d-flex justify-content-center">
                <div class="col">
                  <div class="card">
                    <img src="{{ url('storage/app/public/imgs/sliders') . '/' . $slider->photo }}" class="card-img-top"
                      width="1116" height="391" alt="{{ $slider->photos }}">

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection