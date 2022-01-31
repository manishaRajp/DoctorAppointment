<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DoctorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\StoreRequest;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DoctorDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.doctor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dept = Department::pluck('department','id')->toArray();
        
        return view('admin.dashboard.doctor.add',compact('dept'));
    }

    
    public function store(StoreRequest $request)
    {
        $images = uploadFile($request['image'], 'DoctorImage');
        $newUser = Doctor::updateOrCreate([
            'id' => $request->id,
        ], [
            'name'     => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number'   => $request->get('phone_number'),
            'password'    => Hash::make($request->get("password")),
            'gender'    => $request->get('gender'),
            'department'       => $request->get('department'),
            'description'    => $request->get('description'),
            'address'   => $request->get('address'),
            'shift'   => $request->get('shift'),
            'start_time'   => $request->get('start_time'),
            'end_time'   => $request->get('end_time'),
            'image'   => $images,
        ]);
        $request->session()->flash('success', 'Recoreds Are Added ');
        return redirect()->route('admin.doctor.index');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $doctorEdit = Doctor::find($id);
        return view('admin.dashboard.doctor.edit', compact('doctorEdit'));
    }

    
    public function update(Request $request, $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $collegeDelete = Doctor::find($id);
        $collegeDelete->delete();
        $request->session()->flash('success', 'Recoreds Are Deleted ');
        return redirect()->route('admin.doctor.index');
    }
}
