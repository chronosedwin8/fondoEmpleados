<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Contrato;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\ContratoFormRequest;
use DB;

class ContratoController extends Controller
{
    public function __construct()
   	{

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$contratos=DB::table('tcontratos')->where('tipocontrato','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idtipocontrato','desc')
   			->Paginate(10);

   			return view('fondo.contrato.index',["contratos"=>$contratos,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.contrato.create");
   	}

   	public function store(ContratoFormRequest $request)
   	{
   		
   		$contratos=new Contrato;
   		$contratos->tipocontrato=$request->get('tipocontrato');
   		$contratos->descrip=$request->get('descrip');
   		$contratos->logicdel='1';
   		$contratos->save();
   		return Redirect::to('fondo/contrato');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.contrato.show",["contratos"=>Contrato::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.contrato.edit",["contratos"=>Contrato::findOrFail($id)]);
   	}

   	public function update(ContratoFormRequest $request, $id)
   	{
   		
   		$contratos=Contrato::findOrFail($id);
   		$contratos->tipocontrato=$request->get('tipocontrato');
   		$contratos->descrip=$request->get('descrip');
   		$contratos->update();
   		return Redirect::to('fondo/contrato');
   	}

   	public function destroy($id)
   	{
   		
   		$contratos=Contrato::findOrFail($id);
   		$contratos->logicdel='0';
   		$contratos->update();
   		return Redirect::to('fondo/contrato');
   	}
}
