<?php

namespace fondo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MesesFormRequest extends FormRequest
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
            'mes'=>'required|max:45',
            'mescontracion'=>'required|max:45',
            'descripcion'=>'required|max:45',
        ];
    }
}
