<?php
ob_start();
//Permite solo que ingrese el usuario que ha iniciado sesion.
session_start();
  if (!$_SESSION["ok"]){
    //Direcciona a inicio /*Index.php
    header("location:../index.php");
  }
$usuario = $_SESSION['usuario'];
/*if ($user == 1) {
  echo "<script> alert('Bienvenido al sistema Sr@:  $usuario')</script>";
  echo"<meta http-equiv='refresh' content='0; url=http://localhost/EBooks/menu/menu.php'/ >";
}*/
include('../conexion/conexion.php');
$usuario = $_SESSION['usuario'];
$clave = $_SESSION['pass'];

$conn = conexion();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $qg = $conn->prepare("SELECT usuario.*,tipousuario.nombre as nombretipo FROM usuario INNER JOIN tipousuario ON usuario.idtipoUsuario = tipousuario.idtipoUsuario where usuario = '$usuario' and clave = MD5('$clave')");
      $qg->execute();
      $tipo = $qg->fetch(PDO::FETCH_ASSOC)['nombretipo'];
?>

   <?php

   include("principal.php");


   ?>


<!-- Imagen que muestra el menu principal-->

 <div class="form-panel">
 <div class="table-responsive">
<center><div class="responsive"><table class="responsive">
  <tr>
  <?php if ($tipo=='Directora' or $tipo=='Administrador'){ ?>
    <td><a href="../reportes/reportematricula.php"><img class="producto responsive" src="../img/reportes.png" title="reporte matriculas"  width="170px" height="130px"><br>Reportes Matriculas</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td>
      <a href="../reportes/reportenotas.php"><img class="producto responsive" src="../img/reportes2.png" title="reporte notas" width="170px" height="130px"><br>Reportes Calificaciones</a></td>
  <?php } ?>
  <td rowspan="20"><div id="galeria" class="">
      <a href="#"><img src="../img/portada.jpg" width="450px" alt=""></a>
      <a href="#"><img src="../img/matricula.jpg" width="450px" alt=""></a>
      <a href="#"><img src="../img/matricula2.jpg" width="450px" alt=""></a>
      <a href="#"><img src="../img/parvularia.jpg" width="450px" alt=""><br><br><br></a>

      <p align="center">COMPLEJO EDUCATIVO CATÓLICO EL ESPÍRITU SANTO &copy; 2020</p>
      </div>
  </td>
  <?php if ($tipo=='Directora' or $tipo=='Administrador'){ ?>
    <td>
      <a href="../reportes/reporteañolectivo.php"><img class="producto responsive" src="../img/aula.png" title="reporte notas" width="160px" height="130px"><br>Año lectivo</a></td>
      <td>
        <a href="../usuario/mostrar.php#modal_contra"><img class="producto responsive" src="../img/contrasena.png" title="reporte notas" width="160px" height="130px"><br>Gestionar contraseñas</a></td>
  <?php } ?>

  </tr>
</center>
</table>
</div>

<?php
include("footer.php")
?>
      <!--link rel="stylesheet" type="text/css" href="../css/estilos.css"-->
