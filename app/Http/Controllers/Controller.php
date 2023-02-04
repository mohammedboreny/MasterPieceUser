<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Location;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


      public function getSum() {
        try {
            $countUser=User::count();
            $countParks=Location::count();
            $countTotal=Booking::sum('payment_amount');
            $countContactUS=Contact::count();
            return response()->json(
                $data=['hello' => 'world',
                'userCount' => $countUser,
                'countParks' => $countParks,
                'countTotal' => $countTotal,
                'countContactUS' => $countContactUS]
                );
        
        } catch (Exception $e) {
            return response()->json(
                $data=['error' => $e]
                );
        
        }   
       }

        public function getTotal(){
              try{

                $startDate = Carbon::now()->yesterday();
                $endDateWeekly = Carbon::now('GMT+3')->subDays(7);
                $endDateMonthly= Carbon::now('GMT+3')->subDays(30);
                $dayTotal=Booking::where('created_at','>' , $startDate)->get()->sum('payment_amount');
                $monthlyTotal=Booking::where('created_at','>' , $endDateMonthly)->get()->sum('payment_amount');
                $weeklyTotal = Booking::where('created_at','>' , $endDateWeekly)->get()->sum('payment_amount');
                // dd($bookingWeekly);
               return response()->json(
                $data=['weeklyTotal'=>$weeklyTotal.' JD',
                'monthlyTotal'=>$monthlyTotal.' JD',
                'dayTotal'=>$dayTotal,
            'status'=>200
            ]
            
            );
            }
            catch(Exception $e){

            }
        }


      


}
