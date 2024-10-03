@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('user.User Profile') }}
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
                      <h4 class="nk-block-title">Personal Information</h4>
                      <div class="nk-block-des">
                        <p>Basic info, like your name and address,
                          that you use on Nio Platform.</p>
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
                  <div class="nk-data data-list">
                    <div class="data-head">
                      <h6 class="overline-title">Basics</h6>
                    </div>
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                      <div class="data-col">
                        <span class="data-label">Full Name</span>
                        <span class="data-value">{{ Auth::user()->name }}</span>
                      </div>
                      <div class="data-col data-col-end"><span class="data-more"> <em
                            class="icon ni ni-forward-ios"></em></span></div>
                    </div><!-- data-item -->

                    <div class="data-item">
                      <div class="data-col">
                        <span class="data-label">Email</span>
                        <span class="data-value">{{ Auth::user()->email }}</span>
                      </div>
                      <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni
                                      ni-lock-alt"></em></span></div>
                    </div><!-- data-item -->
                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                      <div class="data-col">
                        <span class="data-label">Phone Number</span>
                        @if (Auth::user()->phone == null)
                        <span class="data-value text-soft">Not add yet</span>
                        @else
                        <span class="data-value text-soft">{{ Auth::user()->phone }}</span>
                        @endif
                      </div>
                      <div class="data-col data-col-end"><span class="data-more"><em class="icon ni
                                      ni-forward-ios"></em></span></div>
                    </div>

                  </div><!-- data-list -->
                  <div class="nk-data data-list">
                    <div class="data-head">
                      <h6 class="overline-title">Preferences</h6>
                    </div>
                    <div class="data-item">
                      <div class="data-col">
                        <span class="data-label">Status</span>
                        <span class="data-value">
                          @if (Auth::user()->status==0)
                          <span class="text-danger">{{ __('general.Inactive') }}</span>
                          @else
                          <span class="text-success">{{ __('general.Active') }}</span>
                          @endif
                        </span>
                      </div>

                    </div><!-- data-item -->
                    <div class="data-item">
                      <div class="data-col">
                        <span class="data-label">Join Date</span>
                        <span class="data-value">{{ date('M d, Y',strtotime(Auth::user()->created_at)) }}</span>
                      </div>
                    </div>

                  </div>
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