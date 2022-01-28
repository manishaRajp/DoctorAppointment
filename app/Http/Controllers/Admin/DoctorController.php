<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DoctorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\StoreRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.dashboard.doctor.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $newUser = Doctor::updateOrCreate([
            'email' => $request->get('email'),
        ], [
            'name'     => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number'   => $request->get('phone_number'),
            'password'    => $request->get("password"),
            'gender'    => $request->get('gender'),
            'department'       => $request->get('department'),
            'description'    => $request->get('description'),
            'address'   => $request->get('address'),
            'shift'   => $request->get('shift'),
            'start_time'   => $request->get('start_time'),
            'end_time'   => $request->get('end_time'),
            'image'   => $request->get('image'),
        ]);
        return redirect()->route('admin.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
