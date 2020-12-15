<?php
	if(!empty($_POST)){
	    $mod_id = $_POST["mod_id"];
	 	$mod_idtipousuario = $_POST['mod_idtipousuario'];
	    include("usuario.php");
	    $send = new usuario();
	    $save = $send->editar($mod_id, $mod_idtipousuario);
	    header("location:mostrar.php");
	}else{
		header("location:mostrar.php");
	}
?>
