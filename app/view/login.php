<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Titulo</title>
		<?php include 'partes/head-css.php' ?>
	</head>
	<body>
		<div class="container">
	      <form class="form-signin" method="post" action="">
			<?php include 'partes/mensajes.php' ?>
	        <h2 class="form-signin-heading">Login</h2>
	        <label for="user" class="sr-only">User</label>
	        <input type="text" id="user" name="user" class="form-control" placeholder="Nombre de usuario" required autofocus>
	        <label for="password" class="sr-only">Contraseña</label>
	        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
	        <br />
	        <button class="btn btn-lg btn-default btn-block" type="submit">Sign in</button>
	      </form>
	    </div>
		
		<?php include 'partes/footer-js.php' ?>
		
	</body>
</html>