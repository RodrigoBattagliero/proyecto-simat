<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Titulo</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<link rel="stylesheet" href="../../app/view/js/datetimepicker/jquery.datetimepicker.css">
	</head>
	<body>

		<nav class="navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Navegación</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">LOGO</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
				        <li class="active"><a href="#">Turnos <span class="sr-only">(current)</span></a></li>
				        <li><a href="perfil.html">Perfil</a></li>
				        <li><a href="#">Salir</a></li>
				    </ul>
				</div>
			</div>		
		</nav>
		 <div class="container">
		 	<div class="row">
		 		<div class="col-sm-6">
		 			<h4 class="page-header">Turnos</h4>
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Doctor</th>
				 				<th>Fecha</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<tr>
				 				<td>Dr. Algo</td>
				 				<td>12/12/2106 15:00 Hs</td>
				 			</tr>
				 			<tr>
				 				<td>Dr. Algo</td>
				 				<td>19/12/2106 15:00 Hs</td>
				 			</tr>
				 		</tbody>
				 	</table>
		 		</div>
		 		<div class="col-sm-6">
		 			<h4 class="page-header">Nuevo turno</h4>
		 			<form method="post" >
		 				<div class="form-group">
		 					<label for="id_profesional">Profesional</label>
		 					<select class="form-control" id="id_profesional" name="id_profesional" >
		 						<option value="0">Seleccionar</option>
								<?php foreach($profesionales as $profesional): ?>
									<option value="<?= $profesional->id ?>"><?= $profesional->apellido . ', ' . $profesional->nombre ?></option>
								<?php endforeach; ?>
							</select>
		 				</div>

					  	<div class="form-group">
					    	<label for="fecha_inicio">Fecha</label>
					    	<input type="text" class="form-control datetimeparaturnos" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha">
					  	</div>
					  	<button type="submit" class="btn btn-default">Confirmar</button>
					</form>
		 			<div id="calendario" class="datetimeparaturnosinline"></div>
		 		</div>
		 	</div>
		 </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../../app/view/js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="../../app/view/js/calendario.js"></script>
	</body>
</html>