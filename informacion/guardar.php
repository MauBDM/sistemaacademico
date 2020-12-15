<?php
	if(!empty($_POST)){
	 	$solicitud = $_POST['solicitud_grd'];
	 	$estado = "pendiente";
	    $idebooks = $_POST["idebooks_grd"];
	    $idusuario = $_POST["idusuario_grd"];
	    //dar formato a la fecha actual
	    date_default_timezone_set('America/El_Salvador');
	    $fecha = date('Y-m-d');
	    //echo $fecha;
		include("solicitud.php");
			$send = new solicitud();
		    $save = $send->guardar($solicitud, $estado, $fecha, $idebooks, $idusuario);
		    header("location:mostrar.php");
	}
?>