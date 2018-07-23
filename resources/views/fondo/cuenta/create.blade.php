@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Crear nueva Cuenta Bancaria</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'fondo/cuenta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
                        
            <div class="form-group">
            	<label>Banco</label>
            	<select name="idbancos" placeholder="Selecciona el Banco">
	            	@foreach($bancos as $cat)	            	
						<option value="{{$cat->idbancos}}">{{$cat->banco}}</option>				           	
	            	@endforeach
            	</select>
            	
            </div>

            <div class="form-group">
                  <label>Tipo de Cuenta</label>
                  <select name="idtiposdecuentas" placeholder="Selecciona el tipo de cuenta">
                        @foreach($tcuentas as $cuen)                       
                                    <option value="{{$cuen->idtiposdecuentas}}">{{$cuen->tipodecuenta}}</option>                               
                        @endforeach
                  </select>
                  
            </div>

            <div class="form-group">
            	<label for="no_cuenta">Número de Cuenta</label>
            	<input type="text" name="no_cuenta" required value="{{old('no_cuenta')}}" class="form-control" placeholder="Número de la cuenta...">
            </div>


            <div class="form-group">
            	<label for="nom_titular">Titular de la cuenta</label>
            	<input type="text" name="nom_titular" required value="{{old('nom_titular')}}" class="form-control" placeholder="Titular de la cuenta...">
            </div>
            <div class="form-group">
            	<label for="descrip">Descripción</label>
            	<input type="text" name="descrip" required value="{{old('descrip')}}" class="form-control" placeholder="Descripción...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection