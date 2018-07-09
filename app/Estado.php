<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
   protected $table='estados';

   protected $primaryKey='idestados';

   public $timestamps=true;

   protected $fillable =[
   	'estado',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
