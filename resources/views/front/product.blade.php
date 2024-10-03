@extends('layouts.front')

{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
@if (App::getLocale()=='ar')
{{ $product->name_ar }}
@else
{{ $product->name_en }}
@endif
@endsection
{{-- 
  ======================
  =PAGE CONTENT
  ======================
  --}}
@section('page-content')

<section class="page-title bg-transparent">
  <div class="container">
    <div class="page-title-row">

      <div class="page-title-content">
        <h1><img src="{{ url('imgs/logo.png') }}" width="150" class="rounded-circle" />
          {{ __('general.Products') }}
        </h1>
      </div>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('front') }}"><strong
                style="font-size: 1.5em; color: blue;">{{ __('front.Home') }}</strong></a></li>

          <li class="breadcrumb-item"><a href="{{ route('front.product') }}"><strong
                style="font-size: 1.5em; color: blue;">{{__('general.Products')}}</strong></a></li>

          <li class="breadcrumb-item active" aria-current="page">
            <strong style="font-size: 1.5em; color: blue;">
              @if (App::getLocale()=='ar')
              {{ $product->name_ar }}
              @else
              {{ $product->name_en}}
              @endif
            </strong>
          </li>
        </ol>
      </nav>

    </div>
  </div>
</section>


<section id="content">
  <div class="content-wrap pb-0">
    <div class="container">
      <div class="single-product mb-6">
        <div class="product">
          <div class="container-fluid">
            <div class="row gutter-50">
              <div class="col-xl-5 col-lg-5 mb-0 sticky-sidebar-wrap">

                <div class="masonry-thumbs grid-container row row-cols-2" data-lightbox="gallery">
                  @if ($photos->count()>0)
                  @foreach ($photos as $photo)
                  <a class="grid-item" href="{{ url('storage/app/public/imgs/products/'.$photo->photo) }}"
                    data-lightbox="gallery-item">
                    <img src="{{ url('storage/app/public/imgs/products/'.$photo->photo) }}" alt="{{ $photo->photo }}" />
                  </a>
                  @endforeach
                  @endif
                </div>

              </div>

              <div class="col-xl-5 col-lg-5 mb-0">

                <div data-readmore="true" data-readmore-size="250px"
                  data-readmore-trigger-open="Read More <i class='fa-solid fa-chevron-down'></i>"
                  data-readmore-trigger-close="false">

                  <h3>
                    @if (App::getLocale()=='ar')
                    {{ $product->name_ar }}
                    @else
                    {{ $product->name_en }}
                    @endif
                  </h3>


                  <p>
                    @if (App::getLocale()=='ar')
                    {{$product->description_ar}}
                    @else
                    {{$product->description_en}}
                    @endif
                  </p>

                </div>

                <div>
                  <h4>{{ __('front.Product Details') }}</h4>
                  <table class="table table-striped table-bordered mb-5">
                    <tbody>
                      <tr>
                        <th width="150"></th>
                        <th>{{ __('front.Description') }}</th>
                      </tr>
                      <tr>
                        <td>{{ __('front.Quantity') }}</td>
                        <td>
                          <span>{{ $product->quantity }} </span>
                          @if ($product->unit_id !==null)
                          <span>
                            @if (App::getLocale()=='ar')
                            {{ $product->unitProduct->name_ar }}
                            @else
                            {{ $product->unitProduct->name_ne }}
                            @endif
                          </span>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>{{ __('front.Price') }}</td>
                        <td>
                          <span>{{ number_format($product->price,2) }} <span>{{ __('general.AED') }}</span></span>
                        </td>
                      </tr>

                      @if ($product->user_id !==null)
                      <tr>
                        <td>{{ __('front.Company') }}</td>
                        <td>
                          <a href="{{ route('front.companies.single',$product->userProduct->companyUser->id) }}">
                            @if (App::getLocale()=='ar')
                            {{ $product->userProduct->companyUser->name_ar }}
                            @else
                            {{ $product->userProduct->companyUser->name_en }}
                            @endif
                          </a>
                        </td>
                      </tr>

                      @foreach($cons as $con)
                      @if ($product->user_id ==$con->user_id)
                      @if ($con->con_type==1)
                      <tr>
                        <td>{{ __('front.Phone') }}</td>
                        <td>{{ $con->chanel }}</td>
                      </tr>
                      @elseif($con->con_type==3)
                      <tr>
                        <td>{{ __('front.WhatsApp') }}</td>
                        <td>{{ $con->chanel }}</td>
                      </tr>
                      @endif

                      @endif
                      @endforeach
                      @endif

                    </tbody>
                  </table>

                </div>

                <!-- Product Single - Share
									============================================= -->
                <div class="card border-0 my-4">
                  <div class="card-body py-3 px-0">
                    <div class="d-flex align-items-center justify-content-between">
                      <h6 class="fs-6 fw-semibold mb-0">Share:</h6>
                      <div class="d-flex">
                        <a href="#"
                          class="social-icon si-small text-white border-transparent rounded-circle bg-facebook"
                          title="Facebook">
                          <i class="fa-brands fa-facebook-f"></i>
                          <i class="fa-brands fa-facebook-f"></i>
                        </a>

                        <a href="#" class="social-icon si-small text-white border-transparent rounded-circle bg-twitter"
                          title="Twitter">
                          <i class="fa-brands fa-twitter"></i>
                          <i class="fa-brands fa-twitter"></i>
                        </a>

                        <a href="#"
                          class="social-icon si-small text-white border-transparent rounded-circle bg-pinterest"
                          title="Pinterest">
                          <i class="fa-brands fa-pinterest-p"></i>
                          <i class="fa-brands fa-pinterest-p"></i>
                        </a>

                        <a href="#"
                          class="social-icon si-small text-white border-transparent rounded-circle bg-whatsapp"
                          title="Whatsapp">
                          <i class="fa-brands fa-whatsapp"></i>
                          <i class="fa-brands fa-whatsapp"></i>
                        </a>

                        <a href="#" class="social-icon si-small text-white border-transparent rounded-circle bg-rss"
                          title="RSS">
                          <i class="fa-solid fa-rss"></i>
                          <i class="fa-solid fa-rss"></i>
                        </a>

                        <a href="#"
                          class="social-icon si-small text-white border-transparent rounded-circle bg-email3 me-0"
                          title="Mail">
                          <i class="fa-solid fa-envelope"></i>
                          <i class="fa-solid fa-envelope"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div><!-- Product Single - Share End -->


                <form class="row" action="{{ route('front.product.enquiry') }}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  <input hidden name="product_id" value="{{ $product->id }}" />
                  <div class="form-process">
                    <div class="css3-spinner">
                      <div class="css3-spinner-scaler"></div>
                    </div>
                  </div>
                  <div class="col-12 form-group">
                    <label>Name:</label>
                    <input type="text" name="name" id="jobs-application-name" class="form-control required"
                      value="{{ old('name') }}" placeholder="{{ __('order.Enter your Full Name') }}" />
                    @error('name')
                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="col-12 form-group">
                    <label>Email:</label>
                    <input type="email" name="email" id="jobs-application-email" class="form-control required"
                      value="{{ old('email') }}" placeholder="{{ __('order.Enter your Email') }}" />
                    @error('email')
                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="col-12 form-group">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label>Phone:</label>
                        <input type="text" name="phone" id="jobs-application-phone" class="form-control required"
                          value="{{ old('phone') }}" placeholder="05xxxxxxxx" />
                        @error('phone')
                        <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="w-100"></div>
                    </div>


                    <div class="form-group">
                      <label>Describe Yourself:</label>
                      <textarea name="details" id="jobs-application-message" class="form-control required" cols="30"
                        rows="10"></textarea>
                      @error('details')
                      <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12 d-none">
                    <input type="text" id="jobs-application-botcheck" name="order" value="">
                  </div>
                  <div class="col-12">
                    <button type="submit" name="jobs-application-submit" class="btn btn-secondary">Send Message</button>
                  </div>

                  <input type="hidden" name="prefix" value="jobs-application-">
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    @if ($recommended->count()>0)
    <div class="section mb-0">

      <div class="container mw-md text-center">
        <h4>Similar Products</h4>

        <div class="row justify-content-center gutter-1">
          @foreach ($recommended as $item)
          <div class="col-md-3 col-6 h-translate-y-sm all-ts">
            <div class="product bg-white">
              <div class="product-image position-relative">
                <div class="fslider" data-pagi="false" data-speed="400" data-pause="200000">
                  <div class="flexslider">
                    <div class="slider-wrap">
                      <a href="{{ route('front.product.single',$item->id) }}"><img
                          src="{{ url('storage/app/public/imgs/products/'.$item->main_pic) }}"
                          alt="{{ $item->name_en }}"></a>


                    </div>
                  </div>
                </div>

              </div>
              <div class="product-desc flex-column px-4">
                <div class="product-title">
                  <h3><a href="{{ route('front.product.single',$item->id) }}">
                      @if (App::getLocale()=='ar')
                      {{ $item->name_ar }}
                      @else
                      {{ $item->name_en }}
                      @endif
                    </a></h3>
                  <span><a href="{{ route('front.product.category',$item->product_category_id) }}">
                      @if (App::getLocale()=='ar')
                      {{ $item->category_ProductCategory->name_ar }}
                      @else
                      {{ $item->category_ProductCategory->name_en }}
                      @endif
                    </a></span>
                </div>
                <div class="product-price"><ins>{{ number_format($item->price,2) }} {{ __('general.AED') }}</ins></div>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>

    </div>
    @endif




  </div>
</section>


@endsection