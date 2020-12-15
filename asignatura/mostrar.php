<?php
    include("../security/seguridad-primary.php");

    include("../menu/principal.php");

    $connection = conexion();

    $sql = "SELECT asignatura.*, estado.nombre as estado FROM asignatura inner join estado on asignatura.idestado=estado.idestado ORDER BY asignatura.idasignatura ASC";
    $query = $connection->prepare($sql);

    $query->execute();
    $rowcount = $query->rowcount();

    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }

    require_once("modales_asignatura.php");
?>
<script type="text/javascript" src="editar.js"></script>
<div class="form-panel"><hr>
<button type="button" class="btn btn-default tooltips" data-toggle="modal" data-target="#modal_asignatura" data-placement="right" data-original-title="Agrega nueva asignatura"><i class="fa fa-plus"></i>&nbsp;Nuevo</button>
<hr>
<center>
<div class="table table-responsive">
<table class="table table-stripped table-bordered table-hover">
<tr class="success">
<th width='5%'  style="text-align: center;">N°</th>
<th  style="text-align: center;">Asignaturas</th>
<th  style="text-align: center;">Estado</th>
<th  style="text-align: center;">Editar</th>
<th  style="text-align: center;">Activar/Desactivar</th>
</tr>
<?php

foreach($model as $row){
      echo "<tr align='center'>";
      echo "<td>".$row['idasignatura']."</td>";
      echo "<td align='center'>".$row['nombre']."</td>";

        //Estado
      $esta = $row['estado'];
        if ($esta =='Activo'){
          echo "<td class='success'>$esta</td>";
        }elseif ($esta =='Inactivo'){
           echo "<td class='danger'>$esta</td>";
        }
          echo "<td align='center' width='10%' class='active'><a class='btn btn-primary btn-xs;' data-toggle='modal' data-target='#modal_update' onclick='editar(".$row['idasignatura'].");''><i style='color:white;' class='fa fa-edit'></a></i></td>";
          if ($esta =='Inactivo' ) {
            echo "<td align='center' width='10%' class='active'><button class='btn btn-success btn-xs;' data-toggle='modal' data-target='#modal_verde' onclick='activar(".$row['idasignatura'].");''><i class='fa fa-check-circle'></i></button></td>";
          }elseif ($esta =='Activo'){
          echo "<td align='center' width='10%' class='active'><button class='btn btn-danger btn-xs;' data-toggle='modal' data-target='#modal_rojo' onclick='desactivar(".$row['idasignatura'].");''><i class='fa fa-trash-o'></i></button></td>";
          }  
      ?>
      <input type="hidden" value="<?php echo $row['nombre'];?>" id="nombre<?php echo $row['idasignatura'];?>">
      <input type="hidden" value="<?php echo $row['estado'];?>" id="estado<?php echo $row['idasignatura'];?>">
      <?php
}
?>
</table>
</div>
</center>
</div>
  <?php
  include("../menu/footer.php")
?> 
      <!--footer end-->             
  </body>
</html>