<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
   protected $table='tcontratos';

   protected $primaryKey='idtipocontrato';

   public $timestamps=true;

   protected $fillable =[
   	'tipocontrato',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
