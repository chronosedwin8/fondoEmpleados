@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Origenes de fondos   <a href="origen/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.origen.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!-- encabezados de columna -->
					<th>Id</th>  
					<th>Origenes de fondos</th>
					<th>Descripción</th>
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($origenes as $cat)
				<tr>
					<td>{{ $cat->idorigenfondos}}</td>
					<td>{{ $cat->origendefondos}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('OrigenController@edit',$cat->idorigenfondos)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idorigenfondos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.origen.modal')
				@endforeach
			</table>
		</div>
		{{$origenes->render()}}
		
	</div>
</div>
@endsection