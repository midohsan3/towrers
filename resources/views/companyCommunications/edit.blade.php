@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('city.Edit Connection') }}
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

              <h3 class="nk-block-title page-title">{{ __('company.Chanel') }}/ <strong class="text-primary small">
                  @if ($con->con_type==1)
                  {{ __('general.Phone') }}
                  @elseif($con->con_type==2)
                  {{ (__('company.Fax')) }}
                  @elseif($con->con_type==3)
                  {{ __('company.WhatsApp') }}
                  @elseif($con->con_type==4)
                  {{ __('company.Face Book') }}
                  @elseif($con->con_type==5)
                  {{ __('company.Twitter') }}
                  @elseif($con->con_type==6)
                  {{ __('company.Instagram') }}
                  @elseif($con->con_type==7)
                  {{ __('company.Telegram') }}
                  @elseif($con->con_type==8)
                  {{ __('company.Tik Tok') }}
                  @elseif($con->con_type==9)
                  {{ __('company.SnapChat') }}
                  @elseif($con->con_type==10)
                  {{ __('company.Linked In') }}
                  @endif
                </strong>
              </h3>

            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('communication.index',$con->user_id) }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('communication.index',$con->user_id) }}"
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
                <form action="{{ route('communication.update') }}" method="POST">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <input hidden class="form-control" id="con_id" name="conID" value="{{ $con->id }}" readonly />
                          @error('conID')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="con_type">{{ __('company.Chanel') }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control" name="con_type" autofocus>
                            @if ($con->con_type==1)
                            <option value="1" selected>{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @elseif($con->con_type==2)
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2" selected>{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @elseif($con->con_type==3)
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3" selected>{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @elseif($con->con_type==4)
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4" selected>{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @elseif($con->con_type==5)
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5" selected>{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @elseif($con->con_type==6)
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6" selected>{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @elseif($con->con_type==7)
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7" selected>{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @elseif($con->con_type==8)
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8" selected>{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @elseif($con->con_type==9)
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9" selected>{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @elseif($con->con_type==10)
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10" selected>{{ __('company.Linked In') }}</option>
                            @else
                            <option disabled selected>{{ __('general.Choose') }}</option>
                            <option value="1">{{ __('company.Phone') }}</option>
                            <option value="2">{{ __('company.Fax') }}</option>
                            <option value="3">{{ __('company.WhatsApp') }}</option>
                            <option value="4">{{ __('company.Face Book') }}</option>
                            <option value="5">{{ __('company.Twitter') }}</option>
                            <option value="6">{{ __('company.Instagram') }}</option>
                            <option value="7">{{ __('company.Telegram') }}</option>
                            <option value="8">{{ __('company.Tik Tok') }}</option>
                            <option value="9">{{ __('company.SnapChat') }}</option>
                            <option value="10">{{ __('company.Linked In') }}</option>
                            @endif
                          </select>
                          @error('con_type')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="chanel">{{ __('company.Chanel') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control" id="chanel" name="chanel"
                            placeholder="{{ __('general.English Name') }}" value="{{ old('chanel',$con->chanel) }}"
                            autocomplete />
                          @error('chanel')
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
          </div>`
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>
@endsection