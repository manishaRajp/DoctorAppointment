<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|unique:doctors',
            'password' => 'required',
            'phone_number' => 'required|unique:doctors',
            'address' => 'required',
            'department' => 'required',
            'gender' => 'required',
            'description' => 'required',
            'image' => 'required',
            'shift' => 'required|in:evening,morning',
            'start_time' => 'required|date_format:H:i:A',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ];
    }
}
