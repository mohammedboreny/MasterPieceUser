<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Exception;
use Illuminate\Http\Request;

class MapController extends Controller
{

    public function index()
    {

        $data = Location::latest()->get();
        return view('Parkings')->with('data', $data);
    }

    public function searchPark(Request $request)
    {


        try {
            // Get the search value from the request
            $search = $request->input('search');
            // Search in the title and body columns from the posts table
            $dataSearch = Location::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('street', 'LIKE', "%{$search}%")
                ->orWhere('city','LIKE', "%{$search}%")
                ->get();
            // dd($dataSearch);
            // Return the search view with the resluts compacted
            if ($dataSearch->isEmpty()){ 
            return redirect()->back()->with('status','Location is unavailable,Kindly Check for another');
        }
         return  redirect()->back()->with('dataSearch',$dataSearch);
        } catch (Exception $e) {
            return redirect()->back()->with('dataSearch', $e->getMessage());
        }
    }
    
}
