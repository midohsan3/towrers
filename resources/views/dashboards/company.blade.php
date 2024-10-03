@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Dashboard') }}
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
              <h3 class="nk-block-title page-title">{{ __('general.Dashboard') }}</h3>
            </div>
            {{-- .nk-block-head-content --}}
            <div class="nk-block-head-content">
              <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger
                            toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                  <ul class="nk-block-tools g-3">

                    <li class="nk-block-tools-opt">
                      <a href="{{ route('front') }}" class="btn btn-primary">
                        <i class="icon fal fa-home"></i>
                        <span>Towers</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            {{-- .nk-block-head-content --}}
          </div>
          {{-- .nk-block-between --}}
        </div>
        {{-- .nk-block-head --}}

        @if (Auth::user()->approval==0)
        <div class="nk-block">
          <div class="row g-gs">
            <div class="col-12">
              <div class="card">
                <div class="jumbotron">
                  <h1 class="display-4">{{ __('company.Hello') }},
                    @if (App::getLocale()=='ar')
                    {{ Auth::user()->companyUser->name_ar }}
                    @else
                    {{ Auth::user()->companyUser->name_ar }}
                    @endif
                  </h1>
                  <p class="lead">{{__('company.Your Account is Under Review  Shortly Admin Will Approve')}}</p>
                  <hr class="my-4">
                  <p>{{__('company.Thanks For Understanding')}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif

        @if (Auth::user()->status==0)
        <div class="nk-block">
          <div class="row g-gs">
            <div class="col-12">
              <div class="card">
                <div class="jumbotron">
                  <h1 class="display-4">{{ __('company.Hello') }},
                    @if (App::getLocale()=='ar')
                    {{ Auth::user()->companyUser->name_ar }}
                    @else
                    {{ Auth::user()->companyUser->name_ar }}
                    @endif
                  </h1>
                  <p class="lead">{{__('company.Your Account is Suspended Please Contact Us ')}}</p>
                  <hr class="my-4">
                  <p>{{__('company.Thanks For Understanding')}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif

        <div class="nk-block">
          <div class="row g-gs">
            <div class="col-xxl-3 col-sm-6">
              <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                  <div class="card-inner">
                    <div class="card-title-group">
                      <div class="card-title">
                        <h6 class="title">{{ __('general.My-Projects') }}</h6>
                      </div>
                    </div>
                    <div class="data">
                      <div class="data-group">
                        <div class="amount">{{ number_format($projects,0) }}</div>
                        <div class="nk-ecwg6-ck">
                          <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>
                        </div>
                      </div>

                    </div>
                  </div><!-- .card-inner -->
                </div><!-- .nk-ecwg -->
              </div><!-- .card -->

            </div><!-- .col -->
            <div class="col-xxl-3 col-sm-6">
              <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                  <div class="card-inner">
                    <div class="card-title-group">
                      <div class="card-title">
                        <h6 class="title">{{ __('general.My-Products') }}</h6>
                      </div>
                    </div>
                    <div class="data">
                      <div class="data-group">
                        <div class="amount">{{ number_format($products,0) }}</div>
                        <div class="nk-ecwg6-ck">
                          <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                        </div>
                      </div>
                    </div>
                  </div><!-- .card-inner -->
                </div><!-- .nk-ecwg -->
              </div><!-- .card -->

            </div><!-- .col -->
            <div class="col-xxl-3 col-sm-6">
              <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                  <div class="card-inner">
                    <div class="card-title-group">
                      <div class="card-title">
                        <h6 class="title">{{ __('dashboard.Visitors') }}</h6>
                      </div>
                    </div>
                    <div class="data">
                      <div class="data-group">
                        <div class="amount">{{number_format(Auth::user()->companyUser->views,0)}}</div>
                        <div class="nk-ecwg6-ck">
                          <canvas class="ecommerce-line-chart-s3" id="todayCustomers"></canvas>
                        </div>
                      </div>
                    </div>
                  </div><!-- .card-inner -->
                </div><!-- .nk-ecwg -->
              </div><!-- .card -->
            </div><!-- .col -->

            <div class="col-xxl-3 col-sm-6">
              <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                  <div class="card-inner">
                    <div class="card-title-group">
                      <div class="card-title">
                        <h6 class="title">{{__('general.My-Jobs')}}</h6>
                      </div>
                    </div>
                    <div class="data">
                      <div class="data-group">
                        <div class="amount">{{number_format($jobs,0)}}</div>
                        <div class="nk-ecwg6-ck">
                          <canvas class="ecommerce-line-chart-s3" id="todayVisitors"></canvas>
                        </div>
                      </div>
                    </div>
                  </div><!-- .card-inner -->
                </div><!-- .nk-ecwg -->
              </div><!-- .card -->
            </div>

            <div class="col-xxl-3 col-md-6">
              <div class="card card-full overflow-hidden">
                <div class="nk-ecwg nk-ecwg7 h-100">
                  <div class="card-inner flex-grow-1">
                    <div class="card-title-group mb-4">
                      <div class="card-title">
                        <h6 class="title">{{ __('dashboard.Enquiry Statistics') }}</h6>
                      </div>
                    </div>
                    <div class="nk-ecwg7-ck">
                      <canvas class="ecommerce-doughnut-s1" id="orderStatistics"></canvas>
                    </div>
                    <ul class="nk-ecwg7-legends">
                      <li>
                        <div class="title">
                          <span class="dot dot-lg sq" data-bg="#816bff"></span>
                          <span>Completed</span>
                        </div>
                      </li>
                      <li>
                        <div class="title">
                          <span class="dot dot-lg sq" data-bg="#13c9f2"></span>
                          <span>Processing</span>
                        </div>
                      </li>
                      <li>
                        <div class="title">
                          <span class="dot dot-lg sq" data-bg="#ff82b7"></span>
                          <span>Canclled</span>
                        </div>
                      </li>
                    </ul>
                  </div><!-- .card-inner -->
                </div>
              </div><!-- .card -->
            </div><!-- .col -->

            <div class="col-xxl-3 col-md-6">
              <div class="card h-100">
                <div class="card-inner">
                  <div class="card-title-group mb-2">
                    <div class="card-title">
                      <h6 class="title">{{ __('general.My-Classifieds') }}</h6>
                    </div>
                  </div>
                  <ul class="nk-store-statistics">
                    <li class="item">
                      <div class="info">
                        <div class="title">{{__('dashboard.Pending')}}</div>
                        <div class="count">{{ number_format($pendingClassifieds,0) }}</div>
                      </div>
                      <i class="icon bg-warning fal fa-watch text-white"></i>
                    </li>
                    <li class="item">
                      <div class="info">
                        <div class="title">{{__('general.Active')}}</div>
                        <div class="count">{{ number_format($activeClassifieds,0) }}</div>
                      </div>
                      <i class="icon bg-primary fas fa-wifi text-white"></i>
                    </li>
                    <li class="item">
                      <div class="info">
                        <div class="title">{{__('general.Inactive')}}</div>
                        <div class="count">{{ number_format($inactiveClassifieds,0) }}</div>
                      </div>
                      <i class="icon bg-info fas fa-wifi-slash"></i>
                    </li>
                    <li class="item">
                      <div class="info">
                        <div class="title">{{ __('dashboard.Rejected') }}</div>
                        <div class="count">{{ number_format($rejectClassifieds,0) }}</div>
                      </div>
                      <i class="icon bg-danger far fa-vote-nay text-white"></i>
                    </li>
                  </ul>
                </div><!-- .card-inner -->
              </div><!-- .card -->
            </div><!-- .col -->

            <div class="col-xxl-8">
              <div class="card card-full">
                <div class="card-inner">
                  <div class="card-title-group">
                    <div class="card-title">
                      <h6 class="title">Recent Enquiry</h6>
                    </div>
                  </div>
                </div>
                @if ($lastEnquiry->count()>0)
                <div class="nk-tb-list mt-n2">
                  <div class="nk-tb-item nk-tb-head">
                    <div class="nk-tb-col "><span>Customer</span></div>
                    <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                    <div class="nk-tb-col"><span class="d-none d-sm-inline">Status</span></div>
                  </div>
                  @foreach ($lastEnquiry as $item)
                  <div class="nk-tb-item">

                    <div class="nk-tb-col tb-col-sm">
                      <div class="user-card">
                        <div class="user-avatar sm bg-purple-dim">
                          <span class="text-uppercase">{{ substr($item->name,0,2) }}</span>
                        </div>
                        <div class="user-name">
                          <span class="tb-lead">{{ $item->name }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="nk-tb-col tb-col-md">
                      <span class="tb-sub">{{ date('d/m/Y',strtotime($item->created_at)) }}</span>
                    </div>
                    <div class="nk-tb-col">
                      @if ($item->status==1)
                      <span class="badge badge-dot badge-dot-xs badge-warning"> {{ __('dashboard.Pending') }}</span>
                      @elseif($item->status==2)
                      <span class="badge badge-dot badge-dot-xs badge-success"> {{ __('dashboard.Completed') }}</span>
                      @elseif($item->status==3)
                      <span class="badge badge-dot badge-dot-xs badge-danger"> {{ __('dashboard.Rejected') }}</span>
                      @endif

                    </div>
                  </div>
                  @endforeach
                </div>
                @else
                <span class="text-danger text-center">{{ __('general.No Data Available to Show') }}</span>
                @endif

              </div><!-- .card -->
            </div>

          </div><!-- .row -->
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
<script src="{{ asset('/assets/js/charts/chart-ecommerce.js?ver=2.4.0') }}"></script>
@endsection