@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Profesiones   <a href="profesion/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.profesion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!-- encabezados de columna -->
					<th>Id</th>  
					<th>Profesión</th>
					<th>Descripción</th>
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($profesiones as $cat)
				<tr>
					<td>{{ $cat->idprofesiones}}</td>
					<td>{{ $cat->profesion}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('ProfesionController@edit',$cat->idprofesiones)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idprofesiones}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.profesion.modal')
				@endforeach
			</table>
		</div>
		{{$profesiones->render()}}
		
	</div>
</div>
@endsection