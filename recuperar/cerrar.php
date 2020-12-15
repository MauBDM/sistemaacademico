<?php
//Solo ingresa el usuario q ha iniciado session
///destruye la sesscion todo este archivo
session_start();
if (!$_SESSION["ok"]){
	//Redirecciona al index
	header("location:../index.php");
}
?>
<?php 
//Redireccina al index con el parametro cerrar
header("location: ../index.php?cerrar=true");
 ?>

<?php
	//Destruye las sessiones que se almacenan en las variables al ingresar al sistema
	$_SESSION["ok"]="";
	$_SESSION["usuario"]="";
	$_SESSION["clave"]="";
	//Destruye la session
	session_unset();
	session_destroy();
	exit();
  ?>


