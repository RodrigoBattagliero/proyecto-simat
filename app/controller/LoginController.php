<?php 

require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../model/LoginModel.php');

class LoginController extends Controller {

	public function __construct(){
		$this->model = new LoginModel();
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