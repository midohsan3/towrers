@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Personal Accounts') }}
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
              <h3 class="nk-block-title page-title">{{ __('users.User List') }}</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($usersCount,0) }}
                  {{ __('users.User') }}.
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
                            <li><a href="{{ route('person.index') }}"><span>{{ __('general.All') }}</span></a></li>
                            <li><a href="===="><span>{{ __('general.Active') }}</span></a></li>
                            <li><a href="====="><span>{{ __('general.Inactive') }}</span></a>
                            </li>
                            <li><a href="#"><span>{{ __('general.Trashed') }}</span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    @can('persons-create')
                    <li class="nk-block-tools-opt">
                      <a href="{{ route('person.create') }}" class="btn btn-icon btn-primary d-md-none">
                        <em class="icon ni ni-plus"></em>
                      </a>
                      <a href="{{ route('person.create') }}" class="btn btn-primary d-none d-md-inline-flex">
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
              @if ($users->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col">
                        <span class="sub-text">{{ __('general.Name') }}</span>
                      </th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('company.Communication') }}</span>
                      </th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('job.CV') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('general.Status') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('company.Added By') }}</span></th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>
                  </thead>
                  {{-- .nk-tb-item --}}
                  <tbody>

                    @foreach ($users as $user)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">
                        <a href="#">
                          <div class="user-card">
                            <div class="user-avatar bg-primary">
                              @if ($user->profile_pic !== null)
                              <img src="{{ url('storage/app/public/imgs/users/'.$user->profile_pic) }}"
                                alt="{{ $user->name }}" />
                              @else
                              <span class="text-uppercase">{{ substr($user->name,0,2) }}</span>
                              @endif
                            </div>
                            <div class="user-info">
                              <span class="tb-lead ">
                                {{ $user->name }}
                              </span>
                              <span>{{ $user->email }}</span>
                            </div>
                          </div>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-md">

                        <span>
                          <a href="{{ route('communication.index',$user->id) }}">
                            @if (array_key_exists($user->id, $communications))
                            {{ $communications[$user->id] }}<span> {{ __('company.Chanel') }}</span>
                          </a>
                          @else
                          {{ __('company.No chanels Yet') }}
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span>
                          @if (array_key_exists($user->id,$cvs))
                          <span class="text-success">{{ __('users.Have CV') }}</span>
                          @else
                          <span class="text-danger">{{ __('users.Dont Have CV') }}</span>
                          @endif

                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        @if ($user->status==1)
                        <span class="tb-status text-success">{{ __('general.Active') }}</span>
                        @else
                        <span class="tb-status text-danger">{{ __('general.Inactive') }}</span>
                        @endif
                      </td>

                      <td class="nk-tb-col tb-col-md">

                        <span>{{ __('company.In') }}:</span><span>{{ date('d M Y', strtotime($user->created_at)) }}</span>
                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          @can('persons-edit')
                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('person.edit',$user->id) }}" class="btn btn-trigger btn-icon text-success"
                              data-toggle="tooltip" data-placement="top" title="{{ __('general.Edit') }}">
                              <em class="icon ni ni-edit-fill"></em>
                            </a>
                          </li>
                          @endcan


                          @if ($user->status==1)
                          @can('persons-deactivate')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" data-placement="top"
                              title="{{ __('general.Deactivate') }}" data-sectionid="{{ $user->id }}"
                              data-sectionnameen="{{ $user->name }}" data-toggle="modal" data-target="#deactivateMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan
                          @else
                          @can('persons-activate')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-success" data-placement="top"
                              title="{{ __('general.Activate') }}" data-sectionid="{{ $user->id }}"
                              data-sectionnameen="{{ $user->name }}" data-toggle="modal" data-target="#activateMdl">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan

                          @endif

                          @can('persons-delete')
                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-sectionid="{{ $user->id }}" data-sectionnameen="{{ $user->name }}"
                              data-toggle="modal" data-target="#deleteMdl">
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

                                  <li class="divider"></li>

                                  @can('persons-edit')
                                  <li>
                                    <a href="{{ route('person.edit',$user->id) }}" class="text-success">
                                      <em class="icon ni ni-edit"></em>
                                      <span>{{ __('general.Edit') }}</span>
                                    </a>
                                  </li>
                                  @endcan

                                  @if ($user->status==1)
                                  @can('persons-deactivate')
                                  <li>
                                    <a href="#" class="text-danger" data-sectionid="{{ $user->id }}"
                                      data-sectionnameen="{{ $user->name }}" data-toggle="modal"
                                      data-target="#deactivateMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Deactivate') }}</span>
                                    </a>
                                  </li>
                                  @endcan

                                  @else
                                  @can('persons-activate')
                                  <li>
                                    <a href="#" class="text-success" data-sectionid="{{ $user->id }}"
                                      data-sectionnameen="{{ $user->name}}" data-toggle="modal"
                                      data-target="#activateMdl">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Activate') }}</span>
                                    </a>
                                  </li>
                                  @endcan
                                  @endif
                                  <li class="divider"></li>

                                  <li>
                                    <a href="#" class="text-warning" data-sectionid="{{ $user->id }}"
                                      data-sectionnameen="{{ $user->name_en }}" data-toggle="modal"
                                      data-target="#changPassMdl">
                                      <i class="icon fal fa-user-lock"></i>
                                      <span>{{ __('company.Change Password') }}</span>
                                    </a>
                                  </li>

                                  @can('persons-delete')
                                  <li>
                                    <a href="#" class="text-danger" data-sectionid="{{ $user->id }}"
                                      data-sectionnameen="{{ $user->name }}" data-toggle="modal"
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
                    {{ $users->links('pagination::bootstrap-5') }}
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
  --}}

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
        <form action="{{ route('person.activate') }}" method="POST">
          @csrf
          <input hidden id="section_id" name="userID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Activate') }}
              <strong>
                <span id="section_nameen"></span>
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
        <form action="{{ route('person.deactivate') }}" method="POST">
          @csrf
          <input hidden id="section_Id" name="userID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Deactivate') }}
              <strong>
                <span id="section_NameEn"></span>
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
        <form action="{{ route('staff.changePass') }}" method="POST">
          @csrf
          <input hidden id="passId" name="userID" />
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
                  <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('general.Close') }}</button>

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
        <form action="{{ route('person.destroy') }}" method="POST">
          @csrf
          <input hidden id="sectionId" name="userID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Delete') }}
              <strong>
                <span id="sectionNameen"></span>
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
            ACTIVATE MODAL
            ====================
            */
            $('#activateMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('sectionid');
                let nameEn = button.data('sectionnameen');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #section_id').val(id);
                modal.find('.modal-body #section_nameen').html(nameEn);
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
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #section_Id').val(id);
                modal.find('.modal-body #section_NameEn').html(nameEn);
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
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #sectionId').val(id);
                modal.find('.modal-body #sectionNameen').html(nameEn);
            });

        });
</script>
@endsection