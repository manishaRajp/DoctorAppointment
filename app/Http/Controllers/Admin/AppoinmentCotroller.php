<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\appoinmentContract;
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
    public function __construct(appoinmentContract $appoinmemntservice)
    {
        $this->appoinmemntservice = $appoinmemntservice; 
    }

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
      return $this->appoinmemntservice->store($request->all());
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
