<div class="row">
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<span class="glyphicon glyphicon-thumbs-up"></span> Niños <strong>hasta 4 años</strong> Pasean gratis.
	</div>
</div>
<div class="row">
	<div class="alert alert-danger">
		<strong>ATENCION:</strong><br/>
		Les informamos que PUERTORINOCO CATAMARAN C.A. es una empresa privada que opera como concesionario, parcialmente en el Club privado CLUB NAUTICO CARONI. Como contraprestaci&oacute;
		n al  Servicio del Catamarán, el Club ha decidido cobrar a nuestros usuarios en la puerta del Club,  las siguientes cantidades:
	</div>
	<div class="clearfix"></div>
</div>
<div class="row">
	<div class="panel-group" id="accordion">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#temporadaAlta">
						Temporada Alta:
					</a>
				</h4>
			</div>
			<div id="temporadaAlta" class="panel-collapse collapse @if ($temporadaBaja == 0) in @endif ">
				<div class="panel-body">
					<ol>
						<li>
							Adultos: de 12 a 60 años, Bs. {{ $tempaltaAdult->first()->value }}
						</li>
						<li>
							Niños: de 6 A 11 años y mayores de 60 años, Bs. {{ $tempaltaAdultMay->first()->value }}
						</li>
						<li>
							Niños: de 1 A 5 años  (1 por grupo de 5 personas) Gratis.
						</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#temporadaBaja">
						Temporada Baja:
					</a>
				</h4>
			</div>
			<div id="temporadaBaja" class="panel-collapse collapse @if ($temporadaBaja == 1) in @endif ">
				<div class="panel-body">
					<ol>
						<li>
							Adultos: de 12 a 60 años, Bs.{{ $tempBajaAdult->first()->value }}
						</li>
						<li>
							Niños: de 6 A 11 años y mayores de 60 años, Bs.{{ $tempBajaAdultMay->first()->value }}
						</li>
						<li>
							Niños: de 1 A 5 años  (1 por grupo de 5 personas) Gratis.
						</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>
