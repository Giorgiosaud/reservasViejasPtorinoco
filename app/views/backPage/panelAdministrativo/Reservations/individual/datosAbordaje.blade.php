<?php
if ($Reservacion->confirmed == 1):
$abordo    = true;
$noabordo  = false;
$checked   = 'active';
$unchecked = '';
 else :
$abordo    = false;
$noabordo  = true;
$checked   = '';
$unchecked = 'active';
endif
?>
<div class="panel panel-info datosDelPaseo">
	<div class="panel-heading ">
		<h3 class="panel-title"><span class="glyphicon glyphicon-plane"></span>Abordaje</h3>
	</div>
	<div class="panel-body">
		<div class="btn-group col-xs-12" data-toggle="buttons">

			<label class="col-xs-6 btn btn-primary botonAbordo {{ $checked }}">
				{{ Form::radio('confirmed','1',$abordo) }}
				Abordo
			</label>
			<label class="col-xs-6 btn btn-primary botonAbordo {{ $unchecked }}">
				{{ Form::radio('confirmed','0', $noabordo ) }}
				No Abordo
			</label>
		</div>
	</div>
</div>
