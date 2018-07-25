<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\TCredito;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\TCreditoFormRequest;
use DB;

class TCreditoController extends Controller
{
    public function __construct()
   	{
          $this->middleware('auth');

   	}

   	public function index(Request $request)
   	{
         $labels=DB::table('etiquetas')->where('logicdel','=','1')->where('idmodulo','=','3')->orderby('orden','asc')->get();

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$creditos=DB::table('tipos_de_creditos')->where('tipoCredito','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idtipos_de_creditos','desc')
   			->Paginate(5);

   			return view('fondo.tcredito.index',["creditos"=>$creditos,"labels"=>$labels,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.tcredito.create");
   	}

   	public function store(TCreditoFormRequest $request)
   	{
   		
   		$creditos=new TCredito;
   		$creditos->tipoCredito=$request->get('tipoCredito');
   		$creditos->porcentaje=$request->get('porcentaje');
         $creditos->descrip=$request->get('descrip');
   		$creditos->logicdel='1';
   		$creditos->save();
   		return Redirect::to('fondo/tcredito');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.tcredito.show",["creditos"=>TCredito::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.tcredito.edit",["creditos"=>TCredito::findOrFail($id)]);
   	}

   	public function update(TCreditoFormRequest $request, $id)
   	{
   		
   		$creditos=TCredito::findOrFail($id);
   		$creditos->tipoCredito=$request->get('tipoCredito');
         $creditos->porcentaje=$request->get('porcentaje');
   		$creditos->descrip=$request->get('descrip');
   		$creditos->update();
   		return Redirect::to('fondo/tcredito');
   	}

   	public function destroy($id)
   	{
   		
   		$creditos=TCredito::findOrFail($id);
   		$creditos->logicdel='0';
   		$creditos->update();
   		return Redirect::to('fondo/tcredito');
   	}
}
