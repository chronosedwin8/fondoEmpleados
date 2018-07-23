@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Contratos Laborales   <a href="contrato/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.contrato.search')
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
               @foreach ($contratos as $cat)
				<tr>
					<td>{{ $cat->idtipocontrato}}</td>
					<td>{{ $cat->tipocontrato}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('ContratoController@edit',$cat->idtipocontrato)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idtipocontrato}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.contrato.modal')
				@endforeach
			</table>
		</div>
		{{$contratos->render()}}
		
	</div>
</div>
@endsection