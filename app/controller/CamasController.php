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

	public function save($data = array()){
		return $this->model->save($data);
	}

	public function update($data = array()){
		return $this->model->update($data);
	}

	public function delete($whereData = array(),$whereOption = ''){
		return $this->model->delete($whereData,$whereOption);
	}
}
?>