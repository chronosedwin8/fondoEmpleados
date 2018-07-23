@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición de procedencia del fondo: {{$origenes->origendefondos}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($origenes,['method'=>'PATCH','route'=>['origen.update',$origenes->idorigenfondos]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="origendefondos">Procedencia de los fondos</label>
            	<input type="text" name="origendefondos" class="form-control" value="{{$origenes->origendefondos}}" placeholder="Procedencia...">
            </div>
            
            <div class="form-group">
            	<label for="descrip">Descripción</label>
            	<input type="text" name="descrip" class="form-control" value="{{$origenes->descrip}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection