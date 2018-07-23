@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de meses del año <a href="mes/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.mes.search')
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
								<th>Mesx</th>
								<th>Contraciónx</th>
								<th>Descripciónx</th>
					@endif
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($meses as $cat)
				<tr>
					<td>{{ $cat->idmeses}}</td>
					<td>{{ $cat->mes}}</td>
					<td>{{ $cat->mescontracion}}</td>
					<td>{{ $cat->descripcion}}</td>
					<td>
						<a href="{{URL::action('MesesController@edit',$cat->idmeses)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idmeses}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.mes.modal')
				@endforeach
			</table>
		</div>
		
		{{$meses->render()}}
		
	</div>
</div>
@endsection