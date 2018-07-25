<?php

namespace fondo\Http\Controllers;

use Illuminate\Http\Request;

use fondo\Usuario;
use Illuminate\Support\Facades\Redirect;
use fondo\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
     public function __construct()
   	{
          $this->middleware('auth');

   	}

   	public function index(Request $request)
   	{

   		if ($request) {
   			$query=trim($request->get('searchText'));
   			$usuarios=DB::table('usuarios as u')

                     /*relación de todas las tablas */

   			->join('TiposUsers as tu','u.idtipos_user','=','tu.idtipos_user')
   			->join('estados as es','u.idestados','=','es.idestados')
            ->join('profesiones as p','u.idprofesiones','=','p.idprofesiones')
            ->join('generos as g','u.idgeneros','=','g.idgeneros')
            ->join('tiposdecuentas as tc','u.idtipocuentauser','=','tc.idtiposdecuentas')
            ->join('jlaboral as jl','u.idjornadalabora','=','jl.idjornadalaboral')
            ->join('ecivil as ec','u.idestadocivil','=','ec.idestadocivil')
            ->join('tcontratos as tc','u.idtipocontrato','=','tc.idtipocontrato')
            ->join('tsalario as s','u.idtiposalario','=','s.idtiposalario')
            ->join('origenfondos as o','u.idorigenfondos','=','o.idorigenfondos')
            ->join('bancos as b','u.idbancouser','=','b.idbancos')

                  /*selección de los campos en la consulta*/


                  /*Evalauar la posiblidad de vista en pdf y xls ya que es dificil
                  mostrar todos los campos en una misma fila */

   			->select('u.cedula','u.nombre1','u.nombre2','u.apellido1','apellido2','tu.tipos_usuarios','es.estado','p.profesion','g.genero','tc.tipodecuenta','jl.jornada','ec.estadocivil','tc.tipocontrato','s.tiposalario','o.origendefondos','b.banco','u.nocuentauser','u.direccion','u.cod_postal','u.telefono','u.celular','u.barrio','u.email','u.fechaingreso','u.fechanaci','u.salario','u.porcentaje_ahorro')   			 

   			->where('u.cedula','LIKE','%'.$query.'%')
            ->orwhere('u.apellido1','LIKE','%'.$query.'%')
            ->orwhere('u.nombre1','LIKE','%'.$query.'%')
            ->orwhere('u.email','LIKE','%'.$query.'%')
   			->orderby('u.apellido1','asc') 
            ->orderby('es.idestados','desc')           
   			->Paginate(20);

   			return view('fondo.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);

   		}
   	}

      public function create()
      {
         $tusuarios=DB::table('TiposUsers')->where('logicdel','=','1')->orderby('tipos_usuarios','asc')->get();
         $estados=DB::table('estados')->where('logicdel','=','1')->orderby('estado','asc')->get();
         $profesiones=DB::table('profesiones')->where('logicdel','=','1')->orderby('profesion','asc')->get();
         $generos=DB::table('generos')->where('logicdel','=','1')->orderby('genero','asc')->get();
         $tcuentas=DB::table('tiposdecuentas')->where('logicdel','=','1')->orderby('tipodecuenta','asc')->get();
         $jlaboral=DB::table('jlaboral')->where('logicdel','=','1')->orderby('jornada','asc')->get();
         $ecivil=DB::table('ecivil')->where('logicdel','=','1')->orderby('estadocivil','asc')->get();
         $tcontratos=DB::table('tcontratos')->where('logicdel','=','1')->orderby('tipocontrato','asc')->get();
         $salarios=DB::table('tsalarios')->where('logicdel','=','1')->orderby('tiposalario','asc')->get();
         $origenes=DB::table('origenfondos')->where('logicdel','=','1')->orderby('origendefondos','asc')->get();
         $bancos=DB::table('bancos')->where('logicdel','=','1')->orderby('banco','asc')->get();


         return view("fondo.usuario.create",["tusuarios"=>$tusuarios,"estados"=>$estados,"profesiones"=>$profesiones,"generos"=>$generos,"tcuentas"=>$tcuentas,"jlaboral"=>$jlaboral,"ecivil"=>$ecivil,"tcontratos"=>$tcontratos,"salarios"=>$salarios,"origenes"=>$origenes,"bancos"=>$bancos]);
      }
     

      public function store(UsuarioFormRequest $request)
      {
         
         $usuarios=new Usuario;
         $usuarios->apellido1 =$request->get('apellido1 ');
         $usuarios->apellido2 =$request->get('apellido2 ');
         $usuarios->barrio =$request->get('barrio ');
         $usuarios->cedulaPrimaria =$request->get('cedulaPrimaria ');
         $usuarios->celular =$request->get('celular ');
         $usuarios->cod_postal =$request->get('cod_postal ');
         $usuarios->direccion =$request->get('direccion ');
         $usuarios->email =$request->get('email ');
         $usuarios->fechaingreso =$request->get('fechaingreso ');
         $usuarios->fechanaci =$request->get('fechanaci ');
         $usuarios->idbancouser=$request->get('idbancouser');
         $usuarios->idestadocivil=$request->get('idestadocivil');
         $usuarios->idestados=$request->get('idestados');
         $usuarios->idgeneros=$request->get('idgeneros');
         $usuarios->idjornadalabora=$request->get('idjornadalabora');
         $usuarios->idorigenfondos=$request->get('idorigenfondos');
         $usuarios->idprofesiones=$request->get('idprofesiones');
         $usuarios->idtipocontrato=$request->get('idtipocontrato');
         $usuarios->idtipocuentauser=$request->get('idtipocuentauser');
         $usuarios->idtipos_user=$request->get('idtipos_user');
         $usuarios->idtiposalario=$request->get('idtiposalario');
         $usuarios->nocuentauser =$request->get('nocuentauser ');
         $usuarios->nombre1 =$request->get('nombre1 ');
         $usuarios->nombre2 =$request->get('nombre2 ');
         $usuarios->porcentaje_ahorro =$request->get('porcentaje_ahorro ');
         $usuarios->salario =$request->get('salario ');
         $usuarios->telefono =$request->get('telefono ');        
         /*$usuarios->logicdel='1';*/
         $usuarios->save();
         return Redirect::to('fondo/usuario');
      }

      public function show($id)
      {   
         /*revisar como mostrar esto*/      
         return view("fondo.usuario.show",["usuarios"=>Usuario::findOrFail($id)]);
      }

      public function edit($id)
      {
         $usuarios=Usuario::findOrFail($id);
         $tusuarios=DB::table('TiposUsers')->where('logicdel','=','1')->orderby('tipos_usuarios','asc')->get();
         $estados=DB::table('estados')->where('logicdel','=','1')->orderby('estado','asc')->get();
         $profesiones=DB::table('profesiones')->where('logicdel','=','1')->orderby('profesion','asc')->get();
         $generos=DB::table('generos')->where('logicdel','=','1')->orderby('genero','asc')->get();
         $tcuentas=DB::table('tiposdecuentas')->where('logicdel','=','1')->orderby('tipodecuenta','asc')->get();
         $jlaboral=DB::table('jlaboral')->where('logicdel','=','1')->orderby('jornada','asc')->get();
         $ecivil=DB::table('ecivil')->where('logicdel','=','1')->orderby('estadocivil','asc')->get();
         $tcontratos=DB::table('tcontratos')->where('logicdel','=','1')->orderby('tipocontrato','asc')->get();
         $salarios=DB::table('tsalarios')->where('logicdel','=','1')->orderby('tiposalario','asc')->get();
         $origenes=DB::table('origenfondos')->where('logicdel','=','1')->orderby('origendefondos','asc')->get();
         $bancos=DB::table('bancos')->where('logicdel','=','1')->orderby('banco','asc')->get();


         return view("fondo.usuario.edit",["tusuarios"=>$tusuarios,"estados"=>$estados,"profesiones"=>$profesiones,"generos"=>$generos,"tcuentas"=>$tcuentas,"jlaboral"=>$jlaboral,"ecivil"=>$ecivil,"tcontratos"=>$tcontratos,"salarios"=>$salarios,"origenes"=>$origenes,"bancos"=>$bancos]);
      }

      public function update(EtiquetaFormRequest $request, $id)
      {
         
         $usuarios=Usuario::findOrFail($id);
         $usuarios->apellido1 =$request->get('apellido1 ');
         $usuarios->apellido2 =$request->get('apellido2 ');
         $usuarios->barrio =$request->get('barrio ');
         $usuarios->cedulaPrimaria =$request->get('cedulaPrimaria ');
         $usuarios->celular =$request->get('celular ');
         $usuarios->cod_postal =$request->get('cod_postal ');
         $usuarios->direccion =$request->get('direccion ');
         $usuarios->email =$request->get('email ');
         $usuarios->fechaingreso =$request->get('fechaingreso ');
         $usuarios->fechanaci =$request->get('fechanaci ');
         $usuarios->idbancouser=$request->get('idbancouser');
         $usuarios->idestadocivil=$request->get('idestadocivil');
         $usuarios->idestados=$request->get('idestados');
         $usuarios->idgeneros=$request->get('idgeneros');
         $usuarios->idjornadalabora=$request->get('idjornadalabora');
         $usuarios->idorigenfondos=$request->get('idorigenfondos');
         $usuarios->idprofesiones=$request->get('idprofesiones');
         $usuarios->idtipocontrato=$request->get('idtipocontrato');
         $usuarios->idtipocuentauser=$request->get('idtipocuentauser');
         $usuarios->idtipos_user=$request->get('idtipos_user');
         $usuarios->idtiposalario=$request->get('idtiposalario');
         $usuarios->nocuentauser =$request->get('nocuentauser ');
         $usuarios->nombre1 =$request->get('nombre1 ');
         $usuarios->nombre2 =$request->get('nombre2 ');
         $usuarios->porcentaje_ahorro =$request->get('porcentaje_ahorro ');
         $usuarios->salario =$request->get('salario ');
         $usuarios->telefono =$request->get('telefono ');
         $usuarios->update();
         return Redirect::to('fondo/usuario');
      }

      public function destroy($id)
      {
         /*Aqui solo cambiamos el estado a 2 para que quede inactivo*/
         $usuarios=Usuario::findOrFail($id);
         /*tener en cuenta que el valor de inactivo debe ser 2 en la tabla estados*/
         $usuarios->idestados='2'; 
         $usuarios->update();
         return Redirect::to('fondo/usuario');
      }



}
