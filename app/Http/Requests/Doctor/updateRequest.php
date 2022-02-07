<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
            'email' => 'required|email|unique:doctors,email,'.$id. ',id',
            'phone_number' => 'required|unique:doctors,phone_number,'.$id .',id',
            'address' => 'required',
            'department' => 'required',
            'gender' => 'required|in:Male,Female',
            'description' => 'required',
            'shift' => 'required|in:Morning,Evening',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'image' => 'mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}
