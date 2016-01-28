<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Historia clinica</title>
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
		 		<div class="col-sm-2"></div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Historia clinica</h4>
		 			<form action="">
		 				<div class="form-group">
					  		<label for="id_profesional">Profesional</label>
			 				<select class="form-control" id="id_profesional" name="id_profesional">
								  <option>1</option>
								  <option value="">2</option>
							</select>
			 			</div>
			 			<div class="form-group">
					  		<label for="id_paciente">Paciente</label>
			 				<select class="form-control" id="id_paciente" name="id_paciente">
								  <option>1</option>
								  <option value="">2</option>
							</select>
			 			</div>
		 				<div class="form-group">
						    <label for="detalle">Detalle</label>
						    <textarea name="detalle" id="detalle" cols="30" rows="10" class="form-control"></textarea>
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
		
	</body>
</html>