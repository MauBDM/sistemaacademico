<?php
//conexion();
 require_once("../conexion/conexion.php");
//Variables de la conexión.
$connection = conexion();
@session_start();
$usuario = $_SESSION['usuario'];
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $consult = $connection->prepare("SELECT * FROM usuario where usuario = '$usuario'");
       $consult->execute();

    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $idtipoUsu = $data['idtipoUsuario'];
 /*Recibimos los parametros de busca con ajax*/
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
/*Condicion para hacer la busqueda dentro de la paginación*/
  if($action == 'ajax'){
      // Debemos de evitar la inyección de html o codigo Js
         $q = addslashes(strip_tags($_REQUEST['q'], ENT_QUOTES));
    //Arreglo de columnas donde se realizara la busqueda. Deacuerdo a las columnas
     $aColumns = array('docente_grado.iddocente_grado','docente_grado.año', 'docente_grado.turno','docente_grado.tipo','docente.nombres','grado.nombre');//Columnas de busqueda
     $Table = "docente_grado"; //Nombre tabla de BD
     $Where = ""; // Inicialización de variable $Where = Where sql.
    if ( $_GET['q'] != "" ) // Condición que obtiene la variable q en ajax en busca.php
    {
      $Where = "WHERE ("; //Función a la variable $Where
      for ( $i=0 ; $i<count($aColumns) ; $i++ ) //Incrementa las variables encontradas en $aColumns
      {
        $Where .= $aColumns[$i]." LIKE '%".$q."%' OR ";
      /* Donde arreglo será incrementado por la busqueda que realize el usuario en $aColumns = array('Nombre De Columna', 'Nombre De Columna','Nombre De Columna', ... Según sea el dato ingresado); */
      }
      $Where = substr_replace( $Where, "", -3 );
      /* Sustrae los valores de $Where -3 para recoger la variable $rowcount Mientras no será reconocida */
      $Where .= ')'; //Final de la consulta
    }
    /**/
    include '../paginacion/pagination.php'; //incluir el archivo de paginación.
    //las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 6; //la cantidad de registros que desea mostrar
    $adjacents  = 2; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    //Extreamos el año actual
    date_default_timezone_set('America/El_Salvador');
    $añoActual = date('Y');
    // Cuenta el número total de filas de la tabla
//contamos los valores encontrados y realiza consulta.
    $count_query = "SELECT docente_grado.*,docente.nombres as docenteNombres, grado.nombre as gradoNombre FROM $Table inner join docente on docente_grado.guia=docente.iddocente inner join grado on docente_grado.idgrado=grado.idgrado $Where and docente_grado.año='$añoActual'";

// Conexión con pdo
$query = $connection->prepare($count_query);
// Ejecutamos la función
if ($query->execute()) {
// Contará los registros que esten en la base de datos solicitada.
  $rowcount = $query->rowcount();
}
/* El total de las paginas será igual a las celdas encontradas e igual a la cantidad de
registros a mostrar.
*/
$total_pages = ceil($rowcount/$per_page);
// Debemos volver a recargar la pagina principal de este archivo
    $reload = 'mostrar.php';
// Consulta de la paginación
      $sql = "SELECT docente_grado.*,docente.nombres as docenteNombres, docente.apellidos as docenteApellidos, grado.nombre as gradoNombre FROM $Table inner join docente on docente_grado.guia=docente.iddocente inner join grado on docente_grado.idgrado=grado.idgrado $Where and docente_grado.año='$añoActual' ORDER BY docente_grado.iddocente_grado desc LIMIT $offset,$per_page";

// Sirbe para hacer la conexion a la base de datos recuperando para; mostrarlos en la paginación
// Reemplazar $query por $qs
$qs = $connection->prepare($sql);
$qs->execute();
$total = $qs->rowcount();


$model = array();//$model será la encargada de contener el arreglo de los datos (Contenedor).
while($rows = $qs->fetch())//Mientras que hacemos la variable $rows; cada vez que sea solicitada
{ //En las columnas de las tablas
    $model[] = $rows;
}
// Finalizando el while
?>
<script type="text/javascript" src="editar.js"></script>
<!-- Tablas responsive para visualizar en dispositivos pequeños-->
<div class="table-responsive">
<!-- Tabla con efectos de bootstrap  -->
<table class="table table-bordered table-condensed table-hover">
<!-- Cabecera de nuestra tabla -->
<thead>
<!-- Encabezada con efecto success-->
  <tr align="center" class="success">
  <!-- style="text-align: center; Centrara el contenido de la columna principal ☺☺☺☺ -->
    <th style="text-align: center; width: 5px;">N°</th> <!-- Encabezado de la fila principal de la tabla -->
    <th style="text-align: center;">Grado</th>
    <th style="text-align: center;">Año</th>
    <th style="text-align: center;">Turno</th>
    <th style="text-align: center;">Sección</th>
    <th style="text-align: center;">Docente Guía</th>
    <th style="text-align: center;">Información</th>
    <?php if ($idtipoUsu==1 or $idtipoUsu==4 or $idtipoUsu==5){ ?>
      <th style="text-align: center;">Editar</th>
    <?php } ?>

    <!--th style="text-align: center;">Desactivar</th-->
  </tr><!-- Finalizando Columna principal -->
</thead><!-- Finalización-->
<tbody><!-- Finalización-->
<?php
if ($rowcount !=0){ // Si el número de registros en la BD es diferente de 0 es decir hay valores
foreach($model as $row){ //Mostrar los datos encontrados en la BD $model, $row tomados lineas atras.
  ?>
      <tr style="text-align: center;">
      <td class="success"><?php echo $row['iddocente_grado'];?></td>
      <td><?php echo $row['gradoNombre'];?></td>
      <td><?php echo $row['año'];?></td>
      <td><?php echo $row['turno'];?></td>
      <td><?php echo $row['tipo'];?></td>
      <td><?php echo $row['docenteNombres']." ".$row['docenteApellidos'];?></td>
      <td>
        <?php
          $idg = $row['iddocente_grado'];
          $conn = conexion();
          $sql1 = "SELECT docente_asignatura.*,asignatura.nombre as asignatura, docente.nombres as docenteNombres, docente.apellidos as docenteApellidos FROM docente_asignatura inner join asignatura on docente_asignatura.idasignatura=asignatura.idasignatura inner join docente on docente_asignatura.iddocente=docente.iddocente WHERE docente_asignatura.idgradoDocente='$idg' ORDER BY docente_asignatura.idasignatura asc";
          $query1 = $conn->prepare($sql1);
          $query1->execute();
          $rowcount1 = $query1->rowcount();
          $model1 = array();
          while($rows1 = $query1->fetch()){
              $model1[] = $rows1;
          }
          echo "<table class='table table-bordered table-condensed table-hover'>";
          echo "<tr align='center' class='success'><th style='text-align: center;'>Asignatura</th><th style='text-align: center;'>Docente</th><th style='text-align: center;'>Ver</th></tr>";
          foreach($model1 as $row1){
            echo "<tr><td>".$row1['asignatura']."</td>";
            echo "<td>".$row1['docenteNombres']." ".$row1['docenteApellidos']."</td>";
            echo "<td align='center' width='10%' class='active'><a class='btn btn-success btn-xs;' data-toggle='modal' data-target='#modal_updateDocente' onclick='editarDocente(".$row1['iddocenteAsignatura'].");''><i style='color:white;' class='fa fa-eye'></a></i></td></tr>";
            ?>
              <!-- Envío de docente asignatura -->
              <input type="hidden" value="<?php echo $row1['asignatura'];?>" id="asignatura<?php echo $row1['iddocenteAsignatura'];?>">
              <input type="hidden" value="<?php echo $row1['iddocente'];?>" id="iddocente<?php echo $row1['iddocenteAsignatura'];?>">
            <?php
          }
          echo "</table>";
         ?>
      </td>
      <?php
      if ($idtipoUsu==1 or $idtipoUsu==4 or $idtipoUsu==5){
      echo "<td align='center' width='10%' class='active'><a class='btn btn-primary btn-xs;' data-toggle='modal' data-target='#modal_update' onclick='editar(".$row['iddocente_grado'].");''><i style='color:white;' class='fa fa-edit'></a></i></td>";
      }
      //AUN NO SE HA AGREGADO SE CONSIDERA QUE ES MEJOR EDITAR PERO POR SI ACASO LO DEJAMOS COMENTADO
      //echo "<td align='center' width='10%' class='active'><button class='btn btn-danger btn-xs;' data-toggle='modal' data-target='#modal_rojo' onclick='desactivar(".$row['iddocente_grado'].");''><i class='fa fa-trash-o'></i></button></td>";
     ?>
      </tr>
      <!-- envio de datos de año lectivo-->
      <input type="hidden" value="<?php echo $row1['iddocente_grado'];?>" id="iddocente_grado<?php echo $row1['iddocente_grado'];?>">
      <input type="hidden" value="<?php echo $row1['año'];?>" id="año<?php echo $row1['iddocente_grado'];?>">
      <input type="hidden" value="<?php echo $row1['turno'];?>" id="turno<?php echo $row1['iddocente_grado'];?>">
      <input type="hidden" value="<?php echo $row1['tipo'];?>" id="tipo<?php echo $row1['iddocente_grado'];?>">
      <input type="hidden" value="<?php echo $row1['idgrado'];?>" id="idgrado<?php echo $row1['iddocente_grado'];?>">
     <?php
     } //Finalizamos el foreach($model as $row){
?>
</tbody> <!-- Recuperamos el id para utilizarlo a la hora de realizar cambios a la BD -->


</table>
<!-- Posicionamos los valores de paginación -->
<div class="table-pagination pull-right">
  <?php echo paginate($reload, $page, $total_pages, $adjacents)?>
</div>
<div class="table-pagination pull-left">
  <?php
   echo "Mostrando&nbsp;".$total."&nbsp;registros de&nbsp;".$rowcount;/* Muestra la cantidad de datos encontrados por fila */
  ?>

<?php
}else { //Mientras no hay registros en la BD
      ?>
      </table>
      <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4 style="text-align: center;">Aviso!!!</h4><h5 style="text-align: center;">No hay datos para mostrar</h5>
            </div>
      <?php
    }
  } //Finalizar accion.
?>
