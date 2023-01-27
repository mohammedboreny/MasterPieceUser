@extends('layout.index')
@section('content')
    <script type="text/javascript" async>
        let swith = true;
        let idCatch = 2;

        function submitConfirm() {
            if (idCatch != null) {
                Swal.fire(
                    'Good job!',
                    'You clicked the button!',
                    'success'
                )

            } else {
                Swal.fire(
                    'Sorry!',
                    'please enter your park',
                    'error'
                )
            }

        }
        var d = new Date();
var n = d.toLocaleTimeString();
        let a=document.getElementById("ParkDateTime");
        console.log(a);
        a.min=new Date();
        function setId(id) {
            idCatch = id;
            console.log(idCatch);
            inputHidden = document.getElementById('idCatch');
            inputHidden.value = idCatch;
        };

        function getId() {
            return idCatch;
        }

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
                    <form id="orderForm" method="POST" action="{{ route('order.SetOrder') }}">
                        @csrf
                        <!-- Phone Input -->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="phone" value="{{ $data['phone_number'] }}" id="phone"
                                type="text" placeholder="Phone" />
                            <label for="phone">Phone</label>
                            <div class="invalid-feedback">phone is required.</div>
                        </div>
                        <!-- No.Of Hours Input -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="NumberOfHours" type="number" name="NoOfHours"
                                placeholder="Email Address" data-sb-validations="required,email" />
                            <label for="emailAddress">Number of hours</label>
                        </div>




                        <!-- Message Input -->

                        <div class="form-floating mb-3">
                            <input class="form-control" min="<?php echo date('Y-m-d'); ?>" name="date" 
                                type="date" placeholder="pickDate" data-sb-validations="required">
                            <label for="message">Parking Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control"  name="date" id="ParkDateTime"
                                type="time" placeholder="pickDate" data-sb-validations="required">
                            <label for="message">Parking Date</label>
                        </div>
                        
                        <input type="hidden" id="idCatch" name="ParkID" value=`${idCatch}`>
                        {{-- <div class="col text-center mb-5">
                            <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add your payment details
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" id="submitBtn">

                                            <div class="form-floating mb-3 ">
                                                <div
                                                    class="d-flex align-items-center flex-wrap justify-content-between w-100 border rounded">

                                                    <div class="form-floating w-100 m-1 mb-3">
                                                        <input class="form-control" name="email" id="email"
                                                            type="email" placeholder="email"
                                                            data-sb-validations="required">
                                                        <label for="message">Email</label>
                                                    </div>
                                                    <div class="form-floating w-100 m-1">
                                                        <input type="text" name="cardNo" id="cardNo"
                                                            class="form-control " placeholder="Card number">
                                                        <label for="">Card Number</label>
                                                    </div>
                                                    <div class="d-flex wrap w-100">


                                                        <input type="date" name="expirationDate"
                                                            class="form-control m-1 mt-2" placeholder="MM/YY">

                                                        <input type="password" name="securityCode" maxlength=3
                                                            class="form-control m-1 mt-2" placeholder="CVV">
                                                    </div>
                                                    <br>
                                                    <div class="my-3 form-floating w-100 d-flex">

                                                        <input type="text" placeholder="Card " name=""
                                                            class="form-control m-1" id="">
                                                        <label class=" mb-2">Cardholder name</label>

                                                    </div>
                                                    <br>
                                                    <div class="my-1 form-floating w-100 d-flex">
                                                        <input class="form-control m-1" id="billingAddress" placeholder="dfsdas" name="billingAddress" type="text">
                                                        <label for="" class=" mb-2">Billing address</label>
                                                    </div>
                                                </div>

                                            </div>

                                        </form> --}}

                                    {{-- </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Submit button -->
                        <div class="mt-6 text-center">
                            <button style="background-color: #ff7241" class="btn text-light btn-light btn-lg " id="submitButton" type="submit">Check Out</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap">
        </script>
        <script type="text/javascript">
            function initMap(lat, lng) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        initMap(position.coords.latitude, position.coords.longitude)
                    },
                    function errorCallback(error) {
                        console.log(error)
                    }
                );

                var arr = <?php echo json_encode($data['location']); ?>;

                console.log(arr);
                var latitude = arr.lat;
                var longitude = arr.long;
                console.log(longitude, latitude);
                let myLatLng = {

                    lat: latitude,
                    lng: longitude
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
        </script>
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
