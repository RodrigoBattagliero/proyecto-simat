<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<?php if(isset($flash['msgExito'])): ?>
			<div class="bg-success"><h4 class="mensaje" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <?= $flash['msgExito'] ?></h4></div> 
		<?php endif; ?>
		<?php if(isset($flash['msgInfo'])): ?>
			<div class="bg-info"><h4 class="mensaje" ><?= $flash['msgInfo'] ?></h4></div>
		<?php endif; ?>
		<?php if(isset($flash['msgError'])): ?>
			<div class="bg-danger"><h4 class="mensaje" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> <?= $flash['msgError'] ?></h4></div>
		<?php endif; ?>
		<?php if(isset($flash['msgWarning'])): ?>
			<div class="bg-warning"><h4 class="mensaje" ><?= $flash['msgWarning'] ?></h4></div>
		<?php endif; ?>		
	</div>
	<div class="col-sm-2"></div>
</div>