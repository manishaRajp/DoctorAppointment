<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppoinmentTime extends Model
{
    use HasFactory;

    protected $table = 'appoinments';
    protected $fillable = [
        'doctor_id',
        'user_id',
        'date',
        'shift',
        'time',
        'status',

    ];
}
