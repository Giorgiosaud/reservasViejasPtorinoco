<div class="panel panel-info datosPersonales">
			<div class="panel-heading ">
				<h3 class="panel-title">
					<span class="glyphicon glyphicon-user"></span>Datos Personales
				</h3>
			</div>
			<div class="panel-body">
				<div class="panel-body col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('name','Nombre') }}
						</div>
						{{ Form::text('name',$Reservacion->client->name,array('class'=>'name form-control')) }}
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('lastname','Apellido') }}
						</div>
						{{ Form::text('lastname',$Reservacion->client->lastname,array('class'=>'lastname form-control')) }}
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('identification','Cedula') }}
						</div>
						{{ Form::text('identification',$Reservacion->client->identification,array('class'=>'identification form-control')) }}
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('email','E-mail') }}
						</div>
						{{ Form::text('email',$Reservacion->client->email,array('class'=>'email form-control')) }}
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							{{ Form::label('phone','Telefono') }}
						</div>
						{{ Form::text('phone',$Reservacion->client->phone,array('class'=>'phone form-control')) }}
					</div>
				</div>
			</div>
		</div>