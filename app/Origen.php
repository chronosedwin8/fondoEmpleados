<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Origen extends Model
{
   protected $table='origenfondos';

   protected $primaryKey='idorigenfondos';

   public $timestamps=true;

   protected $fillable =[
   	'origendefondos',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
