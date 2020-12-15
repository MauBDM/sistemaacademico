<?php
 include("../security/seguridad-primary.php")
 ?>
  <link rel="stylesheet" type="text/css" href="../css/css.css">
  <link rel="shortcut icon" href="../img/log.ico" />
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>   
  <script src="../bootstrap/js/jQuery-2.1.4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="img.css">
    <!-- Bootstrap core CSS -->
  <?php
    require_once("../menu/principal.php");
  ?>
  <div class="form-panel">
    <div class="page-header">
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel with-nav-tabs panel-primary">
          <div class="panel-heading">
            <ul class="nav nav-tabs">
              <li class="active"><h3> Listado de Libros</h3></li>
            </ul>
          </div>
          <div class="panel-body">
            <div class="tab-content">
              <div class="tab-pane fade in active" id="Activos">
                <div id="loader" class="text-center">
                  <img src="../img/loader.gif"></div>
                  <form class="form-horizontal" autocomplete="off">
                    <div class="form-group">
                      <div class="col-sm-6">
                        <input type="text" class="form-control" id="q" placeholder="Buscar por título o autor del libro" onkeyup="load(1)">
                      </div>
                      <button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button>
                      <div class="right">
                      </div>
                    </div>
                  </form>
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
    include("modales_ver.php");
  ?> 
</div>
</div>
  <?php
    include("../menu/footer.php")
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
