@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('section.Edit Major') }}
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
                  class="text-primary small">{{__('section.New Major')}}</strong>
              </h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ url()->previous()}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ url()->previous()}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
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
                <form action="{{ route('major.update') }}" method="POST">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <input hidden name="major_id" value="{{ $major->id }}" />
                          @error('major_id')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="section_id">{{ __('section.Section') }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" autofocus id="section_id" name="section_id">
                            @foreach ($sections as $section)
                            @if ($section->id == $major->section_id)
                            <option value="{{ $section->id }}" selected>
                              @if (App::getLocale()=='ar')
                              {{ $section->name_ar }}
                              @else
                              {{ $section->name_en }}
                              @endif
                            </option>
                            @else
                            <option value="{{ $section->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $section->name_ar }}
                              @else
                              {{ $section->name_en }}
                              @endif
                            </option>
                            @endif
                            @endforeach
                          </select>
                          @error('section_id')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
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
                            placeholder="{{ __('general.Arabic Name') }}" value="{{ old('name_ar',$major->name_ar) }}"
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
                            placeholder="{{ __('general.English Name') }}" value="{{ old('name_en',$major->name_en) }}"
                            autocomplete>
                          @error('name_en')
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