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
		 				<li role="presentation" class="active"><a href="#pacientesBuscar" aria-controls="usuariosBuscar" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</a></li>
		 				<li role="presentation" ><a href="#pacientesNuevo" aria-controls="usuariosNuevo" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Nuevo paciente</a></li>
		 			</ul>
		 			<div class="tab-content">
		 				<div role="tabpanel" class="tab-pane active" id="pacientesBuscar">
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
				 					<label for="obra_social">Obra social</label>
				 					<input type="text" id="obra_social" name="obra_social" class="form-control">
				 				</div>

						  		<button type="submit" class="btn btn-default">Buscar</button>
						  	
							</form>
		 				</div>
		 				<div role="tabpanel" class="tab-pane" id="pacientesNuevo">
		 					<form action="<?= URL.'pacientes/alta' ?>" method="post">
				 				<div class="form-group">
								    <label for="nombre">Nombre</label>
								    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
							  	</div>
							  	<div class="form-group">
								    <label for="apellido">Apellido</label>
								    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido">
							  	</div>
							  	<div class="form-group">
								    <label for="fecha_nacimiento">Fecha de nacimiento</label>
								    <input type="text" class="form-control datepicker" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="dd/mm/aaaa">
							  	</div>
							  	<div class="form-group">
								    <label for="telefono">Teléfono</label>
								    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono">
							  	</div>
							  	<div class="form-group">
								    <label for="direccion">Dirección</label>
								    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
							  	</div>
							  	<div class="form-group">
								    <label for="localidad">Localidad</label>
								    <input type="text" class="form-control" id="localidad" name="localidad" placeholder="localidad">
							  	</div>
							  	<div class="form-group">
								    <label for="ocupacion">Ocupación</label>
								    <input type="text" class="form-control" id="ocupacion" name="ocupacion" placeholder="ocupacion">
							  	</div>
							  	<div class="form-group">
								    <label for="obra_social">Obra social</label>
								    <input type="text" class="form-control" id="obra_social" name="obra_social" placeholder="obra_social">
							  	</div>
							  	<div class="form-group">
							  		<label for="sexo">Sexo</label>
					 				<select class="form-control" id="sexo" name="sexo">
										  <option value="F">Femenino</option>
										  <option value="M">Masculino</option>
									</select>
					 			</div>
					 			<div class="form-group">
							  		<label for="foto">Foto</label>
					 				<input type="file" class="form-control" id="foto" name="foto" accept="jpg">
					 			</div>
					 			<div class="form-group">
								    <label for="observaciones">Observaciones</label>
								    <textarea name="observaciones" id="observaciones" cols="30" rows="10" class="form-control"></textarea>
							  	</div>
							  <button type="submit" class="btn btn-default">Guardar</button>
				 			</form>
		 				</div>
		 			</div>
		 			
		 		</div>
		 		<div class="col-sm-8">
		 			<h4 class="page-header">Pacientes</h4>

		 			<a href="<?= URL ?>pacientes/print?nombre=<?= $dataSearch['nombre'] ?>&apellido=<?= $dataSearch['apellido'] ?>&obra_social=<?= $dataSearch['obra_social'] ?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Descargar PDF</a>
		 			<br />
		 			<br />
		 			<table class="table table-hover table-bordered">
				 		<thead>
				 			<tr>
				 				<th>Nombre</th>
				 				<th>Teléfono</th>
				 				<th>Dirección</th>
				 				<th>Localidad</th>
				 				<th>Obra social</th>
				 				<th>Opciones</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php if(!empty($datos)): ?>
				 				<?php foreach($datos as $dato): ?>
						 			<tr>
						 				<td><?= $dato->apellido . ', ' . $dato->nombre ?></td>
						 				<td><?= $dato->telefono ?></td>
						 				<td><?= $dato->direccion ?></td>
						 				<td><?= $dato->localidad ?></td>
						 				<td><?= $dato->obra_social ?></td>
						 				<td>
						 					<a href="<?= URL ?>pacientes/<?= $dato->id ?>" title="Editar" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
						 					<a href="<?= URL ?>pacientes/eliminar/<?= $dato->id ?>" title="Eliminar" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a>
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