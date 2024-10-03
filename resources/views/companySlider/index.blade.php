@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('slider.Company Slider') }}
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
              <h3 class="nk-block-title page-title">{{ __('slider.Companies Sliders List') }}</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($slidersCount,0) }} {{ __('slider.Slider') }}.
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
              @if ($sliders->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list is-separate nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col"><span class="sub-text">{{ __('company.Company') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('general.Status') }}</span></th>
                      </th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>{{-- .nk-tb-item --}}
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slider)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">
                        <a href="{{ route('slider.company.edit',$slider->id) }}" class="project-title">
                          <div class="user-avatar sq bg-purple">
                            <img src="{{ url('storage/app/public/imgs/sliders/'.$slider->photo) }}"
                              alt="{{ $slider->photo }}" />
                          </div>
                          <div class="project-info">
                            <span class="tb-lead ">
                              @if ($slider->user_id==null)
                              {{ __('general.System') }}
                              @else
                              @if (App::getLocale()=='ar')
                              {{ $slider->userCompanySlider->companyUser->name_ar }}
                              @else
                              {{ $slider->userCompanySlider->companyUser->name_en }}
                              @endif
                              @endif
                            </span>
                          </div>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        @if ($slider->status==1)
                        <span class="tb-status text-success">{{ __('general.Active') }}</span>
                        @else
                        <span class="tb-status text-danger">{{ __('general.Inactive') }}</span>
                        @endif
                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('slider.company.edit',$slider->id) }}"
                              class="btn btn-trigger btn-icon text-primary" data-toggle="tooltip" data-placement="top"
                              title="{{ __('general.View') }}">
                              <em class="icon ni ni-eye"></em>
                            </a>
                          </li>

                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}">
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
                                    <a href="{{ route('slider.company.edit',$slider->id) }}" class="text-primary">
                                      <em class="icon ni ni-eye"></em>
                                      <span>{{ __('general.View Details') }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  <li>
                                    <a href="#" class="text-danger">
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
                </table>{{-- .nk-tb-list --}}
              </div>

              <div class="card-inner">
                <div class="nk-block-between-md g-3">
                  <div class="g">
                    {{ $sliders->links('pagination::bootstrap-5') }}
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
        <form action="{{ route('slider.company.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input hidden name="company_id" value="{{ Auth::user()->id }}" />
          <p class="text-center">
          <div class="row gy-4">
            <div class="col">
              <div class="form-group">
                <div class="form-control-wrap">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="photo" />
                    <label class="custom-file-label" for="customFile">{{ __('general.Choose file') }}</label>
                  </div>
                  @error('photo')
                  <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                @error('photo')
                <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                @enderror
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


@endsection
{{-- 
  =====================
  =PAGE SCRIPTS
  =====================
  --}}
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection