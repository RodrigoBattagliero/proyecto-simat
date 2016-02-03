<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Titulo</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="../app/view/js/pickadate/themes/default.css">
		<link rel="stylesheet" type="text/css" href="../app/view/js/pickadate/themes/default.date.css">
		<link rel="stylesheet" type="text/css" href="../app/view/js/pickadate/themes/default.time.css">

		<link rel="stylesheet" href="../app/view/js/datetimepicker/jquery.datetimepicker.css">
	</head>
	<body>

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<div class="row">
		 		<div class="col-sm-4">
		 			<h4 class="page-header">Nueva internación</h4>
		 			<form  method="post">
		 				<div class="form-group">
					  		<label for="id_paciente">Paciente</label>
			 				<select class="form-control" id="id_paciente" name="id_paciente">
								<?php foreach($pacientes as $paciente): ?>
									<option value="<?= $paciente->id ?>"><?= $paciente->apellido ?>, <?= $paciente->nombre ?></option>
								<?php endforeach; ?>
							</select>
			 			</div>
		 				<div class="form-group">
		 					<label for="fecha_entrada">Entrada</label>
		 					<input type="text" name="fecha_entrada" id="fecha_entrada" class="form-control datetimepicker">
		 				</div>
		 				<div class="form-group">
		 					<label for="habitacion">Habitación</label>
		 					<select name="habitacion" id="habitacion" class="form-control">
		 						<option value="1">1</option>
		 						<option value="2">2</option>
		 						<option value="3">3</option>
		 						<option value="4">4</option>
		 						<option value="5">5</option>
		 						<option value="6">6</option>
		 						<option value="7">7</option>
		 						<option value="8">8</option>
		 					</select>
		 				</div>
		 				<div class="form-group">
		 					<label for="cama">Cama</label>
		 					<select name="cama" id="cama" class="form-control">
		 						<option value="1">1</option>
		 						<option value="2">2</option>
		 					</select>
		 				</div>
				  		<div class="form-group">
		 					<label for="fecha_salida">Salida</label>
		 					<input type="text" name="fecha_salida" id="fecha_salida" class="form-control datetimepicker">
		 				</div>
				  		<button type="submit" class="btn btn-default">Confirmar</button>
				  	
					</form>
		 			
		 		</div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Internaciones</h4>
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Habitación</th>
				 				<th>Cama</th>
				 				<th>Entrada</th>
				 				<th>Paciente</th>
				 				<th>Salida</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<tr>
				 				<td rowspan="2">1</td>
								<td>1</td>
								<td></td>
								<td></td>
								<td></td>
								<td><a href="#">Entrada</a></td>
				 			</tr>
				 			<tr>
				 				<td>2</td>
				 				<td></td>
								<td></td>
								<td></td>
								<td><a href="#">Entrada</a></td>
				 			</tr>
				 		</tbody>
				 	</table>

				 	<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Habitación</th>
				 				<th>Cama</th>
				 				<th>Entrada</th>
				 				<th>Paciente</th>
				 				<th>Salida</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<tr>
				 				<td rowspan="2">2</td>
								<td>1</td>
								<td></td>
								<td></td>
								<td></td>
								<td><a href="#">Entrada</a></td>
				 			</tr>
				 			<tr>
				 				<td>2</td>
				 				<td></td>
								<td></td>
								<td></td>
								<td><a href="#">Entrada</a></td>
				 			</tr>
				 		</tbody>
				 	</table>
		 		</div>
		 		
		 	</div>
		 </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
		<!-- datepicker -->
		<script type="text/javascript" src="../app/view/js/pickadate/picker.js"></script>
		<script type="text/javascript" src="../app/view/js/pickadate/picker.date.js"></script>
		<script type="text/javascript" src="../app/view/js/pickadate/picker.time.js"></script>
		<script type="text/javascript" src="../app/view/js/calendario.js"></script>
		<script type="text/javascript" src="../app/view/js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
	</body>
</html>