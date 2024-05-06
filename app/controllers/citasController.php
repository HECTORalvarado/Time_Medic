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
}

?>