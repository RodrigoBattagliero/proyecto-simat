<?php 

require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../model/HistoriasClinicasModel.php');

class HistoriasClinicasController extends Controller {

	public function __construct(){
		$this->model = new HistoriasClinicasModel();
	}

	public function get($whereData = array(), $whereOption = ''){
		if($_SESSION['tipo'] == 3){
			$profesionales = new ProfesionalesController();
			$profe = $profesionales->get(array('id_login'=>$_SESSION['id_login']));
			$whereData['id_profesional'] = $profe[0]->id;
		}
		return $this->model->get($whereData,$whereOption);
	}

	public function getDefault($whereData = array()){
		if($_SESSION['tipo'] == 3){
			$profesionales = new ProfesionalesController();
			$profe = $profesionales->get(array('id_login'=>$_SESSION['id_login']));
			$whereData['id_profesional'] = $profe[0]->id;
		}
		return $this->model->getDefault($whereData);
	}

	public function save($data = array()){
		return $this->model->save($data);
	}

	public function update($data = array(), $whereData = array()){
		return $this->model->update($data,$whereData);
	}

	public function delete($whereData = array(),$whereOption = ''){
		return $this->model->delete($whereData,$whereOption);
	}
}
?>