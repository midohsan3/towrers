<div class="nk-header nk-header-fixed is-light">
  <div class="container-fluid">
    <div class="nk-header-wrap">

      <div class="nk-menu-trigger d-xl-none ml-n1">
        <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu">
          <em class="icon ni ni-menu"></em>
        </a>
      </div>

      <div class="nk-header-brand d-xl-none">
        <a href="html/index.html" class="logo-link">
          <img class="logo-light logo-img" src="{{ url('imgs/logo.png') }}" srcset="{{ url('imgs/logo.png') }} 2x"
            alt="logo">
          <img class="logo-dark logo-img" src="{{ url('imgs/logo.png') }}" srcset="{{ url('imgs/logo.png') }} 2x"
            alt="logo-dark">
        </a>
      </div>
      {{-- .nk-header-brand --}}
      <div class="nk-header-search ml-3 ml-xl-0">
        <em class="icon ni ni-search"></em>
        <input type="text" class="form-control border-transparent
                    form-focus-none" placeholder="Search anything">
      </div>
      {{-- .nk-header-news --}}
      <div class="nk-header-tools">
        <ul class="nk-quick-nav">
          {{--
          <li class="dropdown chats-dropdown hide-mb-xs">
            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
              <div class="icon-status icon-status-na"><em class="icon
                            ni ni-comments"></em></div>
            </a>
            <div class="dropdown-menu dropdown-menu-xl
                        dropdown-menu-right">
              <div class="dropdown-head">
                <span class="sub-title nk-dropdown-title">Recent Chats</span>
                <a href="#">Setting</a>
              </div>
              <div class="dropdown-body">
                <ul class="chat-list">
                  <li class="chat-item">
                    <a class="chat-link" href="html/apps-chats.html">
                      <div class="chat-media user-avatar">
                        <span>IH</span>
                        <span class="status dot dot-lg dot-gray"></span>
                      </div>
                      <div class="chat-info">
                        <div class="chat-from">
                          <div class="name">Iliash Hossain</div>
                          <span class="time">Now</span>
                        </div>
                        <div class="chat-context">
                          <div class="text">You: Please confrim if you
                            got my last messages.</div>
                          <div class="status delivered">
                            <em class="icon ni ni-check-circle-fill"></em>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li><!-- .chat-item -->
                  <li class="chat-item is-unread">
                    <a class="chat-link" href="html/apps-chats.html">
                      <div class="chat-media user-avatar bg-Spink">
                        <span>AB</span>
                        <span class="status dot dot-lg dot-success"></span>
                      </div>
                      <div class="chat-info">
                        <div class="chat-from">
                          <div class="name">Abu Bin Ishtiyak</div>
                          <span class="time">4:49 AM</span>
                        </div>
                        <div class="chat-context">
                          <div class="text">Hi, I am Ishtiyak, can you
                            help me with this problem ?</div>
                          <div class="status unread">
                            <em class="icon ni ni-bullet-fill"></em>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li><!-- .chat-item -->
                  <li class="chat-item">
                    <a class="chat-link" href="html/apps-chats.html">
                      <div class="chat-media user-avatar">
                        <img src="./images/avatar/b-sm.jpg" alt="">
                      </div>
                      <div class="chat-info">
                        <div class="chat-from">
                          <div class="name">George Philips</div>
                          <span class="time">6 Apr</span>
                        </div>
                        <div class="chat-context">
                          <div class="text">Have you seens the claim
                            from Rose?</div>
                        </div>
                      </div>
                    </a>
                  </li><!-- .chat-item -->
                  <li class="chat-item">
                    <a class="chat-link" href="html/apps-chats.html">
                      <div class="chat-media user-avatar
                                  user-avatar-multiple">
                        <div class="user-avatar">
                          <img src="./images/avatar/c-sm.jpg" alt="">
                        </div>
                        <div class="user-avatar">
                          <span>AB</span>
                        </div>
                      </div>
                      <div class="chat-info">
                        <div class="chat-from">
                          <div class="name">Softnio Group</div>
                          <span class="time">27 Mar</span>
                        </div>
                        <div class="chat-context">
                          <div class="text">You: I just bought a new
                            computer but i am having some problem</div>
                          <div class="status sent">
                            <em class="icon ni ni-check-circle"></em>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li><!-- .chat-item -->
                  <li class="chat-item">
                    <a class="chat-link" href="html/apps-chats.html">
                      <div class="chat-media user-avatar">
                        <img src="./images/avatar/a-sm.jpg" alt="">
                        <span class="status dot dot-lg dot-success"></span>
                      </div>
                      <div class="chat-info">
                        <div class="chat-from">
                          <div class="name">Larry Hughes</div>
                          <span class="time">3 Apr</span>
                        </div>
                        <div class="chat-context">
                          <div class="text">Hi Frank! How is you
                            doing?</div>
                        </div>
                      </div>
                    </a>
                  </li><!-- .chat-item -->
                  <li class="chat-item">
                    <a class="chat-link" href="html/apps-chats.html">
                      <div class="chat-media user-avatar bg-purple">
                        <span>TW</span>
                      </div>
                      <div class="chat-info">
                        <div class="chat-from">
                          <div class="name">Tammy Wilson</div>
                          <span class="time">27 Mar</span>
                        </div>
                        <div class="chat-context">
                          <div class="text">You: I just bought a new
                            computer but i am having some problem</div>
                          <div class="status sent">
                            <em class="icon ni ni-check-circle"></em>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li><!-- .chat-item -->
                </ul>
                <!-- .chat-list -->
              </div>
              <!-- .nk-dropdown-body -->
              <div class="dropdown-foot center">
                <a href="html/apps-chats.html">View All</a>
              </div>
            </div>
          </li>
          --}}
          <li class="dropdown notification-dropdown">
            <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
              <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-xl
                        dropdown-menu-right">
              <div class="dropdown-head">
                <span class="sub-title nk-dropdown-title">Notifications({{
                  Auth::user()->unreadNotifications->count() }})</span>
                <a href="{{ route('instruction.readAll') }}">Mark All as Read</a>
              </div>
              <div class="dropdown-body">
                <div class="nk-notification">
                  @if (Auth::user()->unreadNotifications->count()>0)
                  @foreach (Auth::user()->unreadNotifications as $notif)
                  <div class="nk-notification-item dropdown-inner">
                    <div class="nk-notification-icon">
                      <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                    </div>
                    <div class="nk-notification-content">
                      <div class="nk-notification-text">
                        @isset($notif->data['project_id'])
                        <a href="{{ route('front.project.single',$notif->data['project_id']) }}">
                          @endisset

                          @if(isset($notif->data['project_id']))
                          <a href="{{ route('front.project.single',$notif->data['project_id']) }}">
                            @elseif(isset($notif->data['job_id']))
                            <a href="{{ route('front.jobs') }}">
                              @elseif(isset($notif->data['product_id']))
                              <a href="{{ route('front.product.single',$notif->data['product_id']) }}">
                                @else
                                <a href="#">
                                  @endif

                                  <span>
                                    @if (App::getLocale()=='ar')
                                    {{ $notif->data['name_ar']}}
                                    @else
                                    {{ $notif->data['name_en']}}
                                    @endif
                                  </span>
                                </a>
                      </div>
                      <div class="nk-notification-time">{{$notif->created_at->diffForHumans()}}
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endif

                </div>{{-- .nk-notification --}}
              </div>{{-- .nk-dropdown-body --}}
              <div class="dropdown-foot center">
                <a href="#">View All</a>
              </div>
            </div>
          </li>
          @if (app()->getLocale()=='ar')
          <li>
            <a rel="alternate" hreflang="English"
              href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
              <div class="user-avatar sm bg-primary">
                En
              </div>
            </a>
          </li>
          @else
          <li>
            <a rel="alternate" hreflang="العربية"
              href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
              <div class="user-avatar sm bg-primary">
                ع
              </div>

            </a>
          </li>
          @endif

          <li class="dropdown user-dropdown">
            <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
              <div class="user-toggle">
                <div class="user-avatar sm">
                  @if (Auth::user()->profile_pic == null)
                  <em class="icon ni ni-user-alt"></em>
                  @else
                  <img src="{{ url('storage/app/public/imgs/users/'.Auth::user()->profile_pic) }}"
                    alt="{{ Auth::user()->name }}" />
                  @endif
                </div>
                <div class="user-info d-none d-xl-block">
                  <div class="user-status user-status-unverified">{{ Auth::user()->role_name }}</div>
                  <div class="user-name dropdown-indicator">{{ substr(Auth::user()->name,0,15) }}
                  </div>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-md
                        dropdown-menu-right">
              <div class="dropdown-inner user-card-wrap bg-lighter
                          d-none d-md-block">
                <div class="user-card">
                  <div class="user-avatar sm">
                    @if (Auth::user()->profile_pic == null)
                    <span class="text-uppercase">{{ substr(Auth::user()->name,0,2) }}</span>
                    @else
                    <img src="{{ url('storage/app/public/imgs/users/'.Auth::user()->profile_pic) }}"
                      alt="{{ Auth::user()->name }}" />
                    @endif
                  </div>

                  <div class="user-info">
                    <span class="lead-text">{{ Str::title(Auth::user()->name) }}</span>
                    <span class="sub-text">{{ Auth::user()->email }}</span>
                  </div>
                </div>
              </div>
              <div class="dropdown-inner">
                <ul class="link-list">
                  <li><a href="{{route('user.profile')}}"><em class="icon ni ni-user-alt"></em><span>View
                        Profile</span></a></li>
                  {{--
                  <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account
                        Setting</span></a></li>
                  <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login
                        Activity</span></a></li>
                  --}}
                  <li><a class="dark-switch" href="#"><em class="icon
                                  ni ni-moon"></em><span>Dark Mode</span></a></li>
                </ul>
              </div>
              <div class="dropdown-inner">
                <ul class="link-list">
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-frm').submit();">
                      <em class="icon ni ni-signout"></em>
                      <span>{{ __('Sing Out') }}</span></a>
                  </li>
                  <form id="logout-frm" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </ul>
              </div>
            </div>
          </li>

        </ul>
      </div>
    </div>
    {{-- .nk-header-wrap --}}
  </div><!-- .container-fliud -->
</div>