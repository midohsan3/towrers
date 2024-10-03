@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Jobs') }}
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
              <h3 class="nk-block-title page-title">{{ __('job.Jobs List') }}</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($jobsCount,0) }} {{ __('section.Job') }}.
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
                            <li><a href="{{ route('job.index') }}"><span>{{ __('general.All') }}</span></a>
                            </li>
                            <li><a href="===="><span>{{ __('general.Active') }}</span></a></li>
                            <li><a href="====="><span>{{ __('general.Inactive') }}</span></a>
                            </li>
                            <li><a href="#"><span>{{ __('general.Trashed') }}</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    @can('jobs-create')
                    <li class="nk-block-tools-opt">
                      <a href="{{ route('job.create') }}" class="btn btn-icon btn-primary d-md-none">
                        <em class="icon ni ni-plus"></em>
                      </a>
                      <a href="{{ route('job.create') }}" class="btn btn-primary d-none d-md-inline-flex">
                        <em class="icon ni ni-plus"></em>
                        <span>{{ __('general.Add') }}</span>
                      </a>
                    </li>
                    @endcan

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
              @if ($jobs->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col">
                        <span class="sub-text">{{ __('general.Name') }}</span>
                      </th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('job.Category') }}</span></th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('city.City') }}</span></th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('company.Company') }}</span></th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('job.Description') }}</span></th>

                      <th class="nk-tb-col tb-col-mb"><span class="sub-text">{{ __('general.Status') }}</span></th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>
                  </thead>
                  {{-- .nk-tb-item --}}
                  <tbody>

                    @foreach ($jobs as $job)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">
                        <a href="======">
                          <div class="user-card">
                            <div class="user-avatar bg-primary">
                              <span class="text-uppercase">{{ substr($job->name_en,0,2) }}</span>
                            </div>
                            <div class="user-info">
                              <span class="tb-lead ">
                                @if (App::getLocale()=='ar')
                                {{ $job->name_ar }}
                                @else
                                {{ $job->name_en }}
                                @endif

                                @if ($job->status==1)
                                <span class="dot dot-success d-md-none ml-1"></span>
                                @else
                                <span class="dot dot-danger d-md-none ml-1"></span>
                                @endif

                              </span>
                            </div>
                          </div>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="td-title">
                          @if (App::getLocale()=='ar')
                          {{ $job->categoryJob->name_ar }}
                          @else
                          {{ $job->categoryJob->name_en }}
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="td-title">
                          @if ($job->city_id==null)
                          --
                          @else
                          @if (App::getLocale()=='ar')
                          {{ $job->cityJob->name_ar }}
                          @else
                          {{ $job->cityJob->name_en }}
                          @endif
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="td-title">
                          @if ($job->user_id==null)
                          {{__('general.System')}}
                          @else
                          @if (App::getLocale()=='ar')
                          {{ $job->userJob->companyUser->name_ar }}
                          @else
                          {{ $job->userJob->companyUser->name_en }}
                          @endif
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="td-title">
                          @if (App::getLocale()=='ar')
                          {{Str::limit ($job->description_ar,75) }}
                          @else
                          {{Str::limit ($job->description_en,75) }}
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        @if ($job->status==1)
                        <span class="tb-status text-success">{{ __('general.Active') }}</span>
                        @else
                        <span class="tb-status text-danger">{{ __('general.Inactive') }}</span>
                        @endif

                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          @can('jobs-edit')
                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('job.edit',$job->id) }}" class="btn btn-trigger btn-icon text-success"
                              data-toggle="tooltip" data-placement="top" title="{{ __('general.Edit') }}">
                              <em class="icon ni ni-edit-fill"></em>
                            </a>
                          </li>
                          @endcan

                          @if ($job->status==1)
                          @can('jobs-deactivate')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" data-placement="top"
                              title="{{ __('general.Deactivate') }}" data-jobid="{{ $job->id }}"
                              data-jobnameen="{{ $job->name_en }}" data-jobnamear="{{ $job->name_ar }}"
                              data-toggle="modal" data-target="#deactivateMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan
                          @else
                          @can('jobs-activate')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-success" data-placement="top"
                              title="{{ __('general.Activate') }}" data-jobid="{{ $job->id }}"
                              data-jobnameen="{{ $job->name_en }}" data-jobnamear="{{ $job->name_ar }}"
                              data-toggle="modal" data-target="#activateMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan
                          @endif

                          @can('jobs-delete')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-jobid="{{ $job->id }}" data-jobnameen="{{ $job->name_en }}"
                              data-jobnamear="{{ $job->name_ar }}" data-toggle="modal" data-target="#deleteMdl">
                              <em class="icon ni ni-trash-fill"></em>
                            </a>
                          </li>
                          @endcan


                          <li>
                            <div class="drodown">
                              <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                                <em class="icon ni ni-more-h"></em>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right">
                                <ul class="link-list-opt no-bdr">

                                  <li>
                                    <a href="======" class="text-primary">
                                      <em class="icon ni ni-eye"></em>
                                      <span>{{ __('general.View Details') }}</span>
                                    </a>
                                  </li>

                                  @can('jobs-edit')
                                  <li>
                                    <a href="{{ route('job.edit',$job->id) }}" class="text-success">
                                      <em class="icon ni ni-edit"></em>
                                      <span>{{ __('general.Edit') }}</span>
                                    </a>
                                  </li>
                                  @endcan

                                  @if ($job->status==1)
                                  @can('jobs-deactivate')
                                  <li>
                                    <a href="#" class="text-danger" data-jobid="{{ $job->id }}"
                                      data-jobnameen="{{ $job->name_en }}" data-jobnamear="{{ $job->name_ar }}"
                                      data-toggle="modal" data-target="#deactivateMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Deactivate') }}</span>
                                    </a>
                                  </li>
                                  @endcan
                                  @else
                                  @can('jobs-activate')
                                  <li>
                                    <a href="#" class="text-success" data-jobid="{{ $job->id }}"
                                      data-jobnameen="{{ $job->name_en }}" data-jobnamear="{{ $job->name_ar }}"
                                      data-toggle="modal" data-target="#activateMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Activate') }}</span>
                                    </a>
                                  </li>
                                  @endcan

                                  @endif

                                  <li class="divider"></li>

                                  @can('jobs-delete')
                                  <li>
                                    <a href="#" class="text-danger" data-jobid="{{ $job->id }}"
                                      data-jobnameen="{{ $job->name_en }}" data-jobnamear="{{ $job->name_ar }}"
                                      data-toggle="modal" data-target="#deleteMdl">
                                      <em class="icon ni ni-trash"></em>
                                      <span>{{ __('general.Delete') }}</span>
                                    </a>
                                  </li>
                                  @endcan
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
                    {{ $jobs->links('pagination::bootstrap-5') }}
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
=ACTIVATE MODAL
========================== --}}

<div class="modal fade zoon" tabindex="-1" id="activateMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('general.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('general.Activate') }}</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('job.activate') }}" method="POST">
          @csrf
          <input hidden id="job_id" name="jobID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Activate') }}
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="job_namear"></span>
                @else
                <span id="job_nameen"></span>
                @endif

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

                  <button type="submit" class="btn btn-success">{{ __('general.Activate') }}</button>
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

{{-- ==========================
        =====DEACTIVATE MODAL
        ========================== --}}

<div class="modal fade zoon" tabindex="-1" id="deactivateMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('general.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('general.Deactivate') }}</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('job.deactivate') }}" method="POST">
          @csrf
          <input hidden id="job_Id" name="jobID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Deactivate') }}
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="job_NameAr"></span>
                @else
                <span id="job_NameEn"></span>
                @endif

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

                  <button type="submit" class="btn btn-danger">{{ __('general.Deactivate') }}</button>
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
        <form action="{{ route('job.destroy') }}" method="POST">
          @csrf
          <input hidden id="jobId" name="jobID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Delete') }}
              <strong>
                @if (App::getLocale()=='ar')
                <span id="jobNamear"></span>
                @else
                <span id="jobNameen"></span>
                @endif

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
            ACTIVATE MODAL
            ====================
            */
            $('#activateMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('jobid');
                let nameEn = button.data('jobnameen');
                let nameAr = button.data('jobnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #job_id').val(id);
                modal.find('.modal-body #job_nameen').html(nameEn);
                modal.find('.modal-body #job_namear').html(nameAr);
            });

            /*
            ====================
            DEACTIVATE MODAL
            ====================
            */
            $('#deactivateMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
               let id = button.data('jobid');
               let nameEn = button.data('jobnameen');
               let nameAr = button.data('jobnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #job_Id').val(id);
                modal.find('.modal-body #job_NameEn').html(nameEn);
                modal.find('.modal-body #job_NameAr').html(nameAr);
            });

            /*
            ====================
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('jobid');
                let nameEn = button.data('jobnameen');
                let nameAr = button.data('jobnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #jobId').val(id);
                modal.find('.modal-body #jobNameen').html(nameEn);
                modal.find('.modal-body #jobNamear').html(nameAr);
            });

        });
</script>
@endsection