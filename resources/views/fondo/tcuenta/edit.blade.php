@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición del tipo de cuenta : {{$tcuentas->idtiposdecuentas}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tcuentas,['method'=>'PATCH','route'=>['tcuenta.update',$tcuentas->idtiposdecuentas]])!!}
            {{Form::token()}}
            


            <div class="form-group">
            	<label for="tipodecuenta">Tipo de Cuenta</label>
            	<input type="text" name="tipodecuenta" required value="{{$tcuentas->tipodecuenta}}" class="form-control">
            </div>          
          
            <div class="form-group">
            	<label for="descrip">Descripción</label>
            	<input type="text" name="descrip" required value="{{$tcuentas->descrip}}" class="form-control">
            </div>


            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection