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

require_once 'vendor/autoload.php';

define('URL','/web/tesis_simat/index.php/');

use Slim;

$app = new \Slim\Slim();

$app->config(array(
    //'debug' => true,
    'templates.path' => 'app/view/'
));

$app->group('/', function() use($app){

	$app->get('/', function() use($app){

	});

});

$app->group('/pacientes', function() use($app){

	$app->get('/', function() use($app){
		$pacientes = new PacientesController();
		$data = $pacientes->get();

		$app->render('pacientes.php',array('datos'=>$data));
	});

	$app->get('/alta', function() use($app){
		
		$app->render('pacientes_alta.php');
	});

	$app->post('/alta', function() use($app){
		$pacientes = new PacientesController();
		$data = $app->request()->post();
		$result = $pacientes->save($data);

		$app->render('pacientes_alta.php',array('result'=>$result));
	});

	$app->get('/eliminar/:id',function($id) use($app){
		$pacientes = new PacientesController();
		$result = $pacientes->delete(array('id'=>$id));

		$app->redirect('/pacientes');
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

		$app->render('pacientes_modificar.php',array('result'=>$result));
	});

});


$app->group('/profesionales',function() use($app){

	$app->get('/', function() use($app){
		$profesionales = new ProfesionalesController();
		$data = $profesionales->get();

		$app->render('profesionales.php',array('datos'=>$data));
	});

	$app->get('/alta', function() use($app){
		
		$app->render('profesionales_alta.php');
	});

	$app->post('/alta', function() use($app){
		$profesionales = new ProfesionalesController();
		$data = $app->request()->post();
		$result = $profesionales->save($data);

		$app->render('profesionales_alta.php',array('result'=>$result));
	});

	$app->get('/eliminar/:id',function($id) use($app){
		$profesionales = new ProfesionalesController();
		$result = $profesionales->delete(array('id'=>$id));

		$app->render('profesionales.php');
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

		$app->render('profesionales_modificar.php',array('result'=>$result));
	});
});


$app->group('/guardias', function() use($app){

	$app->get('/',function() use($app){
		$profesionales = new ProfesionalesController();
		$profesionalesList = $profesionales->get();

		$guardias = new GuardiasController();
		$guardiasList = $guardias->getDefault();

		$app->render('guardias.php',array('profesionales'=>$profesionalesList,'guardias'=>$guardiasList));
	});

	$app->post('/', function() use($app){
		$guardias = new GuardiasController();
		$data = $app->request()->post();
		$result = $guardias->save($data);

		$app->render('guardias.php',array('result'=>$result));
	});

	$app->post('/search', function() use($app){
		$guardias = new GuardiasController();
		$data = $app->request()->post();

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


		$app->render('guardias.php',array('profesionales'=>$profesionalesList,'guardias'=>$guardiasList));
		
	});

	$app->get('/eliminar/:id', function($id) use($app){
		$guardias = new GuardiasController();
		$result = $guardias->delete(array('id'=>$id));

		$app->render('guardias.php',array('result'=>$result));
	});

	$app->get('/:id', function($id) use($app){
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

	$app->post('/:id', function($id) use($app){
		$guardias = new GuardiasController();
		$data = $app->request()->post();
		$result = $guardias->update($data,array('id'=>$id));

		$app->render('guardias.php',array('result'=>$result));
	});
	

});

$app->group('/historias_clinicas',function() use($app){

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

		$app->render('historia_clinica_alta.php');
	});

	$app->post('/search', function() use($app){
		$historiasClinicas = new HistoriasClinicasController();
		$data = $app->request()->post();

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

	$app->get('/eliminar/:id', function($id) use($app){
		$historiasClinicas = new HistoriasClinicasController();
		$result = $historiasClinicas->delete(array('id'=>$id));

		$app->render('historias_clinicas.php',array('result'=>$result));
	});

});

$app->group('/turnos', function() use($app){

	$app->get('/', function() use($app){
		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$turnos = new TurnosController();
		$tur = $turnos->getDefault();
		$app->render('turnos.php',array('profesionales'=>$profe, 'pacientes'=>$paci, 'turnos'=>$tur));
	});

	$app->get('/alta', function() use($app){
		$profesionales = new ProfesionalesController();
		$profe = $profesionales->get();
		$app->render('turno_sacar.php',array('profesionales'=>$profe));
	});

	$app->post('/alta', function() use($app){
		$turnos = new TurnosController();
		$data = $app->request()->post();
		$result = $turnos->save($data);

		$app->render('turno_sacar.php',array('result'=>$result));
	});

});

$app->group('/internaciones', function() use($app){

	$app->get('/', function() use($app){

		$camas = new CamasController();
		$cam = $camas->get();

		$pacientes = new PacientesController();
		$paci = $pacientes->get();

		$app->render('internaciones.php',array('internaciones'=>$cam,'pacientes'=>$paci));
	});

});

$app->run();
?>