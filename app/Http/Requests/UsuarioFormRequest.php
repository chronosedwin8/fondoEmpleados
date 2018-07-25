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
            /*Datos principales*/
      'cedula'=>'required|max:45',
      'apellido1'=>'required|max:45',
      'apellido2'=>'required|max:45',
      'fechanaci'=>'required',
      'nombre1'=>'required|max:45',
      'nombre2'=>'max:45',
      'idestadocivil'=>'required',
      'idgeneros'=>'required',

          /*Datos de ubicación*/

      'barrio'=>'required|max:45',
      'celular'=>'required|max:45',
      'cod_postal'=>'max:6',
      'direccion'=>'required|max:45',
      'email'=>'email|max:100',
      'telefono'=>'required|max:45',
          
           /*Datos del fondo*/

      'fechaingreso',
      'nocuentauser'=>'required|max:45',
      'porcentaje_ahorro'=>'required|numeric',
      'salario'=>'required|numeric',
      'idbancouser'=>'required',      
      'idestados',      
      'idjornadalabora',
      'idorigenfondos'=>'required',
      'idprofesiones',
      'idtipocontrato',
      'idtipocuentauser'=>'required',
      'idtipos_user'=>'required',
      'idtiposalario'=>'required'
        
        ];
    }
}
