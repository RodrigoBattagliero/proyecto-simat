<?php
class HistoriasClinicasModel extends Model{

	public function __construct(){

		$this->table = 'historias_clinicas';
		$this->where = ' 1';

		$this->defaultFields = ' id, detalle, id_profesional, id_paciente, fecha';

		$this->setFiels();

		$this->validation = array(
				'id' => 'integer',
				'detalle' => 'string',
				'id_profesional' => 'integer',
				'id_paciente' => 'integer'
			);

		$this->order = ' fecha DESC ';

	}
}
?>