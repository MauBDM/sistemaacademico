<?php 
	//Permite solo que ingrese el usuario que ha iniciado sesion.
	if (!$_SESSION["ok"]){
	  header("location:../index.php");
	}
?>