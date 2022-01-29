<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppoinmentTime;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
   public function department()
  {
      $dept = Department::get();
      $doctor = Doctor::get();
      $patient = User::get();
      $appoinment = AppoinmentTime::get();
      return view('admin.dashboard.index',compact('dept','doctor','patient','appoinment'));
  }
}
