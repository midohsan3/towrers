@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ $role->name }}
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
              <h3 class="nk-block-title page-title">{{ __('role.Role') }}/ <strong
                  class="text-primary small">{{$role->name}}</strong></h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('role.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('role.index') }}"
                class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none">
                <em class="icon ni ni-arrow-left"></em>
              </a>

            </div>
          </div>
        </div>
        {{-- .nk-block-head --}}

        <div class="nk-block">
          <div class="card card-preview">
            <div class="card-inner">
              <div class="preview-block">

                <form action="{{ route('role.update', $role->id) }}" method="POST">
                  @csrf
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="form-label" for="name">{{ __('general.Name') }}</label>
                      <div class="form-control-wrap">
                        <input type="text" class="form-control" id="name" name="name"
                          placeholder="{{ __('role.Role Name') }}" value="{{ $role->name }}" autocomplete autofocus>
                        @error('name')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <hr class="preview-hr">
                  <h6><strong>{{ trans('roles.Permissions') }}:</strong></h6>
                  @foreach ($permissions as $permission)

                  @if (array_key_exists($permission->id, $rolePermissions))
                  <div class="col-md-3 custom-control custom-checkbox mb-1">
                    <input type="checkbox" checked class="custom-control-input" id="perm{{ $permission->id }}"
                      name="permission[]" value="{{ $permission->id }}">
                    <label class="custom-control-label text-capitalize"
                      for="perm{{ $permission->id }}">{{ $permission->name }}</label>
                  </div>
                  @else
                  <div class="col-md-3 custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" id="perm{{ $permission->id }}"
                      name="permission[]" value="{{ $permission->id }}">
                    <label class="custom-control-label" for="perm{{ $permission->id }}">{{ $permission->name }}</label>
                  </div>

                  @endif
                  @endforeach

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="{{ __('general.Update') }}" />
                    </div>
                  </div>
                </form>
                <hr class="preview-hr">

              </div>
            </div>
          </div>`
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>
@endsection