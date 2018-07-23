<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Usuario;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
     public function __construct()
   	{

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$usuarios=DB::table('usuarios as u')
   			->join('TiposUsers as tu','u.idtipos_user','=','tu.idtipos_user')
   			->join('estados as es','u.idestados','=','es.idestados')

   			->select('u.cedula','tu.tipos_usuarios','es.estado','u.direccion','u.telefono','u.celular','u.barrio','u.email','u.fechaingreso','u.fechanaci','u.salario','u.porcentaje_ahorro')
   			//incompleto, porque faltan los cambios en la BD y algunas tablas y campos 

   			->where('u.cedula','LIKE','%'.$query.'%')
            ->orwhere('u.email','LIKE','%'.$query.'%')
   			->orderby('m.idmodulo','asc')
            ->orderby('l.orden','asc')
   			->Paginate(5);

   			return view('fondo.etiqueta.index',["etiquetas"=>$etiquetas,"searchText"=>$query]);

   		}
   	}
}
