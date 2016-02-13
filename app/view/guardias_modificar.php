<!DOCTYPE html>
<html lang="es">
	<head>
		<title></title>
		<?php include 'partes/head-css.php' ?>
	</head>
	<body>

		<?php include 'partes/header.php' ?>
		 <div class="container">
		 	<?php include 'partes/mensajes.php' ?>
		 	<div class="row">
		 		<div class="col-sm-2"></div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Nueva guardia</h4>
		 			<form method="post" action="">
					 				
		 				<div class="form-group">
		 					<label for="id_profesional">Profesional</label>
		 					<select class="form-control" id="id_profesional" name="id_profesional" >
		 						<option value="0">Seleccionar</option>
								<?php foreach($profesionales as $profesional): ?>
									<option value="<?= $profesional->id ?>" <?php echo ($guardiaSelected->id_profesional == $profesional->id) ? ' selected ' : '' ?>><?= $profesional->apellido . ', ' . $profesional->nombre ?></option>
								<?php endforeach; ?>
							</select>
		 				</div>
	 				
						<div class="form-group">
		 					<label for="fecha_inicio">Incio</label>
						    <label class="sr-only" for="fecha_inicio">Fecha</label>
						    <input type="text" class="form-control fecha_inicio datetimepicker" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha" value="<?= $guardiaSelected->fecha_inicio ?>" >
						</div>
					
					
						<div class="form-group">
		 					<label for="fecha_final">Fin</label>
							<label class="sr-only" for="fecha_final">Fecha</label>
						    <input type="text" class="form-control fecha_final datetimepicker" name="fecha_final" id="fecha_final" placeholder="Fecha" value="<?= $guardiaSelected->fecha_final ?>">
						</div>
				  	
				  	
				  		<button type="submit" class="btn btn-default">Confirmar</button>
				  	
					</form>
		 			
		 		</div>
		 		<div class="col-sm-2"></div>
		 	</div>
		 </div>

		<?php include 'partes/footer-js.php' ?>
		
	</body>
</html>