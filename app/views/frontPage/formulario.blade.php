{{ Form::open(array(
	'id' => 'formularioDeReserva',
	'role'=>'form',
	'method'=>'post')
	) }}
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
		<div class="form-group tienepopover" id="tipoEmbarcacion" data-toggle="popover" data-content="Seleccione Embarcacion para el Paseo" data-original-title="" title="">
			<div class="control-group">
				<label class="col-xs-4 control-label" for="opcionesDeEmbarcacion">Tipo De Embarcacion</label>
				<div id="opcionesDeEmbarcacion" class="btn-group col-xs-8 " data-toggle="buttons">
					<label class="col-xs-6 btn btn-primary active">
						<input type="radio" id="embarcacion1" name="embarcacionSeleccionada" value="Catamaran" checked="">Catamaran
					</label>
					<label class="col-xs-6 btn btn-primary">
						<input type="radio" id="embarcacion2" name="embarcacionSeleccionada" value="Lancha">Lancha
					</label>
				</div>
			</div>
		</div>
		<div class="form-group" id="horaform">
			<div class="control-group">
				<label class="col-xs-4 control-label" for="opcionesHora">Hora y Disponibilidad</label>
				<div id="opcionesHora" data-toggle="buttons" class="col-xs-8 btn-group tienepopover" data-content="Seleccione Hora del Paseo" data-original-title="" title="">
					<label class="col-xs-4 btn btn-primary">
						<input type="radio" id="radio1" name="hora" value="1">10:30 am <br><span>cupos:</span>
					</label>
					<label class="col-xs-4 btn btn-primary">
						<input type="radio" id="radio2" name="hora" value="2">2:30 pm <br><span>cupos:</span>
					</label>
					<label class="col-xs-4 btn btn-primary">
						<input type="radio" id="radio3" name="hora" value="3">5:00 pm <br><span>cupos:</span>
					</label>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div id="datosFinalesDePaseo">
			<input type="hidden" id="datoPrecioAdulto" name="datoprecioAdulto" value="">
			<input type="hidden" id="datoPrecioAdultoMayor" name="datoprecioAdultoMayor" value="">
			<input type="hidden" id="datoPrecioNino" name="datoprecioNino" value="">
			<input type="hidden" id="datoDisponibilidad" name="datoDisponibilidad" value="">
			<input type="hidden" id="datoCuposEnReserva" name="datoCuposEnReserva" value="0">
		</div>
	</div>

	<div class="form-group" id="datosPersonales">
		<div class="form-group" id="cedulaForm">
			<label for="cedula" class="col-xs-4 control-label">Cedula: </label>
			<div class="col-xs-3">
				<select class="form-control selectpicker" id="rifInicio" name="rifInicio" style="display: none;">
					<option value="V" selected="selected">V</option>
					<option value="E">E</option>
					<option value="J">J</option>
					<option value="G">G</option>
				</select>
			</div>
			<div class="col-xs-5">
				<input type="text" class="form-control tienepopover" title="" placeholder="Numero de Cedula" id="cedula" name="cedula" data-container="body" data-toggle="popover" data-placement="right" data-content="Ingrese solo su número de cedula o rif Válido" data-original-title="Introduzca Su Cedula">
			</div>
		</div>
		<div class="form-group" id="nombresForm">
			<label for="Nombres" class="col-xs-4 control-label">Nombres: </label>
			<div class="col-xs-8">
				<input type="text" id="Nombre" class="form-control tienepopover" placeholder="Ingrese Su(s) Nombre(s)" name="Nombre" data-container="body" data-toggle="popover" data-placement="right" data-content="Ingrese Su Nombre" data-original-title="" title="">
			</div>
		</div>
		<div class="form-group" id="apellidosForm">
			<label for="Apellidos" class="col-xs-4 control-label">Apellidos: </label>
			<div class="col-xs-8">
				<input type="text" id="Apellido" class="form-control tienepopover" placeholder="Ingrese Su(s) Apellido(s)" name="Apellido" data-container="body" data-toggle="popover" data-placement="right" data-content="Ingrese  su Apellido" data-original-title="" title="">
			</div>
		</div>
		<div class="form-group" id="emailForm">
			<label for="email" class="col-xs-4 control-label">email: </label>
			<div class="col-xs-8">
				<input type="text" id="email" class="form-control tienepopover" placeholder="Ingrese su correo electronico" name="email" data-container="body" data-toggle="popover" data-placement="right" data-content="Ingrese un correo electronico Válido" data-original-title="" title="">
			</div>
		</div>
		<div class="form-group" id="telefonoForm">
			<label for="telefono" class="col-xs-4 control-label">telefono: </label>
			<div class="col-xs-8">
				<input type="text" id="telefono" class="form-control tienepopover" placeholder="Ingrese un numero telefonico de contacto" name="telefono" data-container="body" data-toggle="popover" data-placement="right" data-content="Ingrese un número de telefono Válido (Solo Numero Ej:02869233147)" data-original-title="" title="">
			</div>
		</div>
	</div>
	<div class="form-group" id="datosdeCupos">
		<div class="form-group" id="cupos">
			<label class="col-xs-4 control-label" for="cuposReservados">Numero de Personas: </label>
			<div id="cuposReservados" class="col-xs-8">
				<div class="col-xs-4">
					<label for="Adultos" class="control-label">Adultos: </label>
					<input type="number" class="form-control tienpopover" placeholder="0" value="0" min="0" max="50" name="pasajesadultos" id="pasajesadultos" data-toggle="popover" data-placement="right" data-content="Ingrese Almenos un Adulto">
				</div>
				<div class="col-xs-4">
					<label for="3eraEdad" class="control-label">Mayores: </label>
					<input type="number" class="form-control" value="0" placeholder="0" min="0" max="50" name="pasajes3eraEdad" id="pasajes3eraEdad">
				</div>
				<div class="col-xs-4">
					<label for="ninos" class="control-label">Niños: </label>
					<input type="number" class="form-control" value="0" placeholder="0" min="0" max="50" name="pasajesninos" id="pasajesninos">
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
			<label for="condiciones" class="col-xs-10 control-label">Acepta los <a class="ifancybox" href="terminosycondiciones.php" data-toggle="modal" data-target="#myModal">Terminos y Condiciones</a> Para el Paseo </label>
			<div class="col-xs-2">
				<input type="checkbox" name="condiciones" id="condiciones" class="tienepopover" data-toggle="popover" data-placement="right" data-content="Acepte Los Terminos y Condiciones" data-original-title="" title="">
			</div>
		</div>
	</div>
	<div class="form-group" id="SaldosyMontos">
		<label for="PrecioTotal" class="col-xs-2 control-label text-justify">Saldo a Favor en GiftCards: </label>
		<div class="col-xs-2">
			<p class="form-control-static" id="Giftcards">monto</p>
			<input type="hidden" id="Giftcards2" name="Giftcards2" value="0">
		</div>
		<label for="PrecioTotal" class="col-xs-2 control-label">Total Reserva: </label>
		<div class="col-xs-2">
			<p class="form-control-static" id="totalReserva">monto</p>
			<input type="hidden" id="totalReserva2" name="totalReserva2" value="">
		</div>
		<label for="PrecioTotal" class="col-xs-2 text-justify control-label">Total a Pagar: </label>
		<div class="col-xs-2">
			<p class="form-control-static" id="PrecioTotal">monto</p>
			<input type="hidden" id="totalbs" name="totalbs" value="">
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
			<input type="submit" value="Reservar y/o pagar con Tarjeta" id="botonReservar" title="Haga click para Realizar la Reserva" class="btn btn-primary btn-lg center-block">
		</div>
	</div>
{{ Form::close() }}
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

		</div>
	</div>
</div>