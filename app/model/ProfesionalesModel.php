<?php

require_once 'Model.php';

class ProfesionalesModel extends Model{

	public function __construct(){

		$this->table = 'profesionales';
		$this->where = ' 1';

		$this->defaultFields = ' id, nombre, apellido, dni, telefono, direccion, tipo';

		$this->setFiels();

		$this->validation = array(
				'id' => 'integer',
				'nombre' => 'string',
				'apellido' => 'string',
				'dni' => 'string',
				'direccion' => 'string',
				'telefono' => 'string',
				'tipo' => 'integer'
				
			);

		$this->order = ' nombre DESC ';

	}
}
?>