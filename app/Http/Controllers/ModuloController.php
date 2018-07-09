<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Modulo;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\ModuloFormRequest;
use DB;


class ModuloController extends Controller
{
    public function __construct()
   	{

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$modulos=DB::table('modulos')->where('modulo','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idmodulo','desc')
   			->Paginate(5);

   			return view('fondo.modulo.index',["modulos"=>$modulos,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.modulo.create");
   	}

   	public function store(ModuloFormRequest $request)
   	{
   		
   		$modulos=new Modulo;
   		$modulos->modulo=$request->get('modulo');
   		$modulos->descrip=$request->get('descrip');
   		$modulos->logicdel='1';
   		$modulos->save();
   		return Redirect::to('fondo/modulo');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.modulo.show",["modulos"=>Modulo::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.modulo.edit",["modulos"=>Modulo::findOrFail($id)]);
   	}

   	public function update(ModuloFormRequest $request, $id)
   	{
   		
   		$modulos=Modulo::findOrFail($id);
   		$modulos->modulo=$request->get('modulo');
   		$modulos->descrip=$request->get('descrip');
   		$modulos->update();
   		return Redirect::to('fondo/modulo');
   	}

   	public function destroy($id)
   	{
   		
   		$modulos=Modulo::findOrFail($id);
   		$modulos->logicdel='0';
   		$modulos->update();
   		return Redirect::to('fondo/modulo');
   	}
}
