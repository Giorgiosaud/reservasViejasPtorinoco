{{ Form::open(array('id'=>'formularioIndividual','class'=>'individual')) }}
{{ Form::hidden('numeroDeReserva',$Reservacion->id) }}
{{ Form::hidden('tipoDeEmbarcacion',$Reservacion->boat->id) }}
{{ Form::hidden('ModificadoPor',Auth::user()->name) }}
{{ Form::hidden('tipoDeEmbarcacion',$Reservacion->boat->id) }}
<script type="text/javascript">

</script>
<div class="panel panel-info">
	<div class="panel-body">
		<div class="panel panel-info tipoDeEmbarcacion">
			<div class="panel-heading ">
				<h3 class="panel-title"><span class="glyphicon glyphicon-flag"></span>Tipo de Embarcación
				</h3>
			</div>
			<div class="panel-body">
				{{ $Reservacion->boat->name}}
			</div>
		</div>
		<div class="panel panel-info datosPersonales">
			<div class="panel-heading ">
				<h3 class="panel-title">
					<span class="glyphicon glyphicon-user"></span>Datos Personales
				</h3>
			</div>
			<div class="panel-body">
				<div class="panel-body col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('nombre','Nombre') }}
						</div>
						{{ Form::text('nombre',$Reservacion->client->name,array('class'=>'name form-control')) }}
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('apellido','Apellido') }}
						</div>
						{{ Form::text('apellido',$Reservacion->client->lastname,array('class'=>'lastname form-control')) }}
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('cedula','Cedula') }}
						</div>
						{{ Form::text('cedula',$Reservacion->client->identification,array('class'=>'identification form-control')) }}
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('email','E-mail') }}
						</div>
						{{ Form::text('email',$Reservacion->client->email,array('class'=>'email form-control')) }}
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('phone','Telefono') }}
						</div>
						{{ Form::text('phone',$Reservacion->client->phone,array('class'=>'phone form-control')) }}
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-info datosDelPaseo">
			<div class="panel-heading ">
				<h3 class="panel-title"><span class="glyphicon glyphicon-bookmark"></span>Datos Del Paseo</h3>
			</div>
			<div class="panel-body">
				<div class="input-group">
					<div class="input-group-addon">
						{{ Form::label('fecha2', 'Fecha') }}
					</div>
					{{ Form::text('fecha2',$Reservacion->date,array('id'=>"fecha2",'placeholder'=>'Seleccione Fecha','class'=>'form-control',)) }}
					{{ Form::hidden('fecha',$Reservacion->dateOriginal,array('id'=>'fecha')) }}
				</div>
				<div class="input-group">
					<div class="input-group-addon">
						{{ Form::label('hora', 'Seleccione la Hora')}}
					</div>
<?php
$tours      = Tour::all();
$selectHora = array(
	'Todas' => 'Todas');
foreach ($tours as $tour) {
	$selectHora[$tour->id] = $tour->departure;
}
?>
{{ Form::select('hora', $selectHora,$Reservacion->tour_id,array('class'=>'form-control selectpicker'))}}

				</div>

				<h4 class="panel-title-">
					<label for="disponibilidad">Maximo Disponibles para esta Fecha y Hora</label>
				</h4>
				<div class="col-xs-12 text-center" id="disponibilidad">
					{{ $datos[$Reservacion->boat->name] ['disponiblesMaximo'][$Reservacion->tour_id]}} Pasajeros disponibles.
				</div>
			</div>
		</div>
		<div class="panel panel-info Cupos">
			<div class="panel-heading ">
				<h3 class="panel-title">
					<span class="glyphicon glyphicon-tasks"></span>Cupos
				</h3>
			</div>
			<div class="panel-body">
				<div class="input-group">
					<div class="input-group-addon">
						{{ Form::label('cuposAdultos','Adultos') }}
					</div>

					{{  Form::input('number', 'cuposAdultos', $Reservacion->adults,array('class'=>'phone form-control')) }}
				</div>
				<div class="input-group">
					<div class="input-group-addon">
						{{ Form::label('cuposMayores','Adultos Mayores') }}
					</div>

					{{  Form::input('number', 'cuposMayores', $Reservacion->olders,array('class'=>'phone form-control')) }}
				</div>
				<div class="input-group">
					<div class="input-group-addon">
						{{ Form::label('cuposNinos','Niños') }}
					</div>

					{{  Form::input('number', 'cuposNinos', $Reservacion->childs,array('class'=>'phone form-control')) }}
				</div>
				<label class="status btn btn-primary">
					{{ Form::radio('Status', 'Activa') }}
					Activa
				</label>
				<label class="status btn btn-primary">
					{{ Form::radio('Status', 'Inactiva') }}
					Inactiva
				</label>
				<div class="radio">
					<label>
						<input type="radio" name="actividad" id="Activa" value="1" >
						Activa
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="actividad" id="Inactiva" value="0" >
						Inactiva
					</label>
				</div>
			</div>
		</div>
		<div class="panel panel-info Pagos">
			<div class="panel-heading ">
				<h3 class="panel-title">
					<span class="glyphicon glyphicon-credit-card"></span> Pagos
				</h3>
			</div>
			<div class="panel-body col-xs-12 " >
				<div class="table-responsive" id="tablaPagos">

				</div>
				<h3 class="panel-title col-xs-4">
					Monto Total Reserva
				</h3>
				<h3 class="panel-title col-xs-4">
					Monto Total Abonado
				</h3>
				<h3 class="panel-title col-xs-4	">
					Monto Deuda
				</h3>
				<div class="clearfix"></div>
				<div id="montoTotal" class="col-xs-4">{{ $Reservacion->totalAmmount }}</div>
				<div id="montoAbonado" class="col-xs-4">{{ $Reservacion->totalAmmount }}</div>
				<div id="montoDeuda" class="col-xs-4">{{ $Reservacion->totalAmmount }}</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="panel panel-info Pasajeros">
			<div class="panel-heading ">
				<h3 class="panel-title">
					<span class="glyphicon glyphicon-user"></span> Pasajeros de Reserva
				</h3>
			</div>
			<div class="panel-body col-xs-12 " >
				<div class="table-responsive" id="tablaPasajeros">
				</div>
				<div class="clearfix"></div>
				<textarea class="form-control pagoIDReserva" rows="4" name="paymentId" id="paymentId">{{ $Reservacion->references }}</textarea>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="panel-footer">
		<div class="btn btn-info btn-lg btn-block guardarCambiosEnReserva">Guardar</div>
		<div class="btn btn-warning btn-lg btn-block cancelarCambiosEnReserva" data-dismiss="modal">Cancelar</div>
		<div class="btn-group btn-group-justified btn">
			<div class="btn btn-lg btn-block abordarReserva ">Abordado</div>
			<div class="btn btn-lg btn-block cancelarAbordarReserva" >No Abordado</div>
		</div>




		<div class="clearfix"></div>
	</div>

</div>
{{ Form::close() }}
