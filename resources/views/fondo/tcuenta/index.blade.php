@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Tipos de Cuentas Bancarias <a href="tcuenta/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.tcuenta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					@if ($labels->count())

					@foreach ($labels as $lab)
					<th>{{ $lab->etiqueta}}</th>
					@endforeach

					@else			

					<!-- encabezados de columna -->
					<th>Idx</th>  
					<th>Tipo de Cuentax</th>					
					<th>Descripciónx</th>
					@endif
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($tcuentas as $cat)
				<tr>
					<td>{{ $cat->idtiposdecuentas}}</td>
					<td>{{ $cat->tipodecuenta}}</td>					
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('TCuentaController@edit',$cat->idtiposdecuentas)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idtiposdecuentas}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.tcuenta.modal')
				@endforeach
			</table>
		</div>
		{{$tcuentas->render()}}
		
	</div>
</div>
@endsection