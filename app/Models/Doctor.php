<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'id',
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


    public function departments_id()
    {
        return $this->hasOne(Department::class, 'id', 'department');
    }
}
