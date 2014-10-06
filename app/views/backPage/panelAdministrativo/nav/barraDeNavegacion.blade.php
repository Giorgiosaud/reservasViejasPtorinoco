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
				<li id="{{ $childrenItem->name }}"><a href="{{ $childrenItem->url }}" >{{ $childrenItem->name }}</a></li>
				@endforeach
				</ul></li>
				@endforeach
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li><a href="logout">Cerrar sesi&oacute;n</a></li>
			</ul>
				</div>
			</ul>


		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>