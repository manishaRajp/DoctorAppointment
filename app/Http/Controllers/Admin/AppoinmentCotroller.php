<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AppoinmentsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Appoinemt\StoreRequest;
use App\Mail\AppoinmentMail;
use App\Models\AppoinmentTime;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppoinmentCotroller extends Controller
{

    public function index(AppoinmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.appoinment.index');
    }


    public function create()
    {
        $doctor = Doctor::pluck('name', 'id')->toArray();
        $patient = User::pluck('name', 'id')->toArray();
        return view('admin.dashboard.appoinment.add', compact('doctor', 'patient'));
    }

    public function store(StoreRequest $request)
    {

        $request->validate([
            'doctor_id' => 'required',
            'user_id'=> 'required',
            'date' => 'required',
            'shift' => 'required',
            'time' => 'required',
        ]);
        $appoinment='';
        $shift = Doctor::where('id',$request['doctor_id'])->first();
        $available = Doctor::where('id', $request['doctor_id'])->where('start_time','<=',$request->time)->where('end_time', '>=', $request->time)->first();
        $error=0;
        if($shift->shift!=$request->shift)
        {
            $error++;
            return response()->json(1);
        }
        if(!$available)
        {
            $error++;
            return response()->json(0);
        }

        if($error==0)
        {
            $appoinment = User::all();
            dd($appoinment);
            AppoinmentTime::create([
                'doctor_id'=>$request->doctor_id,
                'user_id'=>$request->user_id,
                'date'=>$request->date,
                'time'=>$request->time
            ]);
            Mail::to($appoinment)->send(new AppoinmentMail($request));
            return json_encode(array(
                "statusCode" => 200,
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
}
