@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Edición de la etiquetas : {{$etiquetas->etiqueta}} </h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($etiquetas,['method'=>'PATCH','route'=>['etiqueta.update',$etiquetas->idetiqueta]])!!}
            {{Form::token()}}
            
            <div class="form-group">
            	<label>Modulo</label>
            	<select name="idmodulo" placeholder="Seleccione Modulo">
	            	@foreach($modulos as $cat)
	            		@if ($cat->idmodulo==$etiquetas->idmodulo)            	
						<option value="{{$cat->idmodulo}}"selected>{{$cat->modulo}}</option>
						@else
						<option value="{{$cat->idmodulo}}">{{$cat->modulo}}</option>

						@endif				           	
	            	@endforeach
            	</select>
            	
            </div>

            <div class="form-group">
            	<label for="etiqueta">Etiqueta</label>
            	<input type="text" name="etiqueta" required value="{{$etiquetas->etiqueta}}" class="form-control">
            </div>


            <div class="form-group">
            	<label for="descrip">Orden</label>
            	<input type="text" name="orden" required value="{{$etiquetas->orden}}" class="form-control">
            </div>
            <div class="form-group">
            	<label for="descrip">Descripción</label>
            	<input type="text" name="descrip" required value="{{$etiquetas->descrip}}" class="form-control">
            </div>


            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection