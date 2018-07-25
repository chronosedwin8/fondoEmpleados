<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Etiqueta;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\EtiquetaFormRequest;
use DB;

class EtiquetaController extends Controller
{
    public function __construct()
   	{
          $this->middleware('auth');

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$etiquetas=DB::table('etiquetas as l')
   			->join('modulos as m','l.idmodulo','=','m.idmodulo')
   			->select('l.idetiqueta','m.modulo','l.etiqueta','l.orden','l.descrip')
   			->where('l.etiqueta','LIKE','%'.$query.'%')
            ->orwhere('m.modulo','LIKE','%'.$query.'%')
   			->orderby('m.idmodulo','asc')
            ->orderby('l.orden','asc')
   			->Paginate(5);

   			return view('fondo.etiqueta.index',["etiquetas"=>$etiquetas,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		$modulos=DB::table('modulos')->where('logicdel','=','1')->orderby('modulo','asc')->get();
   		return view("fondo.etiqueta.create",["modulos"=>$modulos]);
   	}

   	public function store(EtiquetaFormRequest $request)
   	{
   		
   		$etiquetas=new Etiqueta;
   		$etiquetas->idmodulo=$request->get('idmodulo');
   		$etiquetas->etiqueta=$request->get('etiqueta');
   		$etiquetas->orden=$request->get('orden');
   		$etiquetas->descrip=$request->get('descrip');
   		$etiquetas->logicdel='1';
   		$etiquetas->save();
   		return Redirect::to('fondo/etiqueta');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.etiqueta.show",["etiquetas"=>Etiqueta::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		$etiquetas=Etiqueta::findOrFail($id);
   		$modulos=DB::table('modulos')->where('logicdel','=','1')->get();
   		return view("fondo.etiqueta.edit",["etiquetas"=>$etiquetas,"modulos"=>$modulos]);
   	}

   	public function update(EtiquetaFormRequest $request, $id)
   	{
   		
   		$etiquetas=Etiqueta::findOrFail($id);
   		$etiquetas->idmodulo=$request->get('idmodulo');
   		$etiquetas->etiqueta=$request->get('etiqueta');
   		$etiquetas->orden=$request->get('orden');
   		$etiquetas->descrip=$request->get('descrip');
   		$etiquetas->update();
   		return Redirect::to('fondo/etiqueta');
   	}

   	public function destroy($id)
   	{
   		
   		$etiquetas=Etiqueta::findOrFail($id);
   		$etiquetas->logicdel='0';
   		$etiquetas->update();
   		return Redirect::to('fondo/etiqueta');
   	}
}
