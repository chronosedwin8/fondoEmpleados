<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Civil extends Model
{
   protected $table='ecivil';

   protected $primaryKey='idestadocivil';

   public $timestamps=true;
   

   protected $fillable =[
   	'estadocivil',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
