<?php
    $grado = "7";
    require_once '../conexion/conexion.php';
    $connection = conexion();

    //$sql = "SELECT matricula.*, estudiante.nombres as nombreEstudiante, estudiante.apellidos as apellidoEstudiante, estado.nombre as estado FROM matricula inner join estado on matricula.idestado=estado.idestado inner join estudiante on matricula.nie=estudiante.nie WHERE matricula.idgradoDocente='$grado' ORDER BY estudiante.apellidos ASC";
    $sql="SELECT * FROM matricula WHERE idgradoDocente='$grado'";
    $query = $connection->prepare($sql);

    $query->execute();
    $rowcount = $query->rowcount();
    if ($rowcount != 0) {
      $model = array();
      while($rows = $query->fetch()){
        $model[] = $rows;
      }
      $WHERE="";
      foreach($model as $row){
        $nie = $row['nie'];
        if ($WHERE=='') {
        $WHERE =$WHERE." nie!='".$nie."'";
        }else{
        $WHERE =$WHERE." and nie!='".$nie."'";
        }
            /*echo "<tr align='center'>";
            echo "<td>".$row['nie']."</td>";
            echo "<td align='center'>".$row['apellidoEstudiante']."</td>";
            echo "<td>".$row['nombreEstudiante']."</td>";
            echo "<td align='center'>".$row['fecha']."</td>";
            echo "<td align='center'>".$row['estado']."</td>";*/
      }
      echo $WHERE;
      ?>
        <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="estudiante" id="estudiante" required="" onchange="activar()">
          <option disabled="" selected="">Seleccionar estudiante</option>
            <?php
              require_once '../conexion/conexion.php';
              $conn = conexion();
              $sql = "SELECT * FROM estudiante WHERE idestado='1' and '$WHERE'";
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
      <?php
    }else{
  ?>
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4 style="text-align: center;">Aviso!!!</h4><h5 style="text-align: center;">No hay datos para mostrar</h5> 
      </div>
  <?php
    }

 ?>
