<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuario extends FormRequest
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
            'Apellido' => 'required|min:3|max:50',
            'Cuenta' => 'required|min:3|max:20',
            'Ci' => 'required|min:5|max:12',
            'password' => 'required|min:6|max:100',

        ];
    }
}
