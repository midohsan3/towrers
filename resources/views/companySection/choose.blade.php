@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Section') }}
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
              <h3 class="nk-block-title page-title">{{ __('general.Sections') }}</h3>
            </div>

          </div>
          {{-- .nk-block-between --}}
        </div>
        {{-- .nk-block-head --}}
        <div class="nk-block">
          <div class="card card-preview">
            <div class="card-inner">
              <div class="preview-block">
                <span class="preview-title-lg overline-title">{{ __('dashboard.What Is Your Company Grade') }}</span>
                <form action="{{ route('c-company.section.store') }}" method="POST">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="section_id">{{ __('dashboard.Company Grade') }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" id="section_id" name="section_id" autofocus>
                            <option disabled selected>{{ __('general.Choose') }}</option>
                            @foreach ($sections as $section)
                            @if ($section->id==Auth::user()->companyUser->section_id)
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
        </div>

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

@endsection