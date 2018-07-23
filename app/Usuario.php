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
   	'idtipos_user',
   	'estado',
   	'direccion',
   	'telefono',
   	'celular',
   	'barrio',
   	'email',
   	'fechaingreso',
   	'fechanaci',
   	'salario',
   	'porcentaje_ahorro'
   	
   ];

   protected $guarded =[];
}
