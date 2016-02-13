<?php 

require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../model/CamasModel.php');

class CamasController extends Controller {

	public function __construct(){
		$this->model = new CamasModel();
	}

	public function get($whereData = array(), $whereOption = ''){
		return $this->model->get($whereData,$whereOption);
	}

	public function getDefault(){
		$results = $this->model->getDefault();
		$data = array();
		for($i = 1; $i<=8; $i++){
			$obj = new stdClass();
			$obj->id = null;
			$obj->id_paciente = null;
			$obj->paciente = null;
			$obj->fecha_ingreso = null;
			$obj->cama = null;
			$obj->habitacion = null;
			$data[$i]['1'] = $obj;
			$data[$i]['2'] = $obj;
		}
		foreach($results as $result){
			$data[$result->habitacion][$result->cama] = $result;
		}
		return $data;
	}

	public function save($data = array()){
		$result = false;
		if($this->model->beforeSave($data['id_paciente'])){
			$result = $this->model->save($data);
		}
		return $result;
	}

	public function update($data = array(), $whereData = array()){
		return $this->model->update($data,$whereData);
	}

	public function delete($whereData = array(),$whereOption = ''){
		return $this->model->delete($whereData,$whereOption);
	}

	public function salida($id = 0){
		if($id > 0){
			$result = $this->model->salida($id);
		}else{
			$result = 0;
		}
		return $result;
	}
}
?>