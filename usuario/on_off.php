<?php
	include("../security/seguridad-primary.php");
	if (!empty($_POST['mod'])) {
		$id=$_POST['mod'];
		include 'usuario.php';
		$enviar = new usuario();
		$enviar->desactivar($id);
		header("location:mostrar.php");
	}elseif (!empty($_POST['mod-activar'])) {
		$id=$_POST['mod-activar'];
		include 'usuario.php';
		$enviar = new usuario();
		$enviar->activar($id);
		header("location:mostrar.php");
	}elseif (!empty($_POST['mod-contra'])) {
		$id=$_POST['mod-contra'];
		$actual=$_POST['actual'];
		$nueva=$_POST['nueva'];
		include_once('../conexion/conexion.php');
	    $conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$consult = $conn->prepare("SELECT * FROM usuario where idusuario = '$id' and clave = md5('$actual')");
	    $consult->execute();
	    $data = $consult->fetch(PDO::FETCH_ASSOC);
	    $ids = $data['idusuario'];
		    if ($ids == $id) {
				include 'usuario.php';
				$enviar = new usuario();
				$enviar->contra($id,$nueva);
				$idu = $_SESSION["idusuario"];
				if ($idu == $id) {
					$_SESSION['pass']=$nueva;
				}
				header("location:mostrar.php?msg=true");
		    }else{
		     	header("location:mostrar.php?msg=false");
		    }	
	}else{
		header("location:mostrar.php");
	}

?>