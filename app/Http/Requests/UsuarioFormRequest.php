<?php

namespace fondo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'cedula'=>'required|max:45',
            'idtipos_user'=>'required',
            'estado'=>'required',
            'direccion'=>'required|max:45',
            'telefono'=>'required|max:45',
            'celular'=>'required|max:45',
            'barrio'=>'max:144',
            'email'=>'required|email',
            'fechaingreso'=>'required|date',
            'fechanaci'=>'required|date',
            'salario'=>'required|numeric',
            'porcentaje_ahorro'=>'required|numeric',
        ];
    }
}
