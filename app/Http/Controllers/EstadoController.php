<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Estado;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\EstadoFormRequest;
use DB;


class EstadoController extends Controller
{
     public function __construct()
   	{
          $this->middleware('auth');

   	}

   	public function index(Request $request)
   	{

         $labels=DB::table('etiquetas')->where('logicdel','=','1')->where('idmodulo','=','2')->orderby('orden','asc')->get();

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$estados=DB::table('estados')->where('estado','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idestados','desc')
   			->Paginate(5);

   			return view('fondo.estado.index',["estados"=>$estados,"labels"=>$labels,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.estado.create");
   	}

   	public function store(EstadoFormRequest $request)
   	{
   		
   		$estados=new Estado;
   		$estados->estado=$request->get('estado');
   		$estados->descrip=$request->get('descrip');
   		$estados->logicdel='1';
   		$estados->save();
   		return Redirect::to('fondo/estado');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.estado.show",["estados"=>Estado::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.estado.edit",["estados"=>Estado::findOrFail($id)]);
   	}

   	public function update(EstadoFormRequest $request, $id)
   	{
   		
   		$estados=Estado::findOrFail($id);
   		$estados->estado=$request->get('estado');
   		$estados->descrip=$request->get('descrip');
   		$estados->update();
   		return Redirect::to('fondo/estado');
   	}

   	public function destroy($id)
   	{
   		
   		$estados=Estado::findOrFail($id);
   		$estados->logicdel='0';
   		$estados->update();
   		return Redirect::to('fondo/estado');
   	}
}
