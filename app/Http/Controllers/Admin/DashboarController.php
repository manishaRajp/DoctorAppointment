<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdate;
use App\Models\Admin;
use App\Models\AppoinmentTime;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboarController extends Controller
{
  public function department()
  {
    $mytime = Carbon::now();
    $todays = $mytime->toDateString();

    $dept = Department::get();
    $doctor = Doctor::get();
    $doctortodays = Doctor::Where('date', $todays)->get();
    $patient = User::get();
    $appoinemt = AppoinmentTime::get();
    $appoinmentTodays = AppoinmentTime::select(DB::raw('(select name from doctors where id=doctor_id)as name'), DB::raw('count(id) as id '))->Where('date', $todays)->groupBy('doctor_id')->get();
    return view('admin.dashboard.index', compact('dept', 'doctor', 'patient', 'appoinemt', 'appoinmentTodays', 'doctortodays'));
  }


  public function profileview()
  {
    return view('admin.dashboard.profile');
  }

  public function profileupdate(ProfileUpdate $request)
  {
    $admin = Admin::get()->first();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->save();
    return redirect()->route('admin.dashboard');
  }
}
