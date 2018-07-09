@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Tipos de Créditos Disponibles <a href="tcredito/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.tcredito.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!-- encabezados de columna -->
					<th>Id</th>  
					<th>Tipo de Crédito</th>
					<th>Descripción</th>
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($creditos as $cat)
				<tr>
					<td>{{ $cat->idtipos_de_creditos}}</td>
					<td>{{ $cat->tipoCredito}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('TCreditoController@edit',$cat->idtipos_de_creditos)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idtipos_de_creditos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.tcredito.modal')
				@endforeach
			</table>
		</div>
		{{$creditos->render()}}
		
	</div>
</div>
@endsection