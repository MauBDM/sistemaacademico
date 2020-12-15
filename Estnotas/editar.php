<?php
	if(!empty($_POST)){
	  $idnotas = $_POST["mod_id"];
	 	$nota1 = $_POST['mod_nota1'];
	 	$nota2 = $_POST['mod_nota2'];
	  $nota3 = $_POST["mod_nota3"];
		$notaFinal = ($nota1+$nota2+$nota3)/3;
	 	$asignatura = $_POST['mod_asignatura'];
	 	$matricula = $_POST['mod_alumno'];
	    	include("notas.php");
	      	$send = new notas();
	      	$save = $send->editar($idnotas,$nota1,$nota2,$nota3,$notaFinal,$asignatura,$matricula);
	      	header("location:mostrar.php");
	}else{
	    header("location:mostrar.php");
	}

?>
