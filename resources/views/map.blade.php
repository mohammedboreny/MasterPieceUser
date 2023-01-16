@extends('layout.index')
@section('content')

    <body>
        <h1 class="text-center">Laravel Google Maps</h1>
        <div class="container justify-content-around mb-4 mt-4">
            <div class="row ">
                <div class="col-4 col-sm-12">
                    <div class="map_container">
                        <div class="map">
                            <div id="map"></div>
                        </div>
                    </div>
                    </div>
                    <div class="col-4 col-sm-12 pt-3">
                        <form id="contactForm" >

                            <!-- Name Input -->
                            <div class="form-floating mb-3">
                              <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
                              <label for="name">Name</label>
                              <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div>
                            </div>
                
                            <!-- Email Input -->
                            <div class="form-floating mb-3">
                              <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                              <label for="emailAddress">Email Address</label>
                            </div>
                
                            <!-- Message Input -->
                            <div class="form-floating mb-3">
                              <input class="form-control" id="message" type="text" placeholder="Message"  data-sb-validations="required">
                              <label for="message">Message</label>
                            </div>
                
                
                        
                            <!-- Submit button -->
                            <div class="d-grid">
                              <button  class="btn btn-primary btn-lg " id="submitButton" type="submit">Submit</button>
                            </div>
                          </form>


                    </div>
                </div>
            </div>
        </div>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=+{{env('GOOGLE_MAP_KEY')}}+&callback=initMap"></script>
        <script>
            let map, activeInfoWindow, markers = [];
            /* ----------------------------- Initialize Map ----------------------------- */
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: 28.626137,
                        lng: 79.821603,
                    },
                    zoom: 15
                });
                map.addListener("click", function(event) {
                    mapClicked(event);
                });
                initMarkers();
            }
            /* --------------------------- Initialize Markers --------------------------- */
            function initMarkers() {
                const initialMarkers = <?php echo json_encode($initialMarkers); ?>;
                for (let index = 0; index < initialMarkers.length; index++) {
                    const markerData = initialMarkers[index];
                    const marker = new google.maps.Marker({
                        position: markerData.position,
                        label: markerData.label,
                        draggable: markerData.draggable,
                        map
                    });
                    markers.push(marker);
                    const infowindow = new google.maps.InfoWindow({
                        content: `<b>${markerData.position.lat}, ${markerData.position.lng}</b>`,
                    });
                    marker.addListener("click", (event) => {
                        if (activeInfoWindow) {
                            activeInfoWindow.close();
                        }
                        infowindow.open({
                            anchor: marker,
                            shouldFocus: false,
                            map
                        });
                        activeInfoWindow = infowindow;
                        markerClicked(marker, index);
                    });
                    marker.addListener("dragend", (event) => {
                        markerDragEnd(event, index);
                    });
                }
            }
            /* ------------------------- Handle Map Click Event ------------------------- */
            function mapClicked(event) {
                console.log(map);
                console.log(event.latLng.lat(), event.latLng.lng());
            }
            /* ------------------------ Handle Marker Click Event ----------------------- */
            function markerClicked(marker, index) {
                console.log(map);
                console.log(marker.position.lat());
                console.log(marker.position.lng());
            }
            /* ----------------------- Handle Marker DragEnd Event ---------------------- */
            function markerDragEnd(event, index) {
                console.log(map);
                console.log(event.latLng.lat());
                console.log(event.latLng.lng());
            }
        </script>
    @endsection
