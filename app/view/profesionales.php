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
		 				<li role="presentation" class="active"><a href="#profesionalesBuscar" aria-controls="usuariosBuscar" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</a></li>
		 				<li role="presentation" ><a href="#profesionalesNuevo" aria-controls="usuariosNuevo" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo profesional</a></li>
		 			</ul>
		 			<div class="tab-content">
		 				<div role="tabpanel" class="tab-pane active" id="profesionalesBuscar">
		 					<form  method="get" action="?">
		 				
				 				<div class="form-group">
				 					<label for="nombre">Nombre</label>
				 					<input type="text" id="nombre" name="nombre" class="form-control">
				 				</div>
			 					
			 					<div class="form-group">
				 					<label for="apellido">Apellido</label>
				 					<input type="text" id="apellido" name="apellido" class="form-control">
				 				</div>

				 				<div class="form-group">
				 					<label for="dni">DNI</label>
				 					<input type="text" id="dni" name="dni" class="form-control">
				 				</div>

				 				<div class="form-group">
				 					<label for="tipo">Tipo</label>
				 					<select class="form-control" id="tipo" name="tipo" >
				 						<option value="0">Seleccionar</option>
										<option value="1">Medico</option>
										<option value="2">Enfermero</option>
										<option value="3">Instrumentista</option>
									</select>
				 				</div>

						  	
						  		<button type="submit" class="btn btn-default">Buscar</button>
						  	
							</form>
		 				</div>
		 				<div role="tabpanel" class="tab-pane" id="profesionalesNuevo">

				 			<form action="<?= URL.'profesionales/alta' ?>" method="post">
				 				<div class="form-group">
								    <label for="nombre">Nombre</label>
								    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
							  	</div>
							  	<div class="form-group">
								    <label for="apellido">Apellido</label>
								    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido">
							  	</div>
							  	<div class="form-group">
								    <label for="dni">DNI</label>
								    <input type="text" class="form-control" id="dni" name="dni" placeholder="dni">
							  	</div>
							  	<div class="form-group">
								    <label for="direccion">Dirección</label>
								    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
							  	</div>
							  	<div class="form-group">
								    <label for="telefono">Teléfono</label>
								    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
							  	</div>
							  	<div class="form-group">
							  		<label for="telefono">Tipo</label>
					 				<select class="form-control" id="tipo" name="tipo">
										  <option value="1">Medico</option>
										  <option value="2">Enfermero</option>
										  <option value="3">Instrumentista</option>
									</select>
					 			</div>
							  <button type="submit" class="btn btn-default">Guardar</button>
				 			</form>
		 				</div>
		 			</div>
		 			

					
		 			
		 		</div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Profesionales</h4>
		 			<a href="<?= URL ?>profesionales/print?nombre=<?= $searchData['nombre'] ?>&apellido=<?= $searchData['apellido'] ?>&dni=<?= $searchData['dni'] ?>&tipo=<?= $searchData['tipo'] ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar PDF</a>
		 			<br />
		 			<br />
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Nombre</th>
				 				<th>DNI</th>
				 				<th>Dirección</th>
				 				<th>Teléfono</th>
				 				<th>Tipo</th>
				 				<th>Acciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($datos)): ?>
				 				<?php foreach($datos as $dato): ?>
						 			<tr>
						 				<td><?= $dato->apellido . ', ' . $dato->nombre ?></td>
						 				<td><?= $dato->dni ?></td>
						 				<td><?= $dato->direccion ?></td>
						 				<td><?= $dato->telefono ?></td>
						 				<td><?= $dato->tipo ?></td>
						 				<td>
						 					<a href="<?= URL ?>profesionales/<?= $dato->id ?>" title="Editar" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						 					<a href="<?= URL ?>profesionales/eliminar/<?= $dato->id ?>" title="Eliminar" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a>
						 				</td>
						 			</tr>
						 		<?php endforeach; ?>
				 			<?php else: ?>
				 				<tr>
				 					<td colspan="6">No hay datos para mostrar</td>
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