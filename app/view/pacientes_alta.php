<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Pacientes</title>
		<?php include 'partes/head-css.php' ?>
	</head>
	<body>

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<?php include 'partes/mensajes.php' ?>
		 	<div class="row">
		 		<div class="col-sm-2"></div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Pacientes</h4>
		 			<form action="" method="post">
		 				<div class="form-group">
						    <label for="nombre">Nombre</label>
						    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
					  	</div>
					  	<div class="form-group">
						    <label for="apellido">Apellido</label>
						    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido">
					  	</div>
					  	<div class="form-group">
						    <label for="fecha_nacimiento">Fecha de nacimiento</label>
						    <input type="text" class="form-control datepicker" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="dd/mm/aaaa">
					  	</div>
					  	<div class="form-group">
						    <label for="telefono">Teléfono</label>
						    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
					  	</div>
					  	<div class="form-group">
						    <label for="direccion">Dirección</label>
						    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
					  	</div>
					  	<div class="form-group">
						    <label for="localidad">Localidad</label>
						    <input type="text" class="form-control" id="localidad" name="localidad" placeholder="localidad">
					  	</div>
					  	<div class="form-group">
						    <label for="ocupacion">Ocupación</label>
						    <input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="ocupacion">
					  	</div>
					  	<div class="form-group">
						    <label for="obra_social">Obra social</label>
						    <input type="text" class="form-control" id="obra_social" name="obra_social" placeholder="obra_social">
					  	</div>
					  	<div class="form-group">
					  		<label for="sexo">Sexo</label>
			 				<select class="form-control" id="sexo" name="sexo">
								  <option value="F">Femenino</option>
								  <option value="M">Masculino</option>
							</select>
			 			</div>
			 			<div class="form-group">
					  		<label for="foto">Foto</label>
			 				<input type="file" class="form-control" id="foto" name="foto" accept="jpg">
			 			</div>
			 			<div class="form-group">
						    <label for="observaciones">Observaciones</label>
						    <textarea name="observaciones" id="observaciones" cols="30" rows="10" class="form-control"></textarea>
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