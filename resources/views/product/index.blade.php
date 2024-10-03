@extends('layouts.admin')

{{--
=====================
=TITLE
=====================
--}}
@section('title')
{{ __('general.Products') }}
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
              <h3 class="nk-block-title page-title">{{ __('product.Products List') }}</h3>
              <div class="nk-block-des text-soft">
                <p>{{ __('general.You have total') }} {{ number_format($productsCount,0) }} {{
                  __('product.Product') }}.
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

                    @can('product-create')
                    <li class="nk-block-tools-opt">
                      <a href="{{ route('product.create') }}" class="btn btn-icon btn-primary d-md-none">
                        <em class="icon ni ni-plus"></em>
                      </a>
                      <a href="{{ route('product.create') }}" class="btn btn-primary d-none d-md-inline-flex">
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
              @if ($products->count()>0)
              <div class="card-inner p-0">
                <table class="nk-tb-list is-separate nk-tb-ulist">
                  <thead>
                    <tr class="nk-tb-item nk-tb-head">
                      <th class="nk-tb-col"><span class="sub-text">{{ __('general.Name') }}</span>
                      </th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('company.Company') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('product.Quantity') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('product.Price') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('product.Featured') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('product.Description') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('general.Photos') }}</span></th>

                      <th class="nk-tb-col tb-col-md"><span class="sub-text">{{
                          __('general.Submitted Date') }}</span>
                      </th>

                      <th class="nk-tb-col nk-tb-col-tools text-right">
                      </th>
                    </tr>{{-- .nk-tb-item --}}
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr class="nk-tb-item">
                      <td class="nk-tb-col">
                        <a href="=========" class="project-title">
                          <div class="user-avatar bg-purple">
                            @if ($product->main_pic !== null)
                            <img src="{{ url('storage/app/public/imgs/products/'.$product->main_pic) }}"
                              alt="{{ $product->name_en }}" />
                            @else
                            <span class="text-uppercase">{{
                              Str::substr($product->name_en,0,2) }}</span>
                            @endif
                          </div>
                          <div class="project-info">
                            <h6 class="title">
                              @if (App::getLocale()=='ar')
                              {{ $product->name_ar }}
                              @else
                              {{ $product->name_en }}
                              @endif
                            </h6>
                          </div>
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-lg">
                        @if ($product->user_id==null)
                        <span>{{ __('general.System') }}</span>
                        @else
                        <span>
                          @if (App::getLocale()=='ar')
                          {{ $product->userProduct->companyUser->name_ar }}
                          @else
                          {{ $product->userProduct->companyUser->name_en }}
                          @endif
                        </span>
                        @endif
                      </td>

                      <td class="nk-tb-col tb-col-lg">
                        <span class="amount">{{ number_format($product->quantity,0) }}
                          @if ($product->product_category_id !==null)
                          <span class="currency">
                            @if (App::getLocale()=='ar')
                            {{ $product->unitProduct->name_ar }}
                            @else
                            {{ $product->unitProduct->name_en }}
                            @endif
                          </span>
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-md">
                        <span class="amount">{{ number_format($product->price,2) }} <span class="currency">{{
                            __('general.AED') }}</span></span>
                      </td>

                      <td class="nk-tb-col tb-col-lg">
                        @if ($product->featured==1)
                        <span class="tb-status text-success">{{ __('product.Featured') }}</span>
                        @else
                        <span class="tb-status text-danger">{{ __('product.Normal') }}</span>
                        @endif

                      </td>

                      <td class="nk-tb-col tb-col-lg">
                        <span>
                          @if (App::getLocale()=='ar')
                          {{ Str::limit($product->description_ar,100) }}
                          @else
                          {{ Str::limit($product->description_en,100) }}
                          @endif
                        </span>
                      </td>

                      <td class="nk-tb-col tb-col-mb">
                        <a href="{{ route('product.photos.index',$product->id) }}">
                          @if (array_key_exists($product->id,$photos))
                          <span class="amount">{{ $photos[$product->id] }} <span class="currency">{{
                              __('general.Photos') }}</span></span>

                          @else
                          {{ __('product.No Photos Uploaded') }}
                          @endif
                        </a>
                      </td>

                      <td class="nk-tb-col tb-col-mb">
                        <span>{{ date('d M, Y',strtotime($product->created_at)) }}</span>
                      </td>

                      <td class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1">

                          @can('product-edit')
                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('product.edit',$product->id) }}"
                              class="btn btn-trigger btn-icon text-success" data-toggle="tooltip" data-placement="top"
                              title="{{ __('general.Edit') }}">
                              <em class="icon ni ni-edit-fill"></em>
                            </a>
                          </li>
                          @endcan

                          @if ($product->featured==1)
                          @can('product-normalize')
                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('product.normalize',$product->id) }}"
                              class="btn btn-trigger btn-icon text-danger" data-placement="top"
                              title="{{ __('general.Normalize') }}">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan

                          @else
                          @can('product-featured')
                          <li class="nk-tb-action-hidden">
                            <a href="{{ route('product.featured',$product->id) }}"
                              class="btn btn-trigger btn-icon text-success" data-placement="top"
                              title="{{ __('general.Featured') }}">
                              <i class="icon fal fa-power-off"></i>
                            </a>
                          </li>
                          @endcan
                          @endif

                          <li class="nk-tb-action-hidden">
                            <a href="#" class="btn btn-trigger btn-icon text-danger" title="{{ __('general.Delete') }}"
                              data-productid="{{ $product->id }}" data-produtnameen="{{ $product->name_en }}"
                              data-produtnamear="{{ $product->name_ar }}" data-toggle="modal" data-target="#deleteMdl">
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
                                    <a href="=======" class="text-primary">
                                      <em class="icon ni ni-eye"></em>
                                      <span>{{ __('general.View Details')
                                        }}</span>
                                    </a>
                                  </li>

                                  <li>
                                    <a href="{{ route('product.photos.index',$product->id) }}" class="text-primary">
                                      <i class="icon far fa-camera-alt"></i>
                                      <span>{{ __('general.Glary') }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  @can('product-edit')
                                  <li>
                                    <a href="{{ route('product.edit',$product->id) }}" class="text-success">
                                      <em class="icon ni ni-edit"></em>
                                      <span>{{ __('general.Edit') }}</span>
                                    </a>
                                  </li>
                                  @endcan

                                  @if ($product->featured==1)
                                  @can('product-normalize')
                                  <li>
                                    <a href="{{ route('product.normalize',$product->id) }}" class="text-danger">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Normalize') }}</span>
                                    </a>
                                  </li>
                                  @endcan
                                  @else
                                  @can('product-featured')
                                  <li>
                                    <a href="{{ route('product.featured',$product->id) }}" class="text-success">
                                      <i class="icon fal fa-power-off"></i>
                                      <span>{{ __('general.Featured') }}</span>
                                    </a>
                                  </li>
                                  @endcan
                                  @endif

                                  <li class="divider"></li>

                                  <li>
                                    <a href="{{ route('product.notify',$product->id) }}" class="text-primary">
                                      <i class="icon fal fa-bell"></i>
                                      <span>{{ __('general.Send Notification')
                                        }}</span>
                                    </a>
                                  </li>

                                  <li class="divider"></li>

                                  <li>
                                    <a href="#" class="text-danger" data-productid="{{ $product->id }}"
                                      data-produtnameen="{{ $product->name_en }}"
                                      data-produtnamear="{{ $product->name_ar }}" data-toggle="modal"
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
                    {{ $products->links('pagination::bootstrap-5') }}
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
        <form action="{{ route('product.destroy') }}" method="POST">
          @csrf
          <input hidden id="productId" name="productID" />
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