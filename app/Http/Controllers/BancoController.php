<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Banco;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\BancoFormRequest;
use DB;

class BancoController extends Controller
{
    public function __construct()
   	{

   	}

   	public function index(Request $request)
   	{
         $labels=DB::table('etiquetas')->where('logicdel','=','1')->where('idmodulo','=','6')->orderby('orden','asc')->get();

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$bancos=DB::table('bancos')->where('banco','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idbancos','desc')
   			->Paginate(5);

   			return view('fondo.banco.index',["bancos"=>$bancos,"labels"=>$labels,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.banco.create");
   	}

   	public function store(BancoFormRequest $request)
   	{
   		
   		$bancos=new Banco;
   		$bancos->banco=$request->get('banco');
   		$bancos->descrip=$request->get('descrip');
   		$bancos->logicdel='1';
   		$bancos->save();
   		return Redirect::to('fondo/banco');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.banco.show",["bancos"=>Banco::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.banco.edit",["bancos"=>Banco::findOrFail($id)]);
   	}

   	public function update(BancoFormRequest $request, $id)
   	{
   		
   		$bancos=Banco::findOrFail($id);
   		$bancos->banco=$request->get('banco');
   		$bancos->descrip=$request->get('descrip');
   		$bancos->update();
   		return Redirect::to('fondo/banco');
   	}

   	public function destroy($id)
   	{
   		
   		$bancos=Banco::findOrFail($id);
   		$bancos->logicdel='0';
   		$bancos->update();
   		return Redirect::to('fondo/banco');
   	}
}
