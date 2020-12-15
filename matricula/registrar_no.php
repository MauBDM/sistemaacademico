<?php
    include("../security/seguridad-primary.php");
    include("../menu/principal.php");
    if(!empty($_POST)){
      $idgrado = $_POST["id_grado_calificacion"];
    /*$connection = conexion();

    $sql = "SELECT asignatura.*, estado.nombre as estado FROM asignatura inner join estado on asignatura.idestado=estado.idestado ORDER BY asignatura.idasignatura ASC";
    $query = $connection->prepare($sql);

    $query->execute();
    $rowcount = $query->rowcount();

    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
*/
    require_once("modales_matricula.php");
?>

  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="editar.js"></script>
<div class="form-panel">
  <hr>
  <form id="frmmatricula" method="POST" autocomplete="off">
    <div class="form-row">
      <input type="text" name="grado" id="grado" value="<?php echo $idgrado; ?>">
      <div class="col-6">
        <select class="form-control" name="estudiante" id="estudiante" required="" onchange="activar()">
          <option disabled="" selected="">Seleccionar estudiante</option>
            <?php
              require_once '../conexion/conexion.php';
              $conn   = conexion();
              $sql    = "SELECT * FROM estudiante WHERE idestado='1'";
              $result = $conn->query($sql);
              $rows   = $result->fetchAll();
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
        <span title="Enviar"><button id="btnenviar" class="btn btn-primary" disabled><i class="fa fa-save"></i></button></span>
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
  <?php
  include("../menu/footer.php")
?>
      <!--footer end-->
  </body>
</html>
<!--AJAX -->
<script type="text/javascript">
  //Bajar scroll
  $("#chat").animate({ scrollTop: $('#chat')[0].scrollHeight}, 2000);
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
          success:function(r){
            if(r==1){
              $('#estudiante').val('');
              $('#grado').val('3');
              $('#estudiante').focus();
              Cargar();
            }else{
              alert("Error!!!");
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
