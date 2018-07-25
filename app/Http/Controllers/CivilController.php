<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Civil;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\CivilFormRequest;
use DB;

class CivilController extends Controller
{
     public function __construct()
   	{
          $this->middleware('auth');

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$civiles=DB::table('ecivil')->where('estadocivil','LIKE','%'.$query.'%')
   			->where('logicdel','=','1')
   			->orderby('idestadocivil','desc')
   			->Paginate(5);

   			return view('fondo.civil.index',["civiles"=>$civiles,"searchText"=>$query]);

   		}
   	}

   	public function create()
   	{
   		
   		return view("fondo.civil.create");
   	}

   	public function store(CivilFormRequest $request)
   	{
   		
   		$civiles=new Civil;
   		$civiles->estadocivil=$request->get('estadocivil');
   		$civiles->descrip=$request->get('descrip');
   		$civiles->logicdel='1';
   		$civiles->save();
   		return Redirect::to('fondo/civil');
   	}

   	public function show($id)
   	{
   		
   		return view("fondo.civil.show",["civiles"=>Civil::findOrFail($id)]);
   	}

   	public function edit($id)
   	{
   		
   		return view("fondo.civil.edit",["civiles"=>Civil::findOrFail($id)]);
   	}

   	public function update(CivilFormRequest $request, $id)
   	{
   		
   		$civiles=Civil::findOrFail($id);
   		$civiles->estadocivil=$request->get('estadocivil');
   		$civiles->descrip=$request->get('descrip');
   		$civiles->update();
   		return Redirect::to('fondo/civil');
   	}

   	public function destroy($id)
   	{
   		
   		$civiles=Civil::findOrFail($id);
   		$civiles->logicdel='0';
   		$civiles->update();
   		return Redirect::to('fondo/civil');
   	}
}
