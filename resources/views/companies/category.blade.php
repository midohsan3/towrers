@extends('layouts.admin')

{{--
=====================
=TITLE
=====================
--}}
@section('title')
{{ __('company.Companies') }}
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
              <h3 class="nk-block-title page-title">{{ __('company.Companies List') }} ({{
                $list_title}})</h3>
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
                            <li><a href="{{ route('company.index') }}"><span>{{
                                  __('general.All') }}</span></a></li>
                            <li><a href="{{ route('company.active') }}"><span>{{
                                  __('general.Active') }}</span></a>
                            </li>
                            <li><a href="{{ route('company.inactive') }}"><span>{{
                                  __('general.Inactive')
                                  }}</span></a>
                            </li>
                            @if ($sections->count()>0)
                            @foreach ($sections as $section)
                            <li><a href="{{ route('company.category',$section->id) }}">
                                <span>
                                  @if (App::getLocale()=='ar')
                                  {{ $section->name_ar }}
                                  @else
                                  {{ $section->name_en }}
                                  @endif
                                </span>
                              </a></li>
                            @endforeach
                            @endif
                            <li><a href="#"><span>{{ __('general.Trashed') }}</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    @can('company-create')
                    <li class="nk-block-tools-opt">
                      <a href="{{ route('company.create') }}" class="btn btn-icon btn-primary d-md-none">
                        <em class="icon ni ni-plus"></em>
                      </a>
                      <a href="{{ route('company.create') }}" class="btn btn-primary d-none d-md-inline-flex">
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
              @if ($companies->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col">
                        <span class="sub-text">{{ __('general.Name') }}</span>
                      </th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('company.Communication') }}</span>
                      </th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('section.Section') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('city.City')
                          }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('package.Package') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('company.Uploads') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('general.Projects') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('general.View')
                          }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('general.Status') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('company.Added
                          By') }}</span></th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>
                  </thead>
                  {{-- .nk-tb-item --}}
                  <tbody>

                    @foreach ($companies as $company)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">
                        <a href="{{ route('company.show',$company->id) }}">
                          <div class="user-card">
                            <div class="user-avatar bg-primary">
                              @if ($company->userCompany->profile_pic !== null)
                              <img src="{{ url('storage/app/public/imgs/users/'.$company->userCompany->profile_pic) }}"
                                alt="{{ $company->name }}" />
                              @else
                              <span class="text-uppercase">{{ substr($company->name,0,2)
                                }}</span>
                              @endif
                            </div>
                            <div class="user-info">
                              <span class="tb-lead ">
                                @if (App::getLocale()=='ar')
                                {{ $company->name_ar }}
                                @else
                                {{ $company->name_en }}
                                @endif

                                @if ($company->status==1)
                                <span class="dot dot-success d-md-none ml-1"></span>
                                @else
                                <span class="dot dot-danger d-md-none ml-1"></span>
                                @endif
                              </span>
                              <span>{{ $company->email }}</span>
                            </div>
                          </div>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-md">

                        <span>
                          <a href="{{ route('communication.index',$company->id) }}">
                            @if (array_key_exists($company->id, $communications))
                            {{ $communications[$company->id] }}<span> {{
                              __('company.Chanel') }}</span>
                          </a>
                          @else
                          {{ __('company.No chanels Yet') }}
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <a href="{{ route('company.majors',$company->id) }}">
                          <span class="tb-lead">
                            @if ($company->section_id !==null)
                            @if (App::getLocale()=='ar')
                            {{ $company->sectionCompany->name_ar }}
                            @else
                            {{ $company->sectionCompany->name_en }}
                            @endif
                            @endif
                          </span>
                          <span>
                            @if (array_key_exists($company->id,$majors))
                            {{ $majors[$company->id] }} {{
                            __('section.Specialty') }}
                            @else
                            {{ __('section.No Specialty Yet') }}
                            @endif
                          </span>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span>
                          @if ($company->city_id !==null)
                          @if (App::getLocale()=='ar')
                          {{ $company->cityCompany->name_ar }}
                          @else
                          {{ $company->cityCompany->name_en }}
                          @endif
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="td-lead">
                          @if ($company->package_id !== null)
                          @if (App::getLocale()=='ar')
                          {{ $company->packageCompany->name_ar }}
                          @else
                          {{ $company->packageCompany->name_en }}
                          @endif
                          @endif
                        </span>
                        <span>{{ __('company.Expired At') }}:=======</span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <ul class="list-status">
                          <li>
                            @if ($company->license !== null)
                            <em class="icon text-success ni ni-check-circle"></em>
                            <span>{{ __('company.License') }}</span>
                            @else
                            <em class="icon ni ni-alert-circle text-danger"></em>
                            <span>{{ __('company.License') }}</span>
                            @endif
                          </li>
                          <li>
                            @if ($company->userCompany->profile_pic !== null)
                            <em class="icon text-success ni ni-check-circle"></em>
                            <span>{{ __('company.Logo') }}</span>
                            @else
                            <em class="icon ni ni-alert-circle text-danger"></em> <span>{{
                              __('company.Logo') }}</span>
                            @endif
                          </li>
                        </ul>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <a href="{{ route('company.project.index',$company->id) }}">
                          <span>
                            @if (array_key_exists($company->id,$projects))
                            {{ $projects[$company->id] }} <span>{{
                              __('project.Project') }}</span>
                            @else
                            {{ __('company.No Projects') }}
                            @endif
                          </span>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        @if ($company->featured==1)
                        <span class="badge badge-pill badge-primary">{{ __('general.Featured')
                          }}</span>
                        @else
                        <span class="badge badge-pill badge-secondary">{{ __('general.Normal')
                          }}</span>
                        @endif
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        @if ($company->status==1)
                        <span class="tb-status text-success">{{ __('general.Active') }}</span>
                        @else
                        <span class="tb-status text-danger">{{ __('general.Inactive') }}</span>
                        @endif
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="tb-lead">
                          @if ($company->register_by==0)
                          <span class="badge badge-pill badge-gray"> {{ __('company.System')
                            }}</span>
                          @else
                          <span class="badge badge-pill badge-primary">{{ __('company.User')
                            }}</span>
                          @endif
                        </span>
                        <span>{{ __('company.In') }}:</span><span>{{ date('d M Y',
                          strtotime($company->created_at)) }}</span>
                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          @can('company-edit')
                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('company.edit',$company->id) }}"
                              class="btn btn-trigger btn-icon text-success" data-toggle="tooltip" data-placement="top"
                              title="{{ __('general.Edit') }}">
                              <em class="icon ni ni-edit-fill"></em>
                            </a>
                          </li>
                          @endcan


                          @if ($company->status==1)
                          @can('company-deactivate')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" data-placement="top"
                              title="{{ __('general.Deactivate') }}" data-sectionid="{{ $company->id }}"
                              data-sectionnameen="{{ $company->name_en }}" data-sectionnamear="{{ $company->name_ar }}"
                              data-toggle="modal" data-target="#deactivateMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan
                          @else
                          @can('company-activate')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-success" data-placement="top"
                              title="{{ __('general.Activate') }}" data-sectionid="{{ $company->id }}"
                              data-sectionnameen="{{ $company->name_en }}" data-sectionnamear="{{ $company->name_ar }}"
                              data-toggle="modal" data-target="#activateMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan
                          @endif

                          @can('company-delete')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-sectionid="{{ $company->id }}" data-sectionnameen="{{ $company->name_en }}"
                              data-sectionnamear="{{ $company->name_ar }}" data-toggle="modal" data-target="#deleteMdl">
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
                                    <a href="{{ route('company.show',$company->id) }}" class="text-primary">
                                      <em class="icon ni ni-eye"></em>
                                      <span>{{ __('general.View Details')
                                        }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  <li>
                                    <a href="{{ route('communication.index',$company->id) }}" class="text-info">
                                      <i class="icon fad fa-tty"></i>
                                      <span>{{ __('company.Communications')
                                        }}</span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="{{ route('company.about',$company->id) }}" class="text-info">
                                      <i class="icon fas fa-keyboard"></i>
                                      <span>{{ __('company.About') }}</span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="{{ route('company.project.index',$company->id) }}" class="text-teal">
                                      <em class="icon ni ni-tile-thumb-fill"></em>
                                      <span>{{ __('general.Projects') }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  <li>
                                    <a href="{{ route('company.product.index',$company->id) }}" class="text-dark">
                                      <i class="icon fas fa-pallet-alt"></i>
                                      <span>{{ __('general.Products') }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  <li>
                                    <a href="{{ route('company.slider.by.company',$company->id) }}" class="text-dark">
                                      <i class="icon far fa-sliders-h"></i>
                                      <span>{{ __('general.Sliders') }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  @if ($company->featured==1)
                                  <li>
                                    <a href="#" class="text-danger" data-sectionid="{{ $company->id }}"
                                      data-sectionnameen="{{ $company->name_en }}"
                                      data-sectionnamear="{{ $company->name_ar }}" data-toggle="modal"
                                      data-target="#normalizeMdl">
                                      <i class="icon fal fa-gas-pump-slash"></i>
                                      <span>{{ __('general.Normalize') }}</span>
                                    </a>
                                  </li>
                                  @else
                                  <li>
                                    <a href="#" class="text-success" data-sectionid="{{ $company->id }}"
                                      data-sectionnameen="{{ $company->name_en }}"
                                      data-sectionnamear="{{ $company->name_ar }}" data-toggle="modal"
                                      data-target="#featureMdl">
                                      <i class="icon fal fa-gas-pump"></i>
                                      <span>{{ __('general.Featured') }}</span>
                                    </a>
                                  </li>
                                  @endif

                                  <li>
                                    <a href="{{ route('company.oldProjects.index',$company->id) }}"
                                      class="text-secondary">
                                      <i class="icon fas fa-paperclip"></i>
                                      <span>{{ __('company.Old Projects')
                                        }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>
                                  @can('company-edit')
                                  <li>
                                    <a href="{{ route('company.edit',$company->id) }}" class="text-success">
                                      <em class="icon ni ni-edit"></em>
                                      <span>{{ __('general.Edit') }}</span>
                                    </a>
                                  </li>
                                  @endcan


                                  @if ($company->status==1)
                                  @can('company-activate')
                                  @can('company-deactivate')
                                  <li>
                                    <a href="#" class="text-danger" data-sectionid="{{ $company->id }}"
                                      data-sectionnameen="{{ $company->name_en }}"
                                      data-sectionnamear="{{ $company->name_ar }}" data-toggle="modal"
                                      data-target="#deactivateMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Deactivate') }}</span>
                                    </a>
                                  </li>
                                  @endcan

                                  @endcan

                                  @else
                                  <li>
                                    <a href="#" class="text-success" data-sectionid="{{ $company->id }}"
                                      data-sectionnameen="{{ $company->name_en }}"
                                      data-sectionnamear="{{ $company->name_ar }}" data-toggle="modal"
                                      data-target="#activateMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Activate') }}</span>
                                    </a>
                                  </li>
                                  @endif

                                  <li class="divider"></li>

                                  <li>
                                    <a href="#" class="text-warning" data-sectionid="{{ $company->id }}"
                                      data-sectionnameen="{{ $company->name_en }}"
                                      data-sectionnamear="{{ $company->name_ar }}" data-toggle="modal"
                                      data-target="#changPassMdl">
                                      <i class="icon fal fa-user-lock"></i>
                                      <span>{{ __('company.Change Password')
                                        }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  @can('company-delete')
                                  <li>
                                    <a href="#" class="text-danger" data-sectionid="{{ $company->id }}"
                                      data-sectionnameen="{{ $company->name_en }}"
                                      data-sectionnamear="{{ $company->name_ar }}" data-toggle="modal"
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
                  {{-- .nk-tb-item --}}
                </table>{{-- .nk-tb-list --}}
              </div>

              <div class="card-inner">
                <div class="nk-block-between-md g-3">
                  <div class="g">
                    {{ $companies->links('pagination::bootstrap-5') }}
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
        <form action="{{ route('company.featured') }}" method="POST">
          @csrf
          <input hidden id="fproject_id" name="sectionID" />
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                    __('general.Close') }}</button>

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
        <form action="{{ route('company.normalize') }}" method="POST">
          @csrf
          <input hidden id="nproject_Id" name="sectionID" />
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                    __('general.Close') }}</button>

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
        <form action="{{ route('company.activate') }}" method="POST">
          @csrf
          <input hidden id="section_id" name="sectionID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Activate') }}
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="section_namear"></span>
                @else
                <span id="section_nameen"></span>
                @endif

                <span>{{ __('general.?') }}</span>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                    __('general.Close') }}</button>

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
        <form action="{{ route('company.deactivate') }}" method="POST">
          @csrf
          <input hidden id="section_Id" name="sectionID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Deactivate') }}
              <strong>
                @if (App::getLocale() == 'ar')
                <span id="section_NameAr"></span>
                @else
                <span id="section_NameEn"></span>
                @endif

                <span>{{ __('general.?') }}</span>
            </p>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                    __('general.Close') }}</button>

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
=CHANGE PASSWORD
======================
--}}

<div class="modal fade zoon" tabindex="-1" id="changPassMdl">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="#" class="close" data-dismiss="modal" aria-label="{{ __('general.Close') }}">
        <em class="icon ni ni-cross"></em>
      </a>
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">{{ __('company.Change Password') }}</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('company.changePassword') }}" method="POST">
          @csrf
          <input hidden id="passId" name="companyID" />
          <div class="row gy-4 m-auto p-auto">
            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="password">{{ __('company.Password') }}</label>
                <div class="form-control-wrap">
                  <input type="password" class="form-control form-control-sm" id="password" name="password"
                    placeholder="{{ __('company.Password') }}" autocomplete="new-password" autofocus />
                  @error('password')
                  <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                <div class="form-control-wrap">
                  <input type="password" class="form-control form-control-sm" id="password-confirm"
                    name="password_confirmation" placeholder="{{ __('Confirm Password') }}"
                    autocomplete="new-password" />
                  @error('password_confirmation')
                  <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <hr />
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                    __('general.Close') }}</button>

                  <button type="submit" class="btn btn-primary">{{ __('company.Change') }}</button>
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
        <form action="{{ route('company.destroy') }}" method="POST">
          @csrf
          <input hidden id="sectionId" name="companyID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Delete') }}
              <strong>
                @if (App::getLocale()=='ar')
                <span id="sectionNamear"></span>
                @else
                <span id="sectionNameen"></span>
                @endif

                <span>{{ __('general.?') }}</span>
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
FEATURED MODAL
====================
*/
$('#featureMdl').on('show.bs.modal', function(e) {
let button = $(e.relatedTarget);
let id = button.data('sectionid');
let nameEn = button.data('sectionnameen');
let nameAr = button.data('sectionnamear');
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
let id = button.data('sectionid');
let nameEn = button.data('sectionnameen');
let nameAr = button.data('sectionnamear');
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
                let id = button.data('sectionid');
                let nameEn = button.data('sectionnameen');
                let nameAr = button.data('sectionnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #section_id').val(id);
                modal.find('.modal-body #section_nameen').html(nameEn);
                modal.find('.modal-body #section_namear').html(nameAr);
            });

            /*
            ====================
            DEACTIVATE MODAL
            ====================
            */
            $('#deactivateMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
               let id = button.data('sectionid');
               let nameEn = button.data('sectionnameen');
               let nameAr = button.data('sectionnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #section_Id').val(id);
                modal.find('.modal-body #section_NameEn').html(nameEn);
                modal.find('.modal-body #section_NameAr').html(nameAr);
            });

            /*
            =========================
            CHANGE PASSWORD MODAL
            =========================
            */
            $('#changPassMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('sectionid');
                let nameEn = button.data('sectionnameen');
                let nameAr = button.data('sectionnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #passId').val(id);
                modal.find('.modal-body #passNameen').html(nameEn);
                modal.find('.modal-body #passNamear').html(nameAr);
            });

            /*
            ====================
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('sectionid');
                let nameEn = button.data('sectionnameen');
                let nameAr = button.data('sectionnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #sectionId').val(id);
                modal.find('.modal-body #sectionNameen').html(nameEn);
                modal.find('.modal-body #sectionNamear').html(nameAr);
            });

        });
</script>
@endsection