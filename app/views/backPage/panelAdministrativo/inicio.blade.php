@extends('backPage.layout')
@section('Titulo')
Login
@stop
@section('content')
@include('backPage.PanelAdministrativo.nav.barraDeNavegacion')
<div class="col-xs-12">
	<div class="container-fluid" id="PaneldeRespuesta">
		<div class="jumbotron">
		<h1>Hola, Bienvenido {{ Auth::user()->name }} al sistema de Reservas de Puertorinoco</h1>
			<p>Aqui podras administrar las reservas realizadas</p>
			<!-- <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p> -->
		</div>
	</div>

</div>
<div class="clearfix"></div>
<footer >Puertorinoco Catamaran <cite title="Source Title">Sistema de Reservas 2.0</cite></footer>
</body>
</html>
	@stop
