<?php
  if(!empty($_POST)){
      include_once('../conexion/conexion.php');
      $nota = $_POST["idnotas"];
      $grado = $_POST["grado"];
      $asignatura = $_POST["asignatura"];
      $matricula = $_POST["matricula"];
      $nie = $_POST["nie"];
      $primerTri = $_POST["nota1"];    
      $segundoTri = $_POST["nota2"];
      $tercerTri = $_POST["nota3"];
      $notaFinal = $_POST["notaFinal"];

      //echo count($matricula);
      //dar formato a la fecha actual
        date_default_timezone_set('America/El_Salvador');
        $fecha = date('Y-m-d');
      $conn = conexion();
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        include("matricula.php");
        $send = new matricula();
          if (count($matricula)>0) {
            for ($i=0; $i < count($matricula); $i++) { 
              $send->editarNotas($nota,$primerTri[$i],$segundoTri[$i],$tercerTri[$i],$notaFinal[$i],$asignatura,$matricula[$i]);
            }
            header("location:mostrar.php");
          }else{
            echo "algo salio mal";
          }
        header("location:mostrar.php");
  }else{
    header("location:mostrar.php");
  }
?>
