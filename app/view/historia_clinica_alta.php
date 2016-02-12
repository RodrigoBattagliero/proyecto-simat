<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Historia clinica</title>
		
		<?php include 'partes/head-css.php' ?>
	</head>
	<body>

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<?php include 'partes/mensajes.php' ?>
		 	<div class="row">
		 		<div class="col-sm-2"></div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Historia clinica</h4>
		 			<form method="post" action="">
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
						    <label for="detalle">Detalle</label>
						    <textarea name="detalle" id="detalle" cols="30" rows="10" class="form-control"></textarea>
					  	</div>
					  <button type="submit" class="btn btn-default">Guardar</button>
		 			</form>
		 		</div>
		 		<div class="col-sm-2"></div>
		 	</div>
		 </div>

		<?php include 'partes/footer-js.php' ?>
		
	</body>
</html>