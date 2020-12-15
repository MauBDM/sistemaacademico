<?php
    include("../security/seguridad-primary.php");

    include("../menu/principal.php");

    $connection = conexion();

    $sql = "SELECT tipousuario.*, estado.nombre as estado FROM tipousuario inner join estado on tipousuario.idestado=estado.idestado ORDER BY idtipoUsuario ASC ";
    $query = $connection->prepare($sql);

    $query->execute();
    $rowcount = $query->rowcount();

    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }

    require_once("modales_tipousuario.php");
?>
<script type="text/javascript" src="editar.js"></script>
<div class="form-panel"><hr>
<button type="button" class="btn btn-default tooltips" data-toggle="modal" data-target="#modal_register" data-placement="right" data-original-title="Agrega nuevos tipos de usuarios."><i class="fa fa-plus"></i>&nbsp;Nuevo</button>
<hr>
<center>
<div class="table table-responsive">
<table class="table table-stripped table-bordered table-hover">
<tr class="success">
<th width='5%'  style="text-align: center;">N°</th>
<th  style="text-align: center;">Tipo Usuario</th>
<th  style="text-align: center;">Estado</th>
<th  style="text-align: center;">Editar</th>
<th  style="text-align: center;">Activar/Desactivar</th>
<th  style="text-align: center;">Permisos</th>
</tr>
<?php

foreach($model as $row){
      echo "<tr align='center'>";
      echo "<td>".$row['idtipoUsuario']."</td>";
      echo "<td align='center'>".$row['nombre']."</td>";

        //Estado
      $esta = $row['estado'];
        if ($esta =='Activo'){
          echo "<td class='success'>$esta</td>";
        }elseif ($esta =='Inactivo'){
           echo "<td class='danger'>$esta</td>";
        }
        //No se puede realizar cambios /Estado, /Borrar para el Administrador en esta tabla
        $nom = $row['nombre'];
        if ($nom =='Administrador'){
          echo "<td colspan='3'><p class='tooltips' data-placement='left' data-original-title='No puede hacer ningún cambio al Administrador'>ACCESO TOTAL</p></td>";
        }else{
          echo "<td align='center' width='10%' class='active'><a class='btn btn-primary btn-xs;' data-toggle='modal' data-target='#modal_update' onclick='editar(".$row['idtipoUsuario'].");''><i style='color:white;' class='fa fa-edit'></a></i></td>";
          if ($esta =='Inactivo' ) {
            echo "<td align='center' width='10%' class='active'><button class='btn btn-success btn-xs;' data-toggle='modal' data-target='#modal_verde' onclick='activar(".$row['idtipoUsuario'].");''><i class='fa fa-check-circle'></i></button></td>";
          }elseif ($esta =='Activo'){
          echo "<td align='center' width='10%' class='active'><button class='btn btn-danger btn-xs;' data-toggle='modal' data-target='#modal_rojo' onclick='desactivar(".$row['idtipoUsuario'].");''><i class='fa fa-trash-o'></i></button></td>";
          }
          //aun no se usa
          /*<button class='btn btn-primary btn-xs;' data-toggle='modal' data-target='#modal_azul' onclick='permiso(".$row['idtipoUsuario'].");''><i style='color:white;' class='fa fa-lock'></i></button>*/
          echo "<td align='center' width='10%' class='active'>
          </td>";
        }
      ?>
      <input type="hidden" value="<?php echo $row['nombre'];?>" id="nombre<?php echo $row['idtipoUsuario'];?>">
      <input type="hidden" value="<?php echo $row['estado'];?>" id="estado<?php echo $row['idtipoUsuario'];?>">
      <?php
}
?>
</table>
</div>
</center>

<!-- FORMULARIO DEL REGISTRO DEL USUARIO-->

</div>
  <?php
  include("../menu/footer.php")
?>
      <!--footer end-->

  </body>

</html>
