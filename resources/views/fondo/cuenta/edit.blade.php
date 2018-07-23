@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición del la cuenta número : {{$cuentas->no_cuenta}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($cuentas,['method'=>'PATCH','route'=>['cuenta.update',$cuentas->idcuentas_banca]])!!}
            {{Form::token()}}
            
            <div class="form-group">
            	<label>Banco</label>
            	<select name="idbancos" placeholder="Seleccione el Banco">
	            	@foreach($bancos as $cat)
	            		@if ($cat->idbancos==$cuentas->idbancos)            	
						<option value="{{$cat->idbancos}}"selected>{{$cat->banco}}</option>
						@else
						<option value="{{$cat->idbancos}}">{{$cat->banco}}</option>

						@endif				           	
	            	@endforeach
            	</select>
            	
            </div>

            <div class="form-group">
            	<label>Tipo de Cuenta</label>
            	<select name="idtiposdecuentas" placeholder="Seleccione el Tipo de Cuenta">
	            	@foreach($tcuentas as $cuen)
	            		@if ($cuen->idtiposdecuentas==$cuentas->idtiposdecuentas)            	
						<option value="{{$cuen->idtiposdecuentas}}"selected>{{$cuen->tipodecuenta}}</option>
						@else
						<option value="{{$cuen->idtiposdecuentas}}">{{$cuen->tipodecuenta}}</option>

						@endif				           	
	            	@endforeach
            	</select>
            	
            </div>

            <div class="form-group">
            	<label for="no_cuenta">Cuenta Número</label>
            	<input type="text" name="no_cuenta" required value="{{$cuentas->no_cuenta}}" class="form-control">
            </div>


            <div class="form-group">
            	<label for="nom_titular">Titular de la Cuenta</label>
            	<input type="text" name="nom_titular" required value="{{$cuentas->nom_titular}}" class="form-control">
            </div>
            <div class="form-group">
            	<label for="descrip">Descripción</label>
            	<input type="text" name="descrip" required value="{{$cuentas->descrip}}" class="form-control">
            </div>


            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection