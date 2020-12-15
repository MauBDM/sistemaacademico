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
    <th width='10%' style="text-align: center;">Fecha</th>
    <th width='20%' style="text-align: center;">Apellidos</th>
    <th width='20%' style="text-align: center;">Nombres</th>
    <th width='10%' style="text-align: center;">Trimestre I</th>
    <th width='10%' style="text-align: center;">Trimestre II</th>
    <th width='10%' style="text-align: center;">Trimestre III</th>
    <th width='10%' style="text-align: center;">Nota Final</th>
    </tr>
<?php

    foreach($model as $row){
          echo "<tr align='center'>";
          echo "<td>".$row['nie']."</td>";
          echo "<td align='center'>".$row['fecha']."</td>";
          echo "<td align='center'>".$row['apellidoEstudiante']."</td>";
          echo "<td>".$row['nombreEstudiante']."</td>";
          ?>          
            <td>
              <input type="hidden" name="matricula[]" value="<?php echo $row['idmatricula']; ?>">
              <input type="hidden" name="nie[]" value="<?php echo $row['nie']; ?>">
              <input type="text" name="nota1[]" class="form-control" value="0">
            </td>
            <td>
              <input type="text" name="nota2[]" class="form-control" value="0">
            </td>
            <td>
              <input type="text" name="nota3[]" class="form-control" value="0">
            </td>
            <td>
              <input type="text" name="notaFinal[]" class="form-control" value="0">
            </td>
          <?php
    }
?>
  </table>
</div>
<div class="modal-footer">
  <span title="Salir"><a href="mostrar.php" class="btn btn-default">Regresar</a></span>
  <button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-save"> </span> Registrar</button>
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
