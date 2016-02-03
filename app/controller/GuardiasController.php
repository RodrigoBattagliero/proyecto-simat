<?php 

require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../model/GuardiasModel.php');

class GuardiasController extends Controller {

	public function __construct(){
		$this->model = new GuardiasModel();
	}

	public function get($whereData = array(), $whereOption = ''){
		return $this->model->get($whereData,$whereOption);
	}

	public function getDefault($whereData = array(), $whereOption = ''){
		return $this->model->getDefault($whereData);
	}

	public function save($data = array()){
		$result = null;
		if($this->model->beforeSave($data)){
			$result = $this->model->save($data);
		}else{
			$result = 'El profesional seleccionado ya tiene esa franja horaria cargada.';
		}
		return $result;
	}

	public function update($data = array(),$whereData = array()){
		return $this->model->update($data,$whereData);
	}

	public function delete($whereData = array(),$whereOption = ''){
		return $this->model->delete($whereData,$whereOption);
	}

}
?>