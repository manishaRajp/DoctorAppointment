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
        $images = uploadFile($request['image'], 'PatientImage');
        $newUser = User::updateOrCreate([
            'email' => $request->get('email'),
        ], [
            'name'     => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number'   => $request->get('phone_number'),
            'password'    => Hash::make($request->get("password")),
            'gender'    => $request->get('gender'),
            'bio'    => $request->get('bio'),
            'address'   => $request->get('address'),
            'image'   => $images,
        ]);
        return redirect()->route('admin.patient.index');
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
