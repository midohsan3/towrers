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
                <form action="{{ route('c-company.majors.store') }}" method="POST">
                  @csrf

                  <div class="row gy-4">
                    @if ($majors->count()>0)
                    @foreach ($majors as $major)
                    @if (in_array($major->id,$companyMajors))
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