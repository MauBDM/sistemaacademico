<?php
	if(!empty($_POST['mod_id'])){
	   $id = $_POST["mod_id"];
	 	$año = $_POST['mod_año'];
	 	$turno = $_POST['mod_turno'];
	  $tipo = $_POST["mod_tipo"];
	 	$guia = $_POST['mod_guia'];
	 	$grado = $_POST['mod_grado'];
	    	include("gradoDocente.php");
	      	$send = new gradoDocente();
	      	$save = $send->editar($id,$año,$turno,$tipo,$guia,$grado);
	      	header("location:mostrar.php");
	}elseif (!empty($_POST['mod_idd'])) {
		$idd = $_POST["mod_idd"];
	 	$iddocente = $_POST['mod_docente'];
	    	include("gradoDocente.php");
	      	$send = new gradoDocente();
	      	$save = $send->editarDocente($idd,$iddocente);
	      	header("location:mostrar.php");
	}else{
	    header("location:mostrar.php");
	}

?>
