<?php
 	include("../security/seguridad-primary.php");
	if (!empty($_POST['mod'])) {
		$id=$_POST['mod'];
		include 'ciclo.php';
		$enviar = new ciclo();
		$enviar->desactivar($id);
		header("location:mostrar.php");
	}elseif (!empty($_POST['mod-activar'])) {
		$id=$_POST['mod-activar'];
		include 'ciclo.php';
		$enviar = new ciclo();
		$enviar->activar($id);
		header("location:mostrar.php");
	}else{
		header("location:mostrar.php");
	}

?>