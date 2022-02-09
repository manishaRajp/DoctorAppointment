<?php

namespace App\Repositories;

use App\Contracts\appoinmentContract;
use App\Contracts\doctorContract;
use App\Mail\AppoinmentMail;
use App\Models\Appoinment;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class appoinmentRepository implements appoinmentContract
{

    public function store(array $request)
    {
        $mytime = Carbon::create($request['date'] . ' ' . $request['time']);
        $appoint_doctor = Appoinment::where('doctor_id', $request['doctor_id'])->get();
        $flag = false;
        foreach ($appoint_doctor as $value) {
            $appoinment_date = Carbon::create($value->date . ' ' . $value->time);
            if ($appoinment_date == $mytime) {
                $flag = true;
                break;
            }
        }
        if (!$flag) {
            $shift = Doctor::where('id', $request['doctor_id'])->first();
            $available = Doctor::where('id', $request['doctor_id'])->where('start_time', '<=', $request['time'])->where('end_time', '>=', $request['time'])->first();
            $error = 0;
            if ($shift->shift != $request['shift']) {
                $error++;
                return response()->json(1);
            }
            if (!$available) {
                $error++;
                return response()->json(0);
            }
            if ($error == 0) {
                $input = $request;
                $image = uploadFile($request['image'], 'PatientImage');
                $input['image'] = $image;
                $user = User::create($input);
                $input['user_id'] = $user->id;
                Appoinment::create($input);
                $user = Appoinment::with('user:id,email,name')->where('user_id', $input['user_id'])->get();
                foreach ($user as $value) {
                    Mail::to($value->user->email)->send(new AppoinmentMail($request));
                }
                return json_encode(array(
                    "statusCode" => 200,
                ));
            }
        } else {
            return json_encode(array(
                "statusCode" => 422,
            ));
        }
    }

   
}
