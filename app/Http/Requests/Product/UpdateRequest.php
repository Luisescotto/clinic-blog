<?php

namespace App\Http\Requests\Product;

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
        //    "name" => 'required|string|max:255|unique:products,name,'.$this->route('product')->id,
        //    "code" => 'nullable|string',
        //    "category" => 'required',
        //    "sell_price" => 'string|required',
        //    "date" => 'required',
        //    "short_description" => 'string|required',
        //    "long_description" => 'string|required',
        //    "subcategory_id" => 'string|required',
        //    "provider_id" => 'string|required',
        //    "guest_id" => 'string|required',
        ];
    }

    
}
