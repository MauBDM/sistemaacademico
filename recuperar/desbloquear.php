
<?php
	//

session_start( ); // allows us to retrieve our key form the session

/* 

First encrypt the key passed by the form, then compare it to the already encrypted key we have stored inside our session variable

*/


?>
<!DOCTYPE html>
<!-- Documento html5  -->
<html lang="en" oncontextmenu="return false">
<head>
<!-- Imagen que aparece en la pestaña de el navegador -->
	    <link rel="shortcut icon" href="../img/log.ico" />
        <!--Librerias bootstrap para dar estilos al formulario  -->
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../lib/bootstrap.min.css">
<link rel="stylesheet" href="../lib/boot.css">
 <!-- Iconos fa fa  -->
<link rel="stylesheet" href="../iconos_fa/css/font-awesome.min.css">

 <!-- Libreria personalizada como bootstrap -->
<link rel="stylesheet" href="../lib/stiloadmin.css">

  <!-- CSS  definir acncho alto ect del contenedor del formulario -->
   <link href="pass.css" type="text/css" rel="stylesheet" />
   <!-- imagen de fondo del documento -->
   <style type="text/css">
   html

   </style>
   <!--  Titulo que aparece en la pestaña del navegador-->
	<title>EBooks</title>
</head>
<body oncontextmenu="return false">

<div class="container">

        <div class="card card-container">


            <img id="profile-img" class="profile-img-card" src="../img/soporte.jpg" />
            <p id="profile-name" class="profile-name-card"></p>
            <?php

                //Mensaje respectivo
                //Captuara l avariable q de la url
            	if (!empty($_GET['noexiste'])) {

                    //Si no existe el corro electronico
            		$no = $_GET['noexiste'];
            		echo "<p class='alert alert-danger'>Error. Su E-mail no se encuentra registrado!!! Espere...</p>";
            		echo"<meta http-equiv='refresh' content='3; url=http://localhost/EBooks/recuperar/desbloquear.php'/ >";
            	}
                    //Mensaje de deblouear los intentos
            	if (!empty($_GET['desbloquear'])) {
            		$desbloquear = $_GET['desbloquear'];

                    //Si la respuesta es correcta muestra este mensaje
            		if ($desbloquear == "true") {
            			echo "<p class='alert alert-success'>Excelente... Ha reiniciado sus intentos a 3 en el sistema!!! Espere...</p>";
            		echo"<meta http-equiv='refresh' content='3; url=http://localhost/EBooks/'/ >";
            		//Si la respuesta es incorrectamuestra este mensaje 
                    }elseif ($desbloquear == "false") {
            			echo "<p class='alert alert-danger'>Lo siento ... La respuesta no es correcta!!! Espere...</p>";
            		echo"<meta http-equiv='refresh' content='3; url=http://localhost/EBooks/recuperar/desbloquear.php'/ >";
            		}else{
                        // Si no lo manda hacia el index
            			header("location:../");
            		}
            		
            	}
                // Si el codigo y email son incorrectos muestra este mensaje

            	if (!empty($_GET['send'])) {

            		$obtn=$_GET['send'];
            		if ($obtn ="coderror") {
            				echo "<p class='alert alert-danger'>Error. E-mail / Código son incorrectos! Espere...</p>";
            		echo"<meta http-equiv='refresh' content='3; url=http://localhost/EBooks/recuperar/desbloquear.php'/ >";
            		}
            	}




            ?>
            
	<!--formulario donde solicita el correo electronico-->
<form action="desbloquear.php" accept-charset="utf-8"  name="loginform" autocomplete="off" role="form" class="form-signin" method="post">

	 <h4><b><i>Reiniciar Intentos del usuario</i></b></h4>
<font color ="black" ><label>E-mail:</label></font><input type="email" name="email" class="form-control" placeholder="Ingrese su correo Electrónico" required>
	<br>
	<label> Digita el C&oacute;digo Captcha:</label>
                <img src="captcha.php" border="1" width="100%"><br><br>
                <input type="text" class="form-control" name="code" placeholder="Ingresa el c&oacute;digo" required><br>
	<button type="submit" value="" class="btn btn-primary" name="accion"><span class="fa fa-users"> </span> Desbloquear usuario</button>
	<a href="../" class="btn btn-success"><span class="fa fa-user"> </span>  Inicio Sesi&oacute;n</a>
	
</form>


<?php

//Si es clikeado el boton que se llama accion
if (isset($_POST['accion'])) {
	# code...

//Si el codigo captcha es correcto al ingresado
if( strtolower( $_POST[ 'code' ] ) != $_SESSION[ 'key' ] ) {
    //redirecciona con el parametro send para mostrar su respectivo mensaje
       header("location:desbloquear.php?send=coderror");

} else {

     


//creando objeto a la conexion a la base de datos
require'../conexion/conexion.php';

$conn = conexion();

//varirable del codigo catpcha y del email del formulario
$cod = addslashes($_POST['code']);

	$email = addslashes($_POST['email']);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//comprobando si existe el email del usuario en la base de datos

	$qg = $conn->prepare("SELECT * FROM usuario where email = '$email'");
			$qg->execute();


			$us = $qg->fetch(PDO::FETCH_ASSOC)['email'];
			// si es correcto el correo electronico, entonces muestra el siguiente formulariocon su pregunta secreata

			if ($email == $us) {

				//si la respuesta es correcta lo redirecciona al archivo pregunta.php y verifica si esta correta.
		
				echo "<form action='pregunta.php' method='post'>";
				echo "<br><p class='alert alert-success'>Excelente. C&oacute;digo: ".$cod." y E-mail son correctos!</p>";

					echo "<font color='black'><label>E-mail: </label></font><input type='text' name='email' class='form-control' readonly value = '".$email."'><br>";
					//Consulta de acuerdo al emil
                    $q = $conn->prepare("SELECT * FROM usuario where email = '$email'");
                    //ejecuta la consulta
					$q->execute();

                    //Pregunta amacenada en una variable
					$pre = $q->fetch(PDO::FETCH_ASSOC)['pregunta'];
                    //Muestra la pregunta secreta 

					echo "<font color ='black'> <label>La Pregunta Secreta Es:&nbsp;</label> ".$pre."</font><br>";
					
                    //Input donde ingresa la respuesta segun lo almacenado en la db
					echo "<font color ='black'><label>RESPUESTA:</label></font> <input type='password' name='res' class='form-control' required placeholder='Ingrese su respuesta secreta'><br>";
					//Boton submit

                    echo "<button type='submit'  name = 'acciones' class='btn btn-primary' ><span class='fa fa-tags' ></span> Reiniciar Intentos</button> ";
				echo "</form>";


		

		}else{
            //Si no existe el email en la base de datos envia el parametro
			header("location:desbloquear.php?noexiste=false");
		}


		}
		

		}



 ?>
 <br>
 <!-- Derechos reservados del autor y redirecciona al sitio web del restaurante -->
 <center><strong>Copyright &copy; 2016 <a href="http://fademype.org.sv/fademype/?p=1647" target="_blank"><font color="black">Sistema de Restaurante Tridimanía</font></a></strong></center>
<br>

 </div>

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