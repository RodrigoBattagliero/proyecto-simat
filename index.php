<?php 
error_reporting(E_ALL);
ini_set("display_errors", 1); 

require_once 'app/controller/CamasController.php';
require_once 'app/controller/GuardiasController.php';
require_once 'app/controller/HistoriasClinicasController.php';
require_once 'app/controller/LoginController.php';
require_once 'app/controller/PacientesController.php';
require_once 'app/controller/ProfesionalesController.php';
require_once 'app/controller/TurnosController.php';
require_once 'app/controller/PrintController.php';

require_once 'vendor/autoload.php';

define('URL','/web/tesis_simat/index.php/');

use Slim;
session_start();
$app = new \Slim\Slim();
function authenticateForRole( $roles = array() ) {
    return function () use ( $roles ) {
        //$user = User::fetchFromDatabaseSomehow();
        //if ( $user->belongsToRole($role) === false ) {
    	$b = false;
    	if(isset($_SESSION) && !empty($_SESSION['role'])){
    		foreach($roles as $role){
    			if ( strcmp($_SESSION['role'], $role) == 0 ) {
    				$b = true;
    			}	
    		}
    		if (!$b){
	            $app = \Slim\Slim::getInstance();
	            $app->flash('msgError', 'Login requerido');
	            $app->redirect(URL .'login');
        	}
    	}else{
			$app = \Slim\Slim::getInstance();
	        $app->flash('msgError', 'Login requerido');
	        $app->redirect(URL .'login');
    	}

    };
}

$app->config(array(
    //'debug' => true,
    'templates.path' => 'app/view/'
));

$app->group('/', function() use($app){

	$app->get('/', function() use($app){

	});

});

$app->group('/login', function() use($app){

	$app->get('/', function() use($app){
		$app->render('login.php');
	});

	$app->post('/', function() use($app){
		$data = $app->request()->post();
		$login = new LoginController();
		$result = $login->login($data);
		if($result){
			$app->flash('msgInfo','Bienvenido ' . $_SESSION['user']);
			if($_SESSION['tipo'] == 1){
				$app->redirect(URL . 'pacientes');
			}
			if($_SESSION['tipo'] == 2){
				$app->redirect(URL . 'turnos');
			}
			if($_SESSION['tipo'] == 3){
				$app->redirect(URL . 'guardias');
			}
			if($_SESSION['tipo'] == 4){
				$app->redirect(URL . 'turnos');
			}
		}else{
			$app->flash('msgError','Datos incorrectos.');
			$app->redirect(URL .'login');
		}
	});

});

$app->get('/logout',function() use($app){
	session_destroy();
	$app->redirect(URL .'login');
});

$app->group('/pacientes',authenticateForRole(array('administrador')), function() use($app){

	$app->get('/', function() use($app){

		$searchData = $app->request->get();
		$searchView = array();
		$search = array();

		if(!empty($searchData['nombre'])){
			$search['nombre'] = $searchData['nombre'];
			$searchView['nombre'] = $searchData['nombre'];
		}else{
			$searchView['nombre'] = '';
		}
		if(!empty($searchData['apellido'])){
			$search['apellido'] = $searchData['apellido'];
			$searchView['apellido'] = $searchData['apellido'];
		}else{
			$searchView['apellido'] = '';
		}
		if(!empty($searchData['obra_social'])){
			$search['obra_social'] = $searchData['obra_social'];
			$searchView['obra_social'] = $searchData['obra_social'];
		}else{
			$searchView['obra_social'] = '';
		}

		$pacientes = new PacientesController();
		$data = $pacientes->get($search);

		$app->render('pacientes.php',array('datos'=>$data,'dataSearch'=>$searchView));
	});



	$app->get('/print', function() use($app){
		$searchData = $app->request->get();
		$search = array();

		if(!empty($searchData['nombre'])){
			$search['nombre'] = $searchData['nombre'];
		}
		if(!empty($searchData['apellido'])){
			$search['apellido'] = $searchData['apellido'];
		}
		if(!empty($searchData['obra_social'])){
			$search['obra_social'] = $searchData['obra_social'];
		}

		$pacientes = new PacientesController();
		$data = $pacientes->get($search);
		
		$print = new PrintController();
		$print->printPacientes($data);
	});

	$app->get('/alta', function() use($app){
		
		$app->render('pacientes_alta.php');
	});

	$app->post('/alta', function() use($app){
		$pacientes = new PacientesController();
		$data = $app->request()->post();
		$result = $pacientes->save($data);
		if($result > 0){
			$app->flash('msgExito','Se guardo el paciente correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al guardar el paciente.');
		}
		$app->redirect(URL.'pacientes');
	});

	$app->get('/eliminar/:id',function($id) use($app){
		$pacientes = new PacientesController();
		$result = $pacientes->delete(array('id'=>$id));
		if($result > 0){
			$app->flash('msgExito','Se elimino el paciente correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al eliminar el paciente.');
		}
		$app->redirect(URL.'pacientes');
	});

	$app->get('/:id', function($id) use($app){
		$pacientes = new PacientesController();
		$data = $pacientes->get(array('id'=>$id));

		$app->render('pacientes_modificar.php',array('paciente'=>$data[0]));
	});

	$app->post('/:id', function($id) use($app){
		$pacientes = new PacientesController();
		$data = $app->request()->post();
		$result = $pacientes->update($data,array('id'=>$id));
		if($result > 0){
			$app->flash('msgExito','Se modificó el paciente correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al modificar el paciente.');
		}
		$app->redirect(URL.'pacientes');
	});
	
});


$app->group('/profesionales',authenticateForRole(array('administrador')),function() use($app){

	$app->get('/', function() use($app){
		$searchData = $app->request->get();
		$searchView = array(
			'nombre' => '',
			'apellido' => '',
			'dni' => '',
			'tipo' => '');
		$search = array();

		if(!empty($searchData['nombre'])){
			$search['nombre'] = $searchData['nombre'];
			$searchView['nombre'] = $searchData['nombre'];
		}
		if(!empty($searchData['apellido'])){
			$search['apellido'] = $searchData['apellido'];
			$searchView['apellido'] = $searchData['apellido'];
		}
		if(!empty($searchData['dni'])){
			$search['dni'] = $searchData['dni'];
			$searchView['dni'] = $searchData['dni'];
		}
		if(!empty($searchData['tipo'])){
			$search['tipo'] = $searchData['tipo'];
			$searchView['tipo'] = $searchData['tipo'];
		}

		$profesionales = new ProfesionalesController();
		$data = $profesionales->get($search);

		$app->render('profesionales.php',array('datos'=>$data,'searchData'=>$searchView));
	});

	$app->get('/print', function() use($app){
		$searchData = $app->request->get();
		$search = array();

		if(!empty($searchData['nombre'])){
			$search['nombre'] = $searchData['nombre'];
		}
		if(!empty($searchData['apellido'])){
			$search['apellido'] = $searchData['apellido'];
		}
		if(!empty($searchData['dni'])){
			$search['dni'] = $searchData['dni'];
		}
		if(!empty($searchData['tipo'])){
			$search['tipo'] = $searchData['tipo'];
		}

		$profesionales = new ProfesionalesController();
		$data = $profesionales->get($search);


		$print = new PrintController();
		$print->printProfesionales($data);
	});

	$app->get('/alta', function() use($app){
		
		$app->render('profesionales_alta.php');
	});
	$app->post('/alta', function() use($app){
		$profesionales = new ProfesionalesController();
		$data = $app->request()->post();
		$result = $profesionales->save($data);
		if($result > 0){
			$app->flash('msgExito','Se guardó el profesional correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al guardar el profesional.');
		}
		$app->redirect(URL.'profesionales');
	});

	$app->get('/eliminar/:id',function($id) use($app){
		$profesionales = new ProfesionalesController();
		$result = $profesionales->delete(array('id'=>$id));
		if($result > 0){
			$app->flash('msgExito','Se elimino el profesional correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al eliminar el profesional.');
		}
		$app->redirect(URL.'profesionales');
	});

	$app->get('/:id', function($id) use($app){
		$profesionales = new ProfesionalesController();
		$data = $profesionales->get(array('id'=>$id));

		$app->render('profesionales_modificar.php',array('profesional'=>$data[0]));
	});

	
	$app->post('/:id', function($id) use($app){
		$profesionales = new ProfesionalesController();
		$data = $app->request()->post();
		$result = $profesionales->update($data,array('id'=>$id));
		if($result > 0){
			$app->flash('msgExito','Se modificó el profesional correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al modificar el profesional.');
		}
		$app->redirect(URL.'profesionales');
	});
	
});


$app->group('/guardias', authenticateForRole(array('administrador','secretaria','profesional')),function() use($app){

	$app->get('/',function() use($app){
		$profesionales = new ProfesionalesController();
		$profesionalesList = $profesionales->get();

		$guardias = new GuardiasController();
		$guardiasList = $guardias->getDefault();

		$app->render('guardias.php',array('profesionales'=>$profesionalesList,'guardias'=>$guardiasList));
	});

	$app->post('/',authenticateForRole(array('administrador','secretaria')), function() use($app){
		$guardias = new GuardiasController();
		$data = $app->request()->post();
		$result = $guardias->save($data);
		if($result > 0){
			$app->flash('msgExito','Se guardó la guardia correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al guardar la guardia.');
		}
		$app->redirect(URL.'guardias');
	});

	$app->get('/search', function() use($app){
		$guardias = new GuardiasController();
		$data = $app->request()->get();
		
		$search = array();

		if(!empty($data['id_profesional']) && $data['id_profesional'] > 0)
			$search['g.id_profesional'] = $data['id_profesional'];
		if(!empty($data['fecha_inicio']))
			$search['g.fecha_inicio'] = $data['fecha_inicio'];
		if(!empty($data['fecha_final']))
			$search['g.fecha_final'] = $data['fecha_final'];

		$guardiasList = $guardias->getDefault($search);

		$profesionales = new ProfesionalesController();
		$profesionalesList = $profesionales->get();


		$app->render('guardias.php',array('profesionales'=>$profesionalesList,'guardias'=>$guardiasList));
		
	});

	$app->get('/print', function() use($app){
		$guardias = new GuardiasController();
		$data = $app->request()->get();
		
		$search = array();

		if($data['id_profesional'] > 0)
			$search['g.id_profesional'] = $data['id_profesional'];
		if(!empty($data['fecha_inicio']))
			$search['g.fecha_inicio'] = $data['fecha_inicio'];
		if(!empty($data['fecha_final']))
			$search['g.fecha_final'] = $data['fecha_final'];

		$guardiasList = $guardias->getDefault($search);

		$profesionales = new ProfesionalesController();
		$profesionalesList = $profesionales->get();
		
		$print = new PrintController();
		$print->printGuardias($guardiasList);
	});

	$app->get('/eliminar/:id', authenticateForRole(array('administrador','secretaria')), function($id) use($app){
		$guardias = new GuardiasController();
		$result = $guardias->delete(array('id'=>$id));
		if($result > 0){
			$app->flash('msgExito','Se eliminó la guardia correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al eliminar la guardia.');
		}
		$app->redirect(URL.'guardias');
		
	});

	$app->get('/:id',authenticateForRole(array('administrador')), function($id) use($app){
		$guardias = new GuardiasController();
		$guardiasList = $guardias->getDefault();
		$guardiaSelected = $guardias->get(array('id'=>$id));

		
		$profesionales = new ProfesionalesController();
		$profesionalesList = $profesionales->get();

		$app->render('guardias.php',array(
			'profesionales'=>$profesionalesList,
			'guardias'=>$guardiasList,
			'guardiaSelected'=>$guardiaSelected[0]
			)
		);

	});

	$app->post('/:id',authenticateForRole(array('administrador','secretaria')), function($id) use($app){
		$guardias = new GuardiasController();
		$data = $app->request()->post();
		$result = $guardias->update($data,array('id'=>$id));
		if($result > 0){
			$app->flash('msgExito','Se guardó la guardia correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al guardar la guardia.');
		}
		$app->redirect(URL.'guardias');
	});
	

});

$app->group('/historias_clinicas',authenticateForRole(array('administrador','secretaria','profesional')),function() use($app){

	$app->get('/', function() use($app){
		$historiasClinicas = new HistoriasClinicasController();
		$historias = $historiasClinicas->getDefault();

		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();
		$app->render('historias_clinicas.php',array('historias'=>$historias, 'profesionales'=>$profe, 'pacientes'=>$paci));
	});

	$app->get('/alta', function() use($app){
		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();
		$app->render('historia_clinica_alta.php',array('profesionales'=>$profe, 'pacientes'=>$paci));
	});

	$app->post('/alta', function() use($app){
		$historiasClinicas = new HistoriasClinicasController();
		$data = $app->request()->post();
		$result = $historiasClinicas->save($data);
		if($result > 0){
			$app->flash('msgExito','Se guardó la historia clinica correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al guardar la historia clinica.');
		}
		$app->redirect(URL.'historias_clinicas');
	});

	$app->get('/search', function() use($app){
		$historiasClinicas = new HistoriasClinicasController();
		$data = $app->request()->get();

		$search = array();

		if($data['id_profesional'] > 0)
			$search['h.id_profesional'] = $data['id_profesional'];
		if($data['id_paciente'] > 0)
			$search['h.id_paciente'] = $data['id_paciente'];

		$historias = $historiasClinicas->getDefault($search);

		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$app->render('historias_clinicas.php',array('historias'=>$historias, 'profesionales'=>$profe, 'pacientes'=>$paci));
		
	});

	$app->get('/print', function() use($app){
		$historiasClinicas = new HistoriasClinicasController();
		$data = $app->request()->get();

		$search = array();

		if($data['id_profesional'] > 0)
			$search['h.id_profesional'] = $data['id_profesional'];
		if($data['id_paciente'] > 0)
			$search['h.id_paciente'] = $data['id_paciente'];

		$historias = $historiasClinicas->getDefault($search);

		$print = new PrintController();
		$print->printHistoriasClinicas($historias);
		
	});

	$app->get('/eliminar/:id', function($id) use($app){
		$historiasClinicas = new HistoriasClinicasController();
		$result = $historiasClinicas->delete(array('id'=>$id));
		if($result > 0){
			$app->flash('msgExito','Se eliminó la historia clinica correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al eliminar la historia clinica.');
		}
		$app->redirect(URL.'historias_clinicas');
	});

	$app->get('/:id', function($id) use($app){
		$historias = new HistoriasClinicasController();
		$historia = $historias->get(array('id'=>$id));

		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$app->render('historia_clinica_modificar.php', array('historia'=>$historia[0],'profesionales'=>$profe, 'pacientes'=>$paci));
	});

	$app->post('/:id', function($id) use($app){
		$historias = new HistoriasClinicasController();
		$data = $app->request()->post();
		$result = $historias->update($data,array('id'=>$id));

		if($result > 0){
			$app->flash('msgExito','Se modificó la historia clinica correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al modificar la historia clinica.');
		}
		$app->redirect(URL.'historias_clinicas');
	});
});

$app->group('/turnos', authenticateForRole(array('administrador','secretaria','profesional','paciente')), function() use($app){

	$app->get('/', function() use($app){
		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$turnos = new TurnosController();
		$tur = $turnos->getDefault();
		$app->render('turnos.php',array('profesionales'=>$profe, 'pacientes'=>$paci, 'turnos'=>$tur));
	});

	$app->post('/', function() use($app){
		$turnos = new TurnosController();
		$data = $app->request()->post();
		$result = $turnos->save($data);
		if($result > 0){
			$app->flash('msgExito','Se guardó el turno correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al guardar el turno. Aseguresé que el paciente y el medico no estén asignados a en ese turno.');
		}
		$app->redirect(URL.'turnos');
	});

	$app->get('/alta', function() use($app){
		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$turnosController = new TurnosController();
		$turnos = $turnosController->getDefault(array('t.id_paciente'=>2));

		$app->render('turno_sacar.php',array('turnos'=>$turnos,'profesionales'=>$profe));
	});

	$app->post('/alta', function() use($app){
		$turnos = new TurnosController();
		$data = $app->request()->post();
		$result = $turnos->save($data);
		if($result > 0){
			$app->flash('msgExito','Se guardó el turno correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al guardar el turno.');
		}
		$app->redirect(URL.'turnos/alta');
	});

	$app->get('/search', function() use($app){
		$data = $app->request()->get();

		$turnos = new TurnosController();
		$tur = $turnos->getDefault($data);

		$pacientes = new PacientesController();
		$paci = $pacientes->get();
		
		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$app->render('turnos.php',array('profesionales'=>$profe, 'pacientes'=>$paci, 'turnos'=>$tur));
		
	});

	$app->get('/eliminar/:id', function($id) use($app){
		$turnos = new TurnosController();
		$result = $turnos->delete(array('id'=>$id));
		if($result > 0){
			$app->flash('msgExito','Se eliminó el turno correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al eliminar el turno.');
		}
		$app->redirect(URL.'turnos');
	});

	$app->get('/print',function() use($app){

		$turnos = new TurnosController();
		$tur = $turnos->getDefault($data);
	});

});

$app->group('/internaciones', authenticateForRole(array('administrador','secretaria')), function() use($app){

	$app->get('/', function() use($app){

		$camas = new CamasController();
		$cam = $camas->getDefault();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$app->render('internaciones.php',array('internaciones'=>$cam,'pacientes'=>$paci));
	});

	$app->post('/', function() use($app){
		$internaciones = new CamasController();
		$data = $app->request()->post();
		$result = $internaciones->save($data);
		if($result > 0){
			$app->flash('msgExito','Se guardó la internación correctamente.');
		}else{
			$app->flash('msgError','Hubo un problema al guardar la internación.');
		}
		$app->redirect(URL.'internaciones');
	});

	$app->get('/:habitacion/:cama', function($habitacion,$cama) use($app){
		$camas = new CamasController();
		$cam = $camas->getDefault();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$app->render('internaciones.php',array('internaciones'=>$cam,'pacientes'=>$paci,'habitacionSelected'=>$habitacion,'camaSelected'=>$cama));
	});

	$app->get('/:id', function($id) use($app){
		$camas = new CamasController();
		$camas->salida($id);
		$cam = $camas->getDefault();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$app->render('internaciones.php',array('internaciones'=>$cam,'pacientes'=>$paci));
	});

});

$app->group('/perfil',authenticateForRole(array('administrador','secretaria','profesional','paciente')), function() use($app){

	$app->get('/', function() use($app){
		$userController = new LoginController();

		$user = $userController->get(array('id'=>$_SESSION['id_login']));
		$paciente = null;
		$profesional = null;
		if($_SESSION['tipo'] == 3){
			$pacienteController = new PacientesController();
			$paciente = $pacienteController->get(array('id_login'=>$_SESSION['id_login']));
		}
		if($_SESSION['tipo'] == 4){
			$profesionalController = new ProfesionalesController();
			$profesional = $profesionalController->get(array('id_login'=>$_SESSION['id_login']));
		}
		$app->render('perfil.php',array('login'=>$user[0],'paciente'=>$paciente[0],'profesional'=>$profesional[0]));
	});

	$app->post('/',function() use($app){
		$userController = new LoginController();
		$data = $app->request()->post();
		$result = $userController->changePassword($data);
		if($result){
			$app->flash('msgExito','Se ha actualizado la contaseña correctamente.');
		}else{
			$app->flash('msgError','Se ha producido un error. Aseguresé de que las contrañas coinciden.');
		}
		$app->redirect(URL.'perfil');
	});
});

$app->group('/usuarios', authenticateForRole(array('administrador')),function() use($app){

	$app->get('/',function() use($app){
		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$usuarios = new LoginController();
		$users = $usuarios->get();

		$app->render('usuarios.php',array('pacientes'=>$paci,'profesionales'=>$profe,'usuarios'=>$users));
	});

	$app->get('/search',function() use($app){
		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$data = $app->request()->get();
		if(empty($data['user'])){
			unset($data['user']);
		}
		if(empty($data['tipo'])){
			unset($data['tipo']);
		}
		$usuarios = new LoginController();
		$users = $usuarios->get($data);


		$app->render('usuarios.php',array('pacientes'=>$paci,'profesionales'=>$profe,'usuarios'=>$users));
	});

	$app->get('/print',function() use($app){
		$data = $app->request()->get();
		if(empty($data['user'])){
			unset($data['user']);
		}
		if(empty($data['tipo'])){
			unset($data['tipo']);
		}
		$usuarios = new LoginController();
		$users = $usuarios->get($data);
		
		$print = new PrintController();
		$print->printUsuarios($users);
	});

});

$app->run();
?>
