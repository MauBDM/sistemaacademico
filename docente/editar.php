<?php
	if(!empty($_POST)){
	    $mod_id = $_POST["mod_id"];
	 	$mod_nombre = $_POST['mod_nombre'];
	 	$mod_apellido = $_POST['mod_apellido'];
	 	$mod_direccion = $_POST['mod_direccion'];
	 	$mod_telefono = $_POST['mod_telefono'];
	 	$mod_email = $_POST['mod_email'];
	 	$mod_dui = $_POST['mod_dui'];
	 	$mod_nit = $_POST['mod_nit'];
	    	include("docente.php");
	      	$send = new docente();
	      	$save = $send->editar($mod_id, $mod_nombre, $mod_apellido, $mod_direccion, $mod_telefono, $mod_email, $mod_dui, $mod_nit);
	      	header("location:mostrar.php");
	}else{
	    header("location:mostrar.php");		
	}

?>