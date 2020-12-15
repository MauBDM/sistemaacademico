<?php
//

session_start( ); // allows us to retrieve our key form the session

/* 

First encrypt the key passed by the form, then compare it to the already encrypted key we have stored inside our session variable

*/

//Si el codigo captcha es igual al ingresado en el text de recuperacion 


if (isset($_POST['acciones'])) {
	# code...

if (  strtolower($_POST[ 'code' ])  != $_SESSION[ 'key' ] ) {


//Redirecciona al archivo password con el parametro send
header("location:password.php?send=errorcod");

	}else{


	//conexion includes

	include('../conexion/conexion.php');

	$conn = conexion();
	//variable que la envia al digitar el correo
	$email = $_POST['email'];
		//Execption error de pdo
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Consulta para comparar el email
	$qg = $conn->prepare("SELECT * FROM usuario where email = '$email' AND estado ='Activo'");

			//Ejecuta la consulta
			$qg->execute();

			//Guarda en la variable el email que se encuentra en la db
			$em = $qg->fetch(PDO::FETCH_ASSOC)['email'];
				//comparacion del email 

			if ($em== $email) {


				//funcion que generar contraseña aleatoria y para mostrar o enviarla al correo

			function passs_randow($length = 6){
				//Caracteres que lleva la contraseña aleatoria
				$charset ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkemnopqrstuvwxyz0123456789%$/()?";
				$password= "";
				//Structura repetitiva para elegir la contraseña
				for ($i=0; $i < $length; $i++) {

				$rand = rand()%strlen($charset);
				$password .= substr($charset, $rand,1);
		
				}
					return $password;
			} 
				 //definimos las cantidad de caracteres que quermos que tenga nuestar nueva contraseña
				$newpass = passs_randow(5);
				//Actualizamos en la base de datos la nueva contraseña
				$squery = "UPDATE usuario SET clave = MD5('$newpass') where email = '$email'";
					//Ejecuta la consulta
					$stmt = $conn->prepare($squery);
					$stmt->execute();

					//Redirecciona con el parametro send y la nueva contraseña
				header("location:password.php?send=$newpass");

			}else{
				//Si el email es incorrecto que a la de la base de datos
			header("location:password.php?send=errormail");

			}
}


}else{
	header("location:password.php");
}
?>