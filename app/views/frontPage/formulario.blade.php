{{ Form::open(array(
	'id' => 'formularioDeReserva',
	'role'=>'form',
	'method'=>'POST',
	'class'=>'form-horizontal',
	'name'=>'formularioDeReserva')
	) }}
<?php if (!isset(Auth::user()->name)) {
	$usuario = 'client';
} else {
	$usuario = Auth::user()->name;
}
?>
{{ Form::hidden('usuario',$usuario,array('id'=>'usuario')) }}
	<div class="form-group" id="datosDelPaseo">
		<div class="form-group" id="fechaform">
			{{ Form::label('fecha2', 'Fecha del Paseo', array('class' => 'col-xs-4 control-label')); }}
			<div class="col-xs-8">
				{{ Form::text('fecha2',Input::old('fecha2'),array(
				              'id'=>"fecha2",
				              'placeholder'=>'Fecha Del Paseo',
				              'class'=>'form-control tienepopover',
				              'data-container'=>'body',
				              'data-toggle'=>'popover',
				              'data-placement'=>'right',
				              'data-content'=>'Seleccione Fecha del Paseo')) }}
				              {{ Form::hidden('fecha',Input::old('fecha'),array('id'=>'fecha')) }}
				          </div>
				      </div>
				      @if ($errors->has('fecha')) <p class="help-block">{{ $errors->first('fecha') }}</p> @endif
				      <div class="form-group tienepopover" id="tipoEmbarcacion" data-toggle="popover" data-content="Seleccione Embarcacion para el Paseo" data-original-title="" title="">
				      	<div class="control-group">
<?php $width = floor(12/$boats->count())?>
{{ Form::label('opcionesDeEmbarcacion', 'Tipo De Embarcacion', array('class' => 'col-xs-4 control-label')); }}

				      		<div id="opcionesDeEmbarcacion" class="btn-group col-xs-8 " data-toggle="buttons">
				      			@foreach ($boats as $boat)
				      			<label class="boat col-xs-{{ $width }} btn btn-primary disabled">
				      				{{ Form::radio('Boat', $boat->name, false) }}
				      				{{ $boat->name }}
				      			</label>
				      			@endforeach
				      		</div>
				      	</div>
				      	@if ($errors->has('Boat')) <p class="help-block">{{ $errors->first('Boat') }}</p> @endif
				      </div>
				      <div class="form-group" id="horaform">
				      	<div class="control-group">
				      		<label class="col-xs-4 control-label" for="opcionesHora">Hora y Disponibilidad</label>
<?php $width = floor(12/$tours->count())?>
				      		<div id="opcionesHora" data-toggle="buttons" class="col-xs-8 btn-group tienepopover" data-content="Seleccione Hora del Paseo" data-original-title="" title="">
				      			@foreach ($tours as $tour)
				      			<label class="col-xs-{{ $width }} btn btn-primary botonhora disabled">
				      				{{ Form::radio('hora',$tour->id,false) }}
				      				{{ $tour->departure}}<br/>
				      				{{ $tour->name}}<br/><span class="cupos"></span>
				      				<!-- <input type="radio" id="radio1" name="hora" value="1">10:30 am <br><span>cupos:</span> -->
				      			</label>

				      			{{-- expr --}}
				      			@endforeach
				      		</div>
				      		<div class="clearfix"></div>
				      	</div>
				      	@if ($errors->has('hora')) <p class="help-block">{{ $errors->first('hora') }}</p> @endif
				      </div>
				  </div>

				  <div class="form-group" id="datosPersonales">
				  	<div class="form-group" id="cedulaForm">
				  		{{ Form::label('identification', 'Cedula: ', array('class' => 'col-xs-4 control-label')); }}
				  		<div class="col-xs-3">
				  			{{ Form::select('rifInicio',array('V'=>'V','E'=>'E','J'=>'J','G'=>'G'),null,array('class'=>'form-control selectpicker'))}}
				  		</div>
				  		<div class="col-xs-5">
				  			{{ Form::text('identification',Input::old('identification'),array(
				  			              'id'=>"identification",
				  			              'placeholder'=>'Numero de Cedula',
				  			              'class'=>'form-control tienepopover',
				  			              'data-container'=>'body',
				  			              'data-toggle'=>'popover',
				  			              'data-placement'=>'right',
				  			              'data-content'=>'Ingrese solo su número de cedula o rif Válido',
				  			              'data-original-title'=>"Introduzca Su Cedula")) }}
				  			              @if ($errors->has('identification')) <p class="help-block">{{ $errors->first('identification') }}</p> @endif
				  			          </div>

				  			      </div>
				  			      <div class="form-group" id="nombresForm">
				  			      	{{ Form::label('name', 'Nombres: ', array('class' => 'col-xs-4 control-label')); }}

				  			      	<div class="col-xs-8">
				  			      		{{ Form::text('name',Input::old('name'),array(
				  			      		              'id'=>"name",
				  			      		              'placeholder'=>'Ingrese Su(s) Nombre(s)',
				  			      		              'class'=>'form-control tienepopover inputDatosPersonales',
				  			      		              'data-container'=>'body',
				  			      		              'data-toggle'=>'popover',
				  			      		              'data-placement'=>'right',
				  			      		              'data-content'=>'Ingrese Su Nombre',
				  			      		              // 'disabled'=>true
				  			      		              )) }}

				  			      		          </div>
				  			      		          @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
				  			      		      </div>
				  			      		      <div class="form-group" id="apellidosForm">
				  			      		      	{{ Form::label('lastName', 'Apellidos: ', array('class' => 'col-xs-4 control-label')); }}
				  			      		      	<div class="col-xs-8">
				  			      		      		{{ Form::text('lastName',Input::old('Apellido'),array(
				  			      		      		              'id'=>"lastName",
				  			      		      		              'placeholder'=>'Ingrese Su(s) Apellido(s)',
				  			      		      		              'class'=>'form-control tienepopover inputDatosPersonales',
				  			      		      		              'data-container'=>'body',
				  			      		      		              'data-toggle'=>'popover',
				  			      		      		              'data-placement'=>'right',
				  			      		      		              'data-content'=>'Ingrese Su Apellido',
				  			      		      		              // 'disabled'=>true
				  			      		      		              )) }}
				  			      		      		          </div>
				  			      		      		          @if ($errors->has('lastName')) <p class="help-block">{{ $errors->first('lastName') }}</p> @endif
				  			      		      		      </div>
				  			      		      		      <div class="form-group" id="emailForm">
				  			      		      		      	{{ Form::label('email', 'Email: ', array('class' => 'col-xs-4 control-label')); }}
				  			      		      		      	<div class="col-xs-8">
				  			      		      		      		{{ Form::text('email',Input::old('email'),array(
				  			      		      		      		              'id'=>"email",
				  			      		      		      		              'placeholder'=>'Ingrese Su correo electronico',
				  			      		      		      		              'class'=>'form-control tienepopover inputDatosPersonales',
				  			      		      		      		              'data-container'=>'body',
				  			      		      		      		              'data-toggle'=>'popover',
				  			      		      		      		              'data-placement'=>'right',
				  			      		      		      		              'data-content'=>'Ingrese un correo electronico Válido',
				  			      		      		      		              // 'disabled'=>true
				  			      		      		      		              )) }}

				  			      		      		      		          </div>
				  			      		      		      		          @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
				  			      		      		      		      </div>
				  			      		      		      		      <div class="form-group" id="telefonoForm">
				  			      		      		      		      	{{ Form::label('phone', 'Telefono: ', array('class' => 'col-xs-4 control-label')); }}
				  			      		      		      		      	<div class="col-xs-8">
				  			      		      		      		      		{{ Form::text('phone',Input::old('telefono'),array(
				  			      		      		      		      		              'id'=>"phone",
				  			      		      		      		      		              'placeholder'=>'Ingrese Su correo Telefono',
				  			      		      		      		      		              'class'=>'form-control tienepopover inputDatosPersonales',
				  			      		      		      		      		              'data-container'=>'body',
				  			      		      		      		      		              'data-toggle'=>'popover',
				  			      		      		      		      		              'data-placement'=>'right',
				  			      		      		      		      		              'data-content'=>'Ingrese un número de telefono Válido (Solo Numero Ej:02869233147)',
				  			      		      		      		      		              // 'disabled'=>true
				  			      		      		      		      		              )) }}
				  			      		      		      		      		          </div>
				  			      		      		      		      		          @if ($errors->has('phone')) <p class="help-block">{{ $errors->first('phone') }}</p> @endif
				  			      		      		      		      		      </div>
				  			      		      		      		      		  </div>
				  			      		      		      		      		  <div class="form-group" id="datosdeCupos">
				  			      		      		      		      		  	<div class="form-group" id="cupos">
				  			      		      		      		      		  		{{ Form::label('cuposReservados', 'Numero de Personas: ', array('class' => 'col-xs-4 control-label')); }}
				  			      		      		      		      		  		<div id="cuposReservados" class="col-xs-8">
				  			      		      		      		      		  			<div class="col-xs-4">
				  			      		      		      		      		  				{{ Form::label('pasajesadultos', 'Adultos: ', array('class' => 'control-label')); }}

				  			      		      		      		      		  				{{ Form::input('number','pasajesadultos',Input::old('pasajesadultos'),array(
				  			      		      		      		      		  				               'id'=>"pasajesadultos",
				  			      		      		      		      		  				               'class'=>'form-control tienepopover numeroDeCupos',
				  			      		      		      		      		  				               'data-container'=>'body',
				  			      		      		      		      		  				               'data-toggle'=>'popover',
				  			      		      		      		      		  				               'data-placement'=>'bottom',
				  			      		      		      		      		  				               'data-content'=>'Ingrese Almenos un Adulto',
				  			      		      		      		      		  				               'value'=>'0',
				  			      		      		      		      		  				               'min'=>'0',
				  			      		      		      		      		  				               'max'=>'50'
				  			      		      		      		      		  				               )) }}
				  			      		      		      		      		  				               @if ($errors->has('pasajesadultos')) <p class="help-block">{{ $errors->first('pasajesadultos') }}</p> @endif
				  			      		      		      		      		  				           </div>
				  			      		      		      		      		  				           <div class="col-xs-4">
				  			      		      		      		      		  				           	{{ Form::label('3eraEdad', 'Mayores: ', array('class' => 'control-label')); }}

				  			      		      		      		      		  				           	{{ Form::input('number','3eraEdad',Input::old('3eraEdad'),array(
				  			      		      		      		      		  				           	               'id'=>"3eraEdad",
				  			      		      		      		      		  				           	               'class'=>'form-control tienepopover numeroDeCupos',
				  			      		      		      		      		  				           	               'data-container'=>'body',
				  			      		      		      		      		  				           	               'data-toggle'=>'popover',
				  			      		      		      		      		  				           	               'data-placement'=>'bottom',
				  			      		      		      		      		  				           	               'data-content'=>'Ingrese Almenos un Adulto',
				  			      		      		      		      		  				           	               'value'=>'0',
				  			      		      		      		      		  				           	               'min'=>'0',
				  			      		      		      		      		  				           	               'max'=>'50'
				  			      		      		      		      		  				           	               )) }}
				  			      		      		      		      		  				           	               @if ($errors->has('3eraEdad')) <p class="help-block">{{ $errors->first('3eraEdad') }}</p> @endif
				  			      		      		      		      		  				           	           </div>

				  			      		      		      		      		  				           	           <div class="col-xs-4">
				  			      		      		      		      		  				           	           	{{ Form::label('ninos', 'Niños: ', array('class' => 'control-label')); }}

				  			      		      		      		      		  				           	           	{{ Form::input('number','ninos',Input::old('ninos'),array(
				  			      		      		      		      		  				           	           	               'id'=>"ninos",
				  			      		      		      		      		  				           	           	               'class'=>'form-control numeroDeCupos',
				  			      		      		      		      		  				           	           	               'value'=>'0',
				  			      		      		      		      		  				           	           	               'min'=>'0',
				  			      		      		      		      		  				           	           	               'max'=>'49'
				  			      		      		      		      		  				           	           	               )) }}
				  			      		      		      		      		  				           	           	               @if ($errors->has('ninos')) <p class="help-block">{{ $errors->first('ninos') }}</p> @endif
				  			      		      		      		      		  				           	           	           </div>
				  			      		      		      		      		  				           	           	       </div>
				  			      		      		      		      		  				           	           	   </div>
				  			      		      		      		      		  				           	           	</div>
				  			      		      		      		      		  				           	           	<div class="form-group" id="datosdePrecios">
				  			      		      		      		      		  				           	           		<div class="form-group" id="contnedorPrecios">
				  			      		      		      		      		  				           	           			<label class="col-xs-4 control-label" for="precios">Precios Por Persona: </label>
				  			      		      		      		      		  				           	           			<div id="precios" class="col-xs-8">
				  			      		      		      		      		  				           	           				<div class="col-xs-4">
				  			      		      		      		      		  				           	           					<label for="Adultos" class="col-xs-12 control-label">Adultos: </label>
				  			      		      		      		      		  				           	           					<p class="form-control-static col-xs-12 precios" id="precioAdultos">monto</p>
				  			      		      		      		      		  				           	           				</div>
				  			      		      		      		      		  				           	           				<div class="col-xs-4">
				  			      		      		      		      		  				           	           					<label for="3eraEdad" class="col-xs-12 control-label">Mayores: </label>
				  			      		      		      		      		  				           	           					<p class="form-control-static col-xs-12 precios" id="precioMayores">monto</p>
				  			      		      		      		      		  				           	           				</div>
				  			      		      		      		      		  				           	           				<div class="col-xs-4">
				  			      		      		      		      		  				           	           					<label for="ninos" class="col-xs-12 control-label">Niños: </label>
				  			      		      		      		      		  				           	           					<p class="form-control-static col-xs-12 precios" id="precioNinos">monto</p>
				  			      		      		      		      		  				           	           				</div>
				  			      		      		      		      		  				           	           			</div>
				  			      		      		      		      		  				           	           		</div>
				  			      		      		      		      		  				           	           	</div>
				  			      		      		      		      		  				           	           	<div class="form-group" id="groupcondiciones">
				  			      		      		      		      		  				           	           		<div class="control-group">
				  			      		      		      		      		  				           	           			<label for="condiciones" class="col-xs-10 text-right">Aceptar <button class="btn btn-link terminosCondiciones" data-toggle="modal" data-target="#myModal">Terminos y condiciones</button></label>
				  			      		      		      		      		  				           	           			<div class="col-xs-2">
				  			      		      		      		      		  				           	           				{{ Form::checkbox('condiciones', 'condicionesAceptadas')}}
				  			      		      		      		      		  				           	           				@if ($errors->has('condiciones')) <p class="help-block">{{ $errors->first('condiciones') }}</p> @endif
				  			      		      		      		      		  				           	           			</div>
				  			      		      		      		      		  				           	           		</div>
				  			      		      		      		      		  				           	           	</div>
				  			      		      		      		      		  				           	           	<div class="form-group" id="SaldosyMontos">
				  			      		      		      		      		  				           	           		<label for="PrecioTotal" class="col-xs-2 control-label text-justify">Saldo a Favor en GiftCards: </label>
				  			      		      		      		      		  				           	           		<div class="col-xs-2">
				  			      		      		      		      		  				           	           			<p class="form-control-static" id="Giftcards">monto</p>
				  			      		      		      		      		  				           	           		</div>
				  			      		      		      		      		  				           	           		<label for="PrecioTotal" class="col-xs-2 control-label">Total Reserva: </label>
				  			      		      		      		      		  				           	           		<div class="col-xs-2">
				  			      		      		      		      		  				           	           			<p class="form-control-static" id="totalReserva">monto</p>
				  			      		      		      		      		  				           	           		</div>
				  			      		      		      		      		  				           	           		<label for="PrecioTotal" class="col-xs-2 text-justify control-label">Total a Pagar: </label>
				  			      		      		      		      		  				           	           		<div class="col-xs-2">
				  			      		      		      		      		  				           	           			<p class="form-control-static" id="PrecioTotal">monto</p>
				  			      		      		      		      		  				           	           		</div>
				  			      		      		      		      		  				           	           	</div>
				  			      		      		      		      		  				           	           	<div class="form-group" id="condicionesEntradaForm">
				  			      		      		      		      		  				           	           		<div class="col-xs-12">
				  			      		      		      		      		  				           	           			<div class="alert alert-danger alert-dismissable">
				  			      		      		      		      		  				           	           				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  			      		      		      		      		  				           	           				<span class="glyphicon glyphicon-bullhorn"></span> NUESTROS PRECIOS <strong>NO INCLUYEN EL COSTO DE LA ENTRADA AL CLUB</strong> A CONTINUACION EL RESTO DE LA INFORMACION
				  			      		      		      		      		  				           	           			</div>
				  			      		      		      		      		  				           	           		</div>
				  			      		      		      		      		  				           	           	</div>
				  			      		      		      		      		  				           	           	<div class="form-group" id="menosDe8">
				  			      		      		      		      		  				           	           		<div class="col-xs-12" id="menosDe81">
				  			      		      		      		      		  				           	           			<div class="alert alert-warning alert-dismissable" id="minimoPasajerosZarpe">
				  			      		      		      		      		  				           	           				<button type="button" class="close" data-dismiss="alert" id="minimo" aria-hidden="true">×</button>
				  			      		      		      		      		  				           	           				<span class="glyphicon glyphicon-bullhorn"></span>
				  			      		      		      		      		  				           	           				Para zarpar se requiere un <strong> mínimo de ocho (8) pasajeros.</strong>
				  			      		      		      		      		  				           	           			</div>
				  			      		      		      		      		  				           	           		</div>
				  			      		      		      		      		  				           	           	</div>
				  			      		      		      		      		  				           	           	<div class="form-group" id="botonEnviarForm">
				  			      		      		      		      		  				           	           		<div class="col-xs-12 text-center">
				  			      		      		      		      		  				           	           			{{Form::Submit('Reservar y/o pagar con Tarjeta',array(
				  			      		      		      		      		  				           	           			               'class'=>'btn btn-primary btn-lg center-block',
				  			      		      		      		      		  				           	           			               'id'=>'botonReservar',
				  			      		      		      		      		  				           	           			               'title'=>'Haga click para Realizar la Reserva'
				  			      		      		      		      		  				           	           			               ))}}

				  			      		      		      		      		  				           	           			           </div>
				  			      		      		      		      		  				           	           			       </div>
				  			      		      		      		      		  				           	           			       {{ Form::close() }}
				  			      		      		      		      		  				           	           			       <!-- Modal -->
				  			      		      		      		      		  				           	           			       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  			      		      		      		      		  				           	           			       	<div class="modal-dialog">
				  			      		      		      		      		  				           	           			       		<div class="modal-content">
				  			      		      		      		      		  				           	           			       			<div class="modal-header">
				  			      		      		      		      		  				           	           			       				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  			      		      		      		      		  				           	           			       				<h4 class="modal-title" id="myModalLabel">Terminos y Condiciones</h4>
				  			      		      		      		      		  				           	           			       			</div>
				  			      		      		      		      		  				           	           			       			<div class="modal-body">
				  			      		      		      		      		  				           	           			       			Debe Registrarse por la Barra de Casabote 30 Min Antes del Zarpe para que su reserva no sea anulada ya que de lo contrario de haber personas en lista de espera estas tomaran su turno
				  			      		      		      		      		  				           	           			       			</div>
				  			      		      		      		      		  				           	           			       			<div class="modal-footer">
				  			      		      		      		      		  				           	           			       				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				  			      		      		      		      		  				           	           			       				<button type="button" class="btn btn-primary aceptarTyC">Aceptar</button>
				  			      		      		      		      		  				           	           			       			</div>
				  			      		      		      		      		  				           	           			       		</div>
				  			      		      		      		      		  				           	           			       	</div>
				  			      		      		      		      		  				           	           			       </div>
