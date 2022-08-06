<?php

namespace App\Http\Requests\Guest;

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
            'description' => 'required|string',
            'image' => 'required|dimensions:min_width=100,min_height=200',
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo permite 255 caracteres.',

            'description.required' => 'Este campo es requerido.',
            'description.string' => 'El valor no es correcto.',

            'image.required' => 'Este campo es requerido.',
            'image.dimensions' => 'Las dimensiones deben ser mayores a 100 x 200 pixeles.',

        ];
    }
}
