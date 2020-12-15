
<?php  
//Permite solo que ingrese el usuario que ha iniciado sesion.

?>
	<?php
				/* Connect To Database*/
				require_once ("../../conexion/conexion.php");
				if (isset($_FILES["imagefile"])){
	
				$target_dir="../../img/libro/autores/";
				$image_name = time()."_".basename($_FILES["imagefile"]["name"]);
				$target_file = $target_dir . $image_name;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				$imageFileZise=$_FILES["imagefile"]["size"];
				
				/* Inicio Validacion*/
				// Allow certain file formats
				if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) and $imageFileZise>0) {
				$errors[]= "<p>Lo sentimos, sólo se permiten archivos JPG , JPEG, PNG y GIF.</p>";
				} else if ($imageFileZise > 1048576) {//1048576 byte=1MB
				$errors[]= "<p>Lo sentimos, pero el archivo es demasiado grande. Selecciona logo de menos de 1MB</p>";
				}  else
			{
				

				/* Fin Validacion*/
				if ($imageFileZise>0){
					move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
					$logo_update="foto='../img/libro/autores/$image_name' ";
				
				}	else { $logo_update="";}

			$conn = conexion();
			//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE autor SET $logo_update WHERE idautor='1';";
			$oo = $conn->prepare($sql);
			$query_new_insert = $oo->execute();    
                    if ($query_new_insert) {
                        ?>
						<img class="img-responsive" src="../img/libro/autores/<?php echo $image_name;?>" alt="imagen">
						<?php
                    } else {
 
 		$errors = "Lo sentimos, la actualización falló Error de fórmato. Intente nuevamente."; 
 	}                        
                    }
			}			
	?>
	<?php 
		if (isset($errors)){
	?>
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error! </strong>
		<?php
			
				echo $errors;
			
		?>
		</div>	
	<?php
			}
	?>

