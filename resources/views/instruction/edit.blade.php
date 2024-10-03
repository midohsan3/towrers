@extends('layouts.admin')

{{--
=====================
=TITLE
=====================
--}}
@section('title')
{{ __('general.Edit City') }}
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

              <h3 class="nk-block-title page-title">{{ __('general.Interest') }}/ <strong class="text-primary small">
                  @if (App::getLocale()=='ar')
                  {{ $interest->name_ar }}
                  @else
                  {{ $interest->name_en }}
                  @endif
                </strong>
              </h3>

            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('interest.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('interest.index') }}"
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
                <span class="preview-title-lg overline-title">{{ __('general.Main Information')
                  }}</span>
                <form action="{{ route('interest.update') }}" method="POST">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <input hidden class="form-control" id="interest_id" name="interest_id"
                            value="{{ $interest->id }}" readonly />
                          @error('interest_id')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="name_ar">{{ __('general.Arabic Name')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="name_ar" name="name_ar"
                            placeholder="{{ __('general.Arabic Name') }}"
                            value="{{ old('name_ar',$interest->name_ar) }}" autocomplete autofocus />
                          @error('name_ar')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="name_en">{{ __('general.English Name')
                          }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="name_ar" name="name_en"
                            placeholder="{{ __('general.English Name') }}"
                            value="{{ old('name_en',$interest->name_en) }}" autocomplete />
                          @error('name_en')
                          <span class="bg-danger text-white" role="alert">{{ $message
                            }}</span>
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
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>
@endsection
