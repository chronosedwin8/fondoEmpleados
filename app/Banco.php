<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
   protected $table='bancos';

   protected $primaryKey='idbancos';

   public $timestamps=true;

   protected $fillable =[
   	'banco',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
