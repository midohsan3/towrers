@extends('layouts.admin')

{{--
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('classified.Edit Size') }}
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
                  class="text-primary small">{{__('classified.Edit Size')}}</strong>
              </h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('size.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('size.index') }}"
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
                <form action="{{ route('size.update') }}" method="POST">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <input hidden class="form-control" id="size_id" name="size_id" value="{{ $size->id }}" />
                          @error('size_id')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="name">{{ __('classified.Title') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="name" name="name"
                            placeholder="{{ __('classified.Title Here') }}" value="{{ old('name',$size->title) }}"
                            autocomplete autofocus>
                          @error('name')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="width">{{ __('classified.Width') }}</label>
                        <div class="form-control-wrap">
                          <div class="form-text-hint">
                            <span class="overline-title">PX</span>
                          </div>
                          <input type="number" class="form-control" id="width" name="width"
                            placeholder="{{ __('classified.Width Here') }}" value="{{ old('width',$size->width) }}" />
                          @error('width')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="height">{{ __('classified.Height') }}</label>
                        <div class="form-control-wrap">
                          <div class="form-text-hint">
                            <span class="overline-title">PX</span>
                          </div>
                          <input type="text" class="form-control" id="height" name="height"
                            value="{{ old('height',$size->height) }}" autocomplete>
                          @error('height')
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
          </div>`
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>
@endsection