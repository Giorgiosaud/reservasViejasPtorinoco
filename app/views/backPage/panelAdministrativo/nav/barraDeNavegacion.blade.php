<?php $menuItems = Menuitem::where('level', '=', '1')->get();?>
<nav class="navbar navbar-default container" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Puertorinoco</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="mainMenu">
			<ul class="nav navbar-nav">
				<li class="active"><a href="{{ URL::to('/PanelAdministrativo')}}">Inicio</a></li>
				@foreach ($menuItems as $menuItem)
<?php $childrenItems = Menuitem::where('parent_id', '=', $menuItem->id)->get();?>
				<li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown">{{ $menuItem->name}}<b class="caret"></b></a>

				@if($childrenItems->count()>0)
				<ul class="dropdown-menu">
				@endif
				@foreach ($childrenItems as $childrenItem)
				<li id="botonPreciosActuales"><a href="#" >{{ $childrenItem->name }}</a></li>
				@endforeach
				</ul></li>
				@endforeach
				</ul>
				</div>


				<li class="dropdown">
					<a  class="dropdown-toggle" data-toggle="dropdown">Precios<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li id="botonPreciosActuales"><a href="php/consultar_precios.php" >Precios Actuales</a></li>
						<li id="botonCambiarPrecios"><a href="php/cambiar_precios.php" data-script="js/cambiarprecios.js">Cambiar Precios</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservaciones<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li id="botonPorFecha"><a href='php/consulta_de_reserva.php' data-script="js/consultaReserva.js">Consultar Reserva(s)</a></li>
						<li id="botonPorultimosdiasnopago"><a href='php/funciones/consulta_ultimas_48.php'>Reserva con mas de 48 horas sin pago</a></li>
						<li><a href="php/reservarInterno.php"><div id="botonVariables">Reserva Interna</div></a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Abordaje<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li id="botonAbordaje"><a href='php/abordaje.php' data-script="js/abordajeForm.js">Abordaje de Zarpe</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ajuste de Fechas<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li id="botonDiasdeSemana"><a href="php/funciones/diasLaborablesDeLaSemana.php">Dias Laborables de la semana</a></li>
						<li id="botonConsultaDiasEspeciales"><a href="php/funciones/diasEspeciales.php">Consulta/Modificacion de Dias Especiales</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar Usuarios<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li id="botonNuevoUsuario"><a href="php/crearNuevoUsuario.php">Nuevo Usuario</a></li>
						<li><a href="#">Cambiar Existente</a></li>
					</ul>
				</li>
				<li><a href="php/cambiarVariables.php"><div id="botonVariables">Cambiar Variables</div></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout">Cerrar sesi&oacute;n</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>