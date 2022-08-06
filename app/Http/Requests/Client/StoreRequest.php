<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'rnc' => 'required|string|max:11|min:11|unique:clients',
            'address' => 'string|max:255|nullable',
            'phone' => 'required|string|max:10|min:10|unique:clients',
            'email' => 'email|string|max:255|unique:clients|email:rfc,dns|nullable',

        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo permite 255 caracteres.',

            'rnc.required' => 'Este campo es requerido.',
            'rnc.string' => 'El valor no es correcto.',
            'rnc.max' => 'Solo permite 11 caracteres.',
            'rnc.min' => 'Se requieren 11 caracteres.',
            'rnc.unique' => 'Ya se encuentra registrado.',

            'address.string' => 'El valor no es correcto.',
            'address.max' => 'Solo permite 255 caracteres.',

            'phone.required' => 'Este campo es requerido.',
            'phone.string' => 'El valor no es correcto.',
            'phone.max' => 'Solo permite 10 caracteres.',
            'phone.min' => 'Se requieren 10 caracteres.',
            'phone.unique' => 'Ya se encuentra registrado.',

            'email.email' => 'Ingrese un correo electrónico válido.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo permite 255 caracteres.',
            'email.unique' => 'Ya se encuentra registrado.',


        ];
    }
}
