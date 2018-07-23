<?php

namespace fondo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentaFormRequest extends FormRequest
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
            'idbancos'=>'required',
            'idtiposdecuentas'=>'required',
            'no_cuenta'=>'required|max:144',
            'nom_titular'=>'required|max:144',
            'descrip'=>'max:144',
        ];
    }
}
