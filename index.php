<!DOCTYPE HTML>
<html>
  <head>
    <title>Login </title>
    <link rel="shortcut icon" href="img/logo.ico">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="bootstrap/css/main.css" />

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap-style.css" rel="stylesheet">
    <!--external css-->
    <link href="bootstrap/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/style.css" rel="stylesheet">
    <link href="bootstrap/css/style-responsive.css" rel="stylesheet">
    <script>
    function cerrarse(){
      window.parent.close()
    }
    </script>

  <!-- Libreria personalisada alertifys para mensajes de dialogos -->
   <script type="text/javascript" src="bootstrap/js/alertify.js"></script>
    <link rel="stylesheet" href="bootstrap/css/alertify.core.css" />
    <link rel="stylesheet" href="bootstrap/css/alertify.default.css" />


      </head>
<?php

//En este proceso captura la variable inactvo para mostrar si el usuario esta desactivado
if (!empty($_GET['inactivo'])) {
  $inactivo = $_GET['inactivo'];
  if ($inactivo == "correcto") {
     ?>
<!-- Uso de javascript para mostrar el respectivo mensaje de dialogo alertifys  -->
  <body onload="desactivo();"></body>

    <script type="text/javascript">
      function desactivo(){
        //Mensaje alertitys
        alertify.error("Error. Usuario su cuenta ha sido desactivada.");
        return false;
      }

    </script>

  <?php
  }else{

  }
}


//En este proceso captura la variable no registrado para mostrar el respectivo mensaje alertifys

if (!empty($_GET['noregistrado'])) {
  $noreg = $_GET['noregistrado'];
     ?>
<!-- Uso de javascript y el evento onload  -->
  <body onload="no();"></body>

    <script type="text/javascript">
      function no(){

        //Mensajes de dialogo alertifys
        alertify.error("Error. Usuario no registrado.");
        return false;
      }

    </script>

  <?php
}

//Termina las condiciones de los mensajes alertifys

?>

      <!-- MAIN CONTENT -->
          <form class="form-login" method="post" id="miformu" action="recuperar/enviar.php" autocomplete="off">
            <h2 class="form-login-heading">Bienvenido/a</h2>
            <div class="login-wrap">
              <?php
                //Mensaje que se muestra cuando cierra la session el usuario
                  if (!empty($_GET['cerrar'])) {
                    $cerrar = $_GET['cerrar'];
                    echo '<p class="alert alert-success">Excelente. Ha cerrado la sesi&oacute;n correctamete. Por favor Espere...</p>';
                    echo"<meta http-equiv='refresh' content='3; url=http://localhost/SistemaAcademico/'/ >";
                  }
              ?>
                <input type="text" maxlength="30" class="form-control" name="usu" placeholder="Nombre de Usuario" autofocus="" required />
                <br><br>
                <input type="password" maxlength="30" class="form-control" name="pass" placeholder="Contraseña" required />
                <label class="checkbox">
                    <span class="pull-right">
                        <a data-toggle="modal" href="recuperar/recuperar.php"> ¿Olvidaste la contraseña?</a>

                    </span>
                </label><br>
                <button class="btn btn-primary btn-block" name="accion" type="submit"><i class="fa fa-lock"></i> Iniciar Sesión</button>
                <hr>
          </form>

<!-- Fin de contenedor -->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="bootstrap/js/jquery.backstretch.min.js"></script>
      <script src="bootstrap/js/main.js"></script>
</body>
</html>
