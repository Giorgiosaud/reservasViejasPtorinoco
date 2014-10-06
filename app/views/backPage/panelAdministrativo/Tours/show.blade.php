@extends('backPage.layout')
@section('Titulo')
Login
@stop
@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-hover table-condensed">
		<tr>
			<th class="text-center">Salida</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Descripción</th>
			<th class="text-center">Público</th>
			<th class="text-center">Orden</th>
			<th class="text-center">Lunes</th>
			<th class="text-center">Martes</th>
			<th class="text-center">Miercoles</th>
			<th class="text-center">Juves</th>
			<th class="text-center">Viernes</th>
			<th class="text-center">Sabado</th>
			<th class="text-center">Domingo</th>
			<th class="text-center">Precios</th>

		</tr>
		@foreach ($Tours as $tour)
		<tr id="{{ $tour->id }}">
			<td class="text-center">{{  $tour->departure}}</td>
			<td class="text-center">{{ $tour->name}}</td>
			<td class="text-center">{{ $tour->descripcion}}</td>
			<td class="text-center">{{ $tour->public}}</td>
			<td class="text-center">{{ $tour->order}}</td>
			<td class="text-center">{{ $tour->lunes}}</td>
			<td class="text-center">{{ $tour->martes}}</td>
			<td class="text-center">{{ $tour->miercoles}}</td>
			<td class="text-center">{{ $tour->jueves}}</td>
			<td class="text-center">{{ $tour->viernes}}</td>
			<td class="text-center">{{ $tour->sabado}}</td>
			<td class="text-center">{{ $tour->domingo}}</td>

			<td colspan="12"  class="text-center">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed">
<?php $prices = $tour->prices()->get();?>
						<tr>
							<th class="text-center">Descripcion</th>
							<th class="text-center">Adulto</th>
							<th class="text-center">Tercera Edad</th>
							<th class="text-center">Niños</th>
						</tr>
						@foreach ($prices as $price)
						<tr id="{{ $price->id }}">
							<td class="textcenter">{{ $price->description }}</td>
							<td class="textcenter">{{ $price->adult }}</td>
							<td class="textcenter">{{ $price->older }}</td>
							<td class="textcenter">{{ $price->child }}</td>
						</tr>
						@endforeach

					</tr>
				</table>
			</div>
		</td>
	</tr>
	@endforeach
	</table>
	</div>
@stop