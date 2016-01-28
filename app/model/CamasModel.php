<?php

require_once 'Model.php';

class CamasModel extends Model{

	public function __construct(){

		$this->table = 'camas';
		$this->where = ' 1';

		$this->defaultFields = ' id,habitacion,fecha_ingreso,id_paciente ';

		$this->setFiels();

		$this->validation = array(
				'id' => 'integer',
				'habitacion' => 'integer',
				'fecha_ingreso' => 'datetime',
				'id_paciente' => 'integer'
			);

		$this->order = ' habitacion DESC ';

	}
}
?>