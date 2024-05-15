<?php

require_once '../models/citasModel.php';

class CitasController {
	
	private $citasModel;
	
	public function __construct()
	{
		require_once '../../config/conn.php';
		$this->citasModel = new CitasModel($conn);
	}
	
	public function getCitasPaciente() {
		return $this->citasModel->getCitas();
	}

	public function getCitasDoctor() {
		return $this->citasModel->getCitasDoc();
	}

	public function cancelCita($id) {
		$this->citasModel->cancelCita($id);
		header("Location: /app/public/adminCitas.php");
		die();
	}

	public function completeCita ($id) {
		$this->citasModel->completeCita($id);
		header("Location: /app/public/adminCitas.php");
		die();
	}
	
	public function getDoctors (){
		return $this->citasModel->getAllDoctors();
	}

	public function addCita ($idDoctor, $fecha, $hora){
		$this->citasModel->addCitas($idDoctor,$fecha,$hora);
		header("Location: /app/public/getCitas.php");
		die();
	}
}

?>