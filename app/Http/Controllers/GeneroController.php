<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Genero;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\GeneroFormRequest;
use DB;

class GeneroController extends Controller
{
     public function __construct()
   	{
          $this->middleware('auth');

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$generos=DB::table('generos')->where('genero','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idgeneros','desc')
   			->Paginate(5);

   			return view('fondo.genero.index',["generos"=>$generos,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.genero.create");
   	}

   	public function store(GeneroFormRequest $request)
   	{
   		
   		$generos=new Genero;
   		$generos->genero=$request->get('genero');
   		$generos->descrip=$request->get('descrip');
   		$generos->logicdel='1';
   		$generos->save();
   		return Redirect::to('fondo/genero');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.genero.show",["generos"=>Genero::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.genero.edit",["generos"=>Genero::findOrFail($id)]);
   	}

   	public function update(GeneroFormRequest $request, $id)
   	{
   		
   		$generos=Genero::findOrFail($id);
   		$generos->genero=$request->get('genero');
   		$generos->descrip=$request->get('descrip');
   		$generos->update();
   		return Redirect::to('fondo/genero');
   	}

   	public function destroy($id)
   	{
   		
   		$generos=Genero::findOrFail($id);
   		$generos->logicdel='0';
   		$generos->update();
   		return Redirect::to('fondo/genero');
   	}
}
