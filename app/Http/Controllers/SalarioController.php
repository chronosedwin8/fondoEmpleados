<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Salario;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\SalarioFormRequest;
use DB;

class SalarioController extends Controller
{
     public function __construct()
   	{

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$salarios=DB::table('tsalarios')->where('tiposalario','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idtiposalario','desc')
   			->Paginate(10);

   			return view('fondo.salario.index',["salarios"=>$salarios,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.salario.create");
   	}

   	public function store(SalarioFormRequest $request)
   	{
   		
   		$salarios=new Salario;
   		$salarios->tiposalario=$request->get('tiposalario');
   		$salarios->descrip=$request->get('descrip');
   		$salarios->logicdel='1';
   		$salarios->save();
   		return Redirect::to('fondo/salario');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.salario.show",["salarios"=>Salario::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.salario.edit",["salarios"=>Salario::findOrFail($id)]);
   	}

   	public function update(SalarioFormRequest $request, $id)
   	{
   		
   		$salarios=Salario::findOrFail($id);
   		$salarios->tiposalario=$request->get('tiposalario');
   		$salarios->descrip=$request->get('descrip');
   		$salarios->update();
   		return Redirect::to('fondo/salario');
   	}

   	public function destroy($id)
   	{
   		
   		$salarios=Salario::findOrFail($id);
   		$salarios->logicdel='0';
   		$salarios->update();
   		return Redirect::to('fondo/salario');
   	}
}
