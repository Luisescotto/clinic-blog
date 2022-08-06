<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
//            'name' => 'required|unique:products|string|max:255',
//            'description' => 'required|string',
//            'date' => 'required|date|after:today',
//            'image' => 'required',
//            'sell_price' => 'required',
//            'category_id' => 'required|integer|exists:App\Category,id',
//            'provider_id' => 'required|integer|exists:App\Provider,id',
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Este campo es requerido.',
            'name.unique' => 'Ya se encuentra registrado.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo permite 255 caracteres.',
        ];
    }
}
