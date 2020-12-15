<?php
	if(!empty($_POST)){
	    $mod_nie = $_POST["mod_nie"];
	 	$mod_nombres = $_POST['mod_nombres'];
	 	$mod_apellidos = $_POST['mod_apellidos'];
	 	$mod_nacimiento = $_POST['mod_nacimiento'];
	 	$mod_genero = $_POST['mod_genero'];
	 	$mod_telefono = $_POST['mod_telefono'];
	 	$mod_direccion = $_POST['mod_direccion'];
	    include("estudiante.php");
	    $send = new estudiante();
	    $save = $send->editar($mod_nie, $mod_nombres, $mod_apellidos, $mod_nacimiento, $mod_genero, $mod_telefono, $mod_direccion);
	    header("location:mostrar.php");
	}else{
		header("location:mostrar.php");
	}
?>
