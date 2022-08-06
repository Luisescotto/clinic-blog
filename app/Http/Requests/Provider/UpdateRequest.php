<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:200|unique:providers,email,'.$this->route('provider')->id,
            'rnc' => 'required|string|max:11|min:11|unique:providers,rnc,'.$this->route('provider')->id,
            'address' => 'nullable|string|max:255',
            'phone' => 'required|string|max:10|min:10|unique:providers,phone,'.$this->route('provider')->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo permite 255 caracteres.',

            'email.required' => 'Este campo es requerido.',
            'email.email' => 'Ingrese un correo electrónico válido.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo permite 200 caracteres.',
            'email.unique' => 'Ya se encuentra registrado.',

            'rnc.required' => 'Este campo es requerido.',
            'rnc.string' => 'El valor no es correcto.',
            'rnc.max' => 'Solo permite 11 caracteres.',
            'rnc.min' => 'Se requieren 11 caracteres.',
            'rnc.unique' => 'Este campo es requerido.',

            'address.string' => 'El valor no es correcto.',
            'address.max' => 'Solo permite 255 caracteres.',

            'phone.required' => 'Este campo es requerido.',
            'phone.string' => 'El valor no es correcto.',
            'phone.max' => 'Solo permite 10 caracteres.',
            'phone.min' => 'Se requieren 10 caracteres.',
            'phone.unique' => 'Ya se encuentra registrado.',
        ];
    }
}
