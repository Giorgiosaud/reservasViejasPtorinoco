@extends('backPage.layout')
@section('Titulo')
Prices
@stop
@section('content')
<div class="table-responsive">
	<table class="table table-bordered table-hover table-condensed">
		<tr>
			<th class="text-center">Descripcion</th>
			<th class="text-center">Adulto</th>
			<th class="text-center">3era Edad</th>
			<th class="text-center">Nino</th>
			<th class="text-center">Tours Relacionados</th>
		</tr>
		@foreach ($prices as $price)
		<tr id="{{ $price->id }}">
			<td class="text-center">{{  $price->description}}</td>
			<td class="text-center">{{ $price->adult}}</td>
			<td class="text-center">{{ $price->older}}</td>
			<td class="text-center">{{ $price->child}}</td>
<?php
$tours = $price->tours()->get()
?>

			<td>
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed">
						<tr>
							<th>Salida de paseo</th>
						</tr>
						@foreach ($tours as $tour)
						<tr>
							<td>{{ $tour->departure }}</td>
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