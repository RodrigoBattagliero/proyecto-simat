<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Pacientes</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="js/pickadate/themes/default.css">
		<link rel="stylesheet" type="text/css" href="js/pickadate/themes/default.date.css">
		<link rel="stylesheet" type="text/css" href="js/pickadate/themes/default.time.css">

		<link rel="stylesheet" href="../../app/view/js/datetimepicker/jquery.datetimepicker.css">
	</head>
	<body>

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<div class="row">
		 		<div class="col-sm-2"></div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Pacientes</h4>
		 			<form action="" method="post">
		 				<div class="form-group">
						    <label for="nombre">Nombre</label>
						    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= $paciente->nombre ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="apellido">Apellido</label>
						    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?= $paciente->apellido ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="fecha_nacimiento">Fecha de nacimiento</label>
						    <input type="text" class="form-control datepicker" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="dd/mm/aaaa" value="<?= $paciente->fecha_nacimiento ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="telefono">Teléfono</label>
						    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" value="<?= $paciente->telefono ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="direccion">Dirección</label>
						    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" value="<?= $paciente->direccion ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="localidad">Localidad</label>
						    <input type="text" class="form-control" id="localidad" name="localidad" placeholder="localidad" value="<?= $paciente->localidad ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="ocupacion">Ocupación</label>
						    <input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="ocupacion" value="<?= $paciente->ocupacion ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="obra_social">Obra social</label>
						    <input type="text" class="form-control" id="obra_social" name="obra_social" placeholder="obra_social" value="<?= $paciente->obra_social ?>">
					  	</div>
					  	<div class="form-group">
					  		<label for="sexo">Sexo</label>
			 				<select class="form-control" id="sexo" name="sexo">
								  <option value="F" <?php echo ($paciente->sexo == 'F') ? ' selected ' : '' ?>>Femenino</option>
								  <option value="M" <?php echo ($paciente->sexo == 'M') ? ' selected ' : '' ?>>Masculino</option>
							</select>
			 			</div>
			 			<div class="form-group">
					  		<label for="foto">Foto</label>
			 				<input type="file" class="form-control" id="foto" name="foto" accept="jpg">
			 			</div>
			 			<div class="form-group">
						    <label for="observaciones">Observaciones</label>
						    <textarea name="observaciones" id="observaciones" cols="30" rows="10" class="form-control"><?= $paciente->observaciones ?></textarea>
					  	</div>
					  <button type="submit" class="btn btn-default">Guardar</button>
		 			</form>
		 		</div>
		 		<div class="col-sm-2"></div>
		 	</div>
		 </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../../app/view/js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="../../app/view/js/calendario.js"></script>
		
	</body>
</html>