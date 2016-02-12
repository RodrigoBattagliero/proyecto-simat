<?php
//require_once 'mpdf/mpdf.php';

class PrintController {

	private $html;

	public function __construct(){
		$this->html = '<html>
					<head>
						<style>
		   					body{
								width: 100%;
							}
		   					table{
		   						min-width: 98%;
		   						margin: 0px auto;
		   					}
							table thead {
								background: #aaa;
							}
							tbody tr.active {
								background: #ccc;
							}
						</style>

					</head>
					<body>
						<table class="tabla">
							<thead>';
	}

	public function printUsuarios($data = array()){

		$head = array();
		$head[] = 'Usuario';
		$head[] = 'Tipo';

		$this->buildHead($head);
		
		$i = 1;
		if(!empty($data)){
			foreach($data as $da){
				$class = ($i<0) ? 'active' : '';
				$this->html .= '<tr class="'.$class.'" >'; 
					$this->html .= "<td>{$da->user}</td>";
					$tipo = '';
					if($da->tipo == 1){
						$tipo = 'Administrador';
					}
					if($da->tipo == 2){
						$tipo = 'Secretaría';
					}
					if($da->tipo == 3){
						$tipo = 'Profesional';
					}
					if($da->tipo == 4){
						$tipo = 'Paciente';
					}
					$this->html .= "<td>{$tipo}</td>";
				$this->html .= '</tr>';
				$i *= -1;
			}
		}

		$this->buildTail();
		$this->output('pacientes.pdf');
		
	}

	public function printPacientes($data = array()){

		$head = array();
		$head[] = 'Nombre';
		$head[] = 'Teléfono';
		$head[] = 'Dirección';
		$head[] = 'Localidad';
		$head[] = 'Obra social';

		$this->buildHead($head);
		
		$i = 1;
		if(!empty($data)){
			foreach($data as $da){
				$class = ($i<0) ? 'active' : '';
				$this->html .= '<tr class="'.$class.'" >'; 
					$this->html .= "<td>{$da->apellido}, {$da->nombre}</td>";
					$this->html .= "<td>{$da->telefono}</td>";
					$this->html .= "<td>{$da->direccion}</td>";
					$this->html .= "<td>{$da->localidad}</td>";
					$this->html .= "<td>{$da->obra_social}</td>";
				$this->html .= '</tr>';
				$i *= -1;
			}
		}

		$this->buildTail();
		$this->output('pacientes.pdf');
		
	}

	public function printProfesionales($data){
		$head = array();
		$head[] = 'Nombre';
		$head[] = 'DNI';
		$head[] = 'Teléfono';
		$head[] = 'Dirección';
		$head[] = 'Tipo';

		$this->buildHead($head);
		
		$i = 1;
		if(!empty($data)){
			foreach($data as $da){
				$class = ($i<0) ? 'active' : '';
				$this->html .= '<tr class="'.$class.'" >'; 
					$this->html .= "<td>{$da->apellido}, {$da->nombre}</td>";
					$this->html .= "<td>{$da->dni}</td>";
					$this->html .= "<td>{$da->telefono}</td>";
					$this->html .= "<td>{$da->direccion}</td>";
					$this->html .= "<td>{$da->tipo}</td>";
				$this->html .= '</tr>';
				$i *= -1;
			}
		}

		$this->buildTail();
		$this->output('profesionales.pdf');
	}

	public function printGuardias($data = array()){
		$head = array();
		$head[] = 'Inicio';
		$head[] = 'Fin';
		$head[] = 'Doctor';

		$this->buildHead($head);
		
		$i = 1;
		if(!empty($data)){
			foreach($data as $da){
				$class = ($i<0) ? 'active' : '';
				$this->html .= '<tr class="'.$class.'" >'; 
					$this->html .= "<td>{$da->fecha_inicio}</td>";
					$this->html .= "<td>{$da->fecha_final}</td>";
					$this->html .= "<td>{$da->profesional}</td>";
				$this->html .= '</tr>';
				$i *= -1;
			}
		}

		$this->buildTail();
		$this->output('guardias.pdf');
	}

	public function printHistoriasClinicas($data){
		$head = array();
		$head[] = 'Fecha';
		$head[] = 'Doctor';
		$head[] = 'Paciente';
		$head[] = 'Detalle';
		
		$this->buildHead($head);
		
		$i = 1;
		if(!empty($data)){
			foreach($data as $da){
				$class = ($i<0) ? 'active' : '';
				$this->html .= '<tr class="'.$class.'" >'; 
					$this->html .= "<td>{$da->fecha}</td>";
					$this->html .= "<td>{$da->profesional}</td>";
					$this->html .= "<td>{$da->paciente}</td>";
					$this->html .= "<td>{$da->detalle}</td>";
				$this->html .= '</tr>';
				$i *= -1;
			}
		}

		$this->buildTail();
		$this->output('historias_clinicas.pdf');
	}

	public function printHistoriasClinicas1(){
		$head = array();
		$head[] = 'Fecha';
		$head[] = 'Doctor';
		$head[] = 'Paciente';
		$head[] = 'Detalle';

		$this->buildHead($head);
		
		$i = 1;
		if(!empty($data)){
			foreach($data as $da){
				$class = ($i<0) ? 'active' : '';
				$this->html .= '<tr class="'.$class.'" >'; 
					$this->html .= "<td>{$da->fecha}</td>";
					$this->html .= "<td>{$da->profesional}</td>";
					$this->html .= "<td>{$da->paciente}</td>";
					$this->html .= "<td>{$da->detalle}</td>";
				$this->html .= '</tr>';
				$i *= -1;
			}
		}

		$this->buildTail();
		$this->output('historias_clinicas.pdf');
	}

	private function buildHead($head){
		$this->html .= '<tr>';
		foreach($head as $h){
			$this->html .= '<th>' . $h;
		}
		$this->html .= '</tr>';
		$this->html .= '<tbody>';
	}

	private function buildTail(){
		$this->html .= '</tbody>
				</table>
				</body>
				</html>';
	}

	private function output($title){
		$mpdf=new mPDF();
		//==============================================================
		//if ($_REQUEST['html']) { echo $this->html; exit; }
		$mpdf->WriteHTML($this->html);
		// SALIDA
		$mpdf->Output($title,'D');
	}



}
?>