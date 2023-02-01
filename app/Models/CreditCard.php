<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'email', 'cardNo', 'securityCode', 'Cardholder', 'billingAddress'];
    protected $table = 'credit_cards';
}
