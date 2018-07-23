<?php

namespace fondo;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
   protected $table='tsalarios';

   protected $primaryKey='idtiposalario';

   public $timestamps=true;

   protected $fillable =[
   	'tiposalario',
   	'descrip'
   	
   ];

   protected $guarded =[];
}
