<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Profesion;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\ProfesionFormRequest;
use DB;

class ProfesionController extends Controller
{
      public function __construct()
   	{

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$profesiones=DB::table('profesiones')->where('profesion','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idprofesiones','desc')
   			->Paginate(10);

   			return view('fondo.profesion.index',["profesiones"=>$profesiones,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.profesion.create");
   	}

   	public function store(ProfesionFormRequest $request)
   	{
   		
   		$profesiones=new Profesion;
   		$profesiones->profesion=$request->get('profesion');
   		$profesiones->descrip=$request->get('descrip');
   		$profesiones->logicdel='1';
   		$profesiones->save();
   		return Redirect::to('fondo/profesion');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.profesion.show",["profesiones"=>Profesion::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.profesion.edit",["profesiones"=>Profesion::findOrFail($id)]);
   	}

   	public function update(ProfesionFormRequest $request, $id)
   	{
   		
   		$profesiones=Profesion::findOrFail($id);
   		$profesiones->profesion=$request->get('profesion');
   		$profesiones->descrip=$request->get('descrip');
   		$profesiones->update();
   		return Redirect::to('fondo/profesion');
   	}

   	public function destroy($id)
   	{
   		
   		$profesiones=Profesion::findOrFail($id);
   		$profesiones->logicdel='0';
   		$profesiones->update();
   		return Redirect::to('fondo/profesion');
   	}
}
