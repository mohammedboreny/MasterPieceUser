<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ["payment_amount","Phone_Number","Reservation_Time",'BookingDate',"Park_id",'user_id',"Card_id"];
    protected $table = 'booking';
    public $timestamps=true;
}
