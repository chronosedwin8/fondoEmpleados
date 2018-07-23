@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Generos   <a href="genero/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.genero.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!-- encabezados de columna -->
					<th>Id</th>  
					<th>Genero</th>
					<th>Descripción</th>
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($generos as $cat)
				<tr>
					<td>{{ $cat->idgeneros}}</td>
					<td>{{ $cat->genero}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('GeneroController@edit',$cat->idgeneros)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idgeneros}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.genero.modal')
				@endforeach
			</table>
		</div>
		{{$generos->render()}}
		
	</div>
</div>
@endsection