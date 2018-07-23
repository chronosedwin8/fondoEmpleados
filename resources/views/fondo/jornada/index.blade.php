@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Jornadas Laborales   <a href="jornada/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.jornada.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!-- encabezados de columna -->
					<th>Id</th>  
					<th>Jornada</th>
					<th>Descripción</th>
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($jornadas as $cat)
				<tr>
					<td>{{ $cat->idjornadalaboral}}</td>
					<td>{{ $cat->jornada}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('JornadaController@edit',$cat->idjornadalaboral)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idjornadalaboral}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.jornada.modal')
				@endforeach
			</table>
		</div>
		{{$jornadas->render()}}
		
	</div>
</div>
@endsection