<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\CreditCard;
use App\Models\Location;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class BookingController extends Controller
{
    public function index()
    {
    }

    public function checkOut($id)
    {
        if (Auth()->user()) {
            $checkPhone = Auth()->user()->phone_number;
            if ($checkPhone != null) {
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
        } else {
            return  redirect('/login');
        }
    }


    public function OrderConfirmation(Request $request)
    {

       

        // $data = $request->query->all();
        $data=$request->all();
        // dd($data);


        // NoOfHours
        // Save CreditCard information into the database
        $CreditCheck=CreditCard::where('user_id' , '=',Auth::user()->id)->where('CardNo' , '=',$data['cardNo'])->first();
       
        if(!$CreditCheck){
        $statusModel = new CreditCard();
        $data3=$statusModel->getFillable();
        $field=$request->only($data3);
        $field['user_id']=Auth::user()->id;
        $statusModel->fill($field);
        $statusModel->save();
    }
        // -----------------------------


        $OrderModel=new Booking();
        $CardNumber=CreditCard::all()->where('cardNo','=',$data['cardNo'])->first();
        $OrderModel->Card_id=$CardNumber['id'];
        $OrderModel->Park_id=$data['ParkID'];
        $OrderModel->user_id=Auth::user()->id;
    
        $reservationDate=$data['date'].$data['dateTime'];
        $reservationDate=DateTime::createFromFormat('Y-m-d H:i',$reservationDate);
        $reservationDate=$reservationDate-> format('Y-m-d H:i:s');
        $OrderModel->BookingDate=$reservationDate;
        $OrderModel->Reservation_Time=$data['NoOfHours'];
        $OrderModel->Phone_Number=$data['phone'];
        $OrderModel->payment_amount=$data['NoOfHours']*2;
      $OrderModel->save();
        return redirect('profile/Bookings')->with('status',"Your booking has been saved successfully");
        
       
       
       
     
        
        // dd($data2);
        


        // $dataCreditCard
    }


    public function setOrder(Request $rq)
    {
        $user = Auth()->user();
        // dd( $rq->input('dateTime'));
        $minDate = new DateTime('12/31/2019 9:00 AM');
        $minDate = $minDate->format('H:i');
        $maxDate = new DateTime('12/31/2019 10:00 PM');
        $maxDate = $maxDate->format('H:i');
        // var_dump($maxDate);
        $mytime = Carbon::now()->timezone('GMT+3')->format('H:i');
        $mytime2 = Carbon::now()->timezone('GMT+3')->format('Y-m-d');
        $rq->validate([
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date' => 'required|after:yesterday',
            // 'dateTime'=> 'required|date_format:H:i|after:'. $mytime,
        ]);

        if ($rq->get('date') > $mytime2 && $rq->get('dateTime') > $minDate && $rq->get('dateTime') < $maxDate) {
            $park = $rq->ParkID;
            $parkInfo = Location::all()->where('id', $park)->first();
            return view('OrderConfirmation')->with('data', ['user' => $user, 'order' => $rq->toArray(), 'park' => $parkInfo]);
        };
        // Check if the time is between the Working hours 
        if ($rq->get('dateTime') <= $minDate || $rq->get('dateTime') >= $maxDate) {
            return redirect()->back()->with('WorkingHours', 'Our Working Hours is between ' . $minDate . ' and ' . $maxDate);
        }

        // Check if the Date is not before today date
        if ($rq->get('date') < $mytime2) {
            return redirect()->back()->with('status', 'Parking Date Should Be after' . $mytime2);
        };
        // Check id the time is after the current date
        if ($rq->get('dateTime') < $mytime) {
            return redirect()->back()->with('status', 'Parking Date Time Should Be after ' . $mytime);
        };

      
    }
}
