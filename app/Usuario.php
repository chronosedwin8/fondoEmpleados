<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
   protected $table='usuarios';

   protected $primaryKey='cedula';

   public $timestamps=true;

   protected $fillable =[
      'cedula',
      'apellido1',
      'apellido2',
      'fechanaci',
      'nombre1',
      'nombre2',
      'barrio',
      'celular',
      'cod_postal',
      'direccion',
      'email',
      'telefono',
      'fechaingreso',
      'nocuentauser',
      'porcentaje_ahorro',
      'salario',
      'idbancouser',
      'idestadocivil',
      'idestados',
      'idgeneros',
      'idjornadalabora',
      'idorigenfondos',
      'idprofesiones',
      'idtipocontrato',
      'idtipocuentauser',
      'idtipos_user',
      'idtiposalario' 	
   	
   ];

   protected $guarded =[];
}
