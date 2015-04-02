@extends('backPage.layout')
@section('Titulo')
Pagos
@stop
@section('content')
<form class="form-horizontal" method="post" >
<fieldset>

<!-- Form Name -->
<legend>Pagar con MercadoPago</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="nombre">nombre</label>
  <div class="controls">
    <input id="nombre" name="nombre" type="text" placeholder="nombre" class="input-xlarge">
    <p class="help-block">escriba el nombre</p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="monto">monto</label>
  <div class="controls">
    <input id="monto" name="monto" type="text" placeholder="monto" class="input-xlarge">
    <p class="help-block">monto</p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">email</label>
  <div class="controls">
    <input id="email" name="email" type="text" placeholder="email" class="input-xlarge">
    <p class="help-block">email</p>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="submit">submit</label>
  <div class="controls">
    <button id="submit" name="submit" class="btn btn-primary">Pagar</button>
  </div>
</div>

</fieldset>
</form>

<!-- <form method="post" >
	<div class="form_description">
		<h2>Cobro MP</h2>
		<p>PAGAR POR Mp.</p>
	</div>						
	<ul>
			<label class="description" for="monto">monto </label>
			<div>
				<input id="monto" name="monto" type="text" maxlength="255" value=""> 
			</div> 
		<label class="description" for="nombre">nombre </label>
		<div>
			<input id="nombre" name="nombre" class="element text medium" type="text" maxlength="255" value=""> 
		</div> 

	<label class="description" for="email">email </label>
	<div>
		<input id="email" name="email" class="element text medium" type="text" maxlength="255" value=""> 
	</div> 

	<input type="submit" name="submit" value="PAGAR">
</li>
</ul>
</form> -->
@stop
