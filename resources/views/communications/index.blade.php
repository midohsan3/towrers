@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('company.Communications') }}
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
              <h3 class="nk-block-title page-title">{{ __('company.Company') }}/ <strong class="text-primary small">
                  @if (App::getLocale()=='ar')
                  {{ $company->name_ar }}
                  @else
                  {{ $company->name_en }}
                  @endif</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($communicationsCount,0) }}
                  {{ __('company.Communication') }}.
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
                    <li class="nk-block-tools-opt">
                      <a href="#" class="btn btn-icon btn-primary d-md-none" data-toggle="modal" data-target="#addMdl">
                        <em class="icon ni ni-plus"></em>
                      </a>
                      <a href="#" class="btn btn-primary d-none d-md-inline-flex" data-toggle="modal"
                        data-target="#addMdl">
                        <em class="icon ni ni-plus"></em>
                        <span>{{ __('general.Add') }}</span>
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

        <div class="nk-block">
          <div class="card card-stretch">
            <div class="card-inner-group">
              {{-- .card-inner --}}
              @if ($communications->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col">
                        <span class="sub-text">{{ __('company.Chanel') }}</span>
                      </th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('company.URL OR Data') }}</span>
                      </th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>
                  </thead>
                  {{-- .nk-tb-item --}}
                  <tbody>

                    @foreach ($communications as $con)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">

                        <div class="user-card">
                          @if ($con->con_type==1)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">PH</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.Phone') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==2)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">FA</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.Fax') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==3)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">WH</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.WhatsApp') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==4)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">FB</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.Face Book') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==5)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">TW</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.Twitter') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==6)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">IN</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.Instagram') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==7)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">TE</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.Telegram') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==8)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">TI</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.Tik Tok') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==9)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">SN</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.SnapChat') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==10)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">LI</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.Linked In') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @elseif($con->con_type==11)
                          <div class="user-avatar bg-primary">
                            <span class="text-uppercase">Em</span>
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              {{ __('company.E-mail') }}
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                          @endif
                        </div>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span>{{ $con->chanel }}</span>
                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('communication.edit',$con->id) }}"
                              class="btn btn-trigger btn-icon text-success" data-placement="top"
                              title="{{ __('general.Edit') }}">
                              <em class="icon ni ni-edit-fill"></em>
                            </a>
                          </li>

                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-conid="{{ $con->id }}" data-toggle="modal" data-target="#deleteMdl">
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
                                    <a href="{{ route('communication.edit',$con->id) }}" class="text-success">
                                      <em class="icon ni ni-edit"></em>
                                      <span>{{ __('general.Edit') }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  <li>
                                    <a href="#" class="text-danger" data-conid="{{ $con->id }}" data-toggle="modal"
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
                    {{ $communications->links('pagination::bootstrap-5') }}
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
=ADD MODAL
========================== --}}

<div class="modal fade zoon" tabindex="-1" id="addMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('general.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('general.Add') }}</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('communication.store') }}" method="POST">
          @csrf
          <input hidden id="user" name="user" value="{{ $company->user_id }}" />

          <p class="text-center">
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <label class="form-label" for="con_type">{{ __('company.Chanel') }}</label>
                <div class="form-control-wrap">
                  <select class="form-control" name="con_type" autofocus>
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
                    <option value="11">{{ __('company.E-mail') }}</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <label class="form-label" for="chanel">{{ __('company.Data') }}</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" id="chanel" name="chanel"
                    placeholder="{{ __('company.URL OR Data') }}" />
                </div>
              </div>
            </div>
          </div>

          </p>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('general.Close') }}</button>

                  <button type="submit" class="btn btn-primary">{{ __('general.Submit') }}</button>
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
        <form action="{{ route('communication.destroy') }}" method="POST">
          @csrf
          <input hidden id="conId" name="conID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Delete') }}
              <strong>
                @if(App::getLocale()=='ar')
                <span id="sectionNamear">وسيلة الإتصال</span>
                @else
                <span id="sectionNameen">Connection</span>
                @endif
              </strong>
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
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
            let button = $(e.relatedTarget);
            let id = button.data('conid');
            //console.log(id);
            var modal = $(this);
            modal.find('.modal-body #conId').val(id);
            });
            
            });
</script>
@endsection