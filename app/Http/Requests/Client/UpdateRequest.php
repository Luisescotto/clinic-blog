<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'rnc' => 'required|string|max:11|min:11|unique:clients,rnc,'.$this->route('client')->id,
            'address' => 'string|max:255|nullable',
            'phone' => 'required|string|max:10|min:10|unique:clients,phone,'.$this->route('client')->id,
            'email' => 'email|nullable|string|max:255|email:rfc,dns|unique:clients,email,'.$this->route('client')->id,

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
