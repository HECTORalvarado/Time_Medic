<?php

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
		$username = $_SESSION['username'];
		$user = null;
		$queryUser = "select * from usuario where username = '$username'";
		$resultsUser = mysqli_query($this->db, $queryUser);
		if (mysqli_num_rows($resultsUser) > 0) {
			$user = mysqli_fetch_assoc($resultsUser);
		}
		$idUser = $user['idusuario'];
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

	public function addCitas($username, $doc, $fecha, $hora)
	{
		$paciente = null;
		$doctor = null;
		$queryPaciente = "select * from usuario where username = '$username'";
		$queryDoctor = "select * from usuario where username = '$doc'";
		$resultPaciente= mysqli_query($this->db, $queryPaciente);
		if (mysqli_num_rows($resultPaciente) > 0) {
			$paciente = mysqli_fetch_assoc($resultPaciente);
		}
		$resultDoc = mysqli_query($this->db, $queryDoctor);
		if (mysqli_num_rows($resultDoc) > 0) {
			$doctor = mysqli_fetch_assoc($resultDoc);
		}
		$idPaciente = $paciente['idusuario'];
		$idDoctor = $doctor['idusuario'];
		$query = "INSERT INTO citas (id_paciente, id_doctor, fecha_cita, hora_cita, estado) VALUES ($idPaciente, $idDoctor, $fecha, $hora, 0)";
		$results = mysqli_query($this->db, $query);
	}

	public function editCita($id, $action)
	{
		$query = "UPDATE citas SET estado = $action WHERE idcitas = $id";
		$results = mysqli_query($this->db, $query);
	}
}
