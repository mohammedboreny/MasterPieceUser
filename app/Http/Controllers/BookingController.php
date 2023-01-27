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
        $checkPhone=Auth()->user()->phone_number;
        if($checkPhone){
        $phone_number=Auth()->user()->phone_number;
    }else{
        $phone_number="";}
        if (Auth()->user()) {
            
            $data = Location::all()->where('id', $id)->first();
            $dataIntoArray=[
                'id' => $data->id,
                'name' =>$data->name,
                'phone' =>$data->phone,
                'street'=>$data->street,
                'city' =>$data->city,
                'state' =>$data->state,
                'zip' =>$data->zip,
                'lat' =>$data->latitude,
                'long'=>$data->longitude,
                'created_at' =>$data->created_at,
                'updated_at' =>$data->updated_at,
            ];
           return view('map')->with('data',['location'=>$dataIntoArray,
            'phone_number'=>$phone_number
        ]);
        }
        else{
          return  redirect('/login');
        }
    }



    public function setOrder(Request $rq)
    {
        $user = Auth()->user();
        dd($user['id']);
        dd($rq);
        // laravel controller create command for

        // $data = Booking::where('id',$rq->id)->get(); 
        // return redirect()->back()->with('location',$data);
    }
}
