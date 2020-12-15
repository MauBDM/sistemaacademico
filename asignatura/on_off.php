<?php
 	include("../security/seguridad-primary.php");
	if (!empty($_POST['mod'])) {
		$id=$_POST['mod'];
		include 'asignatura.php';
		$enviar = new asignatura();
		$enviar->desactivar($id);
		header("location:mostrar.php");
	}elseif (!empty($_POST['mod-activar'])) {
		$id=$_POST['mod-activar'];
		include 'asignatura.php';
		$enviar = new asignatura();
		$enviar->activar($id);
		header("location:mostrar.php");
	}else{
		header("location:mostrar.php");
	}

?>