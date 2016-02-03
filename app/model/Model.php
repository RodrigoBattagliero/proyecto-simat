<?php 
// namespace Core\Model\Model;

require_once 'DbAbstractModel.php';

//class Model extends \Core\Model\DBAbstractModel\DBAbstractModel {
abstract class Model extends DBAbstractModel {

	/**
	* @var string Nombre de la tabla.
	*/
	protected $table;
	
	/**
	* @var string Condicion WHERE para la consulta.
	*/
	protected $where;
	
	/**
	* @var string Campos de la tabla. Lista separada por comas (,).
	*/
	protected $fields;
	
	/**
	* @var array Validaciones para los campos. $key => nombre del campo. $value => tipo de validacion
	*/
	protected $validation;
	
	/**
	* @var string Nombre de campo y tipo de orden (ASC o DESC) para consulta tipo SELECT.
	*/
	protected $order;

	/**
	* @var campos por defecto que traera cada consulta
	*/ 
	protected $defaultFields;

	/**
	* Ejecuta consulta tipo SELECT en la BD.
	* 
	* Forma el SELECT desde el nombre de los campos ($fields), nombre de la tabla ($table), condiciones ($where) y orden ($order). 
	* El resultado lo guarda en valiable $dbRows de la clase padre (DbAbstractModel). 
	* El primer parametro solo funciona para condiciones tipo =, para otro tipo de condiciones se debe pasar el segundo parametro con el WHERE completo.
	*
	* @param array $whereData Condiciones para la consulta. $key => nombre del campo, $value => valor a comparar.
	* @param string $whereOption Opcional. Consulta WHERE completa. Para condiciones de cualquier tipo.
	*
	* @return void
	*/
	public function get($whereData = array(),$whereOption = ''){
		$this->dbRows = null;
		if(empty($whereOption))
			$this->_setWhere($whereData);
		else
			$this->where = $whereOption;

		$this->dbQuery =
			' SELECT '.$this->fields.
			' FROM '.$this->table.
			' WHERE '.$this->where.
			' ORDER BY '.$this->order;
		$this->rowsFromQuery();

		return $this->dbRows;
	}

	/**
	* Ingresa datos en la BD.
	* 
	* Inserta los datos desde $table en los campos y valores $data pasados por argumento.
	*
	* @param array $data Datos para insertar en la consultal. $data[$i][0] => campo, $data[$i][1] => valor
	*
	* @return boolean
	*/
	public function save($data = array()){
		$data = $this->_setSet($data);
		$this->dbQuery = 
			' INSERT INTO '
			.$this->table. '('.$data[0].')'.
			' VALUES('
			.$data[1].
			' )';
		return $this->singleQuery();
	}

	/**
	* Edita datos de la BD.
	* 
	* Edita una/s fila/s de la tabla $table con los datos pasados por parametro.
	* El segundo parametro solo funciona para condiciones tipo =, para otro tipo de condiciones se debe pasar el segundo parametro con el WHERE completo.
	*
	* @param array $data Datos para modificar en la consulta. $data[$i][0] => campo, $data[$i][1] => valor
	* @param array $data Condiciones para modificar en la consulta. $data[$i] => campo, $data[$i] => valor
	* @param string $whereOption Opcional. Consulta WHERE completa. Para condiciones de cualquier tipo.
	*
	* @return boolean
	*/
	public function update($data = array(),$whereData = array(), $whereOption = ''){
		
		if(empty($whereOption)){
			$this->_setWhere($whereData);
		}else{
			$this->where = $whereOption;
		}

		$update = $this->_setUpdate($data);
		$this->dbQuery = 
			' UPDATE '.$this->table.
			' SET ' . $update .
			' WHERE ' . $this->where;
		
		return $this->singleQuery();
	}

	/**
	* Elimina un registro de la tabla $table
	* 
	* Elimina un registro de la tabla $table con los datos para la condicion WHERE pasados por parametro.
	* El primer parametro solo funciona para condiciones tipo =, para otro tipo de condiciones se debe pasar el segundo parametro con el WHERE completo.
	*
	* @param array $data Datos para modificar en la consulta. $data[$i] => campo, $data[$i] => valor
	* @param string $whereOption Opcional. Consulta WHERE completa. Para condiciones de cualquier tipo.
	*
	* @return boolean
	*/
	public function delete($whereData = array(),$whereOption = ''){

		if(empty($whereOption)){
			$this->_setWhere($whereData);
		}else{
			$this->where = $whereOption;
		}

		$this->dbQuery = 
			'DELETE FROM '.$this->table.
			' WHERE '.$this->where;
		return $this->singleQuery();

	}

	public function setFiels($fields = ''){
		if(empty($fields)){
			$this->fields = $this->defaultFields;
		}else{
			$this->fields = $fields;
		}
	}
	public function getLastId(){
		return $this->lastId();
	}

	// definir variable $where para ejecutar
	protected function _setWhere($data = array()){
		$this->where = ' 1';
		foreach($data as $key => $value)
			$this->where .= ' AND '.$key.' = \''.$value.'\'';
	}

	protected function _setUpdate($data = array()){
		$update = '';
		// cantidad de elementos/campos en el array
		$lenght = count($data);
		$i = 1;
		foreach ($data as $key => $value) {
			$update .= ' '.$key . ' = ' . '\''.$value.'\'';

			// Si el elemento actual no es el ultimo agrego AND porque hay mas datos para la consulta.
			if($lenght>$i){
				$update .= ', ';
			}
			$i++;
		}
		return $update;
	}

	protected function _setSet($data = array()){
		$set  = array('','');
		$i = 1;
		$lenght = count($data);
		foreach ($data as $key => $value) {
			$set[0] .= $key;
			$set[1] .= '\''.$value.'\' ';
			if($lenght>$i){
				$set[0] .= ', ';
				$set[1] .= ', ';
			}
			$i++;
		}
		return $set;
	}

}

?>