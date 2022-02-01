<?php

namespace App\Http\Requests\Patient;

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
            'name' => 'required|alpha_dash',
            'email' => 'required|email|unique:users,id,'.$id,
            // 'password' => 'required',
            'address' => 'required',
            'phone_number' => 'required|unique:users,id,'.$id,
            'image' => 'nullable',
            'gender' => 'required|in:Male,Female',
            'bio' => 'required',
        ];
    }
}
