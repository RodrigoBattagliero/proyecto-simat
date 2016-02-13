<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Titulo</title>
		<?php include 'partes/head-css.php' ?>
	</head>
	<body>

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<div class="row">
		 		<div class="col-sm-12">
		 			<?php include 'partes/mensajes.php' ?>
		 			<?php if(isset($habitacionSelected)): ?>
		 			<h4 class="page-header">Nueva internación</h4>
		 			<form  method="post" action="<?= URL ?>internaciones">
		 				<div class="form-group">
					  		<label for="id_paciente">Paciente</label>
			 				<select class="form-control" id="id_paciente" name="id_paciente">
								<?php foreach($pacientes as $paciente): ?>
									<option value="<?= $paciente->id ?>"><?= $paciente->apellido ?>, <?= $paciente->nombre ?></option>
								<?php endforeach; ?>
							</select>
			 			</div>
		 				
		 				<div class="form-group" style="display:none" >
		 					<label for="habitacion">Habitación</label>
		 					<select name="habitacion" id="habitacion" class="form-control">
		 						<option value="<?= (isset($habitacionSelected)) ? $habitacionSelected : ''  ?>"><?= (isset($habitacionSelected)) ? $habitacionSelected : ''  ?></option>
		 					</select>
		 				</div>
		 				<div class="form-group" style="display:none">
		 					<label for="cama">Cama</label>
		 					<select name="cama" id="cama" class="form-control">
		 						<option value="<?= (isset($camaSelected)) ? $camaSelected : ''  ?>"><?= (isset($camaSelected)) ? $camaSelected : ''  ?></option>
		 					</select>
		 				</div>
				  		
				  		<button type="submit" class="btn btn-default">Confirmar</button>
				  	
					</form>
					<?php endif; ?>
		 		</div>
		 	</div>
		 	<div class="row">
		 		<h4 class="page-header">Internaciones</h4>
		 		<div class="col-sm-6">
		 			
		 			<?php for($i=1;$i<=4;$i++): ?>
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Habitación</th>
				 				<th>Cama</th>
				 				<th>Entrada</th>
				 				<th>Paciente</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<tr class="<?= ($internaciones[$i]['1']->id) ? 'bg-danger' : 'bg-success' ?>">
				 				<td rowspan="2"><?= $i ?></td>
								<td>1</td>
								<td><?= $internaciones[$i]['1']->fecha_ingreso ?></td>
								<td><?= $internaciones[$i]['1']->paciente ?></td>
								<td>
									<?php if(!$internaciones[$i]['1']->id): ?>
										<a href="<?= URL ?>internaciones/<?= $i ?>/1">Entrada</a>
									<?php else: ?>
										<a href="<?= URL ?>internaciones/<?= $internaciones[$i]['1']->id ?>">Salida</a>
									<?php endif; ?>
								</td>
				 			</tr>
				 			<tr class="<?= ($internaciones[$i]['2']->id) ? 'bg-danger' : 'bg-success' ?>">
				 				<td>2</td>
				 				<td><?= $internaciones[$i]['2']->fecha_ingreso ?></td>
								<td><?= $internaciones[$i]['2']->paciente ?></td>
								<td>
									<?php if(!$internaciones[$i]['2']->id): ?>
										<a href="<?= URL ?>internaciones/<?= $i ?>/2">Entrada</a>
									<?php else: ?>
										<a href="<?= URL ?>internaciones/<?= $internaciones[$i]['2']->id ?>">Salida</a>
									<?php endif; ?>
								</td>
				 			</tr>
				 		</tbody>
				 	</table>
					<?php endfor; ?>
		 			
		 		</div>
		 		<div class="col-sm-6">
		 			
				 	<?php for($i=5;$i<=8;$i++): ?>
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Habitación</th>
				 				<th>Cama</th>
				 				<th>Entrada</th>
				 				<th>Paciente</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<tr class="<?= ($internaciones[$i]['1']->id) ? 'bg-danger' : 'bg-success' ?>">
				 				<td rowspan="2"><?= $i ?></td>
								<td>1</td>
								<td><?= $internaciones[$i]['1']->fecha_ingreso ?></td>
								<td><?= $internaciones[$i]['1']->paciente ?></td>
								<td>
									<?php if(!$internaciones[$i]['1']->id): ?>
										<a href="<?= URL ?>internaciones/<?= $i ?>/1">Entrada</a>
									<?php else: ?>
										<a href="<?= URL ?>internaciones/<?= $internaciones[$i]['1']->id ?>">Salida</a>
									<?php endif; ?>
								</td>
				 			</tr>
				 			<tr class="<?= ($internaciones[$i]['2']->id) ? 'bg-danger' : 'bg-success' ?>">
				 				<td>2</td>
				 				<td><?= $internaciones[$i]['2']->fecha_ingreso ?></td>
								<td><?= $internaciones[$i]['2']->paciente ?></td>
								<td>
									<?php if(!$internaciones[$i]['2']->id): ?>
										<a href="<?= URL ?>internaciones/<?= $i ?>/2">Entrada</a>
									<?php else: ?>
										<a href="<?= URL ?>internaciones/<?= $internaciones[$i]['2']->id ?>">Salida</a>
									<?php endif; ?>
								</td>
				 			</tr>
				 		</tbody>
				 	</table>
					<?php endfor; ?>
				 	
		 		</div>
		 		
		 	</div>
		 </div>

		<?php include 'partes/footer-js.php' ?>
	</body>
</html>