<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
   protected $table='profesiones';

   protected $primaryKey='idprofesiones';

   public $timestamps=true;
   

   protected $fillable =[
   	'profesion',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
