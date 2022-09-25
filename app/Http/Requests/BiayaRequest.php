<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BiayaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => 'required',
            'biaya' => 'required|integer|size:18',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name can\'t be empty !!!',
            'biaya.required' => 'Biaya can\'t be empty !!!',
        ];
    }
}
