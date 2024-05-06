<?php
require_once '../models/userModel.php';
require_once '../models/citasModel.php';

class DasboardCtrl {
	private $userModel;
	private $citasModel;

	public function __construct() {
		require_once '../../config/conn.php';
        $this->userModel = new UserModel($conn);
		$this->citasModel = new CitasModel($conn);
    }

	public function getPacientes() {
		return $this->userModel->getCountPacients();
	}
	public function getDoctores() {
		return $this->userModel->getCountDoctors();
	}

	public function getNCitas(){
		return $this->citasModel->getCountCitas();
	}
}

?>