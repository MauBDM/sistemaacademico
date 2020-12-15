<?php
ini_set("session.cookie_lifetime","1");
ini_set("session.gc_maxlifetime","1");
 include("../security/seguridad-primary.php");
 include("../menu/principal.php");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM autor where idusuario = '1'";
    $q = $conn->prepare($sql);
    
    $q->execute(array());

    $data = $q->fetch(PDO::FETCH_ASSOC);

    $idautor = $data['idautor'];    
    $nombre = $data['nombre'];
    $nacimiento = $data['nacimiento'];
    $descripcion = $data['descripcion'];
    $foto = $data['foto'];
    $idusuario = $data['idusuario'];
    
?>

	<div class="form-panel">
    <div class="container-fluid">
      <div class="row">
      <form method="post" id="perfil" action="ajax/editar_perfil.php">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><i class='glyphicon glyphicon-cog'></i> Perfil de autor</h3>
            </div>
            <div class="panel-body">
              <div class="row">
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
          				<div id="load_img">
          					<img class="img-responsive" src="<?php echo $foto?>" alt="Logo">
          				</div>
          				<br>
                    <div class="row">
          						<div class="col-md-12">
          							<div class="form-group">
          								<input class='filestyle' data-buttonText="Logo" type="file" name="imagefile" id="imagefile" onchange="upload_image();">
          							</div>
        						  </div>
                    </div>
        				</div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-condensed">
                    <tbody>
                        <input type="hidden" class="form-control input-sm" name="idautor" value="<?php echo $idautor?>" >
                      <tr>
                        <td class='col-md-3'>Nombre:</td>
                        <td><input type="text" class="form-control input-sm" name="nombre" value="<?php echo $nombre?>" required></td>
                      </tr>
                      <tr>
                        <td>Fecha de nacimiento:</td>
                        <td><input type="text" class="form-control input-sm" name="nacimiento" value="<?php echo $nacimiento ?>" ></td>
                      </tr>
                      <tr>
                        <td>Descripción:</td>
                        <td><input type="text" class="form-control input-sm" required name="descripcion" value="<?php echo $descripcion?>"></td>
                      </tr>  

                    </tbody>
                  </table>         
                </div>
				<div class='col-md-12' id="resultados_ajax"></div><!-- Carga los datos ajax -->
              </div>
            </div>
                 <div class="panel-footer text-center">

                            <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-refresh"></i> Actualizar datos</button>
                    </div>
          </div>
        </div>
		</form>
      </div>

  <?php
  include("../menu/footer.php")
?> 
  </body>
</html>
<script type="text/javascript" src="js/bootstrap-filestyle.js"> </script>


<script>
		function upload_image(){
				
				var inputFileImage = document.getElementById("imagefile");
				var file = inputFileImage.files[0];
				if( (typeof file === "object") && (file !== null) )
				{
					$("#load_img").text('Cargando...');	
					var data = new FormData();
					data.append('imagefile',file);
					
					
					$.ajax({
						url: "ajax/editar_imagen.php",        // Url to which the request is send
						type: "POST",             // Type of request to be send, called as method
						data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
						contentType: false,       // The content type used when sending data to the server.
						cache: false,             // To unable request pages to be cached
						processData:false,        // To send DOMDocument or non processed data file it is set to false
						success: function(data)   // A function to be called if request succeeds
						{
							$("#load_img").html(data);
							
						}
					});	
				}
				
				
			}
    </script>

