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

	public function getDefault(){
		
		$this->dbQuery =
			'SELECT 
				t.id, DATE_FORMAT(t.fecha_inicio, "%d/%m/%Y %H:%i") AS fecha_inicio, DATE_FORMAT(t.fecha_final, "%d/%m/%Y %H:%i") AS fecha_final, t.id_profesional, t.id_paciente, CONCAT_WS(", ",pa.apellido, pa.nombre) AS paciente, CONCAT_WS(", ", pr.apellido, pr.nombre) AS profesional 
			FROM 
				turnos AS t
			LEFT JOIN
				pacientes AS pa ON pa.id = t.id_paciente
			LEFT JOIN
				profesionales AS pr ON pr.id = t.id_profesional
			WHERE 
				1 
			ORDER BY fecha_inicio DESC';
		$this->rowsFromQuery();

		return $this->dbRows;
	}
}
?>