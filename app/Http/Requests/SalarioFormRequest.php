<?php

namespace fondo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalarioFormRequest extends FormRequest
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
            'tiposalario'=>'required|max:45',
            'descrip'=>'max:144'
        ];
    }
}
