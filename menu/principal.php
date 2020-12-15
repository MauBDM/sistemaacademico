<?php
if (!$_SESSION["ok"])
{
  header("location:../index.php");
}
require_once("../conexion/conexion.php");
$conn = conexion();
@session_start();
$usuario = $_SESSION['usuario'];
$clave = $_SESSION['pass'];
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $consult = $conn->prepare("SELECT usuario.*,tipousuario.nombre as nombretipo FROM usuario INNER JOIN tipousuario ON usuario.idtipoUsuario = tipousuario.idtipoUsuario where usuario = '$usuario' and clave = MD5('$clave')");
       $consult->execute();

    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $idusu = $data['idusuario'];
    $tipo = $data['nombretipo'];
    $nombre = $data['usuario'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>CECES</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <link rel="shortcut icon" href="../img/logoSanto.ico" />
  <script src="../bootstrap/js/jQuery-2.1.4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/lib/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../bootstrap/lib/style.css">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/lib/estilos.css" rel="stylesheet">
    <link href="../bootstrap/lib/style-responsive.css" rel="stylesheet">

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/lib/jquery.js"></script>
    <script src="../bootstrap/lib/jquery-1.8.3.min.js"></script>
    <script src="../bootstrap/lib/bootstrap.min.js"></script>


    <link href="../bootstrap/lib/nanoscroller.css" rel="stylesheet">
    <script type="text/javascript" src="../bootstrap/lib/jquery.nanoscroller.js"></script>
    <link rel="stylesheet" href="../img/galeria.css">

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/estilos.css">
    </head>
    <body>
      <section id="container" class="">
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Cambiar de Navegación."></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo ">COMPLEJO EDUCATIVO CATÓLICO EL ESPÍRITU SANTO<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
              <li class="btn btn-default">

                <script type="text/javascript">
 /* muestra la fecha en el area local en el sistema */
var dias_semana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sabado");
var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre", "Diciembre");
var fecha_actual = new Date();

document.write(dias_semana[fecha_actual.getDay()] + ", " + fecha_actual.getDate() + " de " + meses[fecha_actual.getMonth()] + " del " + fecha_actual.getFullYear());

</script></li></a>


            <!--logo end-->
<div class="top-menu">
  <ul class="nav pull-right top-menu">
        <!--a href="#" class="logo" data-toggle="modal" data-target="#modal_INFO">
      <i class="fa fa-th tooltips" data-placement="left" data-original-title="Acerca de.">
      </i>&nbsp;&nbsp;</a-->
      <?php if ($tipo=='Administrador'){ ?>
        <a href="../backup/generatebackup.php" class="logo">
      <i class="fa fa-database aria-hidden='true' tooltips" data-placement="left" data-original-title="Generar respaldo de base de datos.">
      </i>&nbsp;&nbsp;
    </a><?php } ?>
    <!--a href="../full-config/config.php" class="logo">
      <i class="fa fa-cogs aria-hidden='true' tooltips" data-placement="left" data-original-title="Configuración del sistema.">
      </i>&nbsp;&nbsp;
    </a>

    <a href="#" class="logo">
      <i class="fa fa-question tooltips" data-placement="left" data-original-title="Ayuda.">
      </i>&nbsp;&nbsp;
    </a>
        <a href="../recuperar/bloquear-pantalla.php" class="logo">
          <i class="fa fa-lock tooltips" data-placement="left" data-original-title="Dejémosle unos minutos.">
          </i>&nbsp;&nbsp;
        </a-->
        <a href="../recuperar/cerrar.php" class="logo">
          <i class="fa fa-sign-out tooltips" data-placement="left" data-original-title="Salir.">
          </i>&nbsp;&nbsp;
        </a>
        </ul>
        </div>
        </header>
      <!--header end-->


      <!--sidebar start-->
      <aside>
          <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none; margin-left: 0px; background: linear-gradient(to bottom, #38B857, #2679C8); ">
              <!-- sidebar menu start-->
              <?php
                /*include_once('../conexion/conexion.php');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consult = $conn->prepare("SELECT * FROM perfil where id_perfil = 1 ");
                $consult->execute();
                $data = $consult->fetch(PDO::FETCH_ASSOC);
                $url = $data['logo_url'];*/
                $url = "../img/logo.png"
               ?>
              <?php if ($tipo=='Administrador'){ ?>
                <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

                  <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
                  <h5 class="centered"><?php echo $nombre; ?></h5>

                  <li class="mt">
                      <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                          <i class="fa fa-dashboard"></i>
                          <span >Inicio</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                    <a class="tooltips" data-placement="bottom" data-original-title="Muestra los Tipo de Usuarios." href="../tipousuario/mostrar.php"><i class="fa fa-user"></i><span>Tipo de Usuario</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra nuestros usuarios." href="../usuario/mostrar.php"><i class="fa fa-users"></i><span>Usuarios</span>
                  <span class="dcjq-icon"></span></a>
                  </li>

                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra nuestros docentes." href="../docente/mostrar.php"><i class="fa fa-user"></i><span>Docente</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los ciclos." href="../ciclo/mostrar.php"><i class="fa fa-book"></i><span>Ciclo</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los grados." href="../grado/mostrar.php"><i class="fa fa-book"></i><span>Grado</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los años lectivos" href="../gradoDocente/mostrar.php"><i class="fa fa-book"></i><span>Año lectivo</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las asignaturas." href="../asignatura/mostrar.php"><i class="fa fa-book"></i><span>Asignatura</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra estudiantes registrados." href="../estudiante/mostrar.php"><i class="fa fa-user"></i><span>Estudiante</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra responsables registrados." href="../responsable/mostrar.php"><i class="fa fa-user"></i><span>Responsables</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las Notas." href="../matricula/mostrar.php"><i class="fa fa-book"></i><span>Matriculas</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
              </ul>

              <?php }
               if ($tipo=='soporte'){ ?>
                <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

                  <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
                  <h5 class="centered"><?php echo $nombre; ?></h5>

                  <li class="mt">
                      <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                          <i class="fa fa-dashboard"></i>
                          <span >Inicio</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Muestra nuestros usuarios." href="../usuario/mostrar.php"><i class="fa fa-users"></i><span>Usuarios</span>
                  <span class="dcjq-icon"></span></a>
                  </li>
              </ul>
            <?php }
             if ($tipo=='Directora'){ ?>
              <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

                <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
                <h5 class="centered"><?php echo $nombre; ?></h5>

                <li class="mt">
                    <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                        <i class="fa fa-dashboard"></i>
                        <span >Inicio</span>
                    </a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra nuestros docentes." href="../docente/mostrar.php"><i class="fa fa-user"></i><span>Docente</span>
                <span class="dcjq-icon"></span></a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los años lectivos" href="../gradoDocente/mostrar.php"><i class="fa fa-book"></i><span>Año lectivo</span>
                <span class="dcjq-icon"></span></a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra estudiantes registrados." href="../estudiante/mostrar.php"><i class="fa fa-user"></i><span>Estudiante</span>
                <span class="dcjq-icon"></span></a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra responsables registrados." href="../responsable/mostrar.php"><i class="fa fa-user"></i><span>Responsables</span>
                <span class="dcjq-icon"></span></a>
                </li>
                <li class="sub-menu">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las Notas." href="../matricula/mostrar.php"><i class="fa fa-book"></i><span>Matriculas</span>
                <span class="dcjq-icon"></span></a>
                </li>
            </ul>
          <?php }
           if ($tipo=='Docente'){ ?>
            <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

              <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
              <h5 class="centered"><?php echo $nombre; ?></h5>

              <li class="mt">
                  <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                      <i class="fa fa-dashboard"></i>
                      <span >Inicio</span>
                  </a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los grados." href="../grado/mostrar.php"><i class="fa fa-book"></i><span>Grado</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra los años lectivos" href="../gradoDocente/mostrar.php"><i class="fa fa-book"></i><span>Año lectivo</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las asignaturas." href="../asignatura/mostrar.php"><i class="fa fa-book"></i><span>Asignatura</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra estudiantes registrados." href="../estudiante/mostrar.php"><i class="fa fa-user"></i><span>Estudiante</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra responsables registrados." href="../responsable/mostrar.php"><i class="fa fa-user"></i><span>Responsables</span>
              <span class="dcjq-icon"></span></a>
              </li>
              <li class="sub-menu">
                <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las Notas." href="../matricula/mostrar.php"><i class="fa fa-book"></i><span>Matriculas</span>
              <span class="dcjq-icon"></span></a>
              </li>
          </ul>
        <?php }
         if ($tipo=='Estudiante'){ ?>
          <ul class="sidebar-menu" id="nav-accordion" style="display: block;">

            <p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a></p>
            <h5 class="centered"><?php echo $nombre; ?></h5>

            <li class="mt">
                <a class= "tooltips" data-placement="bottom" data-original-title="Ir a inicio" href="../menu/menu.php" >
                    <i class="fa fa-dashboard"></i>
                    <span >Inicio</span>
                </a>
            </li>
            <li class="sub-menu">
              <a class= "tooltips" data-placement="bottom" data-original-title="Muestra las Notas." href="../Estnotas/mostrar.php"><i class="fa fa-book"></i><span>Notas</span>
            <span class="dcjq-icon"></span></a>
            </li>
        </ul>
        <?php }  ?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->


      <!--main content start-->
      <section id="main-content" style="margin-left: 210px;">
      	<div class="wrapper" id="contentLoading" style="display: none;"><br>
		</div>
		<section class="wrapper contenido"><div class="row">
</div></section>
<form class="form-horizontal" action="#" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">

<div class="modal fade bs-example-modal-lg" id="modal_INFO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<center><h4 class="modal-title">Acerca del sistema.</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">Acerca de los desarrolladores.</a></li></div><br />
<center>
<img src="../img/portada.jpg" width="85%" height="55%" >
</center>
</ul><br />
<center><strong>Copyright © 2020 <a href="#" target="_blank"><font color="black">COMPLEJO EDUCATIVO CATÓLICO EL ESPÍRITU SANTO v1.0</font></a></strong></center>


<div class="tab-content">

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cerrar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
