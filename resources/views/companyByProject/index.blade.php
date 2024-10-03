@extends('layouts.admin')
{{-- 
  =====================
  =PAGE STYLES
  =====================
  --}}
@section('page-Styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Companies') }}
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
              <h3 class="nk-block-title page-title">{{ __('project.Project') }}/ <strong class="text-primary small">
                  @if (App::getLocale()=='ar')
                  {{ $project->name_ar }}
                  @else
                  {{ $project->name_en }}
                  @endif</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($companiesCount,0) }}
                  {{ __('company.Company') }}.
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
              @if ($currentCompanies->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col">
                        <span class="sub-text">{{ __('general.Name') }}</span>
                      </th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>
                  </thead>
                  {{-- .nk-tb-item --}}
                  <tbody>

                    @foreach ($currentCompanies as $item)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">

                        <div class="user-card">
                          <div class="user-avatar sq bg-purple xs">
                            @if ($item->master_photo !== null)
                            <img src="{{ url('storage/app/public/imgs/users/'.$item->userCompany->profile_pic) }}"
                              alt="{{ $item->name_en }}" />
                            @else
                            <span class="text-uppercase">{{ Str::substr($item->name_en,0,2) }}</span>
                            @endif
                          </div>
                          <div class="user-info">
                            <span class="tb-lead ">
                              @if (App::getLocale()=='ar')
                              {{ $item->name_ar }}
                              @else
                              {{ $item->name_en }}
                              @endif
                              <span class="dot dot-success d-md-none ml-1"></span>
                            </span>
                          </div>
                        </div>
                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-companyid="{{ $item->id }}" data-projectid="{{ $project->id }}" data-toggle="modal"
                              data-target="#deleteMdl">
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
                                    <a href="#" class="text-danger" data-companyid="{{ $item->id }}"
                                      data-projectid="{{ $project->id }}" data-toggle="modal" data-target="#deleteMdl">
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
        <form action="{{ route('project.company.store') }}" method="POST">
          @csrf
          <input hidden id="project_id" name="project" value="{{ $project->id }}" />

          <p class="text-center">
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <label class="form-label" for="company">{{ __('general.Companies') }}</label>
                <div class="form-control-wrap">
                  <select class="selectpicker form-control" name="company" data-live-search="true" autofocus>
                    <option disabled selected>{{ __('general.Choose') }}</option>
                    @foreach ($companies as $company)
                    @if (App::getLocale()=='ar')
                    <option value="{{ $company->id }}" data-tokens="{{ $company->name_ar }}">{{ $company->name_ar }}
                    </option>
                    @else
                    <option value="{{ $company->id }}" data-tokens="{{ $company->name_en }}">{{ $company->name_en }}
                    </option>
                    @endif
                    @endforeach

                  </select>
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
        <form action="{{ route('project.company.destroy') }}" method="POST">
          @csrf
          <input hidden id="projectId" name="projectID" />
          <input hidden id="companyId" name="companyID" />
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

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
            let id = button.data('companyid');
            let project = button.data('projectid');
            //console.log(id);
            var modal = $(this);
            modal.find('.modal-body #companyId').val(id);
            modal.find('.modal-body #projectId').val(project);
            });
            
            });
</script>
@endsection