<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Cuenta;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\CuentaFormRequest;
use DB;

class CuentaController extends Controller
{
     public function __construct()
   	{
          $this->middleware('auth');

   	}

   	public function index(Request $request)
   	{

   		$labels=DB::table('etiquetas')->where('logicdel','=','1')->where('idmodulo','=','7')->orderby('orden','asc')->get();

         if ($request) {
   			$query=trim($request->get('searchText'));
   			$cuentas=DB::table('cuentas_banca as c')
   			->join('bancos as b','c.idbancos','=','b.idbancos')
            ->join('tiposdecuentas as tc','c.idtiposdecuentas','=','tc.idtiposdecuentas')
   			->select('c.idcuentas_banca','c.no_cuenta','b.banco','tc.tipodecuenta','c.nom_titular','c.descrip')
   			->where('c.no_cuenta','LIKE','%'.$query.'%')
            ->orwhere('b.banco','LIKE','%'.$query.'%')
   			->orderby('b.banco','asc')
            ->orderby('c.no_cuenta','asc')
   			->Paginate(5);

   			return view('fondo.cuenta.index',["cuentas"=>$cuentas,"labels"=>$labels,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		$bancos=DB::table('bancos')->where('logicdel','=','1')->orderby('banco','asc')->get();
         $tcuentas=DB::table('tiposdecuentas')->where('logicdel','=','1')->orderby('idtiposdecuentas','asc')->get();
   		return view("fondo.cuenta.create",["bancos"=>$bancos,"tcuentas"=>$tcuentas]);
   	}

   	public function store(CuentaFormRequest $request)
   	{
   		
   		$cuentas=new Cuenta;
   		$cuentas->idbancos=$request->get('idbancos');
         $cuentas->idtiposdecuentas=$request->get('idtiposdecuentas');
   		$cuentas->no_cuenta=$request->get('no_cuenta');
   		$cuentas->nom_titular=$request->get('nom_titular');
   		$cuentas->descrip=$request->get('descrip');
   		$cuentas->logicdel='1';
   		$cuentas->save();
   		return Redirect::to('fondo/cuenta');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.cuenta.show",["cuentas"=>Cuenta::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		$cuentas=Cuenta::findOrFail($id);
   		$bancos=DB::table('bancos')->where('logicdel','=','1')->get();
         $tcuentas=DB::table('tiposdecuentas')->where('logicdel','=','1')->get();
   		return view("fondo.cuenta.edit",["cuentas"=>$cuentas,"bancos"=>$bancos,"tcuentas"=>$tcuentas]);
   	}

   	public function update(CuentaFormRequest $request, $id)
   	{
   		
   		$cuentas=Cuenta::findOrFail($id);
   		$cuentas->idbancos=$request->get('idbancos');
         $cuentas->idtiposdecuentas=$request->get('idtiposdecuentas');
   		$cuentas->no_cuenta=$request->get('no_cuenta');
   		$cuentas->nom_titular=$request->get('nom_titular');
   		$cuentas->descrip=$request->get('descrip');
   		$cuentas->update();
   		return Redirect::to('fondo/cuenta');
   	}

   	public function destroy($id)
   	{
   		
   		$cuentas=Cuenta::findOrFail($id);
   		$cuentas->logicdel='0';
   		$cuentas->update();
   		return Redirect::to('fondo/cuenta');
   	}
}
