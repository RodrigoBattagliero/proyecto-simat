<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Profesionales</title>
		<?php include 'partes/head-css.php' ?>
	</head>
	<body>

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<div class="row">
		 		<?php include 'partes/mensajes.php' ?>

		 		<div class="col-sm-2"></div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Profesionales</h4>
		 			<form action="" method="post">
		 				<div class="form-group">
						    <label for="nombre">Nombre</label>
						    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= $profesional->nombre ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="apellido">Apellido</label>
						    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?= $profesional->apellido ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="dni">DNI</label>
						    <input type="text" class="form-control" id="dni" name="dni" placeholder="dni" value="<?= $profesional->dni ?>">
					  </div>
					  	<div class="form-group">
						    <label for="direccion">Dirección</label>
						    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" value="<?= $profesional->direccion ?>">
					  	</div>
					  	<div class="form-group">
						    <label for="telefono">Teléfono</label>
						    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" value="<?= $profesional->telefono ?>">
					  	</div>
					  	<div class="form-group">
					  		<label for="telefono">Tipo</label>
			 				<select class="form-control" id="tipo" name="tipo">
								  <option value="1" <?php echo ($profesional->tipo == 'Medico') ? ' selected ' : '' ?>>Doctor</option>
								  <option value="2" <?php echo ($profesional->tipo == 'Enfermero') ? ' selected ' : '' ?>>Enfermero</option>
								  <option value="3" <?php echo ($profesional->tipo == 'Instrumentista') ? ' selected ' : '' ?>>Instrumentista</option>
							</select>
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