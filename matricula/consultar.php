<?php
  if(!empty($_GET['idgrado'])){
    $grado = $_REQUEST["idgrado"];
    require_once '../conexion/conexion.php';
    $connection = conexion();

    $sql = "SELECT matricula.*, estudiante.nombres as nombreEstudiante, estudiante.apellidos as apellidoEstudiante, estado.nombre as estado FROM matricula inner join estado on matricula.idestado=estado.idestado inner join estudiante on matricula.nie=estudiante.nie WHERE matricula.idgradoDocente='$grado' ORDER BY estudiante.apellidos ASC";
    $query = $connection->prepare($sql);

    $query->execute();
    $rowcount = $query->rowcount();
    if ($rowcount != 0) {
      $model = array();
      while($rows = $query->fetch()){
        $model[] = $rows;
      }
?>
    <div class="table table-responsive">
    <table class="table table-stripped table-bordered table-hover">
    <tr style="background: #10A798;">

    <th width='10%' style="text-align: center;">NIE</th>
    <th  style="text-align: center;">Apellidos</th>
    <th  style="text-align: center;">Nombres</th>
    <th  style="text-align: center;">Fecha</th>
    <th  style="text-align: center;">Estado</th>
    </tr>
<?php

    foreach($model as $row){
          echo "<tr align='center'>";
          echo "<td>".$row['nie']."</td>";
          echo "<td align='center'>".$row['apellidoEstudiante']."</td>";
          echo "<td>".$row['nombreEstudiante']."</td>";
          echo "<td align='center'>".$row['fecha']."</td>";
          echo "<td align='center' class='active'>".$row['estado']."</td>";
          echo "</tr>";
    }
?>
  </table>
</div>
<?php 
    }else{
  ?>
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4 style="text-align: center;">Aviso!!!</h4><h5 style="text-align: center;">No hay datos para mostrar</h5> 
      </div>
  <?php
    }
  }else{
    header("location:mostrar.php");
  }
 ?>
