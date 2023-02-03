<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){

    }

   public function getLocation(Request $rq) 
    {
        $data = Location::where('id',$rq->id)-> get(); 
        return redirect()->back()->with('location',$data);
    }


    public function searchPark(Request $request)
    {


        try {
            // Get the search value from the request
            $search = $request->input('search');

            // Search in the title and body columns from the posts table
            $data = Location::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('street', 'LIKE', "%{$search}%")
                ->orWhere('city','LIKE', "%{$search}%")
                ->get();

            // Return the search view with the resluts compacted
         return  redirect()->back()->with('location',$data);
        } catch (Exception $e) {
            return redirect()->back()->with('location', $e->getMessage());
        }
    }
}
