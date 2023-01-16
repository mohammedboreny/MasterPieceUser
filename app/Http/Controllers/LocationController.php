<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){

    }

   public function getLocation(Request $rq) 
    {
        $data = Location::where('id',$rq->id)->get(); 
        return redirect()->back()->with('location',$data);
    }
}
