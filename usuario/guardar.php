<?php
if(!empty($_POST)){
    include_once('../conexion/conexion.php');
    $conn = conexion();
    $usuario = $_POST["usu_grd"];
    $clave = $_POST["clave_grd"];
    $estado = $_POST["estado_grd"];
    $idtipousuario = $_POST["idtipousuario_grd"];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $consult = $conn->prepare("SELECT * FROM usuario where usuario = '$usuario' or clave = '$clave'");
    $consult->execute();
    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $usuarios = $data['usuario'];
    $claves = $data['clave'];
    #validamos no haya otro usuario con el mismo nombre o clave
    if((($usuarios ==  "") or ($usuario != $usuarios)) and (($claves ==  "") or ($clave != $claves))){
         include("usuario.php");
         $send = new usuario();

      $save = $send->guardar($usuario,$clave,$estado,$idtipousuario);
      echo $save;
      header("location:mostrar.php");
    }elseif ($claves == $clave or $usuarios == $usuario) {
      if($claves == $clave){
      echo "<script> alert('Contraseña invalida: $clave. No puede repetir datos')</script>";
      echo"<meta http-equiv='refresh' content='0; url=http://localhost/poo/SistemaAcademico/usuario/mostrar.php'/ >";
    }
      if($usuarios == $usuario){
      echo "<script> alert('Ya existe el usuario $usuario. No puede repetir datos')</script>";
      echo"<meta http-equiv='refresh' content='0; url=http://localhost/poo/SistemaAcademico/usuario/mostrar.php'/ >";
    }
    }
}

?>
