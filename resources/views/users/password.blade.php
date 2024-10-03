@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('user.Change Password') }}
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
        <div class="nk-block">
          <div class="card">
            <div class="card-aside-wrap">
              <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                  <div class="nk-block-between">
                    <div class="nk-block-head-content">
                      <h4 class="nk-block-title">{{ __('users.Change Your Password') }}</h4>
                      <div class="nk-block-des">
                      </div>
                    </div>

                    <div class="nk-block-head-content align-self-start
                                d-lg-none">
                      <a href="#" class="toggle btn btn-icon
                                  btn-trigger mt-n1" data-target="userAside"><em
                          class="icon ni ni-menu-alt-r"></em></a>
                    </div>
                  </div>
                </div>

                <div class="nk-block">
                  <div class="card">
                    <div class="card-inner-group">
                      <div class="card-inner">
                        <form action="{{ route('user.profile.updatePassword') }}" method="POST">
                          @csrf
                          <div class="row gy-4">
                            <div class="col-sm-8">
                              <div class="form-group">
                                <label class="form-label" for="oldPassword">{{ __('users.Old Password') }}</label>
                                <div class="form-control-wrap">
                                  <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                                    placeholder="{{ __('users.Your Current Password') }}" autocomplete="off"
                                    autofocus />
                                  @error('oldPassword')
                                  <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row gy-4">
                            <div class="col-sm-8">
                              <div class="form-group">
                                <label class="form-label" for="password">{{ __('users.Password') }}</label>
                                <div class="form-control-wrap">
                                  <input type="password" class="form-control" id="password" name="password"
                                    placeholder="{{ __('users.New Password') }}" autocomplete="off" />
                                  @error('password')
                                  <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row gy-4">
                            <div class="col-sm-8">
                              <div class="form-group">
                                <label class="form-label"
                                  for="password-confirm">{{ __('users.Password Confirm') }}</label>
                                <div class="form-control-wrap">
                                  <input type="password" class="form-control" id="password-confirm"
                                    name="password_confirmation" placeholder="{{ __('users.Confirm New Password') }}"
                                    autocomplete="off" />
                                  @error('password')
                                  <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row gy-4">
                            <div class="col-sm-3">
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('users.Change') }}</button>
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <a href="=====" class="btn btn-warning disabled">{{ __('users.Restart') }}</a>
                              </div>
                            </div>
                          </div>

                        </form>

                      </div>{{-- .card-inner --}}
                    </div>{{-- .card-inner-group --}}
                  </div>{{-- .card --}}
                </div>
              </div>

              @include('incs.profileSide')

              <!-- card-aside -->
            </div><!-- .card-aside-wrap -->
          </div><!-- .card -->
        </div><!-- .nk-block -->
      </div>
    </div>
  </div>
</div>

{{-- 
  ====================
  MODELS
  ====================
  --}}
<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal"><em class="icon ni
                ni-cross-sm"></em></a>
      <div class="modal-body modal-body-lg">
        <h5 class="title">Update Profile</h5>
        <div class="tab-content">
          <div class="tab-pane active" id="personal">
            <form action="{{ route('user.profile.personalUpdate') }}" method="POST">
              @csrf
              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="full-name">Full Name</label>
                    <input type="text" class="form-control form-control-lg" id="full-name"
                      value="{{ Auth::user()->name }}" name="name" placeholder="Enter Full name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label" for="phone-no">Phone Number</label>
                    <input type="text" class="form-control form-control-lg" id="phone-no" name="phone"
                      value="+971 {{ Auth::user()->phone }}" placeholder="Phone Number">
                  </div>
                </div>

                <div class="col-12">
                  <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                    <li>
                      <button type="submit" class="btn btn-lg btn-primary">Update
                        Profile</button>
                    </li>
                    <li>
                      <a href="#" data-dismiss="modal" class="link
                                          link-light">Cancel</a>
                    </li>
                  </ul>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection