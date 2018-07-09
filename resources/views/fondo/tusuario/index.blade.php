@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Tipos de Usuarios <a href="tusuario/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.tusuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!-- encabezados de columna -->
					<th>Id</th>  
					<th>Tipo de Usuario</th>
					<th>Descripción</th>
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($tusuario as $cat)
				<tr>
					<td>{{ $cat->idtipos_user}}</td>
					<td>{{ $cat->tipos_usuarios}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('TUsuarioController@edit',$cat->idtipos_user)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idtipos_user}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.tusuario.modal')
				@endforeach
			</table>
		</div>
		{{$tusuario->render()}}
		
	</div>
</div>
@endsection