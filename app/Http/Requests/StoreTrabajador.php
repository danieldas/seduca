<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrabajador extends FormRequest
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
            'Nombre' => 'required|min:2|max:50',
            'ApPaterno' => 'required|min:2|max:30',
            'ApMaterno' => 'required|min:2|max:30',
            'Ci' => 'required|digits_between:5,10',
            'Telefono' => 'digits_between:5,9',
            'FkEmpresa' => 'required',
        ];
    }
}
