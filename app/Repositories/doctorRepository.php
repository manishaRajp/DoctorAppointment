<?php

namespace App\Repositories;

use App\Contracts\doctorContract;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Hash;

class doctorRepository implements doctorContract
{

    public function store(array $request)
    {
        $image = uploadFile($request['image'], 'DoctorImage');
        $input = $request;
        $input['image'] = $image;
        Doctor::create($input);
        return response()->json(["statusCode" => 200]);
        
    }


    public function update(array $request)
    {
        $doctor = Doctor::find($request['id']);
        if (isset($request['image'])) {
            $image = uploadFile($request['image'], 'DoctorImage');
        } else {
            $image = $doctor->getRawOriginal('image');
        }
        $input = $request;
        $input['image'] = $image;
        $doctor->update($input);
        return response()->json(['success' => 'doctor updated successfully']);
        
    }

}
