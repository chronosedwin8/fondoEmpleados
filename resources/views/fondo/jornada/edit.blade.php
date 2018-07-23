@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición de la jornada laboral : {{$jornadas->jornada}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($jornadas,['method'=>'PATCH','route'=>['jornada.update',$jornadas->idjornadalaboral]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="jornada">Jornada Laboral</label>
            	<input type="text" name="jornada" class="form-control" value="{{$jornadas->jornada}}" placeholder="Jornada Laboral...">
            </div>
            
            <div class="form-group">
            	<label for="descrip">Descrip</label>
            	<input type="text" name="descrip" class="form-control" value="{{$jornadas->descrip}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection