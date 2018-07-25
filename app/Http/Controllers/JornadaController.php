<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Jornada;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\JornadaFormRequest;
use DB;

class JornadaController extends Controller
{
   
     public function __construct()
   	{
          $this->middleware('auth');

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$jornadas=DB::table('jlaboral')->where('jornada','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idjornadalaboral','desc')
   			->Paginate(10);

   			return view('fondo.jornada.index',["jornadas"=>$jornadas,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.jornada.create");
   	}

   	public function store(JornadaFormRequest $request)
   	{
   		
   		$jornadas=new Jornada;
   		$jornadas->jornada=$request->get('jornada');
   		$jornadas->descrip=$request->get('descrip');
   		$jornadas->logicdel='1';
   		$jornadas->save();
   		return Redirect::to('fondo/jornada');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.jornada.show",["jornadas"=>Jornada::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.jornada.edit",["jornadas"=>Jornada::findOrFail($id)]);
   	}

   	public function update(JornadaFormRequest $request, $id)
   	{
   		
   		$jornadas=Jornada::findOrFail($id);
   		$jornadas->jornada=$request->get('jornada');
   		$jornadas->descrip=$request->get('descrip');
   		$jornadas->update();
   		return Redirect::to('fondo/jornada');
   	}

   	public function destroy($id)
   	{
   		
   		$jornadas=Jornada::findOrFail($id);
   		$jornadas->logicdel='0';
   		$jornadas->update();
   		return Redirect::to('fondo/jornada');
   	}
}
