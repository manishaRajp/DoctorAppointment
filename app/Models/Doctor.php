<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'department',
        'gender',
        'description',
        'image',
        'shift',
        'start_time',
        'end_time',
    ];


    public function department()
    {
        return $this->hasOne(Department::class, 'id','department');
    }
}
