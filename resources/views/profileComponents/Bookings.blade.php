@extends('layout.index')
@section('content')

<div class="container mt-3 pt-3">
    @If(\Session::has('status')) 
<div style="background-color: #ff7241" class="alert text-light text-center mt-3"> {!! Session::get('status') !!}</div>
@endif



@if ($data) 
<div class="table-responsive-md "style=" ;">
    <table  class="table">
        <thead>
            <tr class="text-center">
                <th scope="col"> BookingDate</th>
                <th scope="col">Reservation Time</th>
                <th scope="col">payment amount</th>
                
                <th scope="col">Actions</th>
                
            </tr>
        </thead>
        <tbody>
           
            @foreach ($data as $item)
           
          
            <tr  class="">
                <td class="text-center" scope="row">{{$item['BookingDate']}}</td>
                <td class="text-center">{{$item['Reservation_Time']}} Hours</td>
                <td class="text-center">{{$item['payment_amount']}} JD</td>
               
                <td class="text-center"><a class="btn btn-sm btn-warning" href=""> View Details</a></td>
            </tr>
            @endforeach
           
        </tbody>
    </table>
</div>

@endif
</div>


@endsection