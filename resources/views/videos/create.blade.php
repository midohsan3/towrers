@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.New Video') }}
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
                  class="text-primary small">{{__('general.New Video')}}</strong>
              </h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('video.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('video.index') }}"
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
                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row gy-4">
                    {{-- 
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="link">{{ __('general.Link') }}</label>
                    <div class="form-control-wrap">
                      <input type="text" class="form-control" id="link" name="link"
                        placeholder="{{ __('general.Link') }}" value="{{ old('link') }}" autocomplete autofocus>
                      @error('link')
                      <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
              </div>
              --}}
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-label" for="customFileLabel">{{ __('job.Photo') }}</label>
                  <div class="form-control-wrap">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input sm" id="customFileV" name="photo">
                      @error('photo')
                      <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                      @enderror
                      <label class="custom-file-label" for="customFileV">{{ __('general.Choose file') }}</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-label" for="customFileLabel">{{ __('job.video') }}</label>
                  <div class="form-control-wrap">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input sm" id="customFileV" name="video">
                      @error('video')
                      <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                      @enderror
                      <label class="custom-file-label" for="customFileV">{{ __('general.Choose file') }}</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row gy-4">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-label" for="description_ar">{{ __('general.Arabic Description') }}</label>
                  <div class="form-control-wrap">
                    <textarea class="tinymce-basic form-control" name="description_ar"
                      placeholder="{{ __('general.Arabic Description Here') }}">{{ old('description_ar') }}</textarea>
                    @error('description_ar')
                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label class="form-label" for="description_en">{{ __('general.English Description') }}</label>
                  <div class="form-control-wrap">
                    <textarea class="tinymce-basic form-control" name="description_en"
                      placeholder="{{ __('general.English Description Here') }}">{{ old('description_en') }}</textarea>
                    @error('description_en')
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