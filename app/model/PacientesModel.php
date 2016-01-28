<?php

require_once 'Model.php';

class PacientesModel extends Model{

	public function __construct(){

		$this->table = 'pacientes';
		$this->where = ' 1';

		$this->defaultFields = ' id, nombre, apellido, foto, fecha_nacimiento, sexo, tutor, telefono, direccion, localidad, ocupacion, obra_social, observaciones';

		parent::setFiels();

		$this->validation = array(
				'id' => 'integer',
				'nombre' => 'string',
				'apellido' => 'string',
				'foto' => 'string',
				'fecha_nacimiento' => 'date',
				'sexo' => 'string',
				'tutor' => 'string',
				'telefono' => 'string',
				'direccion' => 'string',
				'localidad' => 'string',
				'ocupacion' => 'string',
				'obra_social' => 'string',
				'observaciones' => 'string',
			);

		$this->order = ' nombre DESC ';

	}
}
?>