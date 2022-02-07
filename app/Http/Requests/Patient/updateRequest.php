<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        $id = request()->id;
        return [
            'name' => 'required|alpha_dash',
            'email' => 'required|email|unique:users,email,'.$id. ',id',
            'address' => 'required',
            'phone_number' => 'required|unique:users,phone_number,'.$id .',id',
            'image' => 'nullable',
            'gender' => 'required|in:Male,Female',
            'bio' => 'required',
        ];
    }
}
