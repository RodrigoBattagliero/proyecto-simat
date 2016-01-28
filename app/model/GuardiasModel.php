<?php

require_once 'Model.php';

class GuardiasModel extends Model{

	public function __construct(){

		$this->table = 'guardias';
		$this->where = ' 1';

		$this->defaultFields = ' id, fecha_inicio, fecha_final, id_profesional';

		$this->setFiels();

		$this->validation = array(
				'id' => 'integer',
				'fecha_inicio' => 'datetime',
				'fecha_final' => 'datetime',
				'id_profesional' => 'integer'
			);

		$this->order = ' fecha_inicio DESC ';

	}
}
?>