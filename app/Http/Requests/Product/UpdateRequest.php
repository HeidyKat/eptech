<?php

namespace App\Http\Requests\Product;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nombre" =>'required|unique:products,nombre,'.$this->route('product')->id.'|string',
            "codigo" =>'nullable|string',
            "category"=>'required',
            "precio" =>'string|required',
            "short_description" =>'string|required',
            "long_description" =>'string|required',
            "subcategory_id" =>'string|required',

        ];
    }

}
