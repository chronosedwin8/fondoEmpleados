@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición del genero : {{$generos->genero}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($generos,['method'=>'PATCH','route'=>['genero.update',$generos->idgeneros]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="genero">Genero</label>
            	<input type="text" name="genero" class="form-control" value="{{$generos->genero}}" placeholder="Genero...">
            </div>
            
            <div class="form-group">
            	<label for="descrip">Descrip</label>
            	<input type="text" name="descrip" class="form-control" value="{{$generos->descrip}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection