@extends('backPage.layout')
@section('Titulo')
Reservations
@stop
@section('content')
{{ Form::open(array('id'=>'reload')) }}
{{ Form::hidden('reservacion',$valores['reservacion']) }}
{{ Form::hidden('fecha',$valores['fecha']) }}
{{ Form::hidden('hora',$valores['hora']) }}
{{ Form::hidden('tipoDeEmbarcacion',$valores['tipoDeEmbarcacion']) }}
{{ Form::hidden('activa',$valores['activa']) }}

{{ Form::close() }}
<div class="table-responsive">
	<table class="table table-bordered table-hover table-condensed">
		@foreach ($Reservaciones as $Reservacion)

		@if (!isset($boat)||$Reservacion->boat->name!=$boat)

		<tr>
			<th colspan="13" id="{{ $Reservacion->boat->name }}" class="info text-center">{{ $Reservacion->boat->name }}</th>
<?php
$boat = $Reservacion->boat->name;
?>
</tr>
		@endif
		@if (!isset($departure)||$Reservacion->tour->departure!=$departure)
<?php $departure = $Reservacion->tour->departure?>
		<tr>
			<th colspan="13" class="info text-center">{{ $departure }}</th>
		</tr>

		<tr>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Numero de Reserva</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Nombre</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Apellido</th>
			<!-- <th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Visitas</th> -->
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">E-mail</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Teléfono</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Adultos</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">3ra edad</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Niños</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Cupos Totales</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Monto a Pagar</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Pago?</th>
			<th scope="col" headers="{{ $Reservacion->boat->name }}" class="text-center">Referencias</th>
		</tr>
		{{-- expr --}}
		@endif
		<tr id="{{ $Reservacion->id }}" class="{{ $Reservacion->status }}">
			<td class="numeroDeReserva">{{ $Reservacion->id }}</td>
			<td>{{ $Reservacion->client->name }}</td>
			<td>{{ $Reservacion->client->lastname }}</td>
			<td>{{ $Reservacion->client->email }}</td>
			<td>{{ $Reservacion->client->phone }}</td>
			<td>{{ $Reservacion->adults }}</td>
			<td>{{ $Reservacion->olders }}</td>
			<td>{{ $Reservacion->childs }}</td>
			<td>{{ $Reservacion->adults+$Reservacion->olders+$Reservacion->childs }}</td>
			<td>{{ $Reservacion->totalAmmount }}</td>
			<td>{{ $Reservacion->paymentstatus->name }}</td>
			<td>{{ $Reservacion->references }}</td>
		</tr>
		@endforeach
	</table>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Datos de la Reservacion Seleccionada</h4>
			</div>
			<div class="modal-body">
				...
			</div>

		</div>
	</div>
</div>
@stop