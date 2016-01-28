<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Titulo</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="js/pickadate/themes/default.css">
		<link rel="stylesheet" type="text/css" href="js/pickadate/themes/default.date.css">
		<link rel="stylesheet" type="text/css" href="js/pickadate/themes/default.time.css">
	</head>
	<body>

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<div class="row">
		 		<div class="col-sm-12">
		 			<h4 class="page-header">Pacientes</h4>
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Nombre</th>
				 				<th>Teléfono</th>
				 				<th>Dirección</th>
				 				<th>Localidad</th>
				 				<th>Obra social</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($datos)): ?>
				 				<?php foreach($datos as $dato): ?>
						 			<tr>
						 				<td><?= $dato->apellido . ', ' . $dato->nombre ?></td>
						 				<td><?= $dato->telefono ?></td>
						 				<td><?= $dato->direccion ?></td>
						 				<td><?= $dato->localidad ?></td>
						 				<td><?= $dato->obra_social ?></td>
						 				<td>
						 					<a href="<?= URL ?>pacientes/eliminar/<?= $dato->id ?>">Eliminar</a>
						 					<a href="<?= URL ?>pacientes/<?= $dato->id ?>">Modificar</a>
						 				</td>
						 			</tr>
					 			<?php endforeach; ?>
					 		<?php else: ?>
					 			<tr>
					 				<td colspan="6">No hay datos para mostrar</td>
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
		<script type="text/javascript" src="js/pickadate/picker.js"></script>
		<script type="text/javascript" src="js/pickadate/picker.date.js"></script>
		<script type="text/javascript" src="js/pickadate/picker.time.js"></script>
		<script type="text/javascript" src="js/calendario.js"></script>
	</body>
</html>