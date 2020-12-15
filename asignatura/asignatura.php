<?php
class asignatura{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $id;
	var $nombre;
	var $idestado;
	//funcion que guardar los datos del usuario
	function guardar($nombre,$idestado){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO asignatura(nombre,idestado) VALUES(:a,:b)');	
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		//insert a row
	 		$a = $nombre;
	 		$b = $idestado;
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editar($id,$nombre){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE asignatura SET nombre = '$nombre' where idasignatura = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
	//funcion que sirve para desactivar registro
	function desactivar($id){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE asignatura SET idestado = '2' where idasignatura = '$id'";
			$conn->exec($sql);
		}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	//funcion que sirve para activar registro
	function activar($id){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE asignatura SET idestado = '1' where idasignatura = '$id'";
			$conn->exec($sql);
		}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
		}
	}
}
?>