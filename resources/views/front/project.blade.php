@extends('layouts.front')

{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
@if (App::getLocale()=='ar')
{{ $project->name_ar }}
@else
{{ $project->name_en }}
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

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('front') }}"><strong
                style="font-size: 1.5em; color: blue;">{{ __('front.Home') }}</strong></a></li>
          <li class="breadcrumb-item"><a href="{{ route('front.project')}}"><strong
                style="font-size: 1.5em; color: blue;">{{ __('general.Projects') }}</strong></a></li>
          <li class="breadcrumb-item"><a href="{{ route('front.project.category',$project->project_category_id) }}">
              <strong style="font-size: 1.5em; color: blue;">
                @if (App::getLocale()=='ar')
                {{ $project->projectCategory_project->name_ar }}
                @else
                {{ $project->projectCategory_project->name_en}}
                @endif
              </strong>
            </a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <strong style="font-size: 1.5em; color: blue;">
              @if (App::getLocale()=='ar')
              {{ $project->name_ar }}
              @else
              {{ $project->name_en }}
              @endif
            </strong>
          </li>
        </ol>
      </nav>

    </div>
  </div>
</section>

<section id="content">
  <div class="content-wrap">
    <div class="container">

      <div class="row gx-5 col-mb-80">

        <main class="postcontent col-lg-9">

          <div class="single-post mb-0">

            <div class="entry">

              <div class="entry-title">
                <h2>
                  @if (App::getLocale()=='ar')
                  {{ $project->name_ar }}
                  @else
                  {{ $project->name_en }}
                  @endif
                </h2>
              </div>


              <div class="entry-meta">
                <ul>
                  <li><i class="uil uil-schedule"></i> {{ date('d m,Y',strtotime($project->created_at)) }}</li>
                  <li><a href="#"><i class="uil uil-user"></i> {{ __('general.System') }}</a></li>
                  <li><i class="fad fa-eye"></i> <a href="#">{{ __('general.View') }}</a></li>
                </ul>
              </div>{{-- .entry-meta end --}}


              <div class="entry-image mx-5">
                <a href="#"><img src="{{ url('storage/app/public/imgs/projects/'.$project->master_photo) }}"
                    alt="{{ $project->name_en }}" class="w-75"></a>
              </div>

              <div class="entry-content mt-0 ">
                <h4 class="fs-4 fw-medium">{{ __('front.About') }}</h4>
                <strong>
                  @if (App::getLocale()=='ar')
                  {!! $project->description_ar !!}
                  @else
                  {!! $project->description_en !!}
                  @endif
                </strong>
                <h4 class="fs-4 fw-medium">{{ __('front.Location') }}</h4>
                <h6 class="fs-4 fw-medium text-danger">
                  @if (App::getLocale()=='ar')
                  {{ $project->cityProject->name_ar }}
                  @else
                  {{ $project->cityProject->name_en}}
                  @endif
                </h6>

                <div class="related-posts row posts-md g-4">
                  <div class="entry col-12">
                    <div class="grid-inner row gx-4">
                      <div id="map" style="width:100%; height:500px;"></div>
                    </div>
                  </div>
                </div>

                <h4 class="fs-4 fw-medium">Recommended for you</h4>

                <div class="related-posts row posts-md g-4">
                  @if ($recommended->count()>0)
                  @foreach ($recommended as $recommend)
                  <div class="entry col-12 col-md-6">
                    <div class="grid-inner row gx-4">
                      <div class="col-auto">
                        <div class="entry-image">
                          <a href="{{ route('front.project.single',$recommend->id) }}"><img
                              src="{{ url('storage/app/public/imgs/projects/'.$recommend->master_photo) }}"
                              alt="{{ $recommend->name_en }}" class="square square-lg"
                              style="object-fit: cover; object-position: center;"></a>
                        </div>
                      </div>
                      <div class="col">
                        <div class="entry-meta font-secondary fst-italic mt-0">
                          <ul>
                            <li>
                              @if (App::getLocale()=='ar')
                              {{ $recommend->projectCategory_project->name_ar }}
                              @else
                              {{ $recommend->projectCategory_project->name_en }}
                              @endif
                            </li>
                          </ul>
                        </div>
                        <div class="entry-title title-sm text-transform-none">
                          <h3><a href="{{ route('front.project.single',$recommend->id) }}">
                              @if (App::getLocale()=='ar')
                              {{ $recommend->name_ar }}
                              @else
                              {{ $recommend->name_en }}
                              @endif
                            </a></h3>
                        </div>
                        <div class="entry-meta font-secondary mt-2">
                          <ul>
                            <li>Since {{ \Carbon\Carbon::parse($recommend->created_at)->diffForHumans() }}</li>

                          </ul>
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



        </main>


        <aside class="sidebar col-lg-3">
          <div class="sidebar-widgets-wrap">
            <div class="widget">
              <div class="skill-progress mb-4" data-percent="{{ $project->progress }}" data-speed="2000"
                style="--cnvs-progress-height: 36px; --cnvs-progress-rounded: 50rem;">
                <div class="skill-progress-bar">
                  <div class="skill-progress-percent gradient-blue-purple"></div>
                  <div class="d-flex position-absolute w-100 h-100 px-3 dark
              											justify-content-between align-items-center">
                    <h5 class="mb-0"></h5>
                    <div class="text-dark">
                      <small class="fw-semibold">
                        <div class="counter counter-inherit
              														counter-instant"><span data-from="0" data-to="{{ $project->progress }}"
                            data-refresh-interval="30" data-speed="2000">0</span>%
                        </div>
                      </small>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="widget">

              <div class="posts-sm row col-mb-30" id="popular-post-list-sidebar">
                @if ($companies)
                @foreach ($companies as $company)
                <div class="entry col-12">
                  <div class="feature-box hover-effect shadow-sm fbox-center fbox-bg fbox-light fbox-lg fbox-effect">
                    <div class="fbox-icon">
                      <i><img src="{{ url('storage/app/public/imgs/users/'.$company->userCompany->profile_pic) }}"
                          class="border-0 bg-transparent shadow-sm" style="z-index: 2;" alt="Image"></i>
                    </div>
                    <div class="fbox-content">
                      <h3 class="mb-4 text-transform-none ls-0"><a
                          href="{{ route('front.companies.single',$company->id) }}"
                          style="color:blue!important; font-size: large;">
                          @if (App::getLocale()=='ar')
                          {{ Str::limit($company->name_ar,10) }}
                          @else
                          {{ Str::limit($company->name_en,10) }}
                          @endif
                        </a>
                        <br />
                        <small class="subtitle text-transform-none text-danger">
                          @if (App::getLocale()=='ar')
                          {{ $company->cityCompany->name_ar }}
                          @else
                          {{ $company->cityCompany->name_en}}
                          @endif
                        </small>
                      </h3>

                    </div>
                  </div>
                </div>
                @endforeach
                @endif
              </div>

            </div>

          </div>
        </aside>
      </div>

      <div class="row shop-categories ">

        @if ($secondRowAd->count()>0)
        <div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-loop="true"
          data-autoplay="5000" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="1" data-items-md="2"
          data-items-lg="3" data-items-xl="3">
          @foreach ($secondRowAd as $item)
          <div class="oc-item team card shadow-sm border-1 h-shadow h-translatey-sm all-ts rounded-4 overflow-hidden">
            <div class="product">
              <div class="product-image">
                <a href="{{ $item->link }}"><img src="{{ url("storage/app/public/imgs/ads/".$item->photo) }}"
                    alt="{{ $item->photo }}"></a>
                <div class="bg-overlay">
                  <div class="bg-overlay-bg bg-transparent"></div>
                </div>
              </div>

            </div>
          </div>
          @endforeach
        </div>
        @endif
      </div>

    </div>
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
                    lat: {{ $project->lat }},
                    lng: {{ $project->lng }}
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: '{{ $project->address }}'
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