<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class MapController extends Controller
{

    public function index()
    {

        $data = Location::latest()->get();
        return view('Parkings')->with(['data' => $data]);
    }


    
}
