@extends('layouts.front')

{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
{{__('front.Company Register')}}
@endsection
{{-- 
  ======================
  =PAGE CONTENT
  ======================
  --}}
@section('page-content')

<section class="page-title bg-transparent">
  <div class="container">
    <div class="page-title-row">

      <div class="page-title-content">
        <h1><img src="{{ url('imgs/logo.png') }}" width="150" class="rounded-circle" />
          {{__('front.Register As Company')}}</h1>
      </div>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('front') }}">{{ __('front.Home') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            {{ __('front.Register As Company') }}
          </li>
        </ol>
      </nav>

    </div>
  </div>
</section>

{{-- Content--}}>
<section id="content">
  <div class="content-wrap">
    <div class="container">

      <div class="row">
        <div class="container d-flex justify-content-center">
          <div class="col-md-6">

            <form action="{{ route('front.company.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">{{ __('front.Your Full Name') }}</label>
                <input type="text" class="form-control" id="name" name="name"
                  placeholder="{{ __('front.Your Full Name Here') }}" value="{{ old('name') }}" autofocus />
                @error('name')
                <span class="bg-danger text-white" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="position">{{ __('front.Job Title') }}</label>
                <input type="text" class="form-control" id="position" name="position"
                  placeholder="{{ __('front.Your Job Title Here') }}" value="{{ old('position') }}" />
                @error('position')
                <span class="bg-danger text-white" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="company_name">{{ __('front.Company Name') }}</label>
                <input type="text" class="form-control" id="company_name" name="company_name"
                  placeholder="{{ __('front.Your Company Name') }}" value="{{ old('company_name') }}" />
                @error('company_name')
                <span class="bg-danger text-white" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="phone">{{ __('front.Phone') }}</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('front.Phone') }}"
                  value="{{ old('phone') }}" />
                @error('phone')
                <span class="bg-danger text-white" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="email">{{ __('front.Register E-mail') }}</label>
                <input type="email" class="form-control" id="email" name="email"
                  placeholder="{{ __('front.E-mail Here') }}" value="{{ old('email') }}" autocomplete="off" />
                @error('email')
                <span class="bg-danger text-white" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="oEmail">{{ __('front.Official E-mail') }}</label>
                <input type="email" class="form-control" id="oEmail" name="oEmail"
                  placeholder="{{ __('front.E-mail Here') }}" value="{{ old('oEmail') }}" autocomplete="off" />
                @error('oEmail')
                <span class="bg-danger text-white" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password">{{ __('front.Password') }}</label>
                <input type="password" class="form-control" id="password" name="password"
                  placeholder="{{ __('front.Write Your Password') }}" autocomplete="off" />
                @error('password')
                <span class="bg-danger text-white" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password-confirm">{{ __('front.Password') }}</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                  placeholder="{{ __('front.Re-Write Your Password') }}" autocomplete="off" />
              </div>

              <div class="form-group">
                <input type="submit" class="form-control button button-dark text-white"
                  value="{{ __('general.Submit') }}" />
              </div>
            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>
{{-- #content end --}}

@endsection