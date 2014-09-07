@extends('layout')

@section('contenido')
    {{ Form::open() }}
	nombre: {{ Form::text('usuario') }}
	Password: {{ Form::password('password') }}
	{{ Form::submit('Loguearse'); }}
	{{ Form::close() }}
@stop
