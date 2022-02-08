<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AppoinmentsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Appoinemt\StoreRequest;
use App\Mail\AppoinmentMail;
use App\Models\Appoinment;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Html\Editor\Fields\Select;

class AppoinmentCotroller extends Controller
{

    public function index(AppoinmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.appoinment.index');
    }


    public function create()
    {
        $doctor = Doctor::pluck('name', 'id')->toArray();
        return view('admin.dashboard.appoinment.add', compact('doctor'));
    }

    public function store(StoreRequest $request)
    {
        $mytime = Carbon::create($request->date . ' ' . $request->time);
        $appoinment_time = Appoinment::where('doctor_id', $request['doctor_id'])->get();
        $flag = false;
        foreach ($appoinment_time as $value) {
            $appoinment_date = Carbon::create($value->date . ' ' . $value->time);
            if ($appoinment_date == $mytime) {
                $flag = true;
                break;
            }
        }
        if (!$flag) {
            $appoinment = '';
            $shift = Doctor::where('id', $request['doctor_id'])->first();
            $available = Doctor::where('id', $request['doctor_id'])->where('start_time', '<=', $request->time)->where('end_time', '>=', $request->time)->first();
            $error = 0;
            if ($shift->shift != $request->shift) {
                $error++;
                return response()->json(1);
            }
            if (!$available) {
                $error++;
                return response()->json(0);
            }
            if ($error == 0) {
                $input = $request->all();
                $image = uploadFile($request['image'], 'PatientImage');
                $input['image'] = $image;
                $user = User::create($input);
                $input['user_id'] = $user->id;
                Appoinment::create($input);
                $appoinment = Appoinment::select(DB::raw('(select email from users where id = user_id)as email'), DB::raw('(select name from users where id = user_id)as name'))->get();
                Mail::to($appoinment)->send(new AppoinmentMail($request));
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


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }



    public function status(Request $request)
    {
        $id = $request['id'];
        $appoinemet = Appoinment::find($id);
        if ($appoinemet->status == "0") {
            $appoinemet->status = "1";
        } elseif ($appoinemet->status == "1") {
            $appoinemet->status = "2";
        } else {
            $appoinemet->status = "1";
        }
        $appoinemet->save();
        return response()->json(['data' => $appoinemet]);
    }
}
