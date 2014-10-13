<div class="panel panel-info datosDelPagos">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-credit-card"></span> Pagos
	</div>
	<div class="panel-body">
		<div class="table-responsive" id="tablaPagos">
			<table class="table-bordered table" id="pagos">
				<tr>
					<th>Fecha</th>
					<th>Tipo de Pago</th>
					<th>Monto Pagado</th>
					<th>Referencia</th>
					<th>Accion</th>
				</tr>
				@foreach($Reservacion->payments()->get() as $payment)
				<tr>
					<td>{{ $payment->date}}</td>
					<td>{{ $payment->paymenttype->name}}</td>
					<td>{{ $payment->ammount}}</td>
					<td>{{ $payment->description}}</td>
					<td data-id="{{ $payment->id }}">borrar</td>
				</tr>

				@endforeach
				<th>
					{{ Form::text('fechaPago2',false,array('id'=>"fechaPago2",'placeholder'=>'Seleccione Fecha de Pago','class'=>'form-control',)) }}
					{{ Form::hidden('fechaPago',false,array('id'=>'fechaPago')) }}
				</th>
				<th><?php $opciones                                       = Paymenttype::all();
$opcionesFinales                                              = array();
foreach ($opciones as $opcion) {$opcionesFinales[$opcion->id] = $opcion->name;}?>
					{{ Form::select('paymenttype',$opcionesFinales) }}

				</th>
				<th>
					{{ Form::text('ammount') }}
				</th>
				<th>
				{{ Form::text('descriptionPago') }}
				</th>
				<th>
<div class="btn btn-info btn-lg btn-block guardarPagos">Guardar</div>
				</th>
			</table>
		</div>
	</div>
	<div class="panel-footer">
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
		<div id="montoTotal" class="col-xs-4">{{ $Reservacion->totalAmmount }} Bs.</div>
		<div id="montoAbonado" class="col-xs-4">{{$Reservacion->payments()->sum('ammount')}} Bs.</div>
		<div id="montoDeuda" class="col-xs-4">{{ $Reservacion->totalAmmount-$Reservacion->payments()->sum('ammount') }} Bs.</div>
		<div class="clearfix"></div>
	</div>
</div>