@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición de los Tipos de Usuarios : {{$tusuario->tipos_usuarios}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tusuario,['method'=>'PATCH','route'=>['tusuario.update',$tusuario->idtipos_user]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="tipos_usuarios">Tipo de Usuario</label>
            	<input type="text" name="tipos_usuarios" class="form-control" value="{{$tusuario->tipos_usuarios}}" placeholder="Tipo de Usuario...">
            </div>
            
            <div class="form-group">
            	<label for="descrip">Descripción</label>
            	<input type="text" name="descrip" class="form-control" value="{{$tusuario->descrip}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection