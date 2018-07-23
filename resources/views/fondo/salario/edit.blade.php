@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición del tipo de salario : {{$salarios->tiposalario}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($salarios,['method'=>'PATCH','route'=>['salario.update',$salarios->idtiposalario]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="tiposalario">Tipo de Salario</label>
            	<input type="text" name="tiposalario" class="form-control" value="{{$salarios->tiposalario}}" placeholder="Tipo de Salario...">
            </div>
            
            <div class="form-group">
            	<label for="descrip">Descrip</label>
            	<input type="text" name="descrip" class="form-control" value="{{$salarios->descrip}}" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection