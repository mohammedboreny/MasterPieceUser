<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Location;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
    }

    public function checkOut($id)
    {
        if (Auth()->user()){
        $checkPhone = Auth()->user()->phone_number;
        if ($checkPhone!=null) {
            $phone_number = Auth()->user()->phone_number;
        } else {
            $phone_number = "";
        }
        if (Auth()->user()) {

            $data = Location::all()->where('id', $id)->first();
            $dataIntoArray = [
                'id' => $data->id,
                'name' => $data->name,
                'phone' => $data->phone,
                'street' => $data->street,
                'city' => $data->city,
                'state' => $data->state,
                'zip' => $data->zip,
                'lat' => $data->latitude,
                'long' => $data->longitude,
                'created_at' => $data->created_at,
                'updated_at' => $data->updated_at,
            ];
            return view('map')->with('data', [
                'location' => $dataIntoArray,
                'phone_number' => $phone_number
            ]);
        } 
    }
    else {
            return  redirect('/login');
        }
    }


    public function OrderConfirmation(Request $request ){
        $data = $request->query->all();
        $dataPhone=$data['phone'];
        var_dump($dataPhone);
    
    }


    public function setOrder(Request $rq)
    {
        $user = Auth()->user();
        // dd($user['id']);
        // dd($rq);
        // laravel controller create command for
        $park = $rq->ParkID;
        $parkInfo = Location::all()->where('id', $park)->first();

        return view('OrderConfirmation')->with('data', ['user' => $user, 'order' => $rq->toArray(), 'park' => $parkInfo]);
    }
}
