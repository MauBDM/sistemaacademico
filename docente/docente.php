<?php
class docente{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $id;
	var $nombre;
	var $apellido;
	var $direccion;
	var $telefono;
	var $email;
	var $dui;
	var $nit;
	var $estado;

	//funcion que guardar los datos del usuario
	function guardar($nombre, $apellido, $direccion, $telefono, $email, $dui,$nit,$estado){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO docente(nombres,apellidos,direccion,telefono,email,dui,nit,idestado) VALUES(:a,:b,:c,:d,:e,:f,:g,:h)');	
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		$stmt->bindParam(':e',$e);
	 		$stmt->bindParam(':f',$f);
	 		$stmt->bindParam(':g',$g);
	 		$stmt->bindParam(':h',$h);	
	 		//insert a row
	 		$a = $nombre;
	 		$b = $apellido;
	 		$c = $direccion;
	 		$d = $telefono;
	 		$e = $email;
	 		$f = $dui;
	 		$g = $nit;
	 		$h = $estado;
	 
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editar($id,$nombre,$apellido,$direccion,$telefono,$email,$dui,$nit){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE docente SET nombres = '$nombre', apellidos = '$apellido', direccion = '$direccion', telefono = '$telefono', email = '$email', dui = '$dui', nit = '$nit' where iddocente = '$id'";
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
			$sql = "UPDATE docente SET idestado = '2' where iddocente = '$id'";
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
			$sql = "UPDATE docente SET idestado = '1' where iddocente = '$id'";
			$conn->exec($sql);
		}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
		}
	}
}
?>