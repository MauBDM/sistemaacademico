<?php  
ob_start();
//Permite solo que ingrese el usuario que ha iniciado sesion.
session_start();
	if (!$_SESSION["ok"]){
	  header("location:../index.php");
	}
if (!empty($_GET['user'])) {
	$user = $_GET['user'];
	$usuario = $_SESSION['usuario'];
	if ($user == 1) {
	  echo "<script> alert('Bienvenido al sistema Sr@:  $usuario')</script>";
	  echo"<meta http-equiv='refresh' content='0; url=http://localhost/SistemaAcademico/menu/menu.php'/ >";
	}
}
include('../conexion/conexion.php');
$usuario = $_SESSION['usuario'];
$clave = $_SESSION['pass'];

$conn = conexion();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $qg = $conn->prepare("SELECT usuario.*,tipousuario.nombre as nombretipo FROM usuario INNER JOIN tipousuario ON usuario.idtipoUsuario = tipousuario.idtipoUsuario where usuario = '$usuario' and clave = MD5('$clave')");
      $qg->execute();


      $tipo = $qg->fetch(PDO::FETCH_ASSOC)['nombretipo'];


?>