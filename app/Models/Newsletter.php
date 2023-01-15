<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'registerd'];
    protected $table = 'NewsLetter';
    public $timestamps=false;
}
