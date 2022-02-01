<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PatientDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{

    public function index(PatientDataTable $dataTable)
    {
        return $dataTable->render('admin.dashboard.patient.index');
    }


    public function create()
    {
        return view('admin.dashboard.patient.add');
    }


    public function store(StoreRequest $request)
    {
        $image_update = User::where('id', $request['id'])->get()->first();
        if (isset($request['image'])) {
            $image = uploadFile($request['image'], 'PatientImage');
        } else {
            $image = $image_update->getRawOriginal('image');
        }
        $newUser = User::updateOrCreate([
            'id' => $request->id,
        ], [
            'name'     => $request->name,
            'email' => $request->email,
            'phone_number'   => $request->phone_number,
            'password'    => Hash::make($request->password),
            'gender'    => $request->gender,
            'bio'    => $request->bio,
            'address'   => $request->address,
            'image'   => $image,
        ]);
        return redirect()->route('admin.patient.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $patient = User::find($id);
        
        return view('admin.dashboard.patient.edit', compact('patient'));
    }


    public function update(Request $request, $id)
    {
       
    }


    public function destroy(Request $request,$id)
    {
        $patientdelete = User::find($id);
        $patientdelete->delete();
        $request->session()->flash('success', 'Recoreds Are Deleted ');
        return redirect()->route('admin.doctor.index');
    }
}
