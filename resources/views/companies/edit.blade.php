@extends('layouts.admin')

{{--
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('company.Edit Company') }}
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
              <h3 class="nk-block-title page-title">{{ __('company.Company') }}/ <strong class="text-primary small">
                  @if (App::getLocale()=='ar')
                  {{ $company->name_ar }}
                  @else
                  {{ $company->name_en }}
                  @endif
                </strong>
              </h3>
            </div>
            <div class="nk-block-head-content">
              <a href="{{ route('company.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                <em class="icon ni ni-arrow-left"></em>
                <span>{{ __('general.Back') }}</span>
              </a>

              <a href="{{ route('company.index') }}"
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
                <span class="preview-title-lg overline-title">{{ __('general.Main Information') }}</span>
                <form action="{{route('company.update')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="form-control-wrap">
                          <input hidden id="company_id" name="company_id" value="{{ $company->id }}" />

                          <input hidden id="user_id" name="user_id" value="{{ $company->user_id }}" />
                          @error('company_id')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-label" for="name_ar">{{ __('company.Company Arabic Name') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="name_ar" name="name_ar"
                            placeholder="{{ __('general.Arabic Name') }}" value="{{ old('name_ar',$company->name_ar) }}"
                            autocomplete autofocus>
                          @error('name_ar')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-label" for="name_en">{{ __('company.Company English Name') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="name_en" name="name_en"
                            placeholder="{{ __('general.English Name') }}"
                            value="{{ old('name_en',$company->name_en) }}" autocomplete>
                          @error('name_en')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="mail">{{ __('company.E-mail') }}</label>
                        <div class="form-control-wrap">
                          <input type="email" class="form-control form-control-sm" id="mail" name="mail"
                            placeholder="xxxxx@xxxx.com" value="{{ old('mail',$user->email) }}" />
                          @error('mail')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="customFileLabel">{{ __('company.Logo') }}</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sm" id="customFile" name="logo">
                            @error('logo')
                            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                            @enderror
                            <label class="custom-file-label" for="customFile">{{ __('general.Choose file') }}</label>
                          </div>
                        </div>
                      </div>
                      <input hidden name="oldLogo" value="{{ $user->profile_pic }}" />
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <div class="row gy-4">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="section">{{ __('section.Section') }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control form-control-sm" id="section" name="section">
                            @foreach ($sections as $section)
                            @if ($section->id == $company->section_id)
                            <option value="{{ $section->id }}" selected>
                              @if (App::getLocale()=='ar')
                              {{ $section->name_ar }}
                              @else
                              {{ $section->name_en }}
                              @endif
                            </option>
                            @else
                            <option value="{{ $section->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $section->name_ar }}
                              @else
                              {{ $section->name_en }}
                              @endif
                            </option>
                            @endif
                            @endforeach
                          </select>
                          @error('section')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="package">{{ __('package.Package') }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control form-control-sm" id="package" name="package">
                            @foreach ($packages as $package)
                            @if ($package->id == $company->package_id)
                            <option value="{{ $package->id }}" selected>
                              @if (App::getLocale()=='ar')
                              {{ $package->name_ar }}
                              @else
                              {{ $package->name_en }}
                              @endif
                            </option>
                            @else
                            <option value="{{ $package->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $package->name_ar }}
                              @else
                              {{ $package->name_en }}
                              @endif
                            </option>
                            @endif
                            @endforeach
                          </select>
                          @error('package')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="form-label" for="license">{{ __('company.License') }}</label>
                        <div class="form-control-wrap">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input sm" id="license" name="license">
                            @error('license')
                            <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                            @enderror
                            <label class="custom-file-label" for="license">{{ __('general.Choose file') }}</label>
                          </div>
                        </div>
                      </div>
                      <input hidden name="old_license" value="{{ $company->license }}" />
                    </div>

                  </div>

                  <hr class="preview-hr">

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="responsible">{{ __('company.Responsible Person') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="responsible" name="responsible"
                            placeholder="{{ __('company.Responsible Person Name Here') }}"
                            value="{{ old('responsible',$company->responsible_name) }}" autocomplete />
                          @error('responsible')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="position">{{ __('company.Position') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="position" name="position"
                            placeholder="{{ __('company.Position Here') }}"
                            value="{{ old('position', $company->position) }}" autocomplete />
                          @error('position')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="preview-hr">

                  <div class="row gy-4">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label class="form-label" for="city">{{ __('city.City') }}</label>
                        <div class="form-control-wrap">
                          <select class="form-control form-control-sm" id="city" name="city">
                            @foreach ($cities as $city)
                            @if ($city->id == $company->city_id)
                            <option value="{{ $city->id }}" selected>
                              @if (App::getLocale()=='ar')
                              {{ $city->name_ar }}
                              @else
                              {{ $city->name_en }}
                              @endif
                            </option>
                            @else
                            <option value="{{ $city->id }}">
                              @if (App::getLocale()=='ar')
                              {{ $city->name_ar }}
                              @else
                              {{ $city->name_en }}
                              @endif
                            </option>
                            @endif
                            @endforeach
                          </select>
                          @error('city')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row gy-4">
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label" for="pac-input">{{ __('company.Address') }}</label>
                        <div class="form-control-wrap">
                          <input type="text" class="form-control form-control-sm" id="pac-input" name="address"
                            value="{{ old('address',$company->address) }}" autocomplete />
                          @error('address')
                          <span class="bg-danger text-white" role="alert">{{ $message }}</span>
                          @enderror
                        </div>
                        <input hidden id="latitude" name="lat" value="{{ old('lat',$company->lat) }}" />
                        <input hidden id="longitude" name="lng" value="{{ old('lng',$company->lng) }}" />

                      </div>
                    </div>

                  </div>

                  <div class="row gy-4">
                    <div id="map" style="width:100%; height:500px;"></div>
                  </div>


                  <hr class="preview-hr">

                  <div class="form-group mt-2">
                    <div class="form-control-wrap">
                      <input type="submit" class="btn btn-primary" value="{{ __('general.Update') }}" />
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
          {{-- .card --}}
        </div>
        {{-- .nk-block --}}
      </div>
    </div>
  </div>
</div>
@endsection
{{--
  =====================
  =PAGE CONTENT
  =====================
  --}}
@section('scripts')
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
                      @if ($company->lat && $company->lng)
                          lat: {{ $company->lat }},
                          lng: {{ $company->lng }}
                      @else
                          lat: 25.197197,
                          lng: 55.27437639
                      @endif
                    
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: '{{$company->address}}'
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
                // Browser doesn't support Geolocation
                console.log('dsdsdsdsddsd');
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
/*
<script>
  (g => {
    var h, a, k, p = "The Google Maps JavaScript API",
      c = "google",
      l = "importLibrary",
      q = "__ib__",
      m = document,
      b = window;
    b = b[c] || (b[c] = {});
    var d = b.maps || (b.maps = {}),
      r = new Set,
      e = new URLSearchParams,
      u = () => h || (h = new Promise(async (f, n) => {
        await (a = m.createElement("script"));
        e.set("libraries", [...r] + "");
        for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
        e.set("callback", c + ".maps." + q);
        a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
        d[q] = f;
        a.onerror = () => h = n(Error(p + " could not load."));
        a.nonce = m.querySelector("script[nonce]")?.nonce || "";
        m.head.append(a)
      }));
    d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f,
      ...n))
  })({
    key: "AIzaSyAFVd_HK32kVmdN16sUwpOFpsVi_d9bvcs",
    // Add other bootstrap parameters as needed, using camel case.
    // Use the 'v' parameter to indicate the version to load (alpha, beta, weekly, etc.)
  });
</script>
*/
@endsection