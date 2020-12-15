<?php
  if(!empty($_POST)){
      include_once('../conexion/conexion.php');
      $año = $_POST["año_grd"];
      $turno = $_POST["turno_grd"];
      $tipo = $_POST["tipo_grd"];
      $guia = $_POST["guia_grd"];
      $grado = $_POST["grado_grd"];
      $asignatura = $_POST["asignatura"];
      $docente = $_POST["docente"];
      //$asig = array();
      //echo count($asignatura);
      //echo count($docente);

      include("gradoDocente.php");
      $send = new gradoDocente();
      $save = $send->guardar($año,$turno,$tipo,$guia,$grado);
          //Guardar docente_materia
          $conn = conexion();
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $consult = $conn->prepare("SELECT max(iddocente_grado) as idg FROM docente_grado");
          $consult->execute();
          $data = $consult->fetch(PDO::FETCH_ASSOC);
          $iddocente_grado = $data['idg'];
          if (count($asignatura)==count($docente)) {
            for ($i=0; $i < count($asignatura); $i++) {
              $send->guardarDetalle($iddocente_grado,$docente[$i],$asignatura[$i]);
            }
          }else{
            echo "algo salio mal";
          }
          /*foreach ($asig as $a) {
            echo $a;
          }*/
        header("location:mostrar.php");
  }else{
    header("location:mostrar.php");
  }
?>
