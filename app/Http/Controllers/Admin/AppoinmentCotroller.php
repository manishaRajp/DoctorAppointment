<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AppoinmentsDataTable;
use App\Http\Controllers\Controller;
use App\Models\AppoinmentTime;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'user_id'=> 'required',
            'date' => 'required',
            'shift' => 'required',
            'time' => 'required',
        ]);
        AppoinmentTime::create($request->all());
        return json_encode(array(
            "statusCode" => 200
        ));
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
