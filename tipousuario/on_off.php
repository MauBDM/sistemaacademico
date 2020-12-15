<?php
	include("../security/seguridad-primary.php");
	if (!empty($_POST['mod'])) {
		$id=$_POST['mod'];
		include 'tipo.php';
		$enviar = new tipo();
		$enviar->desactivar($id);
		header("location:mostrar.php");
	}elseif (!empty($_POST['mod-activar'])) {
		$id=$_POST['mod-activar'];
		include 'tipo.php';
		$enviar = new tipo();
		$enviar->activar($id);
		header("location:mostrar.php");
	}else{
		header("location:mostrar.php");
	}

?>