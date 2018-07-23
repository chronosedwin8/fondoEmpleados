<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
   protected $table='cuentas_banca';

   protected $primaryKey='idcuentas_banca';

   public $timestamps=true;

   protected $fillable =[
   	'idbancos',
   	'no_cuenta',
      'idtiposdecuentas',
   	'nom_titular',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
