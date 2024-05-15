<?php
session_start();

class CitasModel
{
	private $db;

	public function __construct($bd)
	{
		$this->db = $bd;
	}

	public function getCitas()
	{
		$citas = array();
		$idUser = $this->getIdUser();
		$query = "select c.fecha_cita, c.hora_cita, c.estado, d.nombre, d.apellido from citas c
		inner join usuario d on id_doctor = d.idusuario where id_paciente = '$idUser'";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			while ($data = mysqli_fetch_assoc($results)) {
				$citas[] = $data;
			}
		} else {
			$citas = array();
		}
		return $citas;
	}

	public function getCountCitas()
	{
		$query = "select count(*) as nCitas from citas";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			$totalCitas = mysqli_fetch_assoc($results);
			return $totalCitas;
		}
	}

	public function addCitas($doc, $fecha, $hora)
	{
		$idPaciente = $this->getIdUSer();
		$query = "INSERT INTO citas (id_paciente, id_doctor, fecha_cita, hora_cita, estado) VALUES ($idPaciente, $doc, '$fecha', '$hora', 0)";
		$results = mysqli_query($this->db, $query);
	}

	public function getCitasDoc()
	{
		$citas = array();
		$idUser = $this->getIdUser();
		$query = "select c.idcitas, c.fecha_cita, c.hora_cita, c.estado, d.nombre, d.apellido from citas c
		inner join usuario d on id_paciente = d.idusuario where id_doctor = '$idUser'";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			while ($data = mysqli_fetch_assoc($results)) {
				$citas[] = $data;
			}
		} else {
			$citas = array();
		}
		return $citas;
	}

	public function completeCita ($idCita) {
		$query = "UPDATE citas SET estado = 1 WHERE idcitas = $idCita";
		$results = mysqli_query($this->db, $query);
	}

	public function cancelCita ($idCita) {
		$query = "UPDATE citas SET estado = 2 WHERE idcitas = $idCita";
		$results = mysqli_query($this->db, $query);
	}

	private function getIdUSer () {
		$username = $_SESSION['username'];
		$user = null;
		$queryUser = "select * from usuario where username = '$username'";
		$resultsUser = mysqli_query($this->db, $queryUser);
		if (mysqli_num_rows($resultsUser) > 0) {
			$user = mysqli_fetch_assoc($resultsUser);
		}
		$idUser = $user['idusuario'];
		return $idUser;
	}

	public function getAllDoctors(){
		$doctors = array();
		$query = "select idusuario, nombre, apellido from usuario where role =2";
		$results = mysqli_query($this->db, $query);
		if (mysqli_num_rows($results) > 0) {
			while($data = mysqli_fetch_assoc($results)) {
				$doctors[] = $data;
			}
		} else {
			$doctors[0] = 'nothing is hea';
		}
		return $doctors;
	}
}
