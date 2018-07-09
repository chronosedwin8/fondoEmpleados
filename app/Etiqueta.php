<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
   protected $table='etiquetas';

   protected $primaryKey='idetiqueta';

   public $timestamps=true;

   protected $fillable =[
   	'idmodulo',
   	'etiqueta',
   	'orden',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
