<div class="panel panel-info datosDelPaseo">
	<div class="panel-heading ">
		<h3 class="panel-title"><span class="glyphicon glyphicon-bookmark"></span>Datos Del Paseo</h3>
	</div>
	<div class="panel-body">
		<div class="input-group">
			<div class="input-group-addon">
				{{ Form::label('fecha2', 'Fecha') }}
			</div>
			{{ Form::text('fecha2',$Reservacion->date,array('id'=>"fecha2",'placeholder'=>'Seleccione Fecha','class'=>'form-control',)) }}
			{{ Form::hidden('fecha',$Reservacion->dateOriginal,array('id'=>'fecha')) }}
		</div>
		<div class="input-group">
			<div class="input-group-addon">
				{{ Form::label('embarcacion','Tipo de Embarcacion') }}
			</div>
			<div class="btn-group col-xs-12" data-toggle="buttons">
				@foreach ($boats as $boat)
<?php $activo = ($boat->name == $Reservacion->boat->name)?true:false;
$seleccionado = ($boat->name == $Reservacion->boat->name)?'active':'';?>
<label class="boat col-xs-{{ $width }} btn btn-primary {{ $seleccionado }}">

					{{ Form::radio('boat_id', $boat->id, $activo) }}
					{{ $boat->name }}
				</label>
				@endforeach
			</div>
		</div>
		<div class="input-group">
			<div class="input-group-addon">
				{{ Form::label('hora', 'Seleccione la Hora')}}
			</div>
			<div class="btn-group col-xs-12" data-toggle="buttons">
				@foreach ($tours as $tour)
<?php $activo = ($tour->departure == $Reservacion->tour->departure)?true:false;
$seleccionado = ($tour->departure == $Reservacion->tour->departure)?'active':'';?>
				<label class="{{ $seleccionado }} col-xs-{{ $width2 }} btn btn-primary botonhora tour-{{ $tour->id }}">
					{{ Form::radio('tour_id',$tour->id,$activo) }}
					{{ $tour->departure}}<br/>
					{{ $tour->name}}<br/><span class="cupos">cupos: {{ $datos[$Reservacion->boat->name] ['disponiblesMaximo'][$tour->id]}}</span>
					<!-- <input type="radio" id="radio1" name="hora" value="1">10:30 am <br><span>cupos:</span> -->
				</label>

				{{-- expr --}}
				@endforeach
			</div>
		</div>
	</div>
</div>