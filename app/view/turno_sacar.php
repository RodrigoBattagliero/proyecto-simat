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
		 		<div class="col-sm-6">
		 			<h4 class="page-header">Turnos</h4>
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Doctor</th>
				 				<th>Fecha</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($turnos)): ?>
				 				<?php foreach($turnos as $turno): ?>
				 					<tr>
				 						<td><?= $turno->profesional ?></td>
				 						<td><?= $turno->fecha_inicio ?></td>
				 					</tr>
				 				<?php endforeach; ?>
				 			<?php else: ?>
				 				<tr>
				 					<td colspan="2">No hay datos para mostrar</td>
				 				</tr>
				 			<?php endif; ?>
				 		</tbody>
				 	</table>
		 		</div>
		 		<div class="col-sm-6">
		 			<h4 class="page-header">Nuevo turno</h4>
		 			<form method="post" action="<?= URL ?>turnos/alta" >
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
					    	<label for="fecha_inicio">Fecha</label>
					    	<input type="text" class="form-control datetimeparaturnos" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha">
					  	</div>
					  	<button type="submit" class="btn btn-default">Confirmar</button>
					</form>
		 			<div id="calendario" class="datetimeparaturnosinline"></div>
		 		</div>
		 	</div>
		 </div>

		<?php include 'partes/footer-js.php' ?>	</body>
</html>