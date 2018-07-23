<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\TUsuario;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\TUsuarioFormRequest;
use DB;


class TUsuarioController extends Controller
{
    public function __construct()
   	{

   	}

   	public function index(Request $request)
   	{

         $labels=DB::table('etiquetas')->where('logicdel','=','1')->where('idmodulo','=','4')->orderby('orden','asc')->get();

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$tusuario=DB::table('TiposUsers')->where('tipos_usuarios','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idtipos_user','desc')
   			->Paginate(5);

   			return view('fondo.tusuario.index',["tusuario"=>$tusuario,"labels"=>$labels,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.tusuario.create");
   	}

   	public function store(TUsuarioFormRequest $request)
   	{
   		
   		$tusuario=new TUsuario;
   		$tusuario->tipos_usuarios=$request->get('tipos_usuarios');
   		$tusuario->descrip=$request->get('descrip');
   		$tusuario->logicdel='1';
   		$tusuario->save();
   		return Redirect::to('fondo/tusuario');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.tusuario.show",["tusuario"=>TUsuario::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.tusuario.edit",["tusuario"=>TUsuario::findOrFail($id)]);
   	}

   	public function update(TUsuarioFormRequest $request, $id)
   	{
   		
   		$tusuario=TUsuario::findOrFail($id);
   		$tusuario->tipos_usuarios=$request->get('tipos_usuarios');
   		$tusuario->descrip=$request->get('descrip');
   		$tusuario->update();
   		return Redirect::to('fondo/tusuario');
   	}

   	public function destroy($id)
   	{
   		
   		$tusuario=TUsuario::findOrFail($id);
   		$tusuario->logicdel='0';
   		$tusuario->update();
   		return Redirect::to('fondo/tusuario');
   	}
}
