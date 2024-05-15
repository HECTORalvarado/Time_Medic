<?php

require_once '../models/horariosModel.php';

class HorariosController {

	private $horariosModel;

	public function __construct() {
		$this->horariosModel = new HorariosModel();
	}

	public function getHorarios() {
		return $this->horariosModel->getHorarios();
	}
	public function addHorario ($horaI, $horaF){
		$this->horariosModel->addHorario($horaI, $horaF);
		header("Location: /app/public/adminHorarios.php");
		die();
	}

	public function getHorariosDoc() {
		return $this->horariosModel->getHorariosDoc();
	}
	
	public function addHorarioDoc ($id){
		$this->horariosModel->addHorarioDoc($id);
		header("Location: /app/public/adminHorariosDoc.php");
		die();
	}

}

?>