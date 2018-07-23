<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Meses;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\MesesFormRequest;
use DB;


class MesesController extends Controller
{
    public function __construct()
   	{

   	}

   	public function index(Request $request)
   	{

   		$labels=DB::table('etiquetas')->where('logicdel','=','1')->where('idmodulo','=','1')->orderby('orden','asc')->get();

         if ($request) {
   			$query=trim($request->get('searchText'));
   			$meses=DB::table('meses')->where('mes','LIKE','%'.$query.'%')
   			->where('estado','=','1')
   			->orderby('idmeses','desc')
   			->Paginate(5);

   			return view('fondo.mes.index',["meses"=>$meses,"labels"=>$labels,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.mes.create");
   	}

   	public function store(MesesFormRequest $request)
   	{
   		
   		$meses=new Meses;
   		$meses->mes=$request->get('mes');
   		$meses->mescontracion=$request->get('mescontracion');
   		$meses->descripcion=$request->get('descripcion');
   		$meses->estado='1';
   		$meses->save();
   		return Redirect::to('fondo/mes');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.mes.show",["meses"=>Meses::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.mes.edit",["meses"=>Meses::findOrFail($id)]);
   	}

   	public function update(MesesFormRequest $request, $id)
   	{
   		
   		$meses=Meses::findOrFail($id);
   		$meses->mes=$request->get('mes');
   		$meses->mescontracion=$request->get('mescontracion');
   		$meses->descripcion=$request->get('descripcion');
   		$meses->update();
   		return Redirect::to('fondo/mes');
   	}

   	public function destroy($id)
   	{
   		
   		$meses=Meses::findOrFail($id);
   		$meses->estado='0';
   		$meses->update();
   		return Redirect::to('fondo/mes');
   	}
}
