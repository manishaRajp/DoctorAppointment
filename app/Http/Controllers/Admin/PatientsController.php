<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function stores(StoreRequest $request)
    {
        $image = uploadFile($request['image'], 'PatientImage');
        $input = $request->all();
        $input['image'] = $image;
        User::create($input);
        return response()->json(["statusCode" => 200]);
    }
}
