<?php

namespace App\Http\Requests\Appoinemt;

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
            'doctor_id' => 'required',
            'user_id' => 'required',
            'date' => 'required',
            'shift' => 'required:in:1,2',
            'time' => 'required',
        ];
    }
}
