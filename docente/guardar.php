<?php
if(!empty($_POST)){
    include_once('../conexion/conexion.php');
    $conn = conexion();
    $nombre = $_POST["nombre_grd"];
    $apellido = $_POST["apellido_grd"];
    $direccion = $_POST["direccion_grd"];
    $telefono = $_POST["telefono_grd"];
    $email = $_POST["email_grd"];
    $dui = $_POST["dui_grd"];
    $nit = $_POST["nit_grd"];
    $estado = $_POST["estado_grd"];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $consult = $conn->prepare("SELECT * FROM docente where dui = '$dui' or email = '$email'");
    $consult->execute();
    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $duis = $data['dui'];
    $emails = $data['email'];
    if((($duis ==  "") or ($dui != $duis)) and (($emails ==  "") or ($email != $emails))){ 
      include("docente.php");
      $send = new docente();
      $save = $send->guardar($nombre,$apellido,$direccion,$telefono,$email,$dui,$nit,$estado);
      echo $save;
      header("location:mostrar.php");
    }elseif ($emails == $email or $duis == $dui) {
      if($emails == $email){
      echo "<script> alert('Ya existe el e-mail: $email. No puede repetir datos')</script>";
      echo"<meta http-equiv='refresh' content='0; url=http://localhost/SistemaAcademico/docente/mostrar.php'/ >";
    }
      if($usuarios == $usuario){
      echo "<script> alert('Ya existe el dui: $dui. No puede repetir datos')</script>";
      echo"<meta http-equiv='refresh' content='0; url=http://localhost/SistemaAcademico/docente/mostrar.php'/ >";
    }
    }
}else{
  header("location:mostrar.php");  
}

?>
