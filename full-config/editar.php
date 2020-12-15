<?php
//funcion para poder modificar los registros
class perfil{
	VAR $idautor;
	VAR $nombre;
	VAR $nacimiento;
	VAR $descripcion;

	function modificar($idautor,$nombre,$nacimiento,$descripcion)
		{
			require_once('../../conexion/conexion.php');
			$conn = conexion();
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE autor SET nombre = '$nombre', nacimiento = '$nacimiento', descripcion = '$descripcion' where idautor = '$idautor'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	header("location:config.php");
	}
  }
?>
			