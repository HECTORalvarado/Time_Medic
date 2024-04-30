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
		$query = "SELECT c.fecha_cita, c.hora_cita, c.estado, concat(d.nombre + ' ' + d.apellido) as doctor FROM citas c  WHERE username = '$username'
		inner join usuario d
		on id_doctor = d.idusuario";
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


}

?>