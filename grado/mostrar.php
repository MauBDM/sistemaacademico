<?php
    include("../security/seguridad-primary.php");

    include("../menu/principal.php");

    $connection = conexion();

    $sql = "SELECT grado.*, estado.nombre as estado, ciclo.nombre as ciclo FROM grado inner join estado on grado.idestado=estado.idestado inner join ciclo on grado.idciclo=ciclo.idciclo ORDER BY grado.idgrado ASC ";
    $query = $connection->prepare($sql);

    $query->execute();
    $rowcount = $query->rowcount();

    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }

    require_once("modales_grado.php");
?>
<script type="text/javascript" src="editar.js"></script>
<div class="form-panel"><hr>
<button type="button" class="btn btn-default tooltips" data-toggle="modal" data-target="#modal_grado" data-placement="right" data-original-title="Agrega nuevo grado"><i class="fa fa-plus"></i>&nbsp;Nuevo</button>
<hr>
<center>
<div class="table table-responsive">
<table class="table table-stripped table-bordered table-hover">
<tr class="success">
<th width='5%' style="text-align: center;">N°</th>
<th  style="text-align: center;">Grado</th>
<th  style="text-align: center;">Ciclo</th>
<th  style="text-align: center;">Estado</th>
<th  style="text-align: center;">Editar</th>
<th  style="text-align: center;">Activar/Desactivar</th>
</tr>
<?php

foreach($model as $row){
      echo "<tr align='center'>";
      echo "<td>".$row['idgrado']."</td>";
      echo "<td align='center'>".$row['nombre']."</td>";
      echo "<td align='center'>".$row['ciclo']."</td>";

        //Estado
      $esta = $row['estado'];
        if ($esta =='Activo'){
          echo "<td class='success'>$esta</td>";
        }elseif ($esta =='Inactivo'){
           echo "<td class='danger'>$esta</td>";
        }
          echo "<td align='center' width='10%' class='active'><a class='btn btn-primary btn-xs;' data-toggle='modal' data-target='#modal_update' onclick='editar(".$row['idgrado'].");''><i style='color:white;' class='fa fa-edit'></a></i></td>";
          if ($esta =='Inactivo' ) {
            echo "<td align='center' width='10%' class='active'><button class='btn btn-success btn-xs;' data-toggle='modal' data-target='#modal_verde' onclick='activar(".$row['idgrado'].");''><i class='fa fa-check-circle'></i></button></td>";
          }elseif ($esta =='Activo'){
          echo "<td align='center' width='10%' class='active'><button class='btn btn-danger btn-xs;' data-toggle='modal' data-target='#modal_rojo' onclick='desactivar(".$row['idgrado'].");''><i class='fa fa-trash-o'></i></button></td>";
          }
      ?>
      <input type="hidden" value="<?php echo $row['nombre'];?>" id="nombre<?php echo $row['idgrado'];?>">
      <input type="hidden" value="<?php echo $row['estado'];?>" id="estado<?php echo $row['idgrado'];?>">
      <input type="hidden" value="<?php echo $row['idciclo'];?>" id="idciclo<?php echo $row['idgrado'];?>">
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
