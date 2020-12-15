
<!DOCTYPE html>
<html>
<head>

	<title> desbloqueo</title>
	<style type='text/css'>
   html{
    background: url(../imagenes/bg.jpg);
   }

   </style>
</head>
<body>


<?php 
//Si es clikeado el boton del formulario de reiniciar intentos 
if (isset($_POST['acciones'])) {
//captura las variables de el formulario
	$respues = addslashes($_POST['res']);

	$email = addslashes($_POST['email']);
//conexion puente

require'../conexion/conexion.php';


$conn = conexion();

//Si el email es correcto existe en la base de datos

$q = $conn->prepare("SELECT * FROM usuario where email= '$email'");
$q->execute();

//Almacenamos el campo de respuesta en una variable
$res = $q->fetch(PDO::FETCH_ASSOC)['respuesta'];

//si la respuesta es correcta entonces reinicia los intentos y desbloqueada el usuario
//compara la respuesta del uuario
if ($respues == $res) {
	$sqls = "UPDATE usuario SET intentos = 0, bloqueado = 0 where email = '$email'";

//Ejecuta la consulta sql
	$stmt = $conn->prepare($sqls);
	$stmt->execute();

	//redirecciona con el parametro de desbloquear
	header("location: desbloquear.php?desbloquear=true");
	

}elseif($respues != $res){
	// Si la respuesta es incorrecta envia el parametro y muestra el mensjaje correspondiente
	header("location: desbloquear.php?desbloquear=false");
	

}

}else{
	// Si el usuario solo ingresa para ver
	header("location: ../desbloquear.php");
}


 ?>

 </body>
</html>