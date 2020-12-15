<?php
  if (!empty($_POST['usuario'])) {
    $usuario = $_POST["usuario"];
    //Agregar cadena para informar el problema de usuario bloqueado
    $comentario = "Solicito desbloqueo de usuario y cambio de contraseña: ".$usuario;
      include("../comentario/comentario.php");
      $send = new comentario();
      echo $comentario;
      $save = $send->guardar($comentario);
      header("location:../index.php");
  }elseif (!empty($_POST['comentario'])) {
    $comentario=$_POST['comentario'];
      include("../comentario/comentario.php");
      $send = new comentario();
      $save = $send->guardar($comentario);
      header("location:../index.php");
  }
?>
