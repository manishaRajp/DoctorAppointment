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
        $id = request()->id;
        return [
            'name' => 'required',
            'email' => 'required|email|unique:doctors,id,'.$id,
            // 'password' => 'required|doctors,id,'.$id,
            'phone_number' => 'required|unique:doctors,id,'.$id,
            'address' => 'required',
            'department' => 'required',
            'gender' => 'required|in:Male,Female',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'shift' => 'required|in:Morning,Evening',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ];
    }
}
