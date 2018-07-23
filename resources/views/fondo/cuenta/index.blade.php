@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Numeros de las Cuentas Bancarias <a href="cuenta/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.cuenta.search')
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
					<th>Bancox</th>
					<th>Tipo de Cuenta</th>
					<th>Numero de Cuentax</th>
					<th>Titular de la Cuentax</th>
					<th>Descripciónx</th>
					@endif
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($cuentas as $cat)
				<tr>
					<td>{{ $cat->idcuentas_banca}}</td>
					<td>{{ $cat->banco}}</td>
					<td>{{ $cat->tipodecuenta}}</td>
					<td>{{ $cat->no_cuenta}}</td>
					<td>{{ $cat->nom_titular}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('CuentaController@edit',$cat->idcuentas_banca)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idcuentas_banca}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.cuenta.modal')
				@endforeach
			</table>
		</div>
		{{$cuentas->render()}}
		
	</div>
</div>
@endsection