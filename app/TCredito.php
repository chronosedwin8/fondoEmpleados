<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class TCredito extends Model
{
   protected $table='tipos_de_creditos';

   protected $primaryKey='idtipos_de_creditos';

   public $timestamps=true;

   protected $fillable =[
   	'tipoCredito',
   	'descrip'
   	   	
   ];

   protected $guarded =[];
}
