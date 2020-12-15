<?php 
	class solicitud{
		//definir variables para la clase usuario segun la tabla solicitud en la base de datos
		var $id;
		var $solicitud;
		var $estado;
		var $fecha;
		var $idebooks;
		var $idusuario;
		//funcion que guardar los datos de la solicitud
		function guardar($solicitud,$estado,$fecha,$idebooks,$idusuario){
			try{
		 		include_once('../conexion/conexion.php');
		 		$conn = conexion();
		 		//prepare el sql and bind parameters
		 		$stmt = $conn->prepare('INSERT INTO solicitud(solicitud,estado, fecha,idebooks,idusuario) VALUES(:a,:b,:c,:d,:e)');
		 		$stmt->bindParam(':a',$a);
		 		$stmt->bindParam(':b',$b);
		 		$stmt->bindParam(':c',$c);
		 		$stmt->bindParam(':d',$d);
		 		$stmt->bindParam(':e',$e);
		 		//insert a row
		 		$a = $solicitud;
		 		$b = $estado;
		 		$c = $fecha;
		 		$d = $idebooks;
		 		$e = $idusuario; 
		 		$stmt->execute();
		 	}catch(PDOExcepcion $e){
	 			echo "Error:".$e->getMessage();
	 		}
		}

		function caducar($id){
			require_once('../conexion/conexion.php');
			$conn = conexion();
			try{
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE solicitud SET estado = 'caducada' where idsolicitud = '$id'";
				$conn->exec($sql);
			}catch(PDOExcepcion $e){
	 			echo "Error:".$e->getMessage();
	 		}
		}
	}
 ?>