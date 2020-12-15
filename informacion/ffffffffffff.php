<?php   

  //Función para extraer la fecha de los permisos, para poder ver el ebook                  
  //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $consult2 = $conn->prepare("SELECT *, DATE_FORMAT(fecha, '%d-%m-%Y') AS miFecha FROM permiso where idsolicitud=$idsolicitud");
    $consult2->execute();
    $data2 = $consult2->fetch(PDO::FETCH_ASSOC);
    $fecha = $data2['fecha'];
    $mifecha = $data2['miFecha'];
    //dar formato a la fecha actual
    date_default_timezone_set('America/El_Salvador');
      $hoy = date('Y-m-d');
      if ($hoy > $fecha) {
        include("solicitud.php");
        $send = new solicitud();
        $save = $send->caducar($idsolicitud);
        $estado="caducada";     
      }

 ?>

                                  if ($estado=="autorizada") {
                  //Función para extraer la fecha de los permisos, para poder ver el ebook                  
                  //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $consult3 = $conn->prepare("SELECT *, DATE_FORMAT(fecha, '%d-%m-%Y') AS miFecha FROM permiso where idsolicitud=$ids");
                  $consult3->execute();
                  $data3 = $consult3->fetch(PDO::FETCH_ASSOC);
                  $fecha = $data3['fecha'];
                  $mifecha = $data3['miFecha'];
                  //dar formato a la fecha actual
                  date_default_timezone_set('America/El_Salvador');
                  $hoy = date('Y-m-d');
                  if ($hoy > $fecha) {
                    include("solicitud.php");
                      $send = new solicitud();
                      $save = $send->caducar($ids);
                      echo $save;
                    $estado="caducada";     
                  }
                }