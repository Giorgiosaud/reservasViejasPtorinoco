@extends('backPage.layout')
@section('Titulo')
Login
@stop
@section('content')
<div class="container-fluid">
	<div class="text-center">
		<h2 class="headerForm">
			Ingrese sus Datos de Acceso
		</h2>
	</div>
	{{ Form::open(['class' => 'singIn text-center','role'=>'form','method'=>'POST',])}}
	<div class="input-group input-group-xs col-sm-4 col-xs-12">
		<span class="input-group-addon"><label for="usuario"><span class="glyphicon glyphicon-user"></span></label></span>
		{{ Form::text('user', '', array('class' => 'form-control', 'placeholder' => 'usuario'))}}
	</div>
	<div class="input-group input-group-xs col-sm-4 col-xs-12">
		<span class="input-group-addon"><label for="password"><span class="glyphicon glyphicon-asterisk"></span></label></span>
		{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
	</div>
	<label>
		<input type="checkbox" name="recordar" id="recordar" value="Si"> Recordar Datos de Acceso
	</label>
	{{ Form::submit('Loguearse', array('class' => 'btn btn-primary btn-lg'))}}
	{{ Form::close()}}
	<div class="clearfix"></div>
</div>
@stop