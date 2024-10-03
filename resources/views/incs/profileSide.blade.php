<div class="card-aside card-aside-left user-aside
                          toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside"
  data-toggle-screen="lg" data-toggle-overlay="true">
  <div class="card-inner-group" data-simplebar>
    <div class="card-inner">
      <div class="user-card">
        <div class="user-avatar bg-primary">
          @if (Auth::user()->profile_pic == null)
          <span class="text-uppercase">{{ substr(Auth::user()->name,0,2) }}</span>
          @else
          <img src="{{ url('storage/app/public/imgs/users/'.Auth::user()->profile_pic) }}"
            alt="{{ Auth::user()->name }}" />
          @endif
        </div>
        <div class="user-info">
          <span class="lead-text">
            @if (Auth::user()->role_name=='Company')
            @if (App::getLocale()=='ar')
            {{ Auth::user()->companyUser->name_ar }}
            @else
            {{ Auth::user()->companyUser->name_ar }}
            @endif
            @else
            {{ Auth::user()->name }}
            @endif
          </span>
          <span class="sub-text">{{ Auth::user()->email }}</span>
          @if ($company_mail)
          <span class="sub-text">{{ $company_mail->chanel }}</span>
          @endif
        </div>
        <div class="user-action">
          <div class="dropdown">
            <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em
                class="icon ni ni-more-v"></em></a>
            <div class="dropdown-menu
                                      dropdown-menu-right">
              <ul class="link-list-opt no-bdr">
                <li><a href="#"><em class="icon ni
                                              ni-camera-fill"></em><span>Change
                      Photo</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-inner p-0">
      <ul class="link-list-menu">
        <li><a class="active" href="{{route('user.profile')}}">
            <em class="icon ni ni-user-fill-c"></em>
            <span>Personal Information</span>
          </a></li>

        @if (Auth::user()->role_name=='Company')
        <li><a href="{{ route('user.profile.company') }}">
            <i class="icon fas fa-user-chart"></i>
            <span>Company Information</span>
          </a> </li>
        @endif

        {{-- 
        <li><a href="#" ><em class="icon ni ni-activity-round-fill"></em><span>Account
              Activity</span></a></li>
              --}}
        <li><a href="{{ route('user.profile.ngePassword') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Security
              Settings</span></a></li>
      </ul>
    </div><!-- .card-inner -->
  </div><!-- .card-inner-group -->
</div>