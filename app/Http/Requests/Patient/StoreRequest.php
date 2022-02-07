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
        return [
            'name' => 'required|alpha_dash',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'address' => 'required',
            'phone_number' => 'required|unique:users',
            'image' => 'required',
            'gender' => 'required|in:Male,Female',
            'bio' => 'required',
        ];
    }
}
