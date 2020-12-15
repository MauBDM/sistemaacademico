<?php
//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
  if (!empty($_POST)) {
       require_once'../../conexion/conexion.php';
       $conn= conexion();
		//datos capturados en el formulario para almacenar los datos
		$idautor = $_POST["idautor"];
		$nombre = $_POST["nombre"]; 
		$nacimiento = $_POST["nacimiento"];
		$descripcion = $_POST["descripcion"];

  		include ("../editar.php");

	  $send = new perfil();
	  $save =$send->modificar($idautor,$nombre,$nacimiento,$descripcion);
	    
    header('location:../config.php');

  }
?>