@extends('backPage.layout')
@section('Titulo')
Login
@stop
@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-hover table-condensed">
		<tr>
			<th class="text-center">Nombre</th>
			<th class="text-center">Abordaje Maximo</th>
			<th class="text-center">Abordaje Normal</th>
			<th class="text-center">Abordaje Minimo</th>
			<th class="text-center">Público</th>
			<th class="text-center">Orden</th>
			<th class="text-center">Paseos</th>
		</tr>
		@foreach ($boats as $boat)
		<tr id="{{ $boat->id }}">
			<td class="text-center">{{  $boat->name}}</td>
			<td class="text-center">{{ $boat->abordajemaximo}}</td>
			<td class="text-center">{{ $boat->abordajenormal}}</td>
			<td class="text-center">{{ $boat->abordajeminimo}}</td>
			<td class="text-center">{{ $boat->public}}</td>
			<td class="text-center">{{ $boat->order}}</td>
			<td colspan="12"  class="text-center">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed">
<?php $tours = $boat->tours()->get();?>
						<tr>
							<th class="text-center">Nombre</th>
							<th class="text-center">Hora de Salida</th>
							<th class="text-center">Público</th>
							<th class="text-center">Orden</th>
							<th class="text-center">Descripcion</th>
							<th class="text-center">Lunes</th>
							<th class="text-center">Martes</th>
							<th class="text-center">Miercoles</th>
							<th class="text-center">Jueves</th>
							<th class="text-center">Viernes</th>
							<th class="text-center">Sabado</th>
							<th class="text-center">Domingo</th>

						</tr>
						@foreach ($tours as $tour)
						<tr id="{{ $tour->id }}">
							<td class="textcenter">{{ $tour->name }}</td>
							<td class="textcenter">{{ $tour->departure }}</td>
							<td class="textcenter">{{ $tour->public }}</td>
							<td class="textcenter">{{ $tour->order }}</td>
							<td class="textcenter">{{ $tour->descripcion }}</td>
							<td class="textcenter">{{ $tour->lunes }}</td>
							<td class="textcenter">{{ $tour->martes }}</td>
							<td class="textcenter">{{ $tour->miercoles }}</td>
							<td class="textcenter">{{ $tour->jueves }}</td>
							<td class="textcenter">{{ $tour->viernes }}</td>
							<td class="textcenter">{{ $tour->sabado }}</td>
							<td class="textcenter">{{ $tour->domingo }}</td>
						</tr>
						@endforeach
					</table>
				</div>
			</td>
		</tr>
		@endforeach
	</table>
</div>

@stop