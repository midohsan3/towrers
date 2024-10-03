@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Orders') }}
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
              <h3 class="nk-block-title page-title">{{ __('order.Orders List') }}</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($ordersCount,0) }} {{ __('package.Package') }}.
                </p>
              </div>
            </div>
            {{-- .nk-block-head-content --}}

            <div class="nk-block-head-content">
              <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em
                    class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="more-options">
                  <ul class="nk-block-tools g-3">
                    <li>
                      <div class="form-control-wrap">
                        <div class="form-icon form-icon-right">
                          <em class="icon ni ni-search"></em>
                        </div>

                        <input type="text" class="form-control" id="default-04"
                          placeholder="{{ __('general.Search') }}" />

                      </div>
                    </li>

                    <li>
                      <div class="drodown">
                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                          data-toggle="dropdown">{{ $list_title }}</a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="{{ route('order.index') }}"><span>{{ __('general.All') }}</span></a></li>
                            <li><a href="======"><span>{{ __('general.Active') }}</span></a></li>
                            <li><a href="======="><span>{{ __('general.Inactive') }}</span></a>
                            </li>
                            <li><a href="#"><span>{{ __('general.Trashed') }}</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
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

        <div class="nk-block">
          <div class="card card-stretch">
            <div class="card-inner-group">
              {{-- .card-inner --}}
              @if ($orders->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col">
                        <span class="sub-text">{{ __('order.To') }}</span>
                      </th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('order.From') }}</span></th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('order.Subject') }}</span></th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('order.Details') }}</span></th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('general.Status') }}</span></th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('order.Order Date') }}</span></th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>
                  </thead>
                  {{-- .nk-tb-item --}}
                  <tbody>

                    @foreach ($orders as $order)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">
                        <a href="{{ route('order.show',$order->id) }}">
                          <div class="user-card">
                            <div class="user-avatar bg-primary">
                              @if ($order->user_id!==null)
                              <span class="text-uppercase">{{ substr($order->userOrder->name,0,2) }}</span>
                              @else
                              <span>SY</span>
                              @endif
                            </div>
                            <div class="user-info">
                              <span class="tb-lead ">
                                @if ($order->user_id!==null)
                                {{ $order->userOrder->name}}
                                @else
                                {{ __('general.System') }}
                                @endif

                                @if ($order->status==0)
                                <span class="dot dot-primary d-md-none ml-1"></span>
                                @elseif($order->status==1)
                                <span class="dot dot-info d-md-none ml-1"></span>
                                @elseif($order->status==2)
                                <span class="dot dot-success d-md-none ml-1"></span>
                                @elseif($order->status==3)
                                <span class="dot dot-danger d-md-none ml-1"></span>
                                @endif
                              </span>
                            </div>
                          </div>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="tb-lead">
                          {{ $order->name }}
                        </span>
                        <span>
                          {{ $order->phone }}
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="tb-lead">
                          @if ($order->product_id!==null)
                          @if (App::getLocale()=='ar')
                          {{ $order->productOrder->name_ar }}
                          @else
                          {{ $order->productOrder->name_en }}
                          @endif
                          @else
                          {{ __('project.Other') }}/ <span>{{ $order->subject }}</span>
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="tb-lead">
                          {{ $order->details }}
                        </span>
                        @if ($order->reject_reason!==null)
                        <span class="text-danger">{{ $order->reject_reason}}</span>
                        @endif
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        @if ($order->status==0)
                        <span class="tb-status text-primary">{{ __('order.New') }}</span>
                        @elseif($order->status==1)
                        <span class="tb-status text-info">{{ __('order.Approved') }}</span>
                        @elseif($order->status==2)
                        <span class="tb-status text-success">{{ __('order.Completed') }}</span>
                        @elseif($order->status==3)
                        <span class="tb-status text-danger">{{ __('order.Rejected') }}</span>
                        @endif

                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="ta-date">{{ date('d M,Y',strtotime($order->created_at)) }}</span>

                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          @if ($order->status==0)
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-info" data-placement="top"
                              title="{{ __('order.Approve') }}" data-orderid="{{ $order->id }}" data-toggle="modal"
                              data-target="#approveMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>

                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-info" data-placement="top"
                              title="{{ __('order.Reject') }}" data-orderid="{{ $order->id }}" data-toggle="modal"
                              data-target="#rejectMdl">
                              <i class="icon fal fa-vote-nay"></i>
                            </a>
                          </li>

                          @elseif($order->status==1)
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-info" data-placement="top"
                              title="{{ __('order.Approve') }}" data-orderid="{{ $order->id }}" data-toggle="modal"
                              data-target="#approveMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endif

                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-packageid="{{ $order->id }}" data-packagenameen="======" data-packagenamear="======"
                              data-toggle="modal" data-target="#deleteMdl">
                              <em class="icon ni ni-trash-fill"></em>
                            </a>
                          </li>

                          <li>
                            <div class="drodown">
                              <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                                <em class="icon ni ni-more-h"></em>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right">
                                <ul class="link-list-opt no-bdr">

                                  <li>
                                    <a href="{{ route('order.show',$order->id) }}" class="text-primary">
                                      <em class="icon ni ni-eye"></em>
                                      <span>{{ __('general.View Details') }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  @if ($order->status==0)
                                  <li>
                                    <a href="#" class="text-info" data-orderid="{{ $order->id }}" data-toggle="modal"
                                      data-target="#approveMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('order.Approve') }}</span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="#" class="text-info" data-orderid="{{ $order->id }}" data-toggle="modal"
                                      data-target="#rejectMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('order.Reject') }}</span>
                                    </a>
                                  </li>

                                  @else
                                  <li>
                                    <a href="#" class="text-success" data-packageid="{{ $order->id }}"
                                      data-packagenameen="======" data-packagenamear="======" data-toggle="modal"
                                      data-target="#activateMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Activate') }}</span>
                                    </a>
                                  </li>
                                  @endif

                                  <li class="divider"></li>

                                  <li>
                                    <a href="#" class="text-danger" data-packageid="{{ $order->id }}"
                                      data-packagenameen="======" data-packagenamear="======" data-toggle="modal"
                                      data-target="#deleteMdl">
                                      <em class="icon ni ni-trash"></em>
                                      <span>{{ __('general.Delete') }}</span>
                                    </a>
                                  </li>

                                </ul>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                  {{-- .nk-tb-item --}}
                </table>{{-- .nk-tb-list --}}
              </div>

              <div class="card-inner">
                <div class="nk-block-between-md g-3">
                  <div class="g">
                    {{ $orders->links('pagination::bootstrap-5') }}
                    {{-- .pagination --}}
                  </div>

                </div>
                {{-- .nk-block-between --}}
              </div>
              @else
              <div class="card-inner">
                <div class="nk-block-between-md g-3">
                  <div class="g">
                    <p class="text-danger">{{ __('general.No Data Available to Show') }}</p>
                  </div>

                </div>
                {{-- .nk-block-between --}}
              </div>
              @endif

              {{-- .card-inner --}}

              {{-- .card-inner --}}
            </div>
            {{-- .card-inner-group --}}
          </div>
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>

{{-- 
  ======================
  =MODELS
  ======================
==========================
=APPROVE MODAL
========================== --}}

<div class="modal fade zoon" tabindex="-1" id="approveMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('general.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('order.Approve') }}</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('order.approve') }}" method="POST">
          @csrf
          <input hidden id="order_id" name="orderID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('order.Are You Sure You Want Approve Order') }}
              <span>{{ __('general.?') }}</span>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('general.Close') }}</button>

                  <button type="submit" class="btn btn-info">{{ __('order.Approve') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-primary sm">
        <span class="sub-text"></span>
      </div>
    </div>
  </div>
</div>
{{--==========================
=REJECT MODAL
========================== --}}

<div class="modal fade zoon" tabindex="-1" id="rejectMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('general.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('order.Reject') }}</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('order.reject') }}" method="POST">
          @csrf
          <input hidden id="orderId" name="orderID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('order.Are You Sure You Want Reject Order') }}
              <span>{{ __('general.?') }}</span>
            </p>
            <textarea class="form-control" name="reason" placeholder="{{ __('order.Reject Reason') }}"></textarea>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('general.Close') }}</button>

                  <button type="submit" class="btn btn-danger">{{ __('order.Reject') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-primary sm">
        <span class="sub-text"></span>
      </div>
    </div>
  </div>
</div>

{{-- 
  ======================
  =DELETE
  ======================
  --}}

<div class="modal fade zoon" tabindex="-1" id="deleteMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('general.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('general.Delete') }}</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('order.destroy') }}" method="POST">
          @csrf
          <input hidden id="orderid" name="orderID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Delete') }}
              <span>{{ __('general.?') }}</span>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('general.Close') }}</button>

                  <button type="submit" class="btn btn-danger">{{ __('general.Delete') }}</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-primary sm">
        <span class="sub-text"></span>
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
<script>
  'use strict';
        $(function() {      

            /*
            ====================
            APPROVE MODAL
            ====================
            */
            $('#approveMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('orderid');
               // let nameEn = button.data('packagenameen');
                //let nameAr = button.data('packagenamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #order_id').val(id);
                //modal.find('.modal-body #package_nameen').html(nameEn);
                //modal.find('.modal-body #package_namear').html(nameAr);
            });
            /*
            ====================
            REJECT MODAL
            ====================
            */
            $('#rejectMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('orderid');
               // let nameEn = button.data('packagenameen');
                //let nameAr = button.data('packagenamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #orderId').val(id);
                //modal.find('.modal-body #package_nameen').html(nameEn);
                //modal.find('.modal-body #package_namear').html(nameAr);
            });

            
            /*
            ====================
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('orderid');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #orderid').val(id);
            });

        });
</script>
@endsection