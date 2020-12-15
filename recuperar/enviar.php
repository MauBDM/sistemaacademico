<?php
ob_start();
//Para enviar las sessioneso guardar las sessiones en variables
session_start();
//Compreueba si el boton ha sido clikeado para comprobar el metodo post
if(isset($_POST['accion']))
	//creando objeto a la conexion con la base de datos
{
	//Archivo donde se encuentra la conexion de la DB para hacer el puente
	require'../conexion/conexion.php';
	//Variable que almacena la conexion
	$conn = conexion();


	//Captura con variables que vienen del el login. para comproar el usuario
	$usuario= addslashes($_POST['usu']);
	$clave= addslashes($_POST['pass']);


	//Exception de error de pdo
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Consulta Donde se comprueba  que el usuario existe
	$qg = $conn->prepare("SELECT usuario FROM usuario where usuario = '$usuario'");
	//Ejecuta ala consulta
	$qg->execute();
	//De acuerdo a la consulta guardamos en una variable el usuario si es correcto
	//Que existe en la base de datos
	$us = $qg->fetch(PDO::FETCH_ASSOC)['usuario'];

	//Condicion para saber si el usuario es igual al que han ingresado en el fomuario login
	if($usuario == $us){

		//Si se cumple hace la respectiva consulta 
		$consulta = $conn->prepare("SELECT * FROM usuario where usuario='$usuario'");
		//Ejecuta la consulta
       	$consulta->execute();
       	//Guardamos en una variable los datos de la connsulta
    	$dator = $consulta->fetch(PDO::FETCH_ASSOC);
    	// Guardamos en una variable el campo estado.

		$estado = $dator['estado'];
		$idusuario = $dator['idusuario'];
  
		//Si esta activo el usuario continua con la siguiente verificacion
		if ($estado == "Activo") {

			//la clave incriptada con MD5
			$sql = "SELECT * FROM usuario where usuario='$usuario' and clave= MD5('$clave') ";
			//Ejecuta la consulta anterior
			$datos=$conn->query($sql);
			//Si se encuentra.	
			if ($datos->rowCount())
			{	
					
				//Guarda la session en las siguientes variables
				//Session del nombre usuario
				$_SESSION["usuario"]=$usuario;
				//session de la contraseña correcta ingresada
			    $_SESSION["pass"]=$clave;
			          //session del id del usuario
			          $_SESSION["idusuario"] = $idusuario;
			          //Ok para verificar si ha iniciado session correctamnte y usarlo para verificar redireccinar al index
					$_SESSION["ok"]=1;
					// redirecciona al menu .

					header("location:../menu/menu.php");

				
			}else{

				//sino ocurrre lo anterior entonces los intentos aumentan en 1 y muestra un mensaje. asi tambien cumpliendo la condicion. y la session ok queda en cero

				$_SESSION["ok"]=0;
				header("location:../index.php");
			}
		//Si el estado es inactivo le envia un parametro de inactivo correcto. p
		//Para mostrar el respectivo mensaje
		}elseif($estado == "Inactivo"){

			//redireccina con parametro inactivo
			header("location:../index.php?inactivo=correcto");
		}else{
			//redirecciona al index.php
			header("location:../index.php");
		}
	}else{
		/// si el usuario no existe dentro de la base de dato. automaticamente lo redirecciona al index
		//Con el parametro de noresgistrado para mostrar el mensaje alertifys
		header("location:../index.php?noregistrado=true");
	}
}else{
	//Cuando no ha sido clikeado el boton se redirecciona a index.
	header("location:../index.php");
}

//fin de todo para el login
?>