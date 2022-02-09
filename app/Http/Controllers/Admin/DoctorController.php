<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\doctorContract;
use App\DataTables\DoctorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\StoreRequest;
use App\Http\Requests\Doctor\updateRequest;
use App\Models\Department;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function __construct(doctorContract $doctorsevrice)
    {
        $this->doctorsevrice = $doctorsevrice;
    }


    public function index(DoctorDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.doctor.index');
    }


    public function create()
    {
        $dept = Department::pluck('department', 'id')->toArray();

        return view('admin.dashboard.doctor.add', compact('dept'));
    }


    public function store(StoreRequest $request)
    {
        return $this->doctorsevrice->store($request->all());
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $doctorEdit = Doctor::find($id);
        $dept = Department::pluck('department', 'id')->toArray();
        return view('admin.dashboard.doctor.edit', compact('doctorEdit', 'dept'));
    }


    public function update(updateRequest $request)
    {
        return $this->doctorsevrice->update($request->all());
    }


    public function destroy(Request $request)
    {
        $delete = Doctor::where('id', $request->id)->delete();
        return response()->json(['data' => $delete]);
    }
}
