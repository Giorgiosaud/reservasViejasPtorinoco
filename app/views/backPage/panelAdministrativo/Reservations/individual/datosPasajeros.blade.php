<div class="panel panel-info datosDePasajero">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-user"></span> Pasajeros de Reserva
	</div>
	<div class="panel-body">
		<div class="table-responsive" id="tablaPagos">
			<table class="table-bordered table" id="pagos">
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Cedula</th>
					<th>email</th>
					<th>telefono</th>
					<th>accion</th>
				</tr>
				@foreach($Reservacion->passengers()->get() as $passenger)
				<tr>
					<td>{{ $passenger->name}}</td>
					<td>{{ $passenger->lastname}}</td>
					<td>{{ $passenger->identification}}</td>
					<td>{{ $passenger->email}}</td>
					<td>{{ $passenger->phone}}</td>
					<td data-id="{{ $passenger->id }}">borrar</td>
				</tr>

				@endforeach
				<th>{{ Form::text('pasajeroName') }}</th>
				<th>{{ Form::text('pasajeroLastName') }}</th>
				<th>{{ Form::text('pasajeroIdentification') }}</th>
				<th>{{ Form::text('pasajeroEmail') }}</th>
				<th>{{ Form::text('pasajeroPhone') }}</th>
				<th><div class="btn btn-info btn-lg btn-block guardarPasajero">Guardar</div></th>
			</table>
		</div>
	</div>
	<div class="panel-footer">
		<div class="col-xs-12 text-center">
			Faltan {{ $Reservacion->adults+$Reservacion->childs+$Reservacion->olders-$Reservacion->passengers()->count() }} {{ Lang::choice('models.Passenger', $Reservacion->adults+$Reservacion->childs+$Reservacion->olders-$Reservacion->passengers()->count()) }} por ingresar
		</div>
		<div class="clearfix"></div>
	</div>
</div>