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

        if (Auth()->user()) {

            $data = Location::all()->where('id', $id);
            redirect()->with('',);
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
