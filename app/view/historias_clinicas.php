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
		 			<h4 class="page-header">Buscar</h4>
		 			<form  method="post" action="./search">
		 				
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
				  	
				  		<button type="submit" class="btn btn-default">Buscar</button>
				  	
					</form>
		 			
		 		</div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Historias clinicas</h4>
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Fecha</th>
				 				<th>Doctor</th>
				 				<th>Paciente</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($historias)): ?>
				 				<?php foreach($historias as $historia): ?>
						 			<tr>
						 				<td><?= $historia->fecha ?></td>
						 				<td><?= $historia->profesional ?></td>
						 				<td><?= $historia->paciente ?></td>
						 				<td>
						 					<a href="#detalle<?= $historia->id ?>" data-toggle="collapse" aria-controls="detalle<?= $historia->id ?>"  data-parent="#accordion">Ver</a>
						 					<a href="<?= URL ?>historias_clinicas/eliminar/<?= $historia->id ?>">Eliminar</a>
						 					<a href="<?= URL ?>historias_clinicas/<?= $historia->id ?>">Modificar</a>
						 				</td>
						 			</tr>
						 			<tr id="detalle<?= $historia->id ?>" class="collapse">
						 				<td colspan="4">
						 					<?= $historia->detalle ?>
						 				</td>
						 			</tr>
				 			<?php endforeach; ?>
				 			<?php else: ?>
				 				<tr>
				 					<td colspan="4">No se encontraron datos</td>
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
		
		<!-- datepicker -->
		<script type="text/javascript" src="../app/view/js/pickadate/picker.js"></script>
		<script type="text/javascript" src="../app/view/js/pickadate/picker.date.js"></script>
		<script type="text/javascript" src="../app/view/js/pickadate/picker.time.js"></script>
		<script type="text/javascript" src="../app/view/js/calendario.js"></script>
		<script type="text/javascript" src="../app/view/js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
	</body>
</html>