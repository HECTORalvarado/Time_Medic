<?php

class citasModel {
	private $db;
	
	public function __construct($bd)
	{
		$this->db = $bd;
	}

	public function getCitas() {
		$citas = array();
		$username = $_SESSION['username'];
		$query = "SELECT c.fecha_cita, c.hora_cita, c.estado, concat(d.nombre + ' ' + d.apellido) as doctor FROM citas c
		inner join usuario d on id_doctor = d.idusuario WHERE username = '$username'";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			while($data = mysqli_fetch_assoc($results)) {
				$citas[] = $data;
			}
		} else {
			$citas = array();
		}
		return $citas;
	}


	public function addCitas($username, $doc, $fecha, $hora) {
		require_once '../controllers/user.php';
		$userCtrl = new userController();
		$Paciente = $userCtrl->getUserInforByUsername($username);
		$Doctor = $userCtrl->getUserInforByUsername($doc);
		$idPaciente = $Paciente['idusuario'];
		$idDoctor = $Doctor['idusuario'];
		$query = "INSERT INTO citas (id_paciente, id_doctor, fecha_cita, hora_cita, estado) VALUES ($idPaciente, $idDoctor, $fecha, $hora, 0)";
		$results = mysqli_query($this->db, $query);
	}

	public function editCita($id, $action) {
		$query = "UPDATE citas SET estado = $action WHERE idcitas = $id";
		$results = mysqli_query($this->db, $query);
	}

}

?>