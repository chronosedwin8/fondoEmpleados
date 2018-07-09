<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
   protected $table='modulos';

   protected $primaryKey='idmodulo';

   public $timestamps=true;

   protected $fillable =[
   	'modulo',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
