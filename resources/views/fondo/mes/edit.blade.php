@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición del mes de : {{$meses->mes}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($meses,['method'=>'PATCH','route'=>['mes.update',$meses->idmeses]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="mes">Mes</label>
            	<input type="text" name="mes" class="form-control" value="{{$meses->mes}}" placeholder="mes...">
            </div>
            <div class="form-group">
            	<label for="mescontracion">Contracción</label>
            	<input type="text" name="mescontracion" class="form-control" value="{{$meses->mescontracion}}" placeholder="contracción...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Descripción</label>
            	<input type="text" name="descripcion" class="form-control" value="{{$meses->descripcion}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection