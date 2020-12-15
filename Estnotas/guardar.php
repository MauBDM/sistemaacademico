<?php
  if(!empty($_POST)){
      include_once('../conexion/conexion.php');
      $conn = conexion();
        $matricula = $_POST["alumno"];
        $asignatura = $_POST["asignatura"];
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $nota3 = $_POST["nota3"];
        $notaFinal = ($nota1+$nota2+$nota3)/3;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consult = $conn->prepare("SELECT * FROM notas where idmatricula = '$matricula'");
        $consult->execute();
        $data = $consult->fetch(PDO::FETCH_ASSOC);
        $matriculas = $data['idmatricula'];
        if(($matricula ==  "") or ($matricula != $matriculas)){
          include("notas.php");
          $send = new notas();
          $save = $send->guardar($nota1,$nota2,$nota3,$notaFinal,$asignatura,$matricula);
          header("location:mostrar.php");
        }elseif($matriculas == $matricula){
          echo "<script> alert('Ya existe matricula $matricula No puede repetir datos')</script>";
          echo"<meta http-equiv='refresh' content='0; url=http://localhost/POO/SistemaAcademico/notas/mostrar.php'/ >";
      }
    }else{
      header("location:mostrar.php");
    }
?>
