<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
   protected $table='jlaboral';

   protected $primaryKey='idjornadalaboral';

   public $timestamps=true;

   protected $fillable =[
   	'jornada',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
