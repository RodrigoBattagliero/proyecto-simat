<?php 

require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../model/TurnosModel.php');

class TurnosController extends Controller {

	public function __construct(){
		$this->model = new TurnosModel();
	}

	public function get($whereData = array(), $whereOption = ''){
		return $this->model->get($whereData,$whereOption);
	}

	public function getDefault($whereData = array(), $whereOption = ''){
		if($_SESSION['tipo'] == 3){
			$profesionales = new ProfesionalesController();
			$profe = $profesionales->get(array('id_login'=>$_SESSION['id_login']));
			$whereData['id_profesional'] = $profe[0]->id;
		}

		if($_SESSION['tipo'] == 4){
			$pacientes = new PacientesController();
			$profe = $pacientes->get(array('id_login'=>$_SESSION['id_login']));
			$whereData['id_paciente'] = $profe[0]->id;
		}
		
		if(empty($whereData['id_paciente'])){
			unset($whereData['id_paciente']);
		}
		if(empty($whereData['id_profesional'])){
			unset($whereData['id_profesional']);
		}
		if(empty($whereData['fecha_inicio'])){
			unset($whereData['fecha_inicio']);
		}
		return $this->model->getDefault($whereData);
	}

	public function save($data = array()){
		
		$result = 0;
		if($this->model->beforeSave($data['id_profesional'],$data['id_paciente'],$data['fecha_inicio'])){
			$result = $this->model->save($data);
		}
		return $result;
	}

	public function update($data = array()){
		return $this->model->update($data);
	}

	public function delete($whereData = array(),$whereOption = ''){
		return $this->model->delete($whereData,$whereOption);
	}

	
}
?>