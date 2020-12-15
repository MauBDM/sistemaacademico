<?php
	if(!empty($_POST)){
	    $mod_id = $_POST["mod_id"];
	 	$mod_nombre = $_POST['mod_nombre'];
	    	include("ciclo.php");
	      	$send = new ciclo();
	      	$save = $send->editar($mod_id, $mod_nombre);
	      	header("location:mostrar.php");
	}else{
	    header("location:mostrar.php");		
	}

?>