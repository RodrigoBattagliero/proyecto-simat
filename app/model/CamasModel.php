<?php

require_once 'Model.php';

class CamasModel extends Model{

	public function __construct(){

		$this->table = 'camas';
		$this->where = ' 1';

		$this->defaultFields = ' id,habitacion,fecha_ingreso,id_paciente,cama ';

		$this->setFiels();

		$this->validation = array(
				'id' => 'integer',
				'habitacion' => 'integer',
				'fecha_ingreso' => 'datetime',
				'id_paciente' => 'integer',
				'cama' => 'integer',
				'fecha_salida' => 'datetime'
			);

		$this->order = ' habitacion DESC ';

	}

	public function getDefault(){

		$this->dbQuery =
			'SELECT 
				c.id, DATE_FORMAT(c.fecha_ingreso, "%d/%m/%Y %H:%i") AS fecha_ingreso, c.id_paciente, CONCAT_WS(", ",pa.apellido, pa.nombre) AS paciente, c.habitacion,c.cama
			FROM 
				camas AS c
			LEFT JOIN
				pacientes AS pa ON c.id_paciente = pa.id
			WHERE c.fecha_salida IS NULL OR c.fecha_salida = "0000-00-00 00:00:00"
			ORDER BY c.fecha_ingreso DESC';
		
		$this->rowsFromQuery();

		return $this->dbRows;
	}

	public function salida($id = 0){
		$this->dbQuery = "UPDATE camas SET fecha_salida = NOW() WHERE id = {$id}";
		return $this->singleQuery();
	}

	public function beforeSave($id_paciente = 0, $fecha_ingreso = ''){
		$b = false;
		$this->dbQuery = "SELECT COUNT(*) AS cant FROM camas WHERE id_paciente = {$id_paciente} AND fecha_ingreso <= NOW() AND fecha_salida IS NULL";
		$this->rowsFromQuery();
		if($this->dbRows[0]->cant == 0){
			$b = true;
		}
		return $b;
	}
}
?>