<?php
  if(!empty($_POST)){
      include_once('../conexion/conexion.php');
      $conn = conexion();
      $nombre = $_POST["nombre_grd"];
      $idciclo = $_POST["idciclo_grd"];
      $idestado = "1";
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $consult = $conn->prepare("SELECT * FROM grado where nombre = '$nombre'");
      $consult->execute();
      $data = $consult->fetch(PDO::FETCH_ASSOC);
      $nombres = $data['nombre'];
      if(($nombres ==  "") or ($nombre != $nombres)){
        include("grado.php");
        $send = new grado();
        $save = $send->guardar($nombre,$idestado,$idciclo);
        header("location:mostrar.php");
      }elseif($nombres == $nombre){
        echo "<script> alert('Ya existe $nombre. No puede repetir datos')</script>";
        echo"<meta http-equiv='refresh' content='0; url=http://localhost/SistemaAcademico/grado/mostrar.php'/ >";
    }
  }else{
    header("location:mostrar.php");
  }
?>
