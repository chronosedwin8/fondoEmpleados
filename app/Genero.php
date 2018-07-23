<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
   protected $table='generos';

   protected $primaryKey='idgeneros';

   public $timestamps=true;

   protected $fillable =[
   	'genero',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
