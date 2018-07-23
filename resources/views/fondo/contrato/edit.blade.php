@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición del tipo de contrato : {{$contratos->tipocontrato}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($contratos,['method'=>'PATCH','route'=>['contrato.update',$contratos->idtipocontrato]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="tipocontrato">Tipo de Contrato</label>
            	<input type="text" name="tipocontrato" class="form-control" value="{{$contratos->tipocontrato}}" placeholder="Tipo de Contrato...">
            </div>
            
            <div class="form-group">
            	<label for="descrip">Descrip</label>
            	<input type="text" name="descrip" class="form-control" value="{{$contratos->descrip}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection