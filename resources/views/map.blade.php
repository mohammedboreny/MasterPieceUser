@extends('layout.index')
@section('content')
    <script type="text/javascript">
        let swith = true;
        let idCatch = null;

        function submitConfirm() {
            if (idCatch != null) {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )

            }
            else{
                Swal.fire(
                    'Sorry!',
                    'please enter your park',
                    'error'
                )
            }

        }

        function setId(id) {
            idCatch = id;
            console.log(idCatch);
            inputHidden=document.getElementById('idCatch');
            inputHidden.value=idCatch;
        };

        function handlePark(id) {
            setId(id);
            return true;
        }
    </script>

    <body>
        <h1 class="text-center">Booking</h1>
        <div class="container justify-content-center mb-4 mt-4">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div id="map"></div>
                </div>

                <div class="col-lg-6 col-sm-12 pt-3">
                    <form id="orderForm" method="POST" action="{{route('order.SetOrder')}}" >
                        @csrf
                        <!-- Phone Input -->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="phone" id="phone" type="text" placeholder="Phone"
                                data-sb-validations="required" />
                            <label for="phone">Phone</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">phone is required.</div>
                        </div>
                        <!-- No.Of Hours Input -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="NumberOfHours" type="number" name="NoOfHours" placeholder="Email Address"
                                data-sb-validations="required,email" />
                            <label for="emailAddress">Number of hours</label>
                        </div>
                        <label for="dropdownMenuClickableOutside"> choose your parking spot:</label>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-light" id='Modelbutton' data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            pick place
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Choose Parking</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    {{-- <th scope="col">#</th> --}}
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Street</th>
                                                    <th scope="col">City</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($data as $x)
                                                    <tr class="table-light">
                                                        {{-- <th scope="row"></th> --}}
                                                        <td class="table-light">{{ $x['name'] }}</td>
                                                        <td class="table-light">{{ $x['street'] }}</td>
                                                        <td class="table-light">{{ $x['city'] }}</td>
                                                        <td class="table-light">
                                                        <td>
                                                            <div class="btn btn-primary " id="myBtn{{ $x['id'] }}"
                                                                onclick="handlePark({{ $x['id'] }})"> Pick </div>
                                                        </td>
                                                        {{-- <form action="{{ route('location.get', ['id'=>$x['id']]) }}" method="POST">
                            @csrf
                            <button class="btn btn-secondary" type="submit">pick</button>
                        </form></td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" onclick="submitConfirm()"
                                            class="btn btn-primary">select</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message Input -->

                        <div class="form-floating mb-3">
                            <input class="form-control" name="date" id="ParkDate" type="date" placeholder="pickDate"
                                data-sb-validations="required">
                            <label for="message">Parking Date</label>
                        </div>
                        <input type="hidden"  id="idCatch" name="ParkID" value=`${idCatch}`>
                        <!-- Submit button -->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg " id="submitButton" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap">
        </script>
        <script>
            function initMap(lat, lng) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        initMap(position.coords.latitude, position.coords.longitude)
                    },
                    function errorCallback(error) {
                        console.log(error)
                    }
                );

                var myLatLng = {
                   
                    lat:31.952645548202057,lng:35.91126743221995
                };

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: myLatLng
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                });
            }
        </script> --}}
        {{-- // let map, activeInfoWindow, markers = [];
        /* ----------------------------- Initialize Map ----------------------------- */
        // function initMap() {
        // map = new google.maps.Map(document.getElementById("map"), {
        // center: {
        // lat: 28.626137,
        // lng: 79.821603,
        // },
        // zoom: 15
        // });
        // map.addListener("click", function(event) {
        // mapClicked(event);
        // });
        // initMarkers();
        // }
        /* --------------------------- Initialize Markers --------------------------- */
        // function initMarkers() {
        // const initialMarkers = <?php echo json_encode($initialMarkers); ?>;
        // for (let index = 0; index < initialMarkers.length; index++) { // const markerData=initialMarkers[index]; // const
            marker=new google.maps.Marker({ // position: markerData.position, // label: markerData.label, // draggable:
            markerData.draggable, // map // }); // markers.push(marker); // const infowindow=new google.maps.InfoWindow({ //
            content: `<b>${markerData.position.lat}, ${markerData.position.lng}</b>`,
            // });
            // marker.addListener("click", (event) => {
            // if (activeInfoWindow) {
            // activeInfoWindow.close();
            // }
            // infowindow.open({
            // anchor: marker,
            // shouldFocus: false,
            // map
            // });
            // activeInfoWindow = infowindow;
            // markerClicked(marker, index);
            // });
            // marker.addListener("dragend", (event) => {
            // markerDragEnd(event, index);
            // });
            // }
            // }
            // /* ------------------------- Handle Map Click Event ------------------------- */
            // function mapClicked(event) {
            // console.log(map);
            // console.log(event.latLng.lat(), event.latLng.lng());
            // }
            // /* ------------------------ Handle Marker Click Event ----------------------- */
            // function markerClicked(marker, index) {
            // console.log(map);
            // console.log(marker.position.lat());
            // console.log(marker.position.lng());
            // }
            // /* ----------------------- Handle Marker DragEnd Event ---------------------- */
            {{-- // function markerDragEnd(event, index) {
            // console.log(map);
            // console.log(event.latLng.lat());
            // console.log(event.latLng.lng());
            //   --}}
    @endsection
