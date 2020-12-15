

  <!DOCTYPE html>
<!-- Documento html5 -->
<html oncontextmenu="return false" >
<head lang="es">
<!--  Imagen que se muestrar en la pestaña del navegador-->
  <link rel="shortcut icon" href="../img/icono.ico" />

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <!-- Titulo qu aparece en la pestaña -->
 <title>EBooks</title>
	<!-- Latest compiled and minified CSS -->
  <!-- Libreria bootstrap paara darle estilos al documento -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../lib/bootstrap.min.css">
 
 <!-- Iconos fa fa -->
<link rel="stylesheet" href="../iconos_fa/css/font-awesome.min.css">
  
  <!-- Libreria personalizadda para dar estilos como bootstrap -->
 <link rel="stylesheet" href="../lib/boot.css">
<link rel="stylesheet" href="../lib/stiloadmin.css">


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
                  echo '<p class="alert alert-danger">Lo siento. E-mail no existe. No se envio su nueva contraseña. Espere...</p>';
                  echo"<meta http-equiv='refresh' content='4; url=http://localhost/EBooks/recuperar/password.php'/ >";
                
                  //Si el coódigo captcha en erroneo muestra el siguiente mensaje
                }elseif ($correo == "errorcod") {
                  echo '<p class="alert alert-danger">Error. Código/ E-mail ingresado es incorrecto. Por Favor Espere...</p>';
                  echo"<meta http-equiv='refresh' content='4; url=http://localhost/EBooks/recuperar/password.php'/ >";
                   //Si el correo, codigo captcha es correcto muestra el siguiente mensaje de su nueva contraseña es enviada
                }else{
                  echo '<p class="alert alert-success">Excelente. Su nueva contraseña es: <font size="3">'.$correo.'</font> Por Favor Espere...</p>';
                  echo"<meta http-equiv='refresh' content='25; url=http://localhost/EBooks/'/ >";
                }
              }

            ?>
            <!-- Titulo del encabezado del formulario -->
            <h4><b><i>Recuperar Contrase&ntilde;a</i></b></h4>
            <!-- Formulario de recuperacion de contraseña -->
            <form method="post" accept-charset="utf-8" action="correo.php" name="loginform" autocomplete="off" role="form" class="form-signin">
			                <span id="reauth-email" class="reauth-email"></span>
                     <label> E-mail:</label>
                     <!-- Input del email para ingresarlo correctamente -->
                <input class="form-control" placeholder="Ingrese su e-mail" name="email" type="email" value="" autofocus="" required><br>
                <label> Digita el C&oacute;digo  Captcha:</label>
                <!-- Imagen captcha qu hace refecrencia -->
                <img src="captcha.php" border="1" width="100%"><br><br>

                <input type="text" class="form-control" name="code" placeholder="Ingresa el c&oacute;digo" required><br>
                <!-- Boton submit -->
                <button type="submit" class="btn btn btn-primary" name="acciones"  value=""><span class="fa fa-unlock"> </span> Restablecer Contrase&ntilde;a</button>
                 <!-- Redirecciona al login  -->
                <a href="../" class="btn btn-success"><span class="fa fa-user"> </span> Inicio de Sesi&oacute;n</a>
            </form><br><!-- /form -->
            
        </div><!-- /card-container -->
         <!-- Derechos reservados del autor y redireccina al sitio web -->
        <center><strong>Copyright &copy; 2020 <a href="http://fademype.org.sv/fademype/?p=1647" target="_blank"><font color="black">EBooks</font></a></strong></center>
    <br></div><!-- /container -->
    </div>
     <!-- js placed at the end of the document so the pages load faster -->
    <!--Estas librerías nos ayudan a posicionar la imagen en toda la pantalla -->
    <script src="../recursos/js/jquery.js"></script>
    <script src="../recursos/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../recursos/js/jquery.backstretch.min.js"></script>
    <script>
        //Llamamos la imagen que deseamos.
        $.backstretch("../img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>

	