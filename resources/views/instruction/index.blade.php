@extends('layouts.admin')

{{--
=====================
=TITLE
=====================
--}}
@section('title')
{{ __('general.System Instructions') }}
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
              <h3 class="nk-block-title page-title">{{ __('general.System Instructions') }}</h3>
              <div class="nk-block-des text-soft">
                <p></p>
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
                        <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                          <em class="d-none d-sm-inline icon ni ni-plus"></em><span><span class="d-none d-md-inline">{{
                              __('general.Add') }}</span>
                          </span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="{{ route('instruction.create.general') }}"><span>{{
                                  __('general.General')
                                  }}</span></a></li>
                            <li><a href="{{ route('instruction.create.project') }}"><span>{{
                                  __('general.Projects')
                                  }}</span></a></li>
                            <li><a href="{{ route('instruction.create.job') }}"><span>{{
                                  __('general.Jobs')
                                  }}</span></a></li>
                            <li><a href="{{ route('instruction.create.product') }}"><span>{{
                                  __('general.Products')
                                  }}</span></a></li>
                            <li><a href="{{ route('instruction.create.user') }}"><span>{{
                                  __('general.Special')
                                  }}</span></a></li>
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
              @if ($instructions->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-scol">
                        <span class="sub-text">{{ __('general.Instruction') }}</span>
                      </th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{
                          __('general.Details') }}</span></th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{
                          __('general.Created At') }}</span></th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>
                  </thead>
                  {{-- .nk-tb-item --}}
                  <tbody>

                    @foreach ($instructions as $instruction)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">
                        <a href="======">
                          <div class="user-card">
                            @if(isset($instruction->project_id))
                            <div class="user-avatar bg-danger">
                              <span class="text-uppercase">PRJ</span>
                            </div>
                            <div class="user-info">
                              <span class="tb-lead ">
                                @if (App::getLocale()=='ar')
                                {{ $instruction->projectWInstruction->name_ar }}
                                @else
                                {{ $instruction->projectWInstruction->name_en }}
                                @endif
                              </span>
                            </div>
                            @elseif(isset($instruction->product_id))
                            <div class="user-avatar bg-success">
                              <span class="text-uppercase">PRD</span>
                            </div>
                            <div class="user-info">
                              <span class="tb-lead ">
                                @if (App::getLocale()=='ar')
                                {{ $instruction->productWInstruction->name_ar }}
                                @else
                                {{ $instruction->productWInstruction->name_en }}
                                @endif
                              </span>
                            </div>
                            @elseif(isset($instruction->job_id))
                            <div class="user-avatar bg-warning">
                              <span class="text-uppercase">JOB</span>
                            </div>
                            <div class="user-info">
                              <span class="tb-lead ">
                                @if (App::getLocale()=='ar')
                                {{ $instruction->jobWInstruction->name_ar }}
                                @else
                                {{ $instruction->jobWInstruction->name_en }}
                                @endif
                              </span>
                            </div>
                            @else
                            <div class="user-avatar bg-primary">
                              <span class="text-uppercase">GNL</span>
                            </div>
                            <div class="user-info">
                              <span class="tb-lead ">
                                {{ __('general.General') }}
                              </span>
                            </div>
                            @endif

                          </div>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="tb-lead">
                          @if (App::getLocale()=='ar')
                          {{ $instruction->name_ar }}
                          @else
                          {{ $instruction->name_en }}
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="tb-lead">
                          {{date('d-m-Y h:i A',strtotime($instruction->created_at))}}
                        </span>
                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-instructionid="{{ $instruction->id }}" data-toggle="modal" data-target="#deleteMdl">
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
                                    <a href="+++++" class="text-primary">
                                      <em class="icon ni ni-eye"></em>
                                      <span>{{ __('general.View Details')
                                        }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  <li>
                                    <a href="#" class="text-danger" data-instructionid="{{ $instruction->id }}"
                                      data-toggle="modal" data-target="#deleteMdl">
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
                    {{ $instructions->links('pagination::bootstrap-5') }}
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
        <form action="======" method="POST">
          @csrf
          <input hidden id="instructionId" name="instructionID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Delete') }}
              <strong>
                <span>{{ __('general.?') }}</span>
              </strong>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                    __('general.Close') }}</button>

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
                let id = button.data('instructionid');
                var modal = $(this);
                modal.find('.modal-body #instructionId').val(id);
            });

        });
</script>
@endsection
