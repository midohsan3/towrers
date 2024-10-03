@extends('layouts.admin')
{{-- 
  =====================
  =HEADER
  =====================
  --}}
@section('page-Styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('job.New CV') }}
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
              <h3 class="nk-block-title page-title"><strong class="text-primary small">{{__('job.New CV')}}</strong>
              </h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('cv.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('cv.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
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
                <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="user">{{ __('general.User') }}</label>
                        <div class="form-control-wrap">

                          <select class="selectpicker form-control" id="user" name="user" data-live-search="true"
                            autofocus>
                            <option disabled selected>{{ __('general.System') }}</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" data-tokens="{{ $user->name }}">
                              {{ $user->name }}
                            </option>
                            @endforeach

                          </select>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="name_ar">{{ __('general.Arabic Name') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="name_ar" name="name_ar"
                            placeholder="{{ __('general.Arabic Name') }}" value="{{ old('name_ar') }}" autocomplete />
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
                        <label class="form-label" for="category">{{ __('job.Category') }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" id="category" name="category">
                            <option disabled selected> {{ __('general.Choose') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $category->name_ar }}
                              @else
                              {{ $category->name_en }}
                              @endif
                            </option>
                            @endforeach
                          </select>
                          @error('category')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="city">{{ __('city.City') }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" id="city" name="city">
                            <option disabled selected> {{ __('general.Choose') }}</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $city->name_ar }}
                              @else
                              {{ $city->name_en }}
                              @endif
                            </option>
                            @endforeach
                          </select>
                          @error('category')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="description_ar">{{ __('project.Arabic Description') }}</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control" name="description_ar"
                            placeholder="{{ __('project.Arabic Description Here') }}">{{ old('description_ar') }}</textarea>
                          @error('description_ar')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="description_en">{{ __('project.English Description') }}</label>
                        <div class="form-control-wrap">
                          <textarea class="form-control" name="description_en"
                            placeholder="{{ __('project.English Description Here') }}">{{ old('description_en') }}</textarea>
                          @error('description_en')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="customFileLabel">{{ __('job.CV') }}</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sm" id="customFile" name="cv">
                            @error('cv')
                            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                            @enderror
                            <label class="custom-file-label" for="customFile">{{ __('general.Choose file') }}</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="experience">{{ __('job.Experience') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="experience" name="experience"
                            placeholder="{{ __('job.Experience') }}" value="{{ old('Experience') }}">
                          @error('Experience')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">
                  <span class="preview-title-lg overline-title">{{ __('company.Communications') }}</span>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="email">{{ __('job.E-mail') }}</label>
                        <div class="form-control-wrap">
                          <input type="email" class="form-control" id="email" name="email"
                            placeholder="{{ __('job.Email') }}" value="{{ old('email') }}">
                          @error('email')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="phone">{{ __('job.Phone') }}</label>
                        <div class="form-control-wrap">
                          <input type="phone" class="form-control" id="phone" name="phone"
                            placeholder="{{ __('job.Phone') }}" value="{{ old('phone') }}">
                          @error('phone')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="whatsapp">{{ __('job.WhatsApp') }}</label>
                        <div class="form-control-wrap">
                          <input type="phone" class="form-control" id="whatsapp" name="whatsapp"
                            placeholder="{{ __('job.Whatsapp') }}" value="{{ old('whatsapp') }}">
                          @error('whatsapp')
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection