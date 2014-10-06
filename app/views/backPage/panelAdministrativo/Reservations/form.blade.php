@extends('backPage.layout')
@section('Titulo')
Reservations
@stop
@section('content')
<div class="Consultas col-sm-12 col-xs-12 text-center">
	<div id="tituloConsultas" class="row margin text-center">
		Consultar Reserva:
	</div>
	{{ Form::open(array( 'method' => 'POST')) }}
	<!-- <form id="consultarReserva"> -->
	<div class="form-group col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		<div class="input-group">
			<!-- <div class="col-sm-12 col-xs-12 row margin text-center"> -->
			<div class="input-group-addon">
				{{ Form::label('reservacion', 'Numero de Reserva') }}
			</div>
			<input type="text" class="form-control" id="reservacion" name="reservacion" placeholder="Numero De Reserva">
		</div>
	</div>
	<div class="form-group col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		<div class="input-group">
			<div class="input-group-addon">
				{{ Form::label('fecha2', 'Fecha') }}
			</div>
			{{ Form::text('fecha2',Input::old('fecha2'),array('id'=>"fecha2",'placeholder'=>'Seleccione Fecha','class'=>'form-control',)) }}
			{{ Form::hidden('fecha',Input::old('fecha'),array('id'=>'fecha')) }}

		</div>
	</div>
	<div class="form-group col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
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
{{ Form::select('hora', $selectHora,null,array('class'=>'form-control selectpicker'))}}

		</div>
	</div>
	<div class="form-group col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

<?php
$boats       = Boat::all();
$selectBoats = array(
	'Ambos' => 'Ambos');
foreach ($boats as $boat) {
	$selectBoats[$boat->id] = $boat->name;
}
?>
		<div class="input-group">
			<div class="input-group-addon">
				{{ Form::label('tipoDeEmbarcacion', 'Seleccione El Tipo de Embarcacion')}}
			</div>
			{{ Form::select('tipoDeEmbarcacion', $selectBoats,null,array('class'=>'form-control col-xs-12 selectpicker'))}}

		</div>
	</div>
	<div class="form-group col-xs-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		<div class="input-group">
			<div class="input-group-addon">
				{{ Form::label('activa', 'Seleccione El Status de la Reserva')}}
			</div>
			{{ Form::select('activa', array('1'=>'Activas','0'=>'Inactivas','Todas'=>'Todas'),null,array('class'=>'form-control col-xs-12 selectpicker'))}}
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 ">
		{{ Form::submit('Consultar',array('title'=>"Haga click para Realizar la Consulta",'class'=>'botonConsultarReserva btn btn-primary btn-lg text-center'))}}
		{{ Form::close() }}
	</div>
</div>
@stop