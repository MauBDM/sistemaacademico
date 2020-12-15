<?php
class notas{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $id;
	var $nota1;
	var $nota2;
	var $nota3;
	var $prom;
	var $asignatura;
	var $matricula;

	//funcion que guardar los datos de las notas
	function guardar($nota1,$nota2,$nota3,$prom,$asignatura,$matricula){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO notas(primerTrimestre,segundoTrimestre,tercerTrimestre,notaFinal,idasignatura,idmatricula) VALUES(:a,:b,:c,:d,:e,:f)');
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
			$stmt->bindParam(':e',$e);
			$stmt->bindParam(':f',$f);
	 		//insert a row
	 		$a = $nota1;
	 		$b = $nota2;
	 		$c = $nota3;
	 		$d = $prom;
			$e = $asignatura;
			$f = $matricula;
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editar($id,$nota1,$nota2,$nota3,$prom,$asignatura,$matricula){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE notas SET primerTrimestre = '$nota1', segundoTrimestre = '$nota2', tercerTrimestre = '$nota3', notaFinal = '$prom', idasignatura = '$asignatura', idmatricula = '$matricula' where idnotas = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
}
?>
