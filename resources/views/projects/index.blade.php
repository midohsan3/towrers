@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Projects') }}
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
              <h3 class="nk-block-title page-title">{{ __('project.Projects List') }}</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($projectsCount,0) }} {{ __('project.Project') }}.
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
                            <li><a href="{{ route('project.index') }}"><span>{{ __('general.All') }}</span></a></li>
                            <li><a href="======="><span>{{ __('general.Active') }}</span></a></li>
                            <li><a href="======"><span>{{ __('general.Inactive') }}</span></a>
                            </li>
                            <li><a href="#"><span>{{ __('general.Trashed') }}</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    @can('projects-create')
                    <li class="nk-block-tools-opt">
                      <a href="{{ route('project.create') }}" class="btn btn-icon btn-primary d-md-none">
                        <em class="icon ni ni-plus"></em>
                      </a>
                      <a href="{{ route('project.create') }}" class="btn btn-primary d-none d-md-inline-flex">
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
              @if ($projects->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list is-separate nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col"><span class="sub-text">{{ __('general.Name') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('city.City') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('general.Companies') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('project.Progress') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('general.Glary') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('general.View') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('general.Status') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('general.Submitted Date') }}</span>
                      </th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">

                      </th>
                    </tr><!-- .nk-tb-item -->
                  </thead>
                  <tbody>
                    @foreach ($projects as $project)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">
                        <a href="#" class="project-title">
                          <div class="user-avatar sq bg-purple xs">
                            @if ($project->master_photo !== null)
                            <img src="{{ url('storage/app/public/imgs/projects/'.$project->master_photo) }}"
                              alt="{{ $project->name_en }}" />
                            @else
                            <span class="text-uppercase">{{ Str::substr($project->name_en,0,2) }}</span>
                            @endif
                          </div>
                          <div class="project-info">
                            <h6 class="title">
                              @if (App::getLocale()=='ar')
                              {{ $project->name_ar }}
                              @else
                              {{ $project->name_en }}
                              @endif
                            </h6>
                          </div>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-lg">
                        <span>
                          @if ($project->city_id!==null)
                          @if (App::getLocale()=='ar')
                          {{ $project->cityProject->name_ar }}
                          @else
                          {{ $project->cityProject->name_en }}
                          @endif
                          @endif

                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-lg">
                        <a href="{{ route('project.company.index',$project->id) }}">
                          <span>
                            @if (array_key_exists($project->id,$companies))
                            {{ $companies[$project->id] }} <span>{{ __('company.Company') }}</span>
                            @else
                            {{ __('project.Dont Have Any') }}
                            @endif
                          </span>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <div class="project-list-progress">
                          <div class="progress progress-pill progress-md bg-light">
                            <div class="progress-bar" data-progress="{{ $project->progress }}"></div>
                          </div>
                          <div class="project-progress-percent">{{ $project->progress }}%</div>
                        </div>
                        <span>
                          @if ($project->project_category_id!==null)
                          @if (App::getLocale()=='ar')
                          {{ $project->projectCategory_project->name_ar }}
                          @else
                          {{ $project->projectCategory_project->name_en}}
                          @endif
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-lg">
                        <a href="{{ route('project.photo.index',$project->id) }}">
                          <span>
                            @if (array_key_exists($project->id,$glaryCount))
                            {{ $glaryCount[$project->id] }} <span>{{ __('project.Photo') }}</span>
                            @else
                            {{ __('project.No Photos') }}
                            @endif
                          </span>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-mb">
                        @if ($project->featured==1)
                        <span class="badge badge-pill badge-primary"><span>{{__('general.Featured')}}</span></span>
                        @else
                        <span class="badge badge-pill badge-secondary"><span>{{__('general.Normal')}}</span></span>
                        @endif
                      </td>

                      <td class="nk-tb-col tb-col-mb">
                        @if ($project->status==1)
                        <span class="badge badge-dim badge-success"><span>{{__('general.Active')}}</span></span>
                        @else
                        <span class="badge badge-dim badge-danger"><span>{{__('general.Inactive')}}</span></span>
                        @endif
                      </td>

                      <td class="nk-tb-col tb-col-mb">
                        <span>{{ date('d M, Y',strtotime($project->created_at)) }}</span>
                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          @can('projects-edit')
                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('project.edit',$project->id) }}"
                              class="btn btn-trigger btn-icon text-success" data-toggle="tooltip" data-placement="top"
                              title="{{ __('general.Edit') }}">
                              <em class="icon ni ni-edit-fill"></em>
                            </a>
                          </li>
                          @endcan

                          @if ($project->status==1)
                          @can('projects-deactivate')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" data-placement="top"
                              title="{{ __('general.Deactivate') }}" data-projectid="{{ $project->id }}"
                              data-projectnameen="{{ $project->name_en }}" data-projectnamear="{{ $project->name_ar }}"
                              data-toggle="modal" data-target="#deactivateMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan
                          @else
                          @can('projects-activate')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-success" data-placement="top"
                              title="{{ __('general.Activate') }}" data-projectid="{{ $project->id }}"
                              data-projectnameen="{{ $project->name_en }}" data-projectnamear="{{ $project->name_ar }}"
                              data-toggle="modal" data-target="#activateMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan
                          @endif

                          @can('projects-delete')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-projectid="{{ $project->id }}" data-projectnameen="{{ $project->name_en }}"
                              data-projectnamear="{{ $project->name_ar }}" data-toggle="modal" data-target="#deleteMdl">
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
                                    <a href="#" class="text-primary">
                                      <em class="icon ni ni-eye"></em>
                                      <span>{{ __('general.View Details') }}</span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="{{ route('project.photo.index',$project->id) }}" class="text-primary">
                                      <i class="icon far fa-camera-alt"></i>
                                      <span>{{ __('general.Glary') }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  <li>
                                    <a href="{{ route('project.company.index',$project->id) }}" class="text-primary">
                                      <i class="icon far fa-industry-alt"></i>
                                      <span>{{ __('general.Companies') }}</span>
                                    </a>
                                  </li>

                                  @if ($project->featured==1)
                                  <li>
                                    <a href="#" class="text-danger" data-projectid="{{ $project->id }}"
                                      data-projectnameen="{{ $project->name_en }}"
                                      data-projectnamear="{{ $project->name_ar }}" data-toggle="modal"
                                      data-target="#normalizeMdl">
                                      <i class="icon fal fa-gas-pump-slash"></i>
                                      <span>{{ __('general.Normal') }}</span>
                                    </a>
                                  </li>
                                  @else
                                  <li>
                                    <a href="#" class="text-success" data-projectid="{{ $project->id }}"
                                      data-projectnameen="{{ $project->name_en }}"
                                      data-projectnamear="{{ $project->name_ar }}" data-toggle="modal"
                                      data-target="#featureMdl">
                                      <i class="icon fal fa-gas-pump"></i>
                                      <span>{{ __('general.Featured') }}</span>
                                    </a>
                                  </li>
                                  @endif

                                  <li class="divider"></li>

                                  @can('projects-edit')
                                  <li>
                                    <a href="{{ route('project.edit',$project->id) }}" class="text-success">
                                      <em class="icon ni ni-edit"></em>
                                      <span>{{ __('general.Edit') }}</span>
                                    </a>
                                  </li>
                                  @endcan

                                  @if ($project->status==1)
                                  @can('projects-deactivate')
                                  <li>
                                    <a href="#" class="text-danger" data-projectid="{{ $project->id }}"
                                      data-projectnameen="{{ $project->name_en }}"
                                      data-projectnamear="{{ $project->name_ar }}" data-toggle="modal"
                                      data-target="#deactivateMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Deactivate') }}</span>
                                    </a>
                                  </li>
                                  @endcan
                                  @else
                                  @can('projects-activate')
                                  <li>
                                    <a href="#" class="text-success" data-projectid="{{ $project->id }}"
                                      data-projectnameen="{{ $project->name_en }}"
                                      data-projectnamear="{{ $project->name_ar }}" data-toggle="modal"
                                      data-target="#activateMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Activate') }}</span>
                                    </a>
                                  </li>
                                  @endcan
                                  @endif

                                  <li class="divider"></li>

                                  @can('projects-delete')
                                  <li>
                                    <a href="#" class="text-danger" data-projectid="{{ $project->id }}"
                                      data-projectnameen="{{ $project->name_en }}"
                                      data-projectnamear="{{ $project->name_ar }}" data-toggle="modal"
                                      data-target="#deleteMdl">
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
                </table>{{-- .nk-tb-list --}}
              </div>

              <div class="card-inner">
                <div class="nk-block-between-md g-3">
                  <div class="g">
                    {{ $projects->links('pagination::bootstrap-5') }}
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
=FEATURED MODAL
========================== --}}

<div class="modal fade zoon" tabindex="-1" id="featureMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('general.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('general.Featured') }}</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('project.featured') }}" method="POST">
          @csrf
          <input hidden id="fproject_id" name="projectID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Featured') }}
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="fproject_namear"></span>
                @else
                <span id="fproject_nameen"></span>
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

                  <button type="submit" class="btn btn-success">{{ __('general.Featured') }}</button>
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
        ===== NORMALIZE MODAL
        ========================== --}}

<div class="modal fade zoon" tabindex="-1" id="normalizeMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('general.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('general.Normalize') }}</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('project.normalize') }}" method="POST">
          @csrf
          <input hidden id="nproject_Id" name="projectID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Normalize') }}
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="nproject_NameAr"></span>
                @else
                <span id="nproject_NameEn"></span>
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

                  <button type="submit" class="btn btn-danger">{{ __('general.Normalize') }}</button>
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
        <form action="{{ route('project.activate') }}" method="POST">
          @csrf
          <input hidden id="project_id" name="projectID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Activate') }}
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="project_namear"></span>
                @else
                <span id="project_nameen"></span>
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
        <form action="{{ route('project.deactivate') }}" method="POST">
          @csrf
          <input hidden id="project_Id" name="projectID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Deactivate') }}
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="project_NameAr"></span>
                @else
                <span id="project_NameEn"></span>
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
        <form action="{{ route('project.destroy') }}" method="POST">
          @csrf
          <input hidden id="projectId" name="projectID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Delete') }}
              <strong>
                @if (App::getLocale()=='ar')
                <span id="projectNamear"></span>
                @else
                <span id="projectNameen"></span>
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
            FEATURED MODAL
            ====================
            */
            $('#featureMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('projectid');
                let nameEn = button.data('projectnameen');
                let nameAr = button.data('projectnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #fproject_id').val(id);
                modal.find('.modal-body #fproject_nameen').html(nameEn);
                modal.find('.modal-body #fproject_namear').html(nameAr);
            });

            /*
            ====================
            NORMALIZE MODAL
            ====================
            */
            $('#normalizeMdl').on('show.bs.modal', function(e) {
            let button = $(e.relatedTarget);
            let id = button.data('projectid');
            let nameEn = button.data('projectnameen');
            let nameAr = button.data('projectnamear');
            //console.log(id);
            var modal = $(this);
            modal.find('.modal-body #nproject_Id').val(id);
            modal.find('.modal-body #nproject_NameEn').html(nameEn);
            modal.find('.modal-body #nproject_NameAr').html(nameAr);
            });

            /*
            ====================
            ACTIVATE MODAL
            ====================
            */
            $('#activateMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('projectid');
                let nameEn = button.data('projectnameen');
                let nameAr = button.data('projectnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #project_id').val(id);
                modal.find('.modal-body #project_nameen').html(nameEn);
                modal.find('.modal-body #project_namear').html(nameAr);
            });
                       
            /*
            ====================
            DEACTIVATE MODAL
            ====================
            */
            $('#deactivateMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('projectid');
                let nameEn = button.data('projectnameen');
                let nameAr = button.data('projectnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #project_Id').val(id);
                modal.find('.modal-body #project_NameEn').html(nameEn);
                modal.find('.modal-body #project_NameAr').html(nameAr);
            });

            /*
            ====================
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('projectid');
                let nameEn = button.data('projectnameen');
                let nameAr = button.data('projectnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #projectId').val(id);
                modal.find('.modal-body #projectNameen').html(nameEn);
                modal.find('.modal-body #projectNamear').html(nameAr);
            });

        });
</script>
@endsection