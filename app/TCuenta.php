<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class TCuenta extends Model
{
   protected $table='tiposdecuentas';

   protected $primaryKey='idtiposdecuentas';

   public $timestamps=true;

   protected $fillable =[
   	'tipodecuenta',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
