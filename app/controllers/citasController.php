<?php

require_once '../models/citasModel.php';

class citasController {

	private $citasModel;

	public function __construct() {
		require_once '../../config/conn.php';
		$this->citasModel = new citasModel($conn);
    }

	public function getCitasPaciente() {
		return $this->citasModel->getCitas();
	}
}

?>