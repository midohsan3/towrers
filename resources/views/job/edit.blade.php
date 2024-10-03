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
{{ __('job.Edit Job') }}
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
              <h3 class="nk-block-title page-title"><strong class="text-primary small">{{ __('job.Job') }}/ <strong
                    class="text-primary small">
                    @if (App::getLocale()=='ar')
                    {{ $job->name_ar }}
                    @else
                    {{ $job->name_en }}
                    @endif
                  </strong>
              </h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('job.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('job.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                <em class="icon ni ni-arrow-left"></em>
              </a>

            </div>
          </div>
        </div>
        {{-- .nk-block-head --}}

        <div class="nk-block ">
          <div class="card card-preview">
            <div class="card-inner  ">
              <div class="preview-block">
                <div class="row justify-content-end">
                  <img src="{{ url('storage/app/public/imgs/jobs/'.$job->photo) }}" class="img-thumbnail" alt="...">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="nk-block">
          <div class="card card-preview">
            <div class="card-inner">
              <div class="preview-block">
                <span class="preview-title-lg overline-title">{{ __('general.Main Information') }}</span>
                <form action="{{ route('job.update') }}" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <input hidden class="form-control" id="job" name="job" value="{{ $job->id }}" />
                          @error('job')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="company">{{ __('general.Companies') }}</label>
                        <div class="form-control-wrap">
                          <select class="selectpicker form-control" id="company" name="company" data-live-search="true"
                            autofocus>
                            @if ($job->user_id==null)
                            <option disabled selected>{{ __('general.System') }}</option>
                            @foreach ($companies as $company)
                            @if (App::getLocale()=='ar')
                            <option value="{{ $company->user_id }}" data-tokens="{{ $company->name_ar }}">
                              {{ $company->name_ar }}
                            </option>
                            @else
                            <option value="{{ $company->user_id }}" data-tokens="{{ $company->name_en }}">
                              {{ $company->name_en }}
                            </option>
                            @endif
                            @endforeach
                            @else
                            <option disabled>{{ __('general.System') }}</option>
                            @foreach ($companies as $company)
                            @if (App::getLocale()=='ar')
                            <option value="{{ $company->user_id }}" data-tokens="{{ $company->name_ar }}" selected>
                              {{ $company->name_ar }}
                            </option>
                            @else
                            <option value="{{ $company->user_id }}" data-tokens="{{ $company->name_en }}" selected>
                              {{ $company->name_en }}
                            </option>
                            @endif
                            @endforeach
                            @endif
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
                            placeholder="{{ __('general.Arabic Name') }}" value="{{ old('name_ar',$job->name_ar) }}"
                            autocomplete />
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
                            placeholder="{{ __('general.English Name') }}" value="{{ old('name_en',$job->name_en) }}"
                            autocomplete>
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
                            <option disabled> {{ __('general.Choose') }}</option>
                            @foreach ($categories as $category)
                            @if ($category->id ==$job->job_category_id)
                            <option value="{{ $category->id }}" selected>
                              @if (App::getLocale()=='ar')
                              {{ $category->name_ar }}
                              @else
                              {{ $category->name_en }}
                              @endif
                            </option>
                            @else
                            <option value="{{ $category->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $category->name_ar }}
                              @else
                              {{ $category->name_en }}
                              @endif
                            </option>
                            @endif
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
                            <option disabled> {{ __('general.Choose') }}</option>
                            @foreach ($cities as $city)
                            @if ($city->id == $job->city_id)
                            <option value="{{ $city->id }}" selected>
                              @if (App::getLocale()=='ar')
                              {{ $city->name_ar }}
                              @else
                              {{ $city->name_en }}
                              @endif
                            </option>
                            @else
                            <option value="{{ $city->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $city->name_ar }}
                              @else
                              {{ $city->name_en }}
                              @endif
                            </option>
                            @endif

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
                            placeholder="{{ __('project.Arabic Description Here') }}">{{ old('description_ar',$job->description_ar) }}</textarea>
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
                            placeholder="{{ __('project.English Description Here') }}">{{ old('description_en',$job->description_en) }}</textarea>
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
                        <label class="form-label" for="customFileLabel">{{ __('job.Photo') }}</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sm" id="customFile" name="photo">
                            <input hidden name="old_photo" value="{{ $job->photo }}" />
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

                  <hr class="preview-hr">
                  <span class="preview-title-lg overline-title">{{ __('company.Communications') }}</span>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="email">{{ __('job.E-mail') }}</label>
                        <div class="form-control-wrap">
                          <input type="email" class="form-control" id="email" name="email"
                            placeholder="{{ __('general.HR Email') }}" value="{{ old('email',$job->email) }}"
                            autocomplete>
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
                            placeholder="{{ __('general.HR Phone') }}" value="{{ old('phone',$job->phone) }}"
                            autocomplete>
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
                            placeholder="{{ __('general.HR Whatsapp') }}" value="{{ old('whatsapp',$job->whatsapp) }}"
                            autocomplete>
                          @error('whatsapp')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

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
{{-- 
  =====================
  =PAGE SCRIPTS
  =====================
  --}}
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection