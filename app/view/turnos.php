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

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<div class="row">
		 		<div class="col-sm-4">
		 			<h4 class="page-header">Buscar turnos</h4>
		 			<form >
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
		 					<label for="id_paciente">Pacientes</label>
		 					<select class="form-control" id="id_paciente" name="id_paciente" >
		 						<option value="0">Seleccionar</option>
								<?php foreach($pacientes as $paciente): ?>
									<option value="<?= $paciente->id ?>"><?= $paciente->apellido . ', ' . $paciente->nombre ?></option>
								<?php endforeach; ?>
							</select>
		 				</div>
					  	<div class="form-group">
					    	<label for="fecha_inicio">Fecha</label>
					    	<input type="text" class="form-control datetimepicker" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha">
					  	</div>
					  
					  <button type="submit" class="btn btn-default">Confirmar</button>
					</form>
		 			<div id="calendario"></div>
		 		</div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Turnos</h4>
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Fecha</th>
				 				<th>Doctor</th>
				 				<th>Paciente</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($turnos)): ?>
								<?php foreach($turnos as $turno): ?>
						 			<tr>
						 				<td><?= $turno->fecha_inicio ?></td>
						 				<td><?= $turno->id_profesional ?></td>
						 				<td><?= $turno->id_paciente ?></td>
						 			</tr>
					 			<?php endforeach; ?>
				 			<?php else: ?>
				 				<tr>
				 					<td colspan="3">No se encontraron datos.</td>
				 				</tr>
				 			<?php endif; ?>
				 		</tbody>
				 	</table>
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