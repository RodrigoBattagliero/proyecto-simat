<?php 

require_once 'Controller.php';
require_once realpath(dirname(__FILE__) . '/../model/ProfesionalesModel.php');

class ProfesionalesController extends Controller {

	public function __construct(){
		$this->model = new ProfesionalesModel();
	}

	public function get($whereData = array(), $whereOption = ''){
		if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 3){
			$whereData['id_login'] = $_SESSION['id_login'];
		}
		$data = $this->model->get($whereData,$whereOption);
		if($data){
			foreach($data as $da){	
				if($da->tipo == 1){
					$da->tipo = 'Medico';
				}else if($da->tipo == 2){
					$da->tipo = 'Enfermero';
				}else{
					$da->tipo = 'Instrumentista';
				}
			}
		}
		return $data;
	}

	public function save($data = array()){
		return $this->model->save($data);
	}

	public function update($data = array(),$whereData = array()){
		return $this->model->update($data,$whereData);
	}
	
	public function delete($whereData = array(),$whereOption = ''){
		return $this->model->delete($whereData,$whereOption);
	}
}
?>