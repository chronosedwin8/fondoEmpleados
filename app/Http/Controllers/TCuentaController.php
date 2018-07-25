<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\TCuenta;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\TCuentaFormRequest;
use DB;


class TCuentaController extends Controller
{
    public function __construct()
   	{
          $this->middleware('auth');

   	}

   	public function index(Request $request)
   	{

         $labels=DB::table('etiquetas')->where('logicdel','=','1')->where('idmodulo','=','8')->orderby('orden','asc')->get();

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$tcuentas=DB::table('tiposdecuentas')->where('tipodecuenta','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idtiposdecuentas','desc')
   			->Paginate(5);

   			return view('fondo.tcuenta.index',["tcuentas"=>$tcuentas,"labels"=>$labels,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.tcuenta.create");
   	}

   	public function store(TCuentaFormRequest $request)
   	{
   		
   		$tcuentas=new TCuenta;
   		$tcuentas->tipodecuenta=$request->get('tipodecuenta');
   		$tcuentas->descrip=$request->get('descrip');
   		$tcuentas->logicdel='1';
   		$tcuentas->save();
   		return Redirect::to('fondo/tcuenta');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.tcuenta.show",["tcuentas"=>TCuenta::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.tcuenta.edit",["tcuentas"=>TCuenta::findOrFail($id)]);
   	}

   	public function update(TCuentaFormRequest $request, $id)
   	{
   		
   		$tcuentas=TCuenta::findOrFail($id);
   		$tcuentas->tipodecuenta=$request->get('tipodecuenta');
   		$tcuentas->descrip=$request->get('descrip');
   		$tcuentas->update();
   		return Redirect::to('fondo/tcuenta');
   	}

   	public function destroy($id)
   	{
   		
   		$tcuentas=TCuenta::findOrFail($id);
   		$tcuentas->logicdel='0';
   		$tcuentas->update();
   		return Redirect::to('fondo/tcuenta');
   	}
}
