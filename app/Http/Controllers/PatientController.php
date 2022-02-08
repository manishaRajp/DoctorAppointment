<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function store(StoreRequest $request)
    {


        $image = uploadFile($request['image'], 'PatientImage');
        $input = $request->all();
        $input['image'] = $image;
        User::create($input);
        return response()->json(["statusCode" => 200]);
    }
}
