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

	public function update($data = array(),$whereData = array()){
		return $this->model->update($data,$whereData);
	}

	public function delete($whereData = array(),$whereOption = ''){
		return $this->model->delete($whereData,$whereOption);
	}

	public function login($data = array()){
		$user = $this->model->login($data);

		$result = false;
		if(!empty($user)){
			//session_start();
			$_SESSION['id_login'] = $user[0]->id;
			$_SESSION['user'] = $user[0]->user;
			$_SESSION['tipo'] = $user[0]->tipo;
			if($user[0]->tipo == 1){  // Admin
				$_SESSION['role'] = 'administrador';
			}
			if($user[0]->tipo == 2){ // Secretaría
				$_SESSION['role'] = 'secretaria';	
			}
			if($user[0]->tipo == 3){ // Profesional
				$_SESSION['role'] = 'profesional';
			}
			if($user[0]->tipo == 4){ // Paciente
				$_SESSION['role'] = 'paciente';
			}
			$result = true;
		}
		return $result;
	}

	public function changePassword($data = array()){
		$passSaved = $this->model->get(array('id'=>$_SESSION['id_login']));
		$result = false;
		$data['password_actual'] = $this->encrypt($data['password_actual']);
		$data['password_nueva'] = $this->encrypt($data['password_nueva']);
		$data['password_repetida'] = $this->encrypt($data['password_repetida']);
		if(strcmp($passSaved[0]->password, $data['password_actual']) == 0){
			if(strcmp($data['password_nueva'], $data['password_repetida']) == 0){
				$result = $this->update(array('password'=>$data['password_repetida']),array('id'=>$_SESSION['id_login']));
			}
		}
		return $result;
	}

	private function encrypt($text = ''){
		return $text;
	}
}
?>