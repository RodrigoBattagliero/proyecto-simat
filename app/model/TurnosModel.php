<?php

require_once 'Model.php';

class TurnosModel extends Model{

	public function __construct(){

		$this->table = 'turnos';
		$this->where = ' 1';

		$this->defaultFields = ' id, fecha_inicio, fecha_final, id_profesional, id_paciente';

		$this->setFiels();

		$this->validation = array(
				'id' => 'integer',
				'fecha_inicio' => 'datetime',
				'fecha_final' => 'datetime',
				'id_profesional' => 'integer',
				'id_paciente' => 'integer'
			);

		$this->order = ' fecha_inicio DESC ';

	}
}
?>