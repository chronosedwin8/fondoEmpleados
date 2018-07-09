<?php

namespace fondo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtiquetaFormRequest extends FormRequest
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
            'idmodulo'=>'required',
            'etiqueta'=>'required|max:45',
            'orden'=>'required|max:3',
            'descrip'=>'max:144',
        ];
    }
}
