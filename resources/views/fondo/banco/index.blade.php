@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Entidades Bancarias <a href="banco/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.banco.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!-- encabezados de columna -->

					@if ($labels->count())

					@foreach ($labels as $lab)
					<th>{{ $lab->etiqueta}}</th>
					@endforeach

					@else			

					<th>Idx</th>  
					<th>Bancox</th>
					<th>Descripciónx</th>

					@endif
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($bancos as $cat)
				<tr>
					<td>{{ $cat->idbancos}}</td>
					<td>{{ $cat->banco}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('BancoController@edit',$cat->idbancos)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idbancos}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.banco.modal')
				@endforeach
			</table>
		</div>
		{{$bancos->render()}}
		
	</div>
</div>
@endsection