<?php 
if(isset($_GET['id_profesional'])){
	$search['id_profesional'] = $_GET['id_profesional'];
}else{
	$search['id_profesional'] = '';
}
if(isset($_GET['id_paciente'])){
	$search['id_paciente'] = $_GET['id_paciente'];
}else{
	$search['id_paciente'] = '';
}
?>
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
		 				<li role="presentation" class="active"><a href="#historiasBuscar" aria-controls="usuariosBuscar" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</a></li>
		 				<li role="presentation" ><a href="#historiasNuevo" aria-controls="usuariosNuevo" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nueva hisroria</a></li>
		 			</ul>
		 			<div class="tab-content">
		 				<div role="tabpanel" class="tab-pane active" id="historiasBuscar">
		 					<form  method="get" action="<?= URL ?>historias_clinicas/search">
		 				
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
						  	
						  		<button type="submit" class="btn btn-default">Buscar</button>
						  	
							</form>
		 				</div>
		 				<div role="tabpanel" class="tab-pane" id="historiasNuevo">
		 					<form method="post" action="<?= URL .'historias_clinicas/alta' ?>">
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
		 			</div>
		 			
		 		</div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Historias clinicas</h4>
		 			<a href="<?= URL ?>historias_clinicas/print?id_profesional=<?= $search['id_profesional'] ?>&id_paciente<?= $search['id_paciente'] ?>"  class="btn btn-default btn-sm"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar PDF</a>
		 			<br />
		 			<br />
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Fecha</th>
				 				<th>Doctor</th>
				 				<th>Paciente</th>
				 				<th>Opciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($historias)): ?>
				 				<?php foreach($historias as $historia): ?>
						 			<tr>
						 				<td><?= $historia->fecha ?></td>
						 				<td><?= $historia->profesional ?></td>
						 				<td><?= $historia->paciente ?></td>
						 				<td>
						 					<a href="#detalle<?= $historia->id ?>" data-toggle="collapse" aria-controls="detalle<?= $historia->id ?>"  data-parent="#accordion">Ver</a>
						 					<a href="<?= URL ?>historias_clinicas/eliminar/<?= $historia->id ?>">Eliminar</a>
						 					<a href="<?= URL ?>historias_clinicas/<?= $historia->id ?>">Modificar</a>
						 				</td>
						 			</tr>
						 			<tr id="detalle<?= $historia->id ?>" class="collapse">
						 				<td colspan="4">
						 					<?= $historia->detalle ?>
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