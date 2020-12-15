<?php
class responsable{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $dui;
	var $nombres;
	var $apellidos;
	var $nacimiento;
	var $telefono;
	var $direccion;

	//funcion que guardar los datos del usuario
	function guardar($dui,$nombres,$apellidos,$telefono,$direccion){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO responsable(dui,nombres,apellidos,telefono,direccion) VALUES(:a,:b,:c,:d,:e)');
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		$stmt->bindParam(':e',$e);
	 		//insert a row
	 		$a = $dui;
	 		$b = $nombres;
	 		$c = $apellidos;
	 		$d = $telefono;
	 		$e = $direccion;

	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editar($dui,$nombres,$apellidos,$telefono,$direccion){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE responsable SET nombres = '$nombres', apellidos = '$apellidos', telefono = '$telefono', direccion = '$direccion' where dui = '$dui'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
}
?>
