<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Titulo</title>
		<?php include 'partes/head-css.php' ?>
	</head>
	<body>

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<?php include 'partes/mensajes.php' ?>
		 	<div class="row">
		 		<div class="col-sm-2"></div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Cambiar contraseña</h4>
		 			<form action="<?= URL ?>perfil" method="post">
		 				<div class="form-group">
						    <label for="password_actual">Contraseña actual</label>
						    <input type="password" class="form-control" id="password_actual" name="password_actual">
					  	</div>
					  	<div class="form-group">
						    <label for="password_nueva">Contraseña nueva</label>
						    <input type="password" name="password_nueva" class="form-control" id="password_nueva" >
					  	</div>
					  	<div class="form-group">
						    <label for="password_repetida">Repetir nueva</label>
						    <input type="password" name="password_repetida" class="form-control" id="password_repetida" >
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