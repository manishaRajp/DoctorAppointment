<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'department',
    ];


    public function departments_id()
    {
        return $this->hasOne(Doctor::class, 'department','id');
    }

}
