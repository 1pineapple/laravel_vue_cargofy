<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataSend extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'date' => 'required|date',
            'phone' => 'required|numeric|max:9|min:9',
            'email' => 'required|email',
        ];
    }
}
