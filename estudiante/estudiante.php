<?php
class estudiante{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $nie;
	var $nombres;
	var $apellidos;
	var $foto;
	var $nacimiento;
	var $genero;
	var $telefono;
	var $direccion;
	var $idestado;
	var $duiResponsable;

	//funcion que guardar los datos del usuario

	function guardar($nie,$nombres,$apellidos,$foto,$nacimiento,$genero,$telefono,$direccion,$duiResponsable){
		$idestado = 1;
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO estudiante(nie,nombres,apellidos,foto,nacimiento,genero,telefono,direccion,idestado,duiResponsable) VALUES(:a,:b,:c,:d,:e,:f,:g,:h,:i,:j)');
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		$stmt->bindParam(':e',$e);
	 		$stmt->bindParam(':f',$f);
	 		$stmt->bindParam(':g',$g);
	 		$stmt->bindParam(':h',$h);
	 		$stmt->bindParam(':i',$i);
	 		$stmt->bindParam(':j',$j);
	 		//insert a row
	 		$a = $nie;
	 		$b = $nombres;
	 		$c = $apellidos;
	 		$d = $foto;
	 		$e = $nacimiento;
	 		$f = $genero;
	 		$g = $telefono;
	 		$h = $direccion;
	 		$i = $idestado;
	 		$j = $duiResponsable;
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
	 	}catch(PDOExcepcion $e){
	 		echo "Error:".$e->getMessage();

	 	}
	}

	function editar($nie,$nombres,$apellidos,$nacimiento,$genero,$telefono,$direccion){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE estudiante SET nombres = '$nombres', apellidos = '$apellidos', nacimiento = '$nacimiento', genero = '$genero', telefono = '$telefono', direccion = '$direccion' where nie = '$nie'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}

	/*function editar($nie,$nombres,$apellidos,$foto,$nacimiento,$genero,$nacionalidad,$viveCon,$parentescoResponsable,$telefono,$zona,$direccion,$enfermedad,$alergia,$duiPadre,$duiMadre,$duiResponsable){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE estudiante SET nombres = '$nombres', apellidos = '$apellidos', foto = '$foto', nacimiento = '$nacimiento', genero = '$genero', nacionalidad = '$nacionalidad', viveCon = '$viveCon', parentescoResponsable = '$parentescoResponsable', telefono = '$telefono', zona = '$zona', direccion = '$direccion', enfermedad = '$enfermedad', alergia = '$alergia', duiPadre = '$duiPadre', duiMadre = '$duiMadre', duiResponsable = '$duiResponsable' where nie = '$nie'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}*/

	//funcion que sirve para desactivar registro
	function desactivar($nie){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE estudiante SET idestado = '2' where nie = '$nie'";
			$conn->exec($sql);
		}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
	 	}
	}

		//funcion que sirve para activar registro
	function activar($nie){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE estudiante SET idestado = '1' where nie = '$nie'";
			$conn->exec($sql);
		}catch(PDOExcepcion $e){
 		echo "Error:".$e->getMessage();
 		}
	}
}
?>
