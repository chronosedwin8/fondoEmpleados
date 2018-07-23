@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Estados Civiles   <a href="civil/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('fondo.civil.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<!-- encabezados de columna -->
					<th>Id</th>  
					<th>Estado Civil</th>
					<th>Descripción</th>
				</thead>
				<!-- campos de la Base de Datos -->
               @foreach ($civiles as $cat)
				<tr>
					<td>{{ $cat->idestadocivil}}</td>
					<td>{{ $cat->estadocivil}}</td>
					<td>{{ $cat->descrip}}</td>
					<td>
						<a href="{{URL::action('CivilController@edit',$cat->idestadocivil)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->idestadocivil}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('fondo.civil.modal')
				@endforeach
			</table>
		</div>
		{{$civiles->render()}}
		
	</div>
</div>
@endsection