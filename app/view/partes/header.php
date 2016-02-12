<nav class="navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Navegación</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">LOGO</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php if($_SESSION['tipo'] && $_SESSION['tipo'] == 1): // Administrador ?>
					<li><a href="<?= URL ?>usuarios">Usuarios</a></li>
		        	<li><a href="<?= URL ?>pacientes">Pacientes</a></li>
		        	<li><a href="<?= URL ?>profesionales">Profesionales</a></li>
		        <?php endif; ?>
		        <?php if($_SESSION['tipo'] && ($_SESSION['tipo'] == 1) || $_SESSION['tipo'] == 2): // Admin o secretaría ?>
		        	<li><a href="<?= URL ?>internaciones">Internaciones</a></li>
		    	<?php endif; ?>
		    	<?php if($_SESSION['tipo'] && ($_SESSION['tipo'] == 1) || $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 3): // Admin o secretaría o profesional ?>
		        	<li><a href="<?= URL ?>guardias">Guardias</a></li>
		        	<li><a href="<?= URL ?>historias_clinicas">Historias clinicas</a></li>
		        <?php endif; ?>
		        <?php if($_SESSION['tipo'] && ($_SESSION['tipo'] == 1) || $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 3 || $_SESSION['tipo'] == 4): // Admin o secretaría o profesional o paciente ?>
		        	<li><a href="<?= URL ?>turnos">Turnos</a></li>
		        	<li><a href="<?= URL ?>perfil">Perfil</a></li>
		        	<li><a href="<?= URL ?>logout">Salir</a></li>
		        <?php endif; ?>
		    </ul>
		</div>
	</div>		
</nav>