@extends('layout.index')
@section('content')
    <style>
        .card.map-card .living-coral {
            background-color: #f43f00;
        }

        .card.map-card .living-coral-text {
            color: #f43f00;
        }

        .card.map-card .table th {
            width: 2rem;
        }

        .card.map-card .pt-3-5 {
            padding-top: 1.25rem;
        }

        .card.map-card .card-body {
            position: absolute;
            width: 100%;
            height: 80%;
            top: 20%;
            overflow: hidden;
            background-color: transparent;
            -webkit-transition: all 1s;
            -o-transition: all 1s;
            transition: all 1s;
            -webkit-border-radius: 0 !important;
            border-radius: 0 !important;
        }

        .card.map-card .card-body.closed {
            top: 100%;
            height: 7.5rem;
            margin-top: -7.5rem;
        }

        .card.map-card .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .card.map-card .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }

        .card.map-card .button .btn-floating {
            margin-top: -1.5rem;
        }
    </style>

<h2 style="text-underline-position: below ; text-decoration-line: underline ; text-decoration-color: #ff7241" class="text-center mt-3">Pick Your Parking Spot</h2>
    <div class="container pt-3">
        
        @if (\Session::has('status'))
            <div style="background-color: #ff7241" class="alert text-light text-center mt-3"> {!! Session::get('status') !!}</div>
        @endif
        <div class="row w-100 justify-content-center align-content-center flex-column">
            <div class="col-md-12">
                <form action="{{ url('/locations/search') }}" method="GET">
                    @csrf
                    <div class="form-floating d-flex justify-center gap-3">
                        <input class="form-control w-25" style="border-color: #ff7241" type="text" placeholder="search"
                            name="search" required />
                        <label for="search"><i class="bi bi-search"></i></label>
                        <button style="background-color: #ff7241" class=" btn text-light  d-inline" type="submit">Search</button>
                    </div>

                </form>
            </div>
          </div>
        </div>


    <div class="container w-100 justify-content-between">
        @if (session()->missing('dataSearch'))
            <div id="content" class="row w-100 gap-5">
            </div>
        @else
            <div class="row w-100 gap-5">
                @foreach (session()->get('dataSearch') as $item)
                    <div class="col-lg-3 pb-4 pt-4">
                        <div class="card map-card">
                            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                                <iframe
                                    src="https://maps.google.com/maps?q={{ $item['street'] }}&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <div class="card-body closed px-0">
                                <div style="background-color: #ff7241" class="button px-2 mt-3">
                                    <a style="background-color: #ff7241" href="{{ url('/order', $item['id']) }}"
                                        class="btn btn-floating id='btn-sub'  btn-lg living-coral text-white float-end"
                                        style="margin-right: .75rem;">book</a>
                                </div>
                                <input type="hidden" name="" id='btn-value' value='${item.id}'>
                                <div class="bg-white px-4 pb-4 pt-3-5">
                                    <h5 id="name" class="card-title h5 living-coral-text"> {{ $item['name'] }}</h5>
                                    <div class="d-flex justify-content-between living-coral-text">
                                        <h6 id="Address" class="card-subtitle font-weight-light"> {{ $item['street'] }}
                                        </h6>
                                        <h6 id="" class="font-small font-weight-light mt-n1"> {{ $item['city'] }}
                                        </h6>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>



    <script async>
        let arr = {!! json_encode($data->toArray()) !!};
        console.log(arr);




        const showInHtml = arr.map((item, index) => {
            console.log(arr[index].id);
            return `
        <div class="col-lg-3 pb-4 pt-4">
        <div class="card map-card">
          <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
            <iframe src="https://maps.google.com/maps?q=${item.street}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
              style="border:0" allowfullscreen></iframe>
          </div>
          <div class="card-body closed px-0">
            <div style="background-color: #ff7241" class="button px-2 mt-3">
              <a style="background-color: #ff7241" href="{{ url('/order/${item.id}') }}" class="btn btn-floating id='btn-sub'  btn-lg living-coral text-white float-end" style="margin-right: .75rem;">book</a>
            </div>
            <input type="hidden" name="" id='btn-value' value='${item.id}'>
            <div class="bg-white px-4 pb-4 pt-3-5">
              <h5 id="name" class="card-title h5 living-coral-text">${item.name}</h5>
              <div class="d-flex justify-content-between living-coral-text">
                <h6 id="Address" class="card-subtitle font-weight-light">${item.street}</h6>
                <h6 id="" class="font-small font-weight-light mt-n1"> ${item.city}</h6>
              </div>
              <hr>
              <div class="d-flex justify-content-between pt-2 mt-1 text-center text-uppercase living-coral-text">
                <div>
                  <i class="fas fa-phone fa-lg mb-3"></i>
                  <p class="mb-0">Call</p>
                </div>
                <div>
                  <i class="fas fa-cat fa-lg mb-3"></i>
                  <p class="mb-0">Love</p>
                </div>
                <div>
                  <i class="far fa-grin-beam-sweat fa-lg mb-3"></i>
                  <p class="mb-0">Smile</p>
                </div>
              </div>
              <hr>
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row" class="px-0 pb-3 pt-2">
                      <i class="fas fa-map-marker-alt living-coral-text"></i>
                    </th>
                    <td  class="pb-3 pt-2"><span ></span></td>
                  </tr>
                  <tr class="mt-2">
                    <th scope="row" class="px-0 pb-3 pt-2">
                      <i class="far fa-clock living-coral-text"></i>
                    </th>
                    <td class="pb-3 pt-2"><span class="deep-purple-text me-2"> Closed</span> Opens 10 AM</td>
                  </tr>
                  <tr class="mt-2">
                    <th scope="row" class="px-0 pb-3 pt-2">
                      <i class="fas fa-cloud-moon living-coral-text"></i>
                    </th>
                    <button class="pb-3 pt-2">Sunny weather tomorrow</button>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
</div>

        `
        })
        content.innerHTML = showInHtml;

        const card = document.querySelector('.map-card');
        const cardBody = card.querySelector('.card-body')

        card.addEventListener('click', () => {
            cardBody.classList.toggle('closed')
        })
    </script>
@endsection
