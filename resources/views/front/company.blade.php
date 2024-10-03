@extends('layouts.front')
{{--
======================
=PAGE STYLES
======================
--}}

{{--
======================
=PAGE TITLE
======================
--}}
@section('page-title')
@if (App::getLocale()=='ar')
{{ $company->name_ar }}
@else
{{ $company->name_en }}
@endif
@endsection
{{--
======================
=PAGE CONTENT
======================
--}}
@section('page-content')

{{-- Slider--}}

{{-- #Slider End --}}

<section class="page-title bg-transparent">
    <div class="container">
        <div class="page-title-row">

            <div class="page-title-content">
                <h1 class="text-capitalize" style="color:#3c04be;"><img
                        src="{{ url('storage/app/public/imgs/users/'.$company->userCompany->profile_pic) }}" width="150"
                        class="rounded-circle" />
                    @if (App::getLocale()=='ar')
                    {{ $company->name_ar }}
                    @else
                    {{ $company->name_en }}
                    @endif</h1>

            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('front') }}"><strong
                                style="font-size: 1em; color: blue;">{{
                                __('front.Home') }}</strong></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.companies')}}"><strong
                                style="font-size: 1em; color: blue;">{{ __('front.Companies') }}</strong></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.companies.section',$company->section_id) }}">
                            <strong style="font-size: 1em; color: blue;">
                                @if (App::getLocale()=='ar')
                                {{ $company->sectionCompany->name_ar }}
                                @else
                                {{ $company->sectionCompany->name_en}}
                                @endif
                            </strong>
                        </a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <strong style="font-size: 1em; color: blue;">
                            @if (App::getLocale()=='ar')
                            {{ $company->name_ar }}
                            @else
                            {{ $company->name_en }}
                            @endif
                        </strong>
                    </li>
                </ol>
            </nav>

        </div>
    </div>
</section>

<section id="content">
    <div class="content-wrap pt-0">
        <div class="container">

            @if ($sliders->count()>0)

            <div class="section m-0 p-0">
                <div class="container">
                    <div class="row backInUp animated">
                        <div class="col-12">
                            <div class="row align-items-stretch align-items-center">
                                <div id="oc-posts" class="owl-carousel posts-carousel carousel-widget posts-md"
                                    data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="1"
                                    data-items-lg="1">
                                    <div class="oc-item">
                                        <div class="entry">
                                            <div class="entry-image">
                                                <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                                    <div class="flexslider">
                                                        <div class="slider-wrap">
                                                            @foreach ($sliders as $mSlider)
                                                            <div class="slide">
                                                                <a href="{{ $mSlider->link}}">
                                                                    <img class="w-100"
                                                                        src="{{ url('storage/app/public/imgs/sliders/'.$mSlider->photo) }}"
                                                                        alt="{{ $mSlider->photo }}"></a>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row col-mb-80">

                <div class=" col-4 text-center" data-animate="bounceIn">
                    <i class="fal fa-eye i-plain i-xlarge mx-auto mb-0 text-primary"></i>
                    {{--
                    <i class="i-plain i-xlarge mx-auto mb-0 bi-person"></i>
                    --}}
                    <div class="counter counter-large" style="color: #3498db;"><span data-from="0"
                            data-to="{{$company->views}}" data-refresh-interval="50" data-speed="2000"></span>
                    </div>
                    <h5>{{ __('general.View') }}</h5>
                </div>


                <div class="col-4 text-center" data-animate="bounceIn" data-delay="200">
                    <i class="fad fa-tools i-plain i-xlarge mx-auto mb-0 text-danger"></i>
                    <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0"
                            data-to="{{ $productsCount }}" data-refresh-interval="50" data-speed="2500"></span></div>
                    <h5>{{ __('general.Products') }}</h5>
                </div>

                <div class=" col-4 text-center" data-animate="bounceIn" data-delay="400">
                    <i class="far fa-hospitals i-plain i-xlarge mx-auto mb-0 text-success"></i>

                    <div class="counter counter-large" style="color: #16a085;"><span data-from="0"
                            data-to="{{$totalProjects }}" data-refresh-interval="50" data-speed="3500"></span></div>
                    <h5>{{ __('general.Projects') }}</h5>
                </div>

                {{--
                <div class="col-lg-3 text-center" data-animate="bounceIn" data-delay="600">
                    <i class="i-plain i-xlarge mx-auto mb-0 bi-cup"></i>
                    <div class="counter counter-large" style="color: #9b59b6;"><span data-from="100" data-to="874"
                            data-refresh-interval="30" data-speed="2700"></span></div>
                    <h5>Cups of Coffee</h5>
                </div>
                --}}
            </div>

            <div class="row">

                <div class="col-lg-9">
                    <div class="heading-block border-bottom-0 mb-4">
                        <h3>{{ __('front.What We Do') }}</h3>
                        <ul class="iconlist iconlist-lg">
                            @foreach ($majors as $major)
                            <li class="text-primary bg-opacity-10 py-2 px-3 rounded">
                                <a
                                    href="{{ route('front.companies.major',['section'=>$company->section_id,'major'=>$major->id]) }}">
                                    <i class="bi-check-circle-fill text-primary"></i>
                                    @if (App::getLocale()=='ar')
                                    {{ $major->name_ar }}
                                    @else
                                    {{ $major->name_en }}
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                    <p>
                        @if (App::getLocale()=='ar')
                        {{$company->bio_ar}}
                        @else
                        {{$company->bio_en}}
                        @endif
                    </p>
                    <a href="#" class="button button-3d bg-primary text-white ms-0 mb-4 ">Learn More</a>
                    <div class="text-danger mb-3">
                        <strong>
                            @if (App::getLocale()=='ar')
                            {{ $company->cityCompany->name_ar }}
                            @else
                            {{ $company->cityCompany->name_en }}
                            @endif
                        </strong>
                    </div>
                    <div id="map" style="width:100%; height:500px;"></div>
                </div>


                <div class="col-lg-3" dir="ltr">
                    <div class="fslider flex-thumb-grid grid-6" data-pagi="false" data-arrows="false"
                        data-thumbs="true">
                        <div class="flexslider">
                            <div class="slider-wrap">
                                @if ($products->count()>0)
                                @foreach($products as $product)
                                <div class="slide"
                                    data-thumb="{{ url('storage/app/public/imgs/products/'.$product->main_pic) }}">
                                    <img src="{{ url('storage/app/public/imgs/products/'.$product->main_pic) }}"
                                        alt="Image" style="width: 80%!important" />
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content justify-content-start align-items-end">
                                            <div class="h4 fw-light bg-light text-dark px-3 py-2">
                                                <a href="{{ route('front.product.single',$product->id) }}">
                                                    @if (App::getLocale()=='ar')
                                                    {{ $product->name_ar }}
                                                    @else
                                                    {{ $product->name_en }}
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                                @if ($projects->count()>0)
                                @foreach($projects as $project)
                                <div class="slide"
                                    data-thumb="{{ url('storage/app/public/imgs/projects/'.$project->master_photo) }}">
                                    <img src="{{ url('storage/app/public/imgs/projects/'.$project->master_photo) }}"
                                        alt="Image" />
                                    <div class="bg-overlay">
                                        <div class="bg-overlay-content justify-content-start align-items-end">
                                            <div class="h4 fw-light bg-light text-dark px-3 py-2">
                                                <a href="{{ route('front.project.single',$project->id) }}">
                                                    @if (App::getLocale()=='ar')
                                                    {{ $project->name_ar }}
                                                    @else
                                                    {{ $project->name_en }}
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div id="top-bar" class="dark bg-facebook">
            <div class="row ">

                <div class="col-12 justify-content-center align-items-center d-flex">
                    {{-- Top Social --}}
                    <ul id="top-social">

                        @if ($communications->count()>0)
                        @foreach ($communications as $con)
                        @if ($con->con_type==1)
                        <li><a href="tel:{{ $con->chanel }}" class="h-bg-call">
                                <span class="ts-icon"><i class="fa-solid fa-phone"></i></span>
                                <span class="ts-text">{{ $con->chanel }}</span>
                            </a></li>

                        @elseif ($con->con_type==2)
                        <li><a href="tel:{{ $con->chanel }}" class="h-bg-call">
                                <span class="ts-icon"><i class="fas fa-fax"></i></span>
                                <span class="ts-text">{{ $con->chanel }}</span>
                            </a></li>

                        @elseif ($con->con_type==3)
                        <li><a href="https://wa.me/{{ $con->chanel }}" class="h-bg-call">
                                <span class="ts-icon"><i class="fab fa-whatsapp-square"></i></span>
                                <span class="ts-text">{{ $con->chanel }}</span>
                            </a></li>

                        @elseif ($con->con_type==4)
                        <li><a href="{{ $con->chanel }}" class="h-bg-facebook">
                                <span class="ts-icon">
                                    <i class="fa-brands fa-facebook-f"></i></span>
                                <span class="ts-text">Facebook</span>
                            </a></li>

                        @elseif ($con->con_type==5)
                        <li><a href="{{ $con->chanel }}" class="h-bg-facebook">
                                <span class="ts-icon">
                                    <i class="fab fa-twitter"></i>
                                </span>
                                <span class="ts-text">Twitter</span>
                            </a></li>

                        @elseif ($con->con_type==6)
                        <li><a href="{{ $con->chanel }}" class="h-bg-instagram">
                                <span class="ts-icon">
                                    <i class="fa-brands fa-instagram"></i>
                                </span>
                                <span class="ts-text">Instagram</span>
                            </a></li>

                        @elseif ($con->con_type==7)
                        <li><a href="{{ $con->chanel }}" class="h-bg-instagram">
                                <span class="ts-icon">
                                    <i class="fab fa-telegram"></i>
                                </span>
                                <span class="ts-text">Telegram</span>
                            </a></li>

                        @elseif ($con->con_type==8)
                        <li><a href="{{ $con->chanel }}" class="h-bg-instagram">
                                <span class="ts-icon">
                                    <i class="fab fa-tiktok"></i>
                                </span>
                                <span class="ts-text">TikTok</span>
                            </a></li>

                        @elseif ($con->con_type==9)
                        <li><a href="{{ $con->chanel }}" class="h-bg-instagram">
                                <span class="ts-icon">
                                    <i class="fab fa-snapchat-square"></i>
                                </span>
                                <span class="ts-text">SnapChat</span>
                            </a></li>

                        @elseif ($con->con_type==10)
                        <li><a href="{{ $con->chanel }}" class="h-bg-instagram">
                                <span class="ts-icon">
                                    <i class="fab fa-linkedin"></i>
                                </span>
                                <span class="ts-text">LinkedIn</span>
                            </a></li>

                        @elseif ($con->con_type==11)
                        <li><a href="mailto:{{ $con->chanel }}" class="h-bg-instagram">
                                <span class="ts-icon">
                                    <i class="bi-envelope-fill"></i>
                                </span>
                                <span class="ts-text">{{ $con->chanel }}</span>
                            </a></li>
                        @endif
                        @endforeach
                        @endif
                    </ul><!-- #top-social end -->

                </div>
            </div>
        </div>
    </div>

    @if ($oldProjects->count()>0)
    <div class="container">

        <h2 class="text-center ls-1 mb-5">{{ __('front.Our Old Projects') }}</h2>

        <div id="portfolio" class="portfolio row grid-container gutter-10" data-layout="fitRows">


            @foreach ($oldProjects as $o_project)
            <article class="portfolio-item col-12 col-sm-6 col-md-4 col-lg-3 pf-media pf-icons">
                <div class="card">
                    <div class="portfolio-image">
                        <img src="{{ url('storage/app/public/imgs/projects/'.$o_project->main_pic) }}"
                            alt="{{ $o_project->name_en }}">
                        <div class="bg-overlay">
                            <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                <a href="{{ route('front.companies.single.o_project.glary',$o_project->id) }}"
                                    class="overlay-trigger-icon bg-light text-dark" data-hover-animate="zoomIn"
                                    data-hover-animate-out="zoomOut" data-hover-speed="350"><i
                                        class="uil uil-ellipsis-h"></i></a>
                            </div>
                            <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="{{ route('front.companies.single.o_project.glary',$o_project->id) }}">
                                @if (App::getLocale()=='ar')
                                {{ $o_project->name_ar }}
                                @else
                                {{ $o_project->name_en }}
                                @endif
                            </a></h3>
                    </div>
                </div>
            </article>
            @endforeach

        </div>

    </div>
    @endif


    @if ($company->register_by == 1 && $company->status == 1)
    <a href="#enqfrm" class="button button-3d border-bottom-0 mt-4 button-full text-center mb-5 fw-light font-primary"
        style="font-size: 26px; background-color: #3c04be;">
        <div class="container">
            {{ __('front.Contact us and learn about our different services') }} <strong>Enquire Here</strong> <i
                class="uil uil-angle-right-b" style="top:3px;"></i>
        </div>
    </a>
    @else
    <a href="#modal-login" data-lightbox="inline"
        class="button button-3d border-bottom-0 mt-4 button-full text-center mb-5 fw-light font-primary"
        style="font-size: 26px; background-color: #f10303;">
        <div class="container">
            {{ __('front.This Company is Enrolled By System If you Want Use The System Features') }}
            <strong>{{__('front.Click To Register Or Contact Us')}} </strong>

        </div>
    </a>
    @endif

    @if ($company->register_by == 1 && $company->status == 1 )
    <div class="section bg-transparent mt-0 p-0 footer-stick">
        <div class="container">

            <div class="row">
                <div id="enqfrm" class="col-lg-7">
                    <form class="row" action="{{ route('front.order.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input hidden name="user_id" value="{{ $company->user_id }}" />
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
                                    <input type="text" name="phone" id="jobs-application-phone"
                                        class="form-control required" value="{{ old('phone') }}"
                                        placeholder="05xxxxxxxx" />
                                    @error('phone')
                                    <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                @if ($products->count()>0)
                                <div class="col-md-6 form-group">
                                    <label>Type:</label>
                                    <select class="form-select required" name="product" id="jobs-application-type">
                                        <option disabled selected>-- {{ __('general.Choose') }} --</option>

                                        @foreach ($products as $product)
                                        <option value="{{ $product->id }}">
                                            @if (App::getLocale()=='ar')
                                            {{ $product->name_ar }}
                                            @else
                                            {{ $product->name_en }}
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif

                                <div class="w-100"></div>
                            </div>


                            <div class="form-group">
                                <label>Describe Yourself:</label>
                                <textarea name="details" id="jobs-application-message" class="form-control required"
                                    cols="30" rows="10"></textarea>
                                @error('details')
                                <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 d-none">
                            <input type="text" id="jobs-application-botcheck" name="order" value="">
                        </div>
                        <div class="col-12">
                            <button type="submit" name="jobs-application-submit" class="btn btn-secondary">Send
                                Message</button>
                        </div>

                        <input type="hidden" name="prefix" value="jobs-application-">
                    </form>
                </div>

                <div class="col-lg-5 mt-4">
                    <div class="heading-block border-bottom-0">
                        <h2>{{ __('front.Send your requests and inquiries') }}</h2>
                    </div>

                    <ul class="iconlist iconlist-large iconlist-color">
                        <li><i class="fa-solid fa-check"></i> {{ __('front.We welcome your inquiries at any time') }}
                        </li>
                        <li><i class="fa-solid fa-check"></i>
                            {{ __('front.Trust us, we will provide you with our services with the highest quality and
                            lowest cost') }}
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    @endif

    </div>
</section>
@endsection
{{--
======================
=PAGE SCRIPTS
======================
--}}
@section('page-scripts')
<script>
    $("#pac-input").focusin(function() {
            $(this).val('');
        });
        $('#latitude').val('');
        $('#longitude').val('');

      // This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:

//<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtYYRiax8bEoHuW-z6xTtpecs1LRa2WlM&libraries=AE">
  function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat:25.197197 , lng: 55.27437639 },
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                    lat: {{ $company->lat }},
                    lng: {{ $company->lng }}
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: '{{ $company->address }}'
                    });
                    markers.push(marker);
                    marker.addListener('click', function() {
                        geocodeLatLng(geocoder, map, infoWindow,marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {

                handleLocationError(false, infoWindow, map.getCenter());
            }
            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log( results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });
            function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());
                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);
                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
            }
            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function splitLatLng(latLng){
            var newString = latLng.substring(0, latLng.length-1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng  = trainindIdArray[1];
            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtYYRiax8bEoHuW-z6xTtpecs1LRa2WlM&libraries=places&callback=initAutocomplete&language={{ App::getLocale() }}&region=AE async defer">
</script>
@endsection
