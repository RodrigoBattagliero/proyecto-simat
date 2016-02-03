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

	public function getDefault($whereData = array(),$whereOption = ''){

		if(empty($whereOption))
			$this->_setWhere($whereData);
		else
			$this->where = $whereOption;

		$this->dbQuery =
			'SELECT 
				g.id, DATE_FORMAT(g.fecha_inicio, "%d/%m/%Y %H:%i") AS fecha_inicio, DATE_FORMAT(g.fecha_final, "%d/%m/%Y %H:%i") AS fecha_final, g.id_profesional, CONCAT_WS(", ",pr.apellido, pr.nombre) AS profesional
			FROM 
				guardias AS g
			LEFT JOIN
				profesionales AS pr ON pr.id = g.id_profesional
			WHERE ' . $this->where .
			' ORDER BY g.fecha_inicio DESC';
		
		$this->rowsFromQuery();

		return $this->dbRows;
	}

	public function beforeSave($data){
		$options = " 1 AND 
					id_profesional = {$data['id_profesional']} AND 
					( ('{$data['fecha_inicio']}' BETWEEN fecha_inicio AND fecha_final) OR  ('{$data['fecha_final']}' BETWEEN fecha_inicio AND fecha_final) )";
		$profesional = $this->get(null,$options);
		if(count($profesional)>0){
			return false;
		}else{
			return true;
		}
	}
}
?>