<?php

require_once '../models/horariosModel.php';

class FechasController {

	private $horariosModel;

	public function __construct() {
		$this->horariosModel = new HorariosModel();
	}

	public function getFechas() {
		return $this->horariosModel->getDates();
	}
	public function addFecha ($fechaI, $fechaF){
		$this->horariosModel->addFecha($fechaI, $fechaF);
		header("Location: /app/public/adminFechas.php");
		die();
	}

	public function getFechasDoc() {
		return $this->horariosModel->getDatesDoc();
	}

	public function addFechaDoc ($id){
		$this->horariosModel->addFechasDoc($id);
		header("Location: /app/public/adminFechasDoc.php");
		die();
	}

}

?>