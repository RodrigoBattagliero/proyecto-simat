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
		 			<h4 class="page-header">Acciones</h4>
		 			<ul class="nav nav-tabs" role="tablist">
		 				<li role="presentation" class="active"><a href="#turnosBuscar" aria-controls="usuariosBuscar" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</a></li>
		 				<li role="presentation" ><a href="#turnosNuevo" aria-controls="usuariosNuevo" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo turno</a></li>
		 			</ul>
		 			<div class="tab-content">
		 				<div role="tabpanel" class="tab-pane active" id="turnosBuscar">
		 					<form method="post" action="<?= URL ?>turnos/search" >
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
							    	<label for="fecha_inicio">Fecha</label>
							    	<input type="text" class="form-control datetimepicker" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha">
							  	</div>
							  
							  <button type="submit" class="btn btn-default">Buscar</button>
							</form>
		 				</div>
		 				<div role="tabpanel" class="tab-pane" id="turnosNuevo">
		 					<form method="get" action="<?= URL ?>turnos" >
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
							    	<label for="fecha_inicio">Fecha</label>
							    	<input type="text" class="form-control datetimeparaturnos" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha">
							  	</div>
							  	<button type="submit" class="btn btn-default">Confirmar</button>
							</form>
		 					
		 				</div>
		 			</div>
		 			
		 		</div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Turnos</h4>
		 			<a href="<?= URL ?>turnos/print?user=<?= (isset($_GET['usuario'])) ? $_GET['usuario'] : '' ?>&tipo=<?= (isset($_GET['tipo'])) ? $_GET['tipo'] : '' ?> " class="btn btn-default btn-sm"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar PDF</a>
		 			<br />
		 			<br />
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Fecha</th>
				 				<th>Doctor</th>
				 				<th>Paciente</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($turnos)): ?>
								<?php foreach($turnos as $turno): ?>
						 			<tr>
						 				<td><?= $turno->fecha_inicio ?></td>
						 				<td><?= $turno->profesional ?></td>
						 				<td><?= $turno->paciente ?></td>
						 				<td>
							 				<a href="<?= URL ?>turnos/eliminar/<?= $turno->id ?>">Baja</a>
							 				<?php if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2): ?>
							 					<a href="<?= URL ?>turnos/<?= $turno->id ?>">Modificar</a>
							 				<?php endif; ?>
						 				</td>
						 			</tr>
					 			<?php endforeach; ?>
				 			<?php else: ?>
				 				<tr>
				 					<td colspan="3">No se encontraron datos.</td>
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