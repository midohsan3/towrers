@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Glary') }}
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
              <h3 class="nk-block-title page-title">{{ __('project.Projects Glary') }}</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($photosCount,0) }} {{ __('project.Photo') }}.
                </p>
              </div>
            </div>

          </div>
          {{-- .nk-block-between --}}
        </div>
        {{-- .nk-block-head --}}

        <div class="card">
          <div class="card-inner">
            <div class="preview-block">
              <span class="preview-title-lg overline-title">{{ __('project.Upload Photo') }}</span>
              <form action="{{ route('company.oldProjects.glary.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row gy-4">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="form-control-wrap">
                        <input hidden class="form-control" id="project_id" name="project_id"
                          value="{{ $project->id }}" />
                        @error('project_id')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row gy-4">
                  <div class="col-sm-6">
                    <div class="form-group form-inline">
                      <div class="form-control-wrap">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="customFile" name="photo" />
                          <label class="custom-file-label" for="customFile">{{ __('general.Choose file') }}</label>
                        </div>
                        @error('photo')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-control-wrap">
                        <input type="submit" class="btn btn-primary" value="{{ __('general.Submit') }}" />
                      </div>
                    </div>
                    <div class="form-group form-inline">
                      @error('photo')
                      <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>

                <hr class="preview-hr">

              </form>

            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-inner">
            <div class="preview-block">
              <span class="preview-title-lg overline-title">{{ __('project.Projects Glary') }}</span>

              @if ($photos->count()>0)
              <div class="row g-3 d-flex justify-content-center">
                @foreach ($photos as $photo)
                <div class="col col-md-3">
                  <div class="card">
                    <img src="{{ url('storage/app/public/imgs/projects') . '/' . $photo->photo }}" class="card-img-top"
                      width="200" height="400" alt="{{ $photo->photos }}">
                    <div class="card-inner">
                      <div class="d-flex justify-content-between">

                        @if ($photo->status==1)
                        <a href="#" class="btn-xs btn btn-primary  mr-1 disabled">{{ __('project.Set Default') }}</a>
                        @else
                        <a href="{{ route('company.oldProjects.glary.activate',$photo->id) }}"
                          class="btn-xs btn btn-primary mr-1">{{ __('project.Set Default') }}</a>
                        @endif

                        <a href="{{ route('company.oldProjects.glary.destroy',$photo->id) }}"
                          class="btn-xs btn btn-danger">{{ __('general.Delete') }}</a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              @else
              <div class="card">
                <div class="alert alert-icon alert-danger text-center" role="alert">
                  <strong>{{ __('general.No Data Available to Show') }}.</strong>
                </div>
              </div>
              @endif

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection