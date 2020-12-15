<?php
class gradoDocente{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $id;
	var $año;
	var $turno;
	var $tipo;
	var $idguia;
	var $idgrado;

	//funcion que guardar
	function guardar($año,$turno,$tipo,$guia,$idgrado){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO docente_grado(año,turno,tipo,guia,idgrado) VALUES(:a,:b,:c,:d,:e)');
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		$stmt->bindParam(':e',$e);
	 		//insert a row
	 		$a = $año;
	 		$b = $turno;
	 		$c = $tipo;
	 		$d = $guia;
	 		$e = $idgrado;
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editar($id,$año,$turno,$tipo,$guia,$idgrado){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE docente_grado SET año = '$año', turno = '$turno', tipo = '$tipo', guia = '$guia', idgrado = '$idgrado' where iddocente_grado = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
	var $idd;
	var $idgradoDocente;
	var $iddocente;
	var $idasignatura;
	//funcion que guardar
	function guardarDetalle($idgradoDocente,$iddocente,$idasignatura){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO docente_asignatura(idgradoDocente,iddocente,idasignatura) VALUES(:a,:b,:c)');
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		//insert a row
	 		$a = $idgradoDocente;
	 		$b = $iddocente;
	 		$c = $idasignatura;
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editarDocente($idd,$iddocente){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE docente_asignatura SET iddocente = '$iddocente' where iddocenteAsignatura = '$idd'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
}
?>
