<?php

if(!empty($_POST)){



    $mod_id = $_POST["mod_id"];
 	$mod_nombre = $_POST['mod_nombre'];
 	$mod_estado = $_POST['mod_estado'];

         include("tipo.php");
      $send = new tipo();

      $save = $send->editar($mod_nombre,$mod_id, $mod_estado);
      header("location:mostrar.php");



  }


?>