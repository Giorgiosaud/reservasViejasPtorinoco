@extends('backPage.layout')
@section('Titulo')
Reservations
@stop
@section('content')
{{ Form::open(array('id'=>'formularioIndividual','class'=>'individual','method' => 'POST')) }}
{{ Form::hidden('numeroDeReserva',$Reservacion->id) }}
{{ Form::hidden('tipoDeEmbarcacion',$Reservacion->boat->id) }}
{{ Form::hidden('modifiedBy',Auth::user()->name) }}
{{ Form::hidden('tipoDeEmbarcacion',$Reservacion->boat->id) }}
<?php $width = floor(12/$boats->count());
$width2      = floor(12/$tours->count())?>
<script type="text/javascript">

</script>
<div class="panel panel-info">
	<div class="panel-body">
		@include('backPage.panelAdministrativo.Reservations.individual.datosPersonales')
		@include('backPage.panelAdministrativo.Reservations.individual.datosPaseo')
		@include('backPage.panelAdministrativo.Reservations.individual.datosCupos')
		@include('backPage.panelAdministrativo.Reservations.individual.datosPagos')
		@include('backPage.panelAdministrativo.Reservations.individual.datosPasajeros')
		@include('backPage.panelAdministrativo.Reservations.individual.datosReferencias')
		@include('backPage.panelAdministrativo.Reservations.individual.datosAbordaje')
	</div>
	<div class="panel-footer">
		<div class="btn btn-info btn-lg btn-block guardarCambiosEnReserva">Guardar</div>
		<div class="btn btn-warning btn-lg btn-block cancelarCambiosEnReserva" data-dismiss="modal">Cancelar</div>
		<div class="clearfix"></div>
	</div>

</div>
{{ Form::close() }}
@stop