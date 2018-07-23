@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición de los Tipos de Créditos : {{$creditos->tipoCredito}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($creditos,['method'=>'PATCH','route'=>['tcredito.update',$creditos->idtipos_de_creditos]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="tipoCredito">Tipo de Crédito</label>
            	<input type="text" name="tipoCredito" class="form-control" value="{{$creditos->tipoCredito}}" placeholder="Tipo de Credito...">
            </div>

            <div class="form-group">
            	<label for="porcentaje">Porcentaje</label>
            	<input type="text" name="porcentaje" class="form-control" value="{{$creditos->porcentaje}}" placeholder="Porcentaje...">
            </div>
            
            <div class="form-group">
            	<label for="descrip">Descripción</label>
            	<input type="text" name="descrip" class="form-control" value="{{$creditos->descrip}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection