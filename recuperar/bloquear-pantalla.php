
<?php

//Permite solo que ingrese el usuario que ha iniciado sesion.
//con la session amacenada al ingresar con los datos correctos
session_start();
if (!$_SESSION["ok"])

{

//redirecciona al index.php del sistema o login si no existe la session
  header("location:../");

}else{

}

//incluimos el archivo de conexion para hacer el puente a la base de datos
include_once('../conexion/conexion.php');
    $conn = conexion();

//guardamos las sessiones en unas variables
$usuario = $_SESSION['usuario'];
$clave = $_SESSION['pass'];

//Pdo Errorcapture
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Hacemos la consulta del usuario que ha iniciado sesion con las variables de session almacenadas.
//Consultando los datos respectivos
  $qg = $conn->prepare("SELECT usuario.*,tipousuario.nombre as nombretipo FROM usuario INNER JOIN tipousuario ON 
    usuario.idtipousuario = tipousuario.idtipousuario where usuario = '$usuario' and clave = MD5('$clave')");
      $qg->execute();

      //guardando en variables los datos de  la consulta
      $tiposmostrar = $qg->fetch(PDO::FETCH_ASSOC);
      $tipo = $tiposmostrar['nombretipo'];
      $nombre = $tiposmostrar['usuario'];
      $apellido = $tiposmostrar['apellido'];
      $nombres = $tiposmostrar['nombre'];
      $estado = $tiposmostrar['estado'];

      //condicion si el tipo de usuario esta vacio o el estado es inactivo
      if (($tipo == "") or ($estado == "Inactivo") ) {
        header("location: ../index.php");
      }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>fademype-tridimania-itca</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body onload="getTime()">

      <!--
      MAIN CONTENT-->

	  	<div class="container">
	  	
	  		<div id="showtime"></div>
	  			<div class="col-lg-4 col-lg-offset-4">
	  				<div class="lock-screen">
		  				<h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a></h2>
		  				<p>BLOQUEADO</p>
		  				
				          <!-- Modal -->
                          <form class="form-horizontal" action="desbloquear-pantalla.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
				          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
				              <div class="modal-dialog">
				                  <div class="modal-content">
				                      <div class="modal-header">
				                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                          <h4 class="modal-title">Bienvenidos Nuevamente!</h4>
				                      </div>
				                      <div class="modal-body">
				                          <p class="centered"><img class="img-circle" width="80" src="../lib/user.jpg"></p>
                                  <input type="hidden" name="usuario" placeholder="Usuario" value="<?php echo $nombre; ?>" autocomplete="off" class="form-control placeholder-no-fix">
				                          <input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">
				
				                      </div>
				                      <div class="modal-footer centered">
				<button data-dismiss="modal" class="btn btn-theme04" type="button">Cancelar</button>
				            <button class="btn btn-theme03" name="accion" type="submit" type="button">Aceptar</button>
				                      </div>
				                  </div>
				              </div>
				          </div>
                          </form>
				          <!-- modal -->
		  				
		  				
	  				</div><!--/lockscreen -->
	  			</div><!-- /col-lg-4 -->
	  	
	  	</div><!-- /container -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../img/login-bg.jpg", {speed: 500});
    </script>

    <script>
        function getTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('showtime').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){getTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>

  </body>
</html>
