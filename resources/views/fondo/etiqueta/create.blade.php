@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Crear nueva etiqueta para un modulo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'fondo/etiqueta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
                        
            <div class="form-group">
            	<label>Modulo</label>
            	<select name="idmodulo" placeholder="Seleccione Modulo">
	            	@foreach($modulos as $cat)	            	
						<option value="{{$cat->idmodulo}}">{{$cat->modulo}}</option>				           	
	            	@endforeach
            	</select>
            	
            </div>

            <div class="form-group">
            	<label for="etiqueta">Etiqueta</label>
            	<input type="text" name="etiqueta" required value="{{old('etiqueta')}}" class="form-control" placeholder="Etiqueta...">
            </div>


            <div class="form-group">
            	<label for="descrip">Orden</label>
            	<input type="text" name="orden" required value="{{old('orden')}}" class="form-control" placeholder="Ordenamiento...">
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