@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Estados de los usuarios   <a href="estado/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.estado.search')
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
					
								<th>Idx</th>  
								<th>Estadox</th>
								<th>Descripciónx</th>
					@endif
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($estados as $cat)
				<tr>
					<td>{{ $cat->idestados}}</td>
					<td>{{ $cat->estado}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('EstadoController@edit',$cat->idestados)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idestados}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.estado.modal')
				@endforeach
			</table>
		</div>
		{{$estados->render()}}
		
	</div>
</div>
@endsection