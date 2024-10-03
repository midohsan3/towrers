@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('city.Company Majors') }}
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
              <a href="{{ route('company.index',$company->user_id) }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('company.index',$company->user_id) }}"
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
                <form action="{{ route('company.majors.update') }}" method="POST">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <input hidden class="form-control" id="company" name="company_id" value="{{ $company->id }}"
                            readonly />
                          @error('company_id')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    @if ($majors->count()>0)
                    @foreach ($majors as $major)
                    @if (array_key_exists($major->id,$companyMajors))
                    <div class="col-md-3 custom-control custom-checkbox mb-1">
                      <input type="checkbox" checked class="custom-control-input" id="major{{ $major->id }}"
                        name="major[]" value="{{ $major->id }}">
                      <label class="custom-control-label text-capitalize" for="major{{ $major->id }}">
                        @if (App::getLocale()=='ar')
                        {{ $major->name_ar }}
                        @else
                        {{ $major->name_en }}
                        @endif
                      </label>
                    </div>
                    @else
                    <div class="col-md-3 custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="major{{ $major->id }}" name="major[]"
                        value="{{ $major->id }}">
                      <label class="custom-control-label text-capitalize" for="major{{ $major->id }}">
                        @if (App::getLocale()=='ar')
                        {{ $major->name_ar }}
                        @else
                        {{ $major->name_en }}
                        @endif
                      </label>
                    </div>
                    @endif
                    @endforeach
                    @endif
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