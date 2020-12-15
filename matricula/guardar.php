<?php
  /*if(!empty($_POST)){
      include_once('../conexion/conexion.php');
      $grado = $_POST["grado"];
      $nie = $_POST["estudiante"];
      $idestado="1";
      //dar formato a la fecha actual
      date_default_timezone_set('America/El_Salvador');
      $fecha = date('Y-m-d');

      include("matricula.php");
      $send = new matricula();
      $save = $send->guardar($fecha,$grado,$nie,$idestado);
      //header("location:mostrar.php");
  }else{
    header("location:mostrar.php");
  }*/
  ob_start();
  if(!empty($_POST)){
        $conexion = mysqli_connect('localhost','root','','registroacademico');
        //$mensaje = $_POST['mensaje'];
        //$idu = $_SESSION['idusuario'];
          $grado = $_POST["grado"];
          $nie = $_POST["estudiante"];
          $idestado="1";
          //dar formato a la fecha actual
          date_default_timezone_set('America/El_Salvador');
          $fecha = date('Y-m-d');
        $sql = "INSERT INTO matricula(fecha, idgradoDocente, nie, idestado) VALUES ('".$fecha."','".$grado."','".$nie."','".$idestado."')";
        echo mysqli_query($conexion, $sql);
  }else{
    header("location:mostrar.php");
  }
?>
