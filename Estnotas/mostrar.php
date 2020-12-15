<?php
 include("../security/seguridad-primary.php");
 require_once("../conexion/conexion.php");
//Variables de la conexión.
$conn = conexion();
$usuario = $_SESSION['usuario'];
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $consult = $conn->prepare("SELECT * FROM usuario where usuario = '$usuario'");
       $consult->execute();

    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $usu = $data['usuario'];
    $idtipoUsu = $data['idtipoUsuario'];
 ?>
<!DOCTYPE html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <!-- script src="../js/listardatos.js"></script -->
    <!-- script src="../js/eliminar.js"></script -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/css.css">
    <link rel="shortcut icon" href="../img/logo.ico" />
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/jQuery-2.1.4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
  <?php

   require_once("../menu/principal.php");
   ?>
   <div class="form-panel">
    <div class="container-fluid">
    <div class="row">
    <div class="col-xs-12">
    <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="mostrar.php" data-toggle="tab">Notas vigentes</a></li>
                            <?php if ($idtipoUsu==1){ ?>
                              <!--li ><a href="mostrar1.php" data-toggle="">Años Anteriores</a></li-->
                            <?php } ?>

                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="Activos">
    <center><h3>
      <!--p class="centered"><a href="#"><img src="<?php echo $url; ?>" class="img-circle" width="80"></a--></p>
      <h3 class="centered"> Notas de usuario <?php echo $nombre; ?>
        <?php
          $sql1 = "SELECT usuario.*,estudiante.nombres as nombresEst, estudiante.apellidos as apellidosEst, usuario.usuario as nombreUsu FROM estudiante inner join usuario on estudiante.nie=usuario.usuario WHERE estudiante.nie='$nombre' and usuario.usuario='$usuario' ORDER BY estudiante.nie asc";
          $query1 = $conn->prepare($sql1);
          $query1->execute();
          $rowcount1 = $query1->rowcount();
          $model1 = array();
          while($rows1 = $query1->fetch()){
              $model1[] = $rows1;
          }
          foreach($model1 as $row1){
            ?>
            <td>
            <?php
            echo "</br>";
            echo "<b>".$row1['nombresEst']." ".$row1['apellidosEst']."</b>";
          }
         ?>
       </td>
      </h3>

      <input type="hidden" value="<?php echo $nombre; ?>" name="nombre" id="nombre" value="">
      <!--?php
        $idAlum = $nombre;
        $conn = conexion();
        $sql1 = "SELECT usuario.*,estudiante.nombres as nombresEst, estudiante.apellidos as apellidosEst, usuario.usuario as nombreUsu FROM estudiante inner join usuario on estudiante.nie=usuario.usuario WHERE estudiante.nie='$idAlum' and usuario.usuario='$usu' ORDER BY estudiante.nie asc";
        $query1 = $conn->prepare($sql1);
        $query1->execute();
        $rowcount1 = $query1->rowcount();
        $model1 = array();
        while($rows1 = $query1->fetch()){
            $model1[] = $rows1;
        }
        foreach($model1 as $row1){
          echo $row1['nombresEst']." ".$row1['apellidosEst'];
       ?-->
    </h3></center>
<?php if ($idtipoUsu==1 or $idtipoUsu==4 or $idtipoUsu==5){ ?>
<div class=' pull-right'>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_notas">
    <i class="fa fa-plus" ></i>&nbsp;&nbsp;
    <span class="tooltips" data-placement="left" data-original-title="Registrar nuevas notas">Agregar</span>
  </button>
</div>
<?php } ?>
    <div id="loader" class="text-center">
      <img src="../img/loader.gif"></div>
      <!--form class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-6">
              <input type="text" class="form-control" id="q" placeholder="Buscar" onkeyup="load(1)">
            </div>
            <button type="button" class="btn btn-default" onclick="load(1)"><span class='fa fa-search'></span> Buscar</button>
            <div class="right">

            </div>
          </div>
      </form-->
      <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado-->
      <div class="outer_div"></div><!-- Datos ajax Final-->
    </div>

    </div>
    </div>

                       </div>
                    </div>
                </div>
            </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- Latest compiled and minified JavaScript -->

    <?php
       include("busca.php");
      //include("modales_notas.php");
    ?>
    </div>
</div>
  <?php
  //include("../menu/footer.php")
?>
  </body>
</html>

  <script>
  $(document).ready(function(){
    load(1);
  });
    function load(page){
      var q= $("#q").val();
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'busca.php?action=ajax&page='+page+'&q='+q,
         beforeSend: function(objeto){
         $('#loader').html('<img src="../img/loader.gif"> Espere por favor...');
        },
        success:function(data){
          $(".outer_div").html(data).fadeIn('slow');
          $('#loader').html('');

        }
      })
    }
  </script>
