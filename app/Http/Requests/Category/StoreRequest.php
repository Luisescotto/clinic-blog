<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use function PHPUnit\Framework\stringContains;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50|unique:categories',
            'description' => 'string|max:250|nullable',
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo permite 50 caracteres.',
            'name.unique' => 'Ya existe una categoría con este nombre.',
            'description.string' => 'El valor no es correcto.',
            'description.max' => 'Solo permite 250 caracteres.',
        ];
    }
}
