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
		 		<div class="col-sm-4">
		 			<h4 class="page-header">Buscar</h4>
		 			
 					<form  method="get" action="<?= URL ?>usuarios/search">
 				
		 				<div class="form-group">
		 					<label for="user">User</label>
							<input type="text" name="user" id="user" class="form-control">
		 				</div>

				  		<div class="form-group">
		 					<label for="tipo">Tipo</label>
		 					<select class="form-control" id="tipo" name="tipo" >
		 						<option value="0">Seleccionar</option>
								<option value="1">Administrador</option>
								<option value="2">Secretaría</option>
								<option value="3">Profesional</option>
								<option value="4">Paciente</option>
							</select>
		 				</div>
				  	
				  		<button type="submit" class="btn btn-default">Confirmar</button>
				  	
					</form>
		 		</div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Usuarios</h4>
		 			
		 			<a href="<?= URL ?>usuarios/print?user=<?= (isset($_GET['usuario'])) ? $_GET['usuario'] : '' ?>&tipo=<?= (isset($_GET['tipo'])) ? $_GET['tipo'] : '' ?> " class="btn btn-default btn-sm"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar PDF</a>
		 			<a href="<?= URL ?>usuarios/alta"  class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo usuario</a>
		 			<br />
		 			<br />
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Usuario</th>
				 				<th>Tipo</th>
				 				<th>Opciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($usuarios)): ?>
				 				<?php foreach($usuarios as $usuario): ?>
				 					<?php 
				 						$tipo = '';
										if($usuario->tipo == 1){
											$tipo = 'Administrador';
										}
										if($usuario->tipo == 2){
											$tipo = 'Secretaría';
										}
										if($usuario->tipo == 3){
											$tipo = 'Profesional';
										}
										if($usuario->tipo == 4){
											$tipo = 'Paciente';
										}
				 					?>
						 			<tr>
						 				<td><?= $usuario->user ?></td>
						 				<td><?= $tipo ?></td>
						 				<td>
						 					<a href="<?= URL ?>usuarios/<?= $usuario->id ?>" title="Editar" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						 					<a href="<?= URL ?>usuarios/eliminar/<?= $usuario->id ?>" title="Eliminar" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a>
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

		<?php include 'partes/footer-js.php' ?>

	</body>
</html>