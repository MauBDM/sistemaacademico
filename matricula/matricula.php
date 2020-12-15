<?php
class matricula{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $id;
	var $idgradoDocente;
	var $nie;
	var $fecha;
	var $idestado;

	//funcion que guardar
	function guardar($fecha,$idgradoDocente,$nie,$idestado){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO matricula(fecha,idgradoDocente,nie,idestado) VALUES(:a,:b,:c,:d)');
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		//insert a row
	 		$a = $fecha;
	 		$b = $idgradoDocente;
	 		$c = $nie;
	 		$d = $idestado;
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	var $primerTri;
	var $segundoTri;
	var $tercerTri;
	var $notaFinal;
	//var $fecha;
	var $idasignatura;
	var $idmatricula;
	//funcion que guardar
	function guardarNota($primerTri,$segundoTri,$tercerTri,$notaFinal,$fecha,$idasignatura,$idmatricula){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO notas(primerTrimestre,segundoTrimestre,tercerTrimestre,notaFinal,fecha,idasignatura,idmatricula) VALUES(:a,:b,:c,:d,:e,:f,:g)');
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		$stmt->bindParam(':e',$e);
	 		$stmt->bindParam(':f',$f);
	 		$stmt->bindParam(':g',$g);
	 		//insert a row
	 		$a = $primerTri;
	 		$b = $segundoTri;
	 		$c = $tercerTri;
	 		$d = $notaFinal;
	 		$e = $fecha;
	 		$f = $idasignatura;
	 		$g = $idmatricula;
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editarNotas($id,$primerTri,$segundoTri,$tercerTri,$notaFinal,$idasignatura,$idmatricula){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE notas SET primerTrimestre = '$primerTri', segundoTrimestre = '$segundoTri', tercerTrimestre = '$tercerTri', notaFinal = '$notaFinal' where idnotas = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}

	//var $idgradoDocente;
	var $iddocente;
	//var $idasignatura;
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
