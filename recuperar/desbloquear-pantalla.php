<?php
//Para enviar las sessioneso guardar las sessiones en variables
session_start();
//Compreueba si el boton ha sido clikeado para comprobar el metodo post
if(isset($_POST['accion']))

  
  //creando objeto a la conexion con la base de datos
{
  //Archivo donde se encuentra la conexion de la DB para hacer el puente
  require'../conexion/conexion.php';
  //Variable que almacena la conexion
  $conn = conexion();


  //Captura con variables que vienen del el login. para comproar el usuario
  $usuario= addslashes($_POST['usuario']);
  $clave= addslashes($_POST['password']);


  //Exception de error de pdo
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Consulta Donde se comprueba  que el usuario existe
  $qg = $conn->prepare("SELECT usuario FROM usuario where usuario = '$usuario'");
      //Ejecuta ala consulta
      $qg->execute();
      //De acuerdo a la consulta guardamos en una variable el usuario si es correcto
      //Que existe en la base de datos
      $us = $qg->fetch(PDO::FETCH_ASSOC)['usuario'];


      //Condicion para saber si el usuario es igual al que han ingresado en el fomuario login
      if($usuario == $us){

        //Si se cumple hace la respectiva consulta 
        $consulta = $conn->prepare("SELECT * FROM usuario where usuario='$usuario'");
        //Ejecuta la consulta
            $consulta->execute();
            //Guardamos en una variable los datos de la connsulta
          $dator = $consulta->fetch(PDO::FETCH_ASSOC);
          // Guardamos en una variable el campo estado.

          $estado = $dator['estado'];
  
          //Si esta activo el usuario continua con la siguiente verificacion
      if ($estado == "Activo") {

      //consulta para identificar si esta bloqueado el usuario. Verdadero 1, falso 0.

      $q = $conn->prepare("SELECT bloqueado FROM usuario where usuario = '$usuario'");
      //Ejecuta la consulta antrior
          $q->execute();

          //Guardamos en una variable el campo bloqueado
          $bloq = $q->fetch(PDO::FETCH_ASSOC)['bloqueado'];

          // comprobando si el usuario tiene cero en el campo bloqueo.

              if ($bloq == 0) {
            

            // si el usuario  tiene cero bloqueo. Identificamos si es correcto sus datos de logueo con 
                //la clave incriptada con MD5
        $sql = "SELECT * FROM usuario where usuario='$usuario' and clave= MD5('$clave') ";
        //Ejecuta la consulta anterior
        $datos=$conn->query($sql);
          //Si se encuentra.  
        if ($datos->rowCount())

        { 

          ///si los datos son correoctos actualiza los campos intentos y bloqueado para que pueda tener los mismos tres intentos

          $sf = "UPDATE usuario SET intentos = 0, bloqueado = 0, ultimoingreso = NOW() where usuario = '$usuario'";
          //ejecuta la coonsulta anterior
        $stmt = $conn->prepare($sf);
        $stmt->execute();
          
          //Guarda la session en las siguientes variables
          //Session del nombre usuario
          $_SESSION["usuario"]=$usuario;
          //session de la contraseña correcta ingresada
                $_SESSION["pass"]=$clave;
                //Ok para verificar si ha iniciado session correctamnte y usarlo para verificar redireccinar al index
          $_SESSION["ok"]=1;
          // redirecciona al menu .

          header("location:../menu/menu.php");

        
      }
      else{

              //redirecciona con el parametro trying para mostrar el respectivo mensaje alertifys
          header("location: cerrar.php");

            //Pero si los es igual o mayor a tres entonces    
        }
        }
      }}}
        ?>