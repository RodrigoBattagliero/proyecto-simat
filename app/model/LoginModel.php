<?php

require_once 'Model.php';

class LoginModel extends Model{

	public function __construct(){

		$this->table = 'login';
		$this->where = ' 1';

		$this->defaultFields = ' id,user,password,tipo ';

		$this->setFiels();

		$this->validation = array(
				'id' => 'integer',
				'user' => 'string',
				'password' => 'string',
				'tipo' => 'integer'
			);

		$this->order = ' user DESC ';

	}

	public function login($data = array()){
		$this->dbQuery = "SELECT * FROM login WHERE user = '{$data['user']}' AND password = '{$data['password']}'";
		$this->rowsFromQuery();

		return $this->dbRows;		
	}

	public function beforeSave($userName){
		$b = false;
		$this->dbQuery = "SELECT COUNT(*) AS cant FROM login WHERE user = '{$userName}'";
		$this->rowsFromQuery();
		if($this->dbRows[0]->cant == 0){
			$b = true;
		}
		return $b;
	}
}
?>