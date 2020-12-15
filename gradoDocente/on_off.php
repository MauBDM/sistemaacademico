<?php
 	include("../security/seguridad-primary.php");
	if (!empty($_POST['mod'])) {
		$id=$_POST['mod'];
		include 'gradoDocente.php';
		$enviar = new gradoDocente();
		$enviar->desactivar($id);
		header("location:mostrar.php");
	}elseif (!empty($_POST['mod-activar'])) {
		$id=$_POST['mod-activar'];
		include 'gradoDocente.php';
		$enviar = new gradoDocente();
		$enviar->activar($id);
		header("location:mostrar.php");
	}else{
		header("location:mostrar.php");
	}

?>
