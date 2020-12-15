<!DOCTYPE html>
<!-- Documento html5 -->
<html oncontextmenu="return false" >
<head lang="es">
<!--  Imagen que se muestrar en la pestaña del navegador-->
  <link rel="shortcut icon" href="../img/logo.ico" />

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <!-- Titulo qu aparece en la pestaña -->
 <title>CECE LOS POBRES</title>
	<!-- Latest compiled and minified CSS -->
  <!-- Libreria bootstrap paara darle estilos al documento -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
 
 <!-- Iconos fa fa -->
<link rel="stylesheet" href="../bootstrap/assets/font-awesome/css/font-awesome.css">
  
  <!-- Libreria personalizadda para dar estilos como bootstrap -->
 <link rel="stylesheet" href="../bootstrap/lib/boot.css">
<link rel="stylesheet" href="../bootstrap/lib/stiloadmin.css">


  <!-- CSS para darle estilo de ancho alto etc al contenedor -->
   <link href="pass.css" type="text/css" rel="stylesheet" />
   <!-- mostrar imagen en el cuerpo del documento -->
  
</head>

<body >
 <div class="container">
 
        <div class="card card-container">
        <div class="table-responsive">
            <img id="profile-img" class="profile-img-card" src="../img/soporte.jpg" />

            <p id="profile-name" class="profile-name-card"></p>

            <?php
            //captura en una variable el parametro send para mostrar el respectivo mensaje
              if (!empty($_GET['send'])) {
                $correo = $_GET['send'];
                //Si el email no existe muestra el siguiente mensaje
                if ($correo == "errormail") {
                  echo '<p class="alert alert-danger">Lo siento. Su usuario no existe. No se envio su nueva contraseña. Espere...</p>';
                  echo"<meta http-equiv='refresh' content='4; url=http://localhost/SistemaAcademico/recuperar/password.php'/ >";
                
                  //Si el coódigo captcha en erroneo muestra el siguiente mensaje
                }elseif ($correo == "errorcod") {
                  echo '<p class="alert alert-danger">Error. Su usuario ingresado es incorrecto. Por Favor Espere...</p>';
                  echo"<meta http-equiv='refresh' content='4; url=http://localhost/SistemaAcademico/recuperar/password.php'/ >";
                   //Si el correo, codigo captcha es correcto muestra el siguiente mensaje de su nueva contraseña es enviada
                }else{
                  echo"<meta http-equiv='refresh' content='25; url=http://localhost/hoy/SistemaAcademico/'/ >";
                }
              }

            ?>
            <!-- Titulo del encabezado del formulario -->
            <h4 align="center"><b><i>Recuperar Contrase&ntilde;a</i></b></h4>
            <!-- Formulario de recuperacion de contraseña -->
            <form method="post" accept-charset="utf-8" action="guardar.php" name="loginform" autocomplete="off" role="form" class="form-signin">
			          <span id="reauth-email" class="reauth-email"></span>
                <label> Usuario:</label>
                <!-- Input del email para ingresarlo correctamente -->
                <input class="form-control" placeholder="Ingrese su usuario" name="usuario" type="text" autofocus="" required><br>
                <label style="text-align: justify;"> Luego de enviar sus datos, tendrá que esperar que su solicitud sea atendida por el administrador y posteriormente los datos serán enviados a su correo electrónico. </label><br><br>
                 <!-- Redirecciona al login  -->
                <a href="../" class="btn btn-success"><span class="fa fa-user"> </span> Inicio de Sesi&oacute;n</a>
                <!-- Boton submit -->
                <button type="submit" class="btn btn btn-primary" name="acciones"><span class="fa fa-unlock"> </span> Restablecer Contrase&ntilde;a</button>
            </form><br><!-- /form -->
            
        </div><!-- /card-container -->
         <!-- Derechos reservados del autor y redireccina al sitio web -->
         <?php 
            //dar formato a la fecha actual
            date_default_timezone_set('America/El_Salvador');
            $año = date('Y');
          ?>
        <center><strong>Copyright &copy; <?php echo $año; ?> <a href="#" target="_blank"><font color="black">CENTRO ESCOLAR CATÓLICO NUESTRA SEÑORA DE LOS POBRES</font></a></strong></center>
    <br></div><!-- /container -->
    </div>
     <!-- js placed at the end of the document so the pages load faster -->
    <!--Estas librerías nos ayudan a posicionar la imagen en toda la pantalla -->
    <script src="../bootstrap/assets/js/jquery.js"></script>
    <script src="../bootstrap/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../bootstrap/assets/js/jquery.backstretch.min.js"></script>
    <script>
        //Llamamos la imagen que deseamos.
        $.backstretch("../img/Paisaje.jpg", {speed: 500});
    </script>


  </body>
</html>

	