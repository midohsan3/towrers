@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.AD Video') }}
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
                  class="text-primary small">{{__('general.AD Video')}}</strong>
              </h3>
            </div>

          </div>
        </div>
        {{-- .nk-block-head --}}

        <div class="nk-block">
          <div class="card card-preview">
            <div class="card-inner">
              <div class="preview-block">
                <span class="preview-title-lg overline-title">{{ __('general.Main Information') }}</span>
                <form action="{{ route('adVideo.update') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <input hidden class="form-control" id="video_id" name="video_id" value="{{ $video->id}}" />
                          @error('video_id')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="link">{{ __('general.Link') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="link" name="link"
                            placeholder="{{ __('general.Link') }}" value="{{ old('link',$video->link) }}" autocomplete
                            autofocus>
                          @error('link')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="customFileLabel">{{ __('job.Photo') }}</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sm" id="customFile" name="photo">
                            <input hidden name="oldPhoto" value="{{ $video->cover }}" />
                            @error('photo')
                            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                            @enderror
                            <label class="custom-file-label" for="customFile">{{ __('general.Choose file') }}</label>
                          </div>
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
          </div>`
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>
@endsection