@extends('layouts.admin')

{{-- 
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.YouTube') }}
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
              <h3 class="nk-block-title page-title">{{ __('general.YouTube Videos') }}</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($videosCount,0) }} {{ __('general.Video') }}.
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
                      <a href="{{ route('video.create') }}" class="btn btn-icon btn-primary d-md-none">
                        <em class="icon ni ni-plus"></em>
                      </a>
                      <a href="{{ route('video.create') }}" class="btn btn-primary d-none d-md-inline-flex">
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
              @if ($videos->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list is-separate nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col"><span class="sub-text">{{ __('general.Link') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{ __('product.Featured') }}</span></th>
                      </th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>{{-- .nk-tb-item --}}
                  </thead>
                  <tbody>
                    @foreach ($videos as $video)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">
                        <a href="{{ route('video.edit',$video->id) }}" class="project-title">
                          <div class="user-avatar bg-purple">
                            @if ($video->cover !== null)
                            <img src="{{ url('storage/app/public/imgs/videos/'.$video->cover) }}"
                              alt="{{ $video->covers }}" />
                            @else
                            <span class="text-uppercase">VD</span>
                            @endif
                          </div>
                          <div class="project-info">
                            <h6 class="title">
                              @if (App::getLocale()=='ar')
                              {{$video->description_ar}}
                              @else
                              {{$video->description_en}}
                              @endif
                            </h6>
                          </div>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-lg">
                        @if ($video->featured==1)
                        <span class="tb-status text-success">{{ __('product.Featured') }}</span>
                        @else
                        <span class="tb-status text-danger">{{ __('product.Normal') }}</span>
                        @endif

                      </td>

                      <td class="nk-tb-col tb-col-mb">
                        <span>{{ date('d M, Y',strtotime($video->created_at)) }}</span>
                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('video.edit',$video->id) }}" class="btn btn-trigger btn-icon text-success"
                              data-toggle="tooltip" data-placement="top" title="{{ __('general.Edit') }}">
                              <em class="icon ni ni-edit-fill"></em>
                            </a>
                          </li>

                          @if ($video->featured==1)
                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('video.normalize',$video->id) }}"
                              class="btn btn-trigger btn-icon text-danger" data-placement="top"
                              title="{{ __('general.Normalize') }}">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @else
                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('video.featured',$video->id) }}"
                              class="btn btn-trigger btn-icon text-success" data-placement="top"
                              title="{{ __('general.Featured') }}">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endif

                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-productid="{{ $video->id }}" data-produtnameen="{{ $video->name_en }}"
                              data-produtnamear="{{ $video->name_ar }}" data-toggle="modal" data-target="#deleteMdl">
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
                                    <a href="{{ route('video.edit',$video->id) }}" class="text-success">
                                      <em class="icon ni ni-edit"></em>
                                      <span>{{ __('general.Edit') }}</span>
                                    </a>
                                  </li>

                                  @if ($video->featured==1)
                                  <li>
                                    <a href="{{ route('video.normalize',$video->id) }}" class="text-danger">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Normalize') }}</span>
                                    </a>
                                  </li>
                                  @else
                                  <li>
                                    <a href="{{ route('video.featured',$video->id) }}" class="text-success">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Featured') }}</span>
                                    </a>
                                  </li>
                                  @endif

                                  <li class="divider"></li>

                                  <li>
                                    <a href="#" class="text-danger" data-productid="{{ $video->id }}"
                                      data-produtnameen="{{ $video->name_en }}"
                                      data-produtnamear="{{ $video->name_ar }}" data-toggle="modal"
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
                </table>{{-- .nk-tb-list --}}
              </div>

              <div class="card-inner">
                <div class="nk-block-between-md g-3">
                  <div class="g">
                    {{ $videos->links('pagination::bootstrap-5') }}
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
        <form action="{{ route('video.destroy') }}" method="POST">
          @csrf
          <input hidden id="productId" name="videoID" />
          <div class="row gy-4 m-auto p-auto">
            <p class="text-center">
              {{ __('general.Are You Sure You Want Delete') }}
              <strong>
                @if (App::getLocale()=='ar')
                <span id="productNamear"></span>
                @else
                <span id="productNameen"></span>
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
            DELETE MODAL
            ====================
            */
            $('#deleteMdl').on('show.bs.modal', function(e) {
                let button = $(e.relatedTarget);
                let id = button.data('productid');
                let nameEn = button.data('produtnameen');
                let nameAr = button.data('produtnamear');
                //console.log(id);
                var modal = $(this);
                modal.find('.modal-body #productId').val(id);
                modal.find('.modal-body #productNameen').html(nameEn);
                modal.find('.modal-body #productNamear').html(nameAr);
            });

        });
</script>
@endsection