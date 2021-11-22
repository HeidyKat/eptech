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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' =>'string|required|unique:products|max:255',

            'precio' =>'required',


        ];
    }
    public function messages()
    {
        return[
            'nombre.string'=>'El valor no es correcto.',
            'nombre.required'=>'Este campo es requerido.',
            'nombre.unique'=>'El producto ya está registrado.',
            'nombre.max'=>'Solo se permite 255 caracteres.',



            'precio.required'=>'El campo es requerido.',

        ];
    }
}
