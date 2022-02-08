<?php

namespace App\Http\Requests\Appoinemt;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
       
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            // 'password' => 'required',
            'address' => 'required',
            'phone_number' => 'required|unique:users',
            'image' => 'required',
            'gender' => 'required|in:Male,Female',
            // 'bio' => 'required',
            'doctor_id' => 'required',
            'shift' => 'required:in:1,2',
            'date' => 'required',
            'time' => 'required',
        ];
    }
}
