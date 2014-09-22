<!DOCTYPE html>
<html>
<head>
	<title> @yield('Titulo') </title>

	@include('includes.general.head')
	@include('includes.frontPage.head')
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

	<div class="container" id="contenedor">
		<legend>Reservas On-Line</legend>
		<div class="container-fluid">
			@yield('body')
		</div>
		<div class="col-xs-4" id="informacionGeneral">
			@yield('areaInformacion')
		</div>
		<div class="clearfix"></div>
		@yield('informacionAbajo')
		<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="tituloMensajeError">Modal title</h4>
					</div>
					<div id="mensajeError" class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
