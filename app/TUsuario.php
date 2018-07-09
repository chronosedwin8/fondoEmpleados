<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class TUsuario extends Model
{
    protected $table='TiposUsers';

   protected $primaryKey='idtipos_user';

   public $timestamps=true;

   protected $fillable =[
   	'tipos_usuarios',
   	'descrip'
   	   	
   ];

   protected $guarded =[];
}
