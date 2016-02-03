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

	public function getDefault($whereData = array()){
		if(empty($whereOption))
			$this->_setWhere($whereData);
		else
			$this->where = $whereOption;

		$this->dbQuery =
			'SELECT 
				h.id, DATE_FORMAT(h.fecha, "%d/%m/%Y %H:%i") AS fecha,h.detalle, h.id_profesional, CONCAT_WS(", ",pr.apellido, pr.nombre) AS profesional, h.id_paciente, CONCAT_WS(", ",pa.apellido, pa.nombre) AS paciente
			FROM 
				historias_clinicas AS h
			LEFT JOIN
				profesionales AS pr ON pr.id = h.id_profesional
			LEFT JOIN
				pacientes AS pa ON pa.id = h.id_paciente
			WHERE ' . $this->where .
			' ORDER BY h.fecha DESC';
		
		$this->rowsFromQuery();

		return $this->dbRows;
	}
}
?>