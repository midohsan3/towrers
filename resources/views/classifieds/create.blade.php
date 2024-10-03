@extends('layouts.admin')

{{-- 
  =====================
  =PAGE STYLES
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
{{ __('classified.New Classified') }}
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
                  class="text-primary small">{{__('classified.New Classified')}}</strong>
              </h3>
            </div>

            @if (in_array(Auth::user()->role_name,['Company','Person']))
            <div></div>
            @else
            <div class="nk-block-head-content">
              <a href="{{ route('classified.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('classified.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                <em class="icon ni ni-arrow-left"></em>
              </a>

            </div>
            @endif

          </div>
        </div>
        {{-- .nk-block-head --}}

        <div class="nk-block">
          <div class="card card-preview">
            <div class="card-inner">
              <div class="preview-block">
                <span class="preview-title-lg overline-title">{{ __('general.Main Information') }}</span>
                <form action="{{ route('classified.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="user">{{ __('classified.E-mail') }}</label>
                        <div class="form-control-wrap">
                          <select class="selectpicker form-control" name="user" data-live-search="true" id="user">
                            <option disabled selected>{{ __('general.System') }}</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" data-tokens="{{ $user->email }}">
                              {{ $user->email }}
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
                        <label class="form-label" for="name_ar">{{ __('classified.Arabic Title') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="name_ar" name="name_ar"
                            placeholder="{{ __('classified.Arabic Title') }}" value="{{ old('name_ar') }}" autocomplete
                            autofocus>
                          @error('name_ar')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="name_en">{{ __('classified.English Title') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="name_ar" name="name_en"
                            placeholder="{{ __('classified.English Title') }}" value="{{ old('name_en') }}"
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
                        <label class="form-label" for="package">{{ __('classified.Package') }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" id="package" name="package">
                            <option disabled selected>{{ __('general.Choose') }}</option>
                            @foreach ($packages as $package)
                            <option value="{{ $package->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $package->name_ar }}
                              @else
                              {{ $package->name_en}}
                              @endif
                            </option>
                            @endforeach
                          </select>
                          @error('package')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="link">{{ __('classified.URL') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}"
                            placeholder="{{ __('classified.Link Here') }}" />
                          @error('link')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="photo">{{ __('classified.Photo') }}</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="photo" />
                            <label class="custom-file-label" for="customFile">{{ __('general.Choose file') }}</label>
                          </div>
                          @error('photo')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group">
                        @error('photo')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">
                  <span class="preview-title-lg overline-title">{{ __('classified.Payments Information') }}</span>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="amount">{{ __('classified.Amount') }}</label>
                        <div class="form-control-wrap" id="new_amount">
                          <input type="text" class="form-control" name="amount" id="amount"
                            value="{{ old('amount',0) }}" />
                          @error('amount')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">
                  <span class="preview-title-lg overline-title">{{ __('classified.Communication Information') }}</span>

                  <div class="row gy-4" id="user_info">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="userName">
                          {{ __('classified.User') }}
                        </label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" name="userName" id="userName" value=" {{old("
                            userName") }}" />
                          @error("userName")
                          <span class="bg-danger text-white" role="alert">
                            {{ $message }}
                          </span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="phone">
                          {{ __("company.Phone") }}
                        </label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" name="phone" id="phone" value="{{ old("phone")}} " />
                          @error("phone")
                          <span class="bg-danger text-white" role="alert"> {{ $message}} </span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="whatsapp">{{ __("company.WhatsApp")  }} </label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                            value="{{ old("whatsapp")}} " />
                          @error("whatsapp")
                          <span class="bg-danger text-white" role="alert">{{ $message}} </span>
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
          </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js">
</script>

<script>
  jQuery(document).ready(function(){
    /*
    ########################################
    //GET USER INFORMATION AJAX
    ########################################
    */
            jQuery('#user').change(function(e){
               e.preventDefault();
               let url = "{{ route('classified.user.info','user_id') }}";
               url = url.replace('user_id',$(this).val());
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: url,
                  //dataType: 'json',
                  method: 'GET',
                  //data: {
                    // package: jQuery('#package').val(),
                  //},
                  success: function(result){
                    $('#user_info').html(result.success)
                     //console.log(result.success)
                  },
                });
               });
            
    /*
    ########################################
    //GET PACKAGE AMOUNT AJAX
    ########################################
    */
            jQuery('#package').change(function(e){
               e.preventDefault();
               let url = "{{ route('classified.package.amount','package_id') }}";
               url = url.replace('package_id',$(this).val());
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: url,
                  //dataType: 'json',
                  method: 'GET',
                  //data: {
                    // package: jQuery('#package').val(),
                  //},
                  success: function(result){
                    $('#amount').val(result.success)
                     //console.log(result.success)
                  },
                });
               });
            
              });
</script>

@endsection