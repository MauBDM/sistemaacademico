<?php
  if(!empty($_POST)){
      include_once('../conexion/conexion.php');
      $grado = $_POST["gradoo"];
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
      /*$consult = $conn->prepare("SELECT notas.*,matricula.idgradoDocente as idgradoDocenteMatricula, matricula.nie as nieMatricula FROM notas inner join matricula on notas.idmatricula=matricula.idmatricula where matricula.idgradoDocente='$grado' and matricula.nie='$matricula[$i]'");
      $consult->execute();
      $data = $consult->fetch(PDO::FETCH_ASSOC);
      $idgradoD = $data['idgradoDocenteMatricula'];
      if(($idgradoD ==  "") or ($grado != $idgradoD)){
        include("asignatura.php");
        $send = new asignatura();
        $save = $send->guardar($nombre,$idestado);
        header("location:mostrar.php");
      }elseif($nombres == $nombre){
        echo "<script> alert('Ya existe $nombre. No puede repetir datos')</script>";
        echo"<meta http-equiv='refresh' content='0; url=http://localhost/SistemaAcademico/asignatura/mostrar.php'/ >";
    }*/
      
        include("matricula.php");
        $send = new matricula();
          if (count($matricula)>0) {
            for ($i=0; $i < count($matricula); $i++) { 
              $consult = $conn->prepare("SELECT notas.*,matricula.idgradoDocente as idgradoDocenteMatricula, matricula.nie as nieMatricula FROM notas inner join matricula on notas.idmatricula=matricula.idmatricula where matricula.idgradoDocente='$grado' and matricula.nie='$nie[$i]' and notas.idasignatura='$asignatura[$i]'");
              $consult->execute();
              $data = $consult->fetch(PDO::FETCH_ASSOC);
              $idgradoD = $data['idgradoDocenteMatricula'];
              if(($idgradoD ==  "") or ($grado != $idgradoD)){
                $send->guardarNota($primerTri[$i],$segundoTri[$i],$tercerTri[$i],$notaFinal[$i],$fecha,$asignatura,$matricula[$i]);
                header("location:mostrar.php");
              }elseif($idgradoD == $grado){
                echo "<script> alert('Ya existe el este registro. No puede repetir datos')</script>";
                $i=count($matricula);
                header("location:mostrar.php");
              }
            }
          }else{
            echo "algo salio mal";
          }
        header("location:mostrar.php");
  }else{
    header("location:mostrar.php");
  }
?>
