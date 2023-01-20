<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){

    }

   public function setOrder(Request $rq) 
    {

dd($rq);
// laravel controller create command for

        // $data = Booking::where('id',$rq->id)->get(); 
        // return redirect()->back()->with('location',$data);
    }
}
