<?php
    include("../security/seguridad-primary.php");
    //include("../menu/principal.php");
    if(!empty($_POST)){
      $idgrado = $_POST["id_grado"];
    $conn = conexion();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $consult = $conn->prepare("SELECT docente_grado.*,grado.nombre as nombreGrado FROM docente_grado inner join grado on docente_grado.idgrado=grado.idgrado where docente_grado.iddocente_grado='$idgrado'");
      $consult->execute();
      $data = $consult->fetch(PDO::FETCH_ASSOC);
      $nombreGrado = $data['nombreGrado'];
    /*$sql = "SELECT asignatura.*, estado.nombre as estado FROM asignatura inner join estado on asignatura.idestado=estado.idestado ORDER BY asignatura.idasignatura ASC";
    $query = $connection->prepare($sql);

    $query->execute();
    $rowcount = $query->rowcount();

    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
*/
    //require_once("modales_matricula.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Matrícula</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../img/logoSanto.ico" />
    <link rel="stylesheet" type="text/css" href="../bootstrap/assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <style type="text/css">
    #chat {
        height: auto;
        width: 100%;
        padding-right: 10px;
        padding-left: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
        border: 1px solid #ddd;
        background: #E0F2F7;
        /*overflow: scroll;
        overflow-y: scroll;*/
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-blue">
        <div class="container-fluid">
        <div class="navbar-header"><img src="../img/logo.png" alt="" width="40px">
          <a class="navbar-brand" href="#">
            <i class="fa fa-graduation-cap"></i> <?php echo "Matrícula ".$nombreGrado." Grado"; ?></a>
        </div>
        <ul class="navbar-nav navbar-left">
            <li class="nav-item">
                <span title="Inicio"><a class="nav-link" href="mostrar.php" style="color:white;"><i class="fa fa-home"></i> Inicio</a></span>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li><span title="Cerrar Sesión"><a href="../recuperar/cerrar.php" style="color:white;">Cerrar Sesión <i class="fa fa-sign-out"></i></a></span></li>
        </ul>
    </div>
    </nav><br>
    <div class="container"><div id="chat">
        <form id="frmmatricula" method="POST" autocomplete="off">
        <div class="form-row">
          <input type="hidden" name="grado" id="grado" value="<?php echo $idgrado; ?>">
          <div class="col-6">
            <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="estudiante" id="estudiante" onchange="activar()" required>
              <option disabled="" selected="">Seleccionar estudiante</option>
                <?php
                  require_once '../conexion/conexion.php';
                  $conn = conexion();
                  $sql = "SELECT * FROM estudiante WHERE idestado='1'";
                  //$sql = "SELECT matricula.*,estudiante.nie as nie, estudiante.nombres as nombres, estudiante.apellidos as apellidos FROM matricula inner join estudiante WHERE estudiante.idestado='1' and matricula"
                  $result = $conn->query($sql);
                  $rows = $result->fetchAll();
                  foreach ($rows as $per) {
                      echo "<option value='";
                      echo $per['nie'];
                      echo "'>";
                      echo $per['nombres']." ".$per['apellidos'];
                      echo "</option>";
                  }
                ?>
            </select>
          </div>
          <div class="col-3">
            <span title="Enviar"><button id="btnenviar" class="btn btn-primary btn-lg" disabled><i class="fa fa-save"></i></button></span>
          </div>
        </div>
      </form>
      <hr>
      <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;">
        <!-- Carga gif animado-->
      </div>
      <div class="datagrid" id="datagrid">

      </div>
    </div>
    </div><br><br>
    <!--footer class="footer mt-auto py-3" style="background-color: #000000;">
        <div class="container" >
            <div class="footer-copyright text-center py-3" style="color:white;">
                © 2020 Copyright CENTRO ESCOLAR CATÓLICO NUESTRA SEÑORA DE LOS POBRES | Todos los derechos reservados
            </div>
        </div>
    </footer-->
</body>
</html>
<!--AJAX -->
<script type="text/javascript">
  //Bajar scroll
  //$("#chat").animate({ scrollTop: $('#chat')[0].scrollHeight}, 2000);
  //Activar y desactivar boton enviar
  function activar() {
    var estudiante=$('#estudiante').val();
    if ((estudiante!=null)&&(estudiante!='')){
      $('#btnenviar').attr('disabled',false);
      Cargar();
    }else{
      $('#btnenviar').attr('disabled',true);
    }
  }
  //Cargar datos
  window.onload=function(){
    Cargar();
  }
  //Envío de datos
  $(document).ready(function(){
    //Al dar click
    $('#btnenviar').click(function(){
      //Comprobando si escribio un mensaje
      if($('#estudiante').val()!=''){
        var datos=$('#frmmatricula').serialize();
        $.ajax({
          type:"POST",
          url:"guardar.php",
          data:datos,
          beforeSend: function(objeto){
            $('#loader').html('<img src="../img/loader.gif"> Espere por favor...');
            },
          success:function(r){
            if(r==1){
              $('#estudiante').val('');
              $('#estudiante').focus();
              Cargar();
            }else{
              alert("Error!!");
            }
          }
        });
        return false;
      }
    });
  });
  //Cargar datos en div
  function Cargar(){
    var grado=$('#grado').val();
    $('#datagrid').load('consultar.php?idgrado='+grado);
    /*$("#loader").fadeIn('slow');
      $.ajax({
        url:'busca.php?action=ajax&page='+page+'&q='+q,
         beforeSend: function(objeto){
         $('#loader').html('<img src="../img/loader.gif"> Espere por favor...');
        },
        success:function(data){
          $(".datagrid").html(data).fadeIn('slow');
          $('#loader').html('');

        }
      })*/
  }
  //Actualizar mensajes
  //var auto_refresh = setInterval( function() { $('#datagrid').load('consultar.php').fadeIn("slow"); }, 5000); // refreshing after every 15000 milliseconds
</script>
<?php
  }else{
    header("location:mostrar.php");
  }
?>
