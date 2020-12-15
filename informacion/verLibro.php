<?php 
	include("../security/seguridad-primary.php");
  include("../menu/principal.php");
	if(!empty($_POST["mod-ver"])) {
		$id = $_POST["mod-ver"];
		//Consulta para extraer datos
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$consult = $conn->prepare("SELECT ebooks.*, editorial.nombre as neditorial, categoria.nombre as ncategoria, autor.idautor as idau, autor.nombre as nautor FROM ebooks INNER JOIN editorial on ebooks.ideditorial=editorial.ideditorial INNER JOIN categoria on ebooks.idcategoria=categoria.idcategoria INNER JOIN autor on ebooks.idautor=autor.idautor WHERE ebooks.estado='Activo' and ebooks.idebooks = $id");
       	$consult->execute();
    	$data = $consult->fetch(PDO::FETCH_ASSOC);

	    $idebooks = $data['idebooks'];    
	    $titulo = $data['titulo'];
	    $npaginas = $data['npaginas'];
	    $descripcion = $data['descripcion'];
	    $sinopsis = $data['sinopsis'];
	    $img = $data['img'];      
      $pdf = $data['pdf'];
	    $neditorial = $data['neditorial'];
	    $ncategoria = $data['ncategoria'];
	    $nautor = $data['nautor'];
      $idau = $data['idau'];
      //echo $_SESSION['idusuario'];
 ?>
<link rel="stylesheet" type="text/css" href="../css/css.css">
<link rel="shortcut icon" href="../img/log.ico" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/jQuery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="editar.js"></script>
<div class="form-panel">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h1 class="panel-title"><i class='glyphicon glyphicon-book'></i> Ebooks</h1>
            </div>
            <div class="panel-body">
              <div class="row">		  
                <div class="col-md-3 col-lg-3 " align="center"> 
          			  <div id="load_img">
          				  <img class="img-responsive" src="<?php echo $img?>" alt="Logo">
          			  </div>
          			  <br>
        		    </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                        <input type="hidden" class="form-control input-sm" name="idebooks" value="<?php echo $idebooks?>" >
                      <tr>
                        <td class='col-md-3' colspan="2">
                        	<label for="bussines_name" class="control-label"><h1><?php echo $titulo; ?></h1></label><br>
                        	<label for="bussines_name" class="control-label"><h3><a style='cursor:pointer;' data-toggle='modal' data-target='#modal_autor' onclick='verAutor(<?php echo $idau; ?>)'><i style="color:black;font-size:20px;"><?php echo $nautor; ?></a></h3></label>
                        </td>
                      </tr>
                      <tr>
                        <td class="col-md-3" colspan="2">
                        	<label for="bussines_name" class="control-label">Editorial: <?php echo $neditorial; ?></label>
                        </td>
                      </tr>
                      <tr>
                        <td class="col-md-3" colspan="2">
                        	<label for="bussines_name" class="control-label">Categoría: <?php echo $ncategoria; ?></label>
                        </td>
                      </tr>  
                      <tr>
                        <td class="col-md-3" colspan="2">
                        	<label for="bussines_name" class="control-label">Número de páginas: <?php echo $npaginas; ?></label>
                        </td>
                      </tr> 
                      <tr>
                        <td class="col-md-3" colspan="2" align="justify">
                        	<label for="bussines_name" class="control-label"><?php echo $descripcion; ?></label>
                        </td>
                      </tr>
                      <tr>
                        <td class="col-md-3" colspan="2" align="justify">
                        	<label for="bussines_name" class="control-label"><?php echo $sinopsis; ?></label>
                        </td>
                      </tr>
                    </tbody>
                  </table>         
                </div>
				<!--div class='col-md-12' id="resultados_ajax"></div--><!-- Carga los datos ajax -->
              </div>
            </div>
            <!-- Comienza el footer del contenedor para las opciones de solicitud -->
            <div class="panel-footer text-center">
              <?php 
                //Función para extraer la ultima solicitud, para poder ver el ebook
                $idu = $_SESSION['idusuario'];
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $consult1 = $conn->prepare("SELECT MAX(idsolicitud) as ids FROM solicitud where idebooks=$idebooks and idusuario=$idu");
                $consult1->execute();
                $data1 = $consult1->fetch(PDO::FETCH_ASSOC);
                $ids = $data1['ids'];
                $estado="";
                if ($ids!="") {
                  # code...
                  //Función para extraer el estado de las solicitudes, para poder ver el ebook
                  $consult2 = $conn->prepare("SELECT * FROM solicitud where idsolicitud=$ids");
                  $consult2->execute();
                  $data2 = $consult2->fetch(PDO::FETCH_ASSOC);
                  $estado = $data2['estado']; 
                  if ($estado == "autorizada") {
                     //Función para extraer la fecha de los permisos, para poder ver el ebook                  
                    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $consult2 = $conn->prepare("SELECT *, DATE_FORMAT(fecha, '%d-%m-%Y') AS miFecha FROM permiso where idsolicitud=$ids");
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
                          $save = $send->caducar($ids);
                          $estado="caducada";     
                        }
                   } 
                }
                                
                //If para poder realizar la consulta
                if ($estado=="" or $estado=="denegada" or $estado=="caducada") {
  
               ?>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3 col-lg-3"></div>
                  <div class="col-md-6 col-lg-6">
                    <form class="form-horizontal" action="guardar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
                      <input type="hidden" name="idebooks_grd" id="idebooks_grd" value="<?php echo $idebooks; ?>">
                      <input type="hidden" name="idusuario_grd" id="idusuario_grd" value="<?php echo $_SESSION['idusuario']; ?>">
                      <div class="form-group">
                        <!--label for="bussines_name" class="col-sm-3 control-label">Solicitud:</label-->
                        <div class="col-sm-12">
                          <!-- Evento solo minusculas-->
                          <textarea class="form-control" name="solicitud_grd" placeholder="Ingrese su solicitud." rows="4" required pattern=".{100,499}"></textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <span class="tooltips" data-placement="left" data-original-title="Volver a la pantalla anterior."><a href="mostrar.php" class="btn btn-default"><i class="fa fa-book" ></i>&nbsp;&nbsp;Regresar</a></span>
                        <button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-save"> </span> Solicitar</button>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-3 col-lg-3"></div>
                </div>
              </div>
              <?php 
                }elseif ($estado=="autorizada") {
                  echo "Usted esta autorizado a ver el ebook hasta: ".$mifecha;
                  ?>
                  <div class="panel-footer modal-footer">
                    <form class="form-horizontal" action="../libro/leerLibro.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
                      <input type="hidden" name="ver_idebooks" id="ver_idebooks" value="<?php echo $idebooks; ?>">
                      <input type="hidden" name="pdf" id="pdf" value="<?php echo $pdf; ?>">
                      <div class="col-md-3"></div>
                      <div class="col-md-3"><span class="tooltips" data-placement="left" data-original-title="Volver a la pantalla anterior."><a href="mostrar.php" class="btn btn-lg btn-default"><i class="fa fa-book" ></i>&nbsp;&nbsp;Regresar</a></span></div>
                      <div class="col-md-3"><span class="tooltips" data-placement="left" data-original-title="Volver a la pantalla anterior."><button type="submit" id="guardar_datos" class="btn btn-lg btn-primary"><i class="fa fa-eye" ></i> &nbsp;&nbsp;Leer</button></span></div>
                      <div class="col-md-3"></div>                
                    </form>
                  </div>
                  <?php
                }elseif ($estado=="pendiente") {
                  echo "<label for='bussines_name' class='control-label'>Usted tiene una solicitud pendiente de revisión</label><br><br>";
                  echo "<span class='tooltips' data-placement='left' data-original-title='Volver a la pantalla anterior'><a href='mostrar.php' class='btn btn-lg btn-default'><i class='fa fa-book' ></i>&nbsp;&nbsp;Regresar</a></span>";
                }else{
                  //Error
                  header("location:mostrar.php");
                }
               ?>
            </div>
            <!-- Finaliza footer del contenedor -->
          </div>
        </div>
      </div>
    </div>
</div>
<?php 
	  //include("../menu/footer.php");
    include("modales_ver.php");
	}else{
		header("location:mostrar.php");
	}
 ?>