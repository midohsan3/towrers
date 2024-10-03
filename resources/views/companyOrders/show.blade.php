@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ $order->subject }}
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
              <h3 class="nk-block-title page-title">{{ __('order.Subject') }}/ <strong class="text-primary small">
                  {{ $order->subject }}
                </strong></h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('c-company.order.index') }}"
                class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('c-company.order.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                <em class="icon ni ni-arrow-left"></em>
              </a>

            </div>
          </div>
        </div>
        {{-- .nk-block-head --}}

        <div class="nk-block">
          <div class="card">
            <div class="card-aside-wrap">
              <div class="card-content">

                <div class="card-inner">
                  <div class="nk-block">
                    <div class="nk-block-head">
                      <h5 class="title">{{ __('general.Main Information') }}</h5>
                      <p>{{ __('general.Main Information at our platform') }}.</p>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="profile-ud-list">

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('order.From') }}</span>
                          <span class="profile-ud-value">{{ $order->name }}</span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('company.Phone') }}</span>
                          <span class="profile-ud-value">{{ $order->phone }}</span>
                        </div>
                      </div>


                      <div class="profile-ud-item">

                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('company.E-mail') }}</span>
                          <span class="profile-ud-value text-primary">
                            {{$order->email }}
                          </span>
                        </div>
                      </div>

                      <div class="profile-ud-item">
                        <div class="profile-ud wider">
                          <span class="profile-ud-label">{{ __('general.Status') }}</span>
                          @if ($order->status==0)
                          <span class="profile-ud-value text-primary">
                            {{ __('general.New') }}
                          </span>
                          @elseif($order->status==1)
                          <span class="profile-ud-value text-info">
                            {{ __('order.Approve') }}
                          </span>
                          @elseif($order->status==2)
                          <span class="profile-ud-value text-success">
                            {{ __('order.Completed') }}
                          </span>
                          @elseif($order->status==3)
                          <span class="profile-ud-value text-danger">
                            {{ __('order.Reject') }}
                          </span>
                          @endif

                        </div>
                      </div>

                    </div>{{-- .profile-ud-list --}}
                  </div>
                  {{-- .nk-block --}}

                  <div class="nk-divider divider md"></div>

                  @if ($order->status==3)
                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">{{ __('order.Reject Reason') }}</h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p class="text-danger">{{ $order->reject_reason }}</p>
                        </div>
                      </div>
                      {{-- .bq-note-item --}}
                    </div>{{-- .bq-note --}}
                  </div>
                  @endif

                  <div class="nk-block">
                    <div class="nk-block-head nk-block-head-sm nk-block-between">
                      <h5 class="title">{{ __('order.Details') }}</h5>
                    </div>
                    {{-- .nk-block-head --}}
                    <div class="bq-note">
                      <div class="bq-note-item">
                        <div class="bq-note-text">
                          <p>{{ $order->details }}</p>
                        </div>

                      </div>
                      {{-- .bq-note-item --}}
                    </div>{{-- .bq-note --}}
                  </div>

                  <div class="nk-divider divider md"></div>

                </div>
                {{-- .card-content --}}

              </div>
              {{-- .card-aside-wrap --}}

            </div>
            {{-- .card --}}
          </div>
          {{-- .nk-block --}}
        </div>
      </div>
    </div>
  </div>
  @endsection