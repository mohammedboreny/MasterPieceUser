<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Location;
use App\Models\Newsletter;
use App\Models\User;
use Carbon\Carbon;
use Exception;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;






    public function getSum()
    {
        try {
            $countUser = User::count();
            $countParks = Location::count();
            $countTotal = Booking::sum('payment_amount');
            $countContactUS = Contact::count();
            return response()->json(
                $data = [
                    'hello' => 'world',
                    'userCount' => $countUser,
                    'countParks' => $countParks,
                    'countTotal' => $countTotal,
                    'countContactUS' => $countContactUS
                ]
            );
        } catch (Exception $e) {
            return response()->json(
                $data = ['error' => $e]
            );
        }
    }

    public function getTotal()
    {
        try {

            $startDate = Carbon::now()->yesterday();
            $endDateWeekly = Carbon::now('GMT+3')->subDays(7);
            $endDateMonthly = Carbon::now('GMT+3')->subDays(30);
            $dayTotal = Booking::where('created_at', '>', $startDate)->get()->sum('payment_amount');
            $monthlyTotal = Booking::where('created_at', '>', $endDateMonthly)->get()->sum('payment_amount');
            $weeklyTotal = Booking::where('created_at', '>', $endDateWeekly)->get()->sum('payment_amount');
            // dd($bookingWeekly);
            return response()->json(
                $data = [
                    'weeklyTotal' => $weeklyTotal . ' JD',
                    'monthlyTotal' => $monthlyTotal . ' JD',
                    'dayTotal' => $dayTotal,
                    'status' => 200
                ]

            );
        } catch (Exception $e) {
        }
    }

    public function getBookingsDesc()
    {
        $dataRoot = Booking::orderBy('created_at', 'desc')->take(5)->get();
        return response()->json(
            $data = $dataRoot
        );
    }


    public function getParkings()
    {
        $dataRoot = Location::all();
        return response()->json($data = $dataRoot);
    }
    public function getParkingsById($id)
    {
        $dataRoot = Location::findOrFail($id);
        return response()->json($data = $dataRoot);
    }

    public function editPark(Request $rq, $id)
    {
        $location = Location::findOrFail($id);
        $dataRoot = $rq->only($location->getFillable());
        $location->update($dataRoot);
        return response()->json();
    }

    public function deleteParking($id)
    {
        $data = Location::findOrFail($id);
        $data->delete();
        return response()->json();
    }



    // Users Api Methods
    public function getUsers()
    {
        $dataRoot = User::all();
        return response()->json($data = $dataRoot);
    }
    public function getUsersById($id)
    {
        $dataRoot = User::findOrFail($id);
        return response()->json($data = $dataRoot);
    }
    public function deleteUsersById($id)
    {
        $dataRoot = User::findOrFail($id);
        $dataRoot->delete();
        return response()->json();
    }
    public function editusers(Request $rq, $id)
    {
        $location = User::find($id);
        $dataRoot = $rq->only($location->getFillable());
        $location->update($dataRoot);
        return response()->json();
    }


    // Bookings Api Methods
    public function getBookings()
    {
        $dataRoot = Booking::all();
        return response()->json($data = $dataRoot);
    }
    public function getBookingsById($id)
    {
        $dataRoot = Booking::findOrFail($id);
        return response()->json($data = $dataRoot);
    }
    public function deleteBookingById($id)
    {
        $data = Booking::findOrFail($id);
        $data->delete();
        return response()->json();
    }
    public function editBooking(Request $request, $id)
    {

        $User = Booking::findOrFail($id);
        $userx = new Booking();
        $userx = $userx->getFillable();
        $dataRoot = $request->only($userx);
        $User->update($dataRoot);
        return response()->json();
    }
    // contact us api Methods
    public function getContact()
    {
        $dataRoot = Contact::all();
        return response()->json($data = $dataRoot);
    }
    public function deleteContact($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        return response()->json();
    }


    // Reviews Api Methods
    // public function getReview(){
    //     $dataRoot= Review::all();
    //     return response()->json();
    // }


    // News Letter Api 
    public function getNewsletter()
    {
        $dataRoot = Newsletter::all();
        return response()->json($data = $dataRoot);
    }
}
