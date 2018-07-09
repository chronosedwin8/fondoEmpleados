<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Meses extends Model
{
   protected $table='meses';

   protected $primaryKey='idmeses';

   public $timestamps=true;

   protected $fillable =[
   	'mes',
   	'mescontracion',
   	'descripcion'
   ];

   protected $guarded =[];

}
