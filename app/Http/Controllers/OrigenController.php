<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Origen;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\OrigenFormRequest;
use DB;

class OrigenController extends Controller
{
     public function __construct()
   	{

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$origenes=DB::table('origenfondos')->where('origendefondos','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idorigenfondos','desc')
   			->Paginate(10);

   			return view('fondo.origen.index',["origenes"=>$origenes,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.origen.create");
   	}

   	public function store(OrigenFormRequest $request)
   	{
   		
   		$origenes=new Origen;
   		$origenes->origendefondos=$request->get('origendefondos');
   		$origenes->descrip=$request->get('descrip');
   		$origenes->logicdel='1';
   		$origenes->save();
   		return Redirect::to('fondo/origen');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.origen.show",["origenes"=>Origen::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.origen.edit",["origenes"=>Origen::findOrFail($id)]);
   	}

   	public function update(OrigenFormRequest $request, $id)
   	{
   		
   		
         $origenes=Origen::findOrFail($id);
   		$origenes->origendefondos=$request->get('origendefondos');
   		$origenes->descrip=$request->get('descrip');
   		$origenes->update();
   		return Redirect::to('fondo/origen');
   	}

   	public function destroy($id)
   	{
   		
   		$origenes=Origen::findOrFail($id);
   		$origenes->logicdel='0';
   		$origenes->update();
   		return Redirect::to('fondo/origen');
   	}
}
