<?php define('URL', 'http://reservas.puertorinoco.com')?>
<!DOCTYPE html>
<html>
<head>
	@include('includes.general.head')
	@include('includes.backPage.head')
</head>
<body>
	<header role="banner" class="container-fluid hidden-print">
		<div class="page-header col-sm-12 col-xs-12">
			<div class="logo logo col-xs-8 col-md-4">
				<img id="imagenLogo" src="http://www.puertorinoco.com/home/templates/gk_pulse/images/white/logo.png">
			</div>
			<h1 class="panelSuperior panelSuperior col-xs-4 col-md-push-4">Area Administrativa <small class="closeSession"></small></h1>

		</div>
	</header>
	@include('backPage.panelAdministrativo.nav.barraDeNavegacion')
	<div class="col-xs-12">
		<div class="container-fluid" id="PaneldeRespuesta">
			<div class="jumbotron">
				<div id="respuesta">
					@yield('content')
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<footer >Puertorinoco Catamaran <cite title="Source Title">Sistema de Reservas 2.0</cite></footer>

</body>
</html>

