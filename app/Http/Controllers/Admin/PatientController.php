<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PatientDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\StoreRequest;
use App\Http\Requests\Patient\updateRequest;
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
        $image = uploadFile($request['image'], 'PatientImage');
        $input = $request->all();
        $input['image'] = $image;
        User::create($input);
        return response()->json(["statusCode" => 200]);
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


    public function update(updateRequest $request)
    {
        $patient = User::find($request['id']);
        if (isset($request['image'])) {
            $image = uploadFile($request['image'], 'patientImage');
        } else {
            $image = $patient->getRawOriginal('image');
        }
        $input = $request->all();
        $input['image'] = $image;
        $patient->update($input);
        return response()->json(['success' => 'patient updated successfully']);
       
    }


    public function destroy(Request $request)
    {
        $delete = User::where('id', $request->id)->delete();
        return response()->json(['data' => $delete]);
    }
}
