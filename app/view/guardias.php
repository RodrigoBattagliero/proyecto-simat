<?php 

	if(!isset($guardiaSelected)){
		$guardiaSelected = new stdClass();
		$guardiaSelected->id = null;
		$guardiaSelected->id_profesional = null;
		$guardiaSelected->fecha_inicio = null;
		$guardiaSelected->fecha_final = null;
	}
	if(!empty($_GET['id_profesional'])){
		$search['id_profesional'] = $_GET['id_profesional'];
	}else{
		$search['id_profesional'] = '';
	}
	if(!empty($_GET['fecha_inicio'])){
		$search['fecha_inicio'] = $_GET['fecha_inicio'];
	}else{
		$search['fecha_inicio'] = '';
	}
	if(!empty($_GET['fecha_final'])){
		$search['fecha_final'] = $_GET['fecha_final'];
	}else{
		$search['fecha_final'] = '';
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
		 			<h4 class="page-header">Buscar</h4>
		 			
 					<form  method="get" action="<?= URL ?>guardias/search">
 				
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
		 					<label for="fecha_inicio">Incio</label>
						    <label class="sr-only" for="fecha_inicio">Fecha</label>
						    <input type="text" class="form-control fecha_inicio datetimepicker" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha"  >
						</div>
					
					
						<div class="form-group">
		 					<label for="fecha_final">Fin</label>
							<label class="sr-only" for="fecha_final">Fecha</label>
						    <input type="text" class="form-control fecha_final datetimepicker" name="fecha_final" id="fecha_final" placeholder="Fecha">
						</div>
				  	
				  	
				  		<button type="submit" class="btn btn-default">Confirmar</button>
				  	
					</form>
		 				
		 			
		 		</div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Guardias</h4>
		 			
		 			<a href="<?= URL ?>guardias/print?id_profesional=<?= $search['id_profesional'] ?>&fecha_inicio=<?= $search['fecha_inicio'] ?>&fecha_final=<?= $search['fecha_final'] ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar PDF</a>
		 			<a href="<?= URL ?>guardias/alta"  class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nueva guardia</a>
		 			<br />
		 			<br />
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Inicio</th>
				 				<th>Fin</th>
				 				<th>Doctor</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($guardias)): ?>
				 				<?php foreach($guardias as $guardia): ?>
						 			<tr>
						 				<td><?= $guardia->fecha_inicio ?></td>
						 				<td><?= $guardia->fecha_final ?></td>
						 				<td><?= $guardia->profesional ?></td>
						 				<td>
						 					<?php if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2): ?>
						 						<a href="<?= URL ?>guardias/eliminar/<?= $guardia->id ?>" class="btn btn-default btn-sm">Eliminar</a>
						 						<a href="<?= URL ?>guardias/<?= $guardia->id ?>" class="btn btn-default btn-sm">Modificar</a>
						 					<?php else: ?>
						 						No hay acciones.
						 					<?php endif; ?>
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
</html>s