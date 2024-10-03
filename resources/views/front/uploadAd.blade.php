@extends('layouts.front')

{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
{{__('general.Classifieds')}}
@endsection
{{-- 
  ======================
  =PAGE CONTENT
  ======================
  --}}
@section('page-content')


<section id="content">
  <div class="content-wrap d-flex min-vh-100 align-items-center">
    <div class="container">

      <div>
        <div class="container">
          <div class="page-title-row">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('front') }}"><strong
                      style="font-size: 1.5em; color: blue;">{{ __('front.Home') }}</strong></a></li>

                <li class="breadcrumb-item active" aria-current="page">
                  <strong style="font-size: 1.5em; color: blue;">{{__('general.Classifieds')}}</strong>
                </li>
              </ol>
            </nav>

          </div>
        </div>
      </div>

      <div class="row mt-3 d-flex justify-center">
        <div class="col-lg-6">
          <form action="{{ route('ad.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col">
                <input hidden name="package" value="{{ $package->id }}" />
                @error('package')
                <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label>Choose Your Image:</label><br>
                <input id="input-8" type="file" accept="image/*" class="file-loading form-control" name="photo"
                  value="{{ old('photo') }}" data-allowed-file-extensions='[]' data-show-preview="true">
                @error('photo')
                <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label>URL:</label>
                <input type="text" class="form-control" name="link" value="{{ old('link') }}" />
                @error('link')
                <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label>Period:</label>
                <input type="number" class="form-control" name="period" value="{{ old('link',1) }}" min="1" max="30"
                  pattern="[0-9]{2}" step="1" />
                @error('period')
                <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                @enderror
              </div>
            </div>


            <div class="row mt-2">
              <div class="col-lg-3">
                <button type="submit" class="btn btn-primary">{{ __('general.Submit') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>


    </div>
  </div>
</section>
@endsection
{{-- 
  ======================
  =PAGE SCRIPTS
  ======================
  --}}
@section('page-scripts')

@endsection