<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>aaa</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<ul>
  @foreach ($fechas as $fecha)
  <li>{{ $fecha->fecha }}</li>
  <li>{{ $fecha->descripcion }}</li>
  <li>{{ $fecha->clase }}</li>
  <li>{{ $fecha->activa }}</li>
  @endforeach
</ul>
</body>
</html>
