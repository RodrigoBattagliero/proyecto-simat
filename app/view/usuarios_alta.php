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
		 			<h4 class="page-header">Usuarios</h4>
		 			<form method="post" action="">
		 				
		 				<div class="form-group">
		 					<label for="user">User</label>
							<input type="text" name="user" id="user" class="form-control">
		 				</div>
						
						<div class="form-group">
		 					<label for="password">password</label>
							<input type="password" name="password" id="password" class="form-control">
		 				</div>

		 				<div class="form-group">
		 					<label for="repetir_password">Repetir password</label>
							<input type="password" name="repetir_password" id="repetir_password" class="form-control">
		 				</div>

		 				<div class="form-group">
		 					<label for="tipo">Tipo</label>
		 					<select class="form-control" id="nuevoUsuarioTipo" name="tipo" >
		 						<option value="0">Seleccionar</option>
								<option value="1">Administrador</option>
								<option value="2">Secretaría</option>
								<option value="3">Profesional</option>
								<option value="4">Paciente</option>
							</select>
		 				</div>

		 				<div class="form-group" id="selectProfesionales" style="display:none">
		 					<label for="id_profesional">Profesional</label>
		 					<select class="form-control" id="id_profesional" name="id_profesional" >
		 						<option value="0">Seleccionar</option>
								<?php foreach($profesionales as $profesional): ?>
									<option value="<?= $profesional->id ?>" ><?= $profesional->apellido . ', ' . $profesional->nombre ?></option>
								<?php endforeach; ?>
							</select>
		 				</div>

		 				<div class="form-group" id="selectPacientes" style="display:none">
		 					<label for="id_paciente">Paciente</label>
		 					<select class="form-control" id="id_paciente" name="id_paciente" >
		 						<option value="0">Seleccionar</option>
								<?php foreach($pacientes as $paciente): ?>
									<option value="<?= $paciente->id ?>" ><?= $paciente->apellido . ', ' . $paciente->nombre ?></option>
								<?php endforeach; ?>
							</select>
		 				</div>

	 				
				  		
				  	
				  		<button type="submit" class="btn btn-default">Confirmar</button>
				  	
					</form>
		 		</div>
		 		<div class="col-sm-2"></div>
		 	</div>
		 </div>
		
		<?php include 'partes/footer-js.php' ?>
		<script>
			$("#nuevoUsuarioTipo").change(function(){
				if($(this).find('option:selected').val() == 3){
					$("#selectProfesionales").css("display","block");
					$("#selectPacientes").css("display","none");
				}
				if($(this).find('option:selected').val() == 4){
					$("#selectProfesionales").css("display","none");
					$("#selectPacientes").css("display","block");
				}
			});
		</script>
	</body>
</html>