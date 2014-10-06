@extends('backPage.layout')
@section('Titulo')
Panel Administrativo
@stop
@section('content')
		<h1>Hola, Bienvenido {{ Auth::user()->name }} al sistema de Reservas de Puertorinoco</h1>
			<p>Aqui podras administrar las reservas realizadas</p>
			<!-- <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p> -->
		</div>
	</div>

	@stop
