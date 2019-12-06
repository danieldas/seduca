<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSolicitante extends FormRequest
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
            'Nombre' => 'required|min:3|max:50',
            'ApPaterno' => 'required|min:2|max:30',
            'ApMaterno' => 'sometimes|nullable|max:30',
            'Ci' => 'required|min:5|max:12',
            'Telefono' => 'digits_between:5,9',
            'Tipo' => 'required',
            'Sexo' => 'required',

        ];
    }
}
