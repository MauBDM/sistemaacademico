<?php
	if(!empty($_POST)){
	    $mod_id = $_POST["mod_id"];
	 	$mod_nombre = $_POST['mod_nombre'];
	 	$mod_idciclo = $_POST['mod_idciclo'];
	    	include("grado.php");
	      	$send = new grado();
	      	$save = $send->editar($mod_id, $mod_nombre, $mod_idciclo);
	      	header("location:mostrar.php");
	}else{
	    header("location:mostrar.php");		
	}

?>