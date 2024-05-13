<?php

require_once '../models/especialidadesModel.php';

class SpecialitiesController {

	private $specialitiesModel;

	public function __construct() {
		$this->specialitiesModel = new SpecialitiesModel();
	}

	public function getEspecialidades() {
		return $this->specialitiesModel->getAllSpecialities();
	}

	public function addEspecialidad ($especialidad, $descripcion) {
		$this->specialitiesModel->addSpecialities($especialidad, $descripcion);
		header("Location: /app/public/specialities.php");
		die();
	}

}

?>