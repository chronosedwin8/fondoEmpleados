@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Etiquetas de los campos en los modulos <a href="etiqueta/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.etiqueta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!-- encabezados de columna -->
					<th>Id</th>  
					<th>Modulo</th>
					<th>Etiqueta</th>
					<th>Orden</th>
					<th>Descripción</th>
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($etiquetas as $cat)
				<tr>
					<td>{{ $cat->idetiqueta}}</td>
					<td>{{ $cat->modulo}}</td>
					<td>{{ $cat->etiqueta}}</td>
					<td>{{ $cat->orden}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('EtiquetaController@edit',$cat->idetiqueta)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idetiqueta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.etiqueta.modal')
				@endforeach
			</table>
		</div>
		{{$etiquetas->render()}}
		
	</div>
</div>
@endsection