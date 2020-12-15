
 <?php
//conexion();
 /*Recibimos los parametros de busca con ajax*/
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
/*Condicion para hacer la busqueda dentro de la paginación*/
  if($action == 'ajax'){
      // Debemos de evitar la inyección de html o codigo Js
         $q = addslashes(strip_tags($_REQUEST['q'], ENT_QUOTES));
    //Arreglo de columnas donde se realizara la busqueda. Deacuerdo a las columnas
     $aColumns = array('ebooks.idebooks','ebooks.titulo', 'categoria.nombre','editorial.nombre', 'autor.nombre');//Columnas de busqueda
     $Table = "ebooks"; //Nombre tabla de BD
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
    $per_page = 4; //la cantidad de registros que desea mostrar
    $adjacents  = 2; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    // Cuenta el número total de filas de la tabla
// Necesitaremos la siguiente variable de la conexión 
// conexion()
//Incluimos la conexión 
require_once("../conexion/conexion.php");
//Variables de la conexión.    
$connection = conexion();
//contamos los valores encontrados y realiza consulta.
$count_query = "SELECT ebooks.*,categoria.nombre as ncategoria, editorial.nombre as neditorial,autor.idautor as idau, autor.nombre as nautor FROM $Table inner join categoria on ebooks.idcategoria=categoria.idcategoria inner join editorial on ebooks.ideditorial=editorial.ideditorial inner join autor on ebooks.idautor=autor.idautor $Where and ebooks.estado='Activo' ";
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
$sql = "SELECT ebooks.*,categoria.nombre as ncategoria,editorial.nombre as neditorial,autor.idautor as idau, autor.nombre as nautor FROM $Table inner join categoria on ebooks.idcategoria=categoria.idcategoria inner join editorial on ebooks.ideditorial=editorial.ideditorial inner join autor on ebooks.idautor=autor.idautor $Where  and ebooks.estado='Activo' ORDER BY ebooks.idebooks desc LIMIT $offset,$per_page";
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
<?php
if ($rowcount !=0){ // Si el número de registros en la BD es diferente de 0 es decir hay valores
?>
  <!-- contenedores -->
  <div class="container-fluid"> 
<?php
$cierre=""; //variable para definir el cierre del contenedor row
$re=1; //variable para llevar la cuenta de los registros por cada fila
foreach($model as $row){ //Mostrar los datos encontrados en la BD $model, $row tomados lineas atras.
  if ($re==1) {
    echo "<div class='row'>";
  }
?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="hovereffect">
                <img class="img-responsive img-rounded" src="<?php echo $row['img']; ?>" width="100%" height="200px" alt="">
              <div class="overlay">
                   <h2 class="titulo"><a style='cursor:pointer;' data-toggle='modal' data-target='#modal_ver' onclick='ver(<?php echo $row['idebooks']; ?>)'><i style="color:white;font-size:20px;"><?php echo $row['titulo']; ?></i></a></h2>
                   <a class="info" style='cursor:pointer;' data-toggle='modal' data-target='#modal_autor' onclick='verAutor(<?php echo $row['idau']; ?>)'><p><?php echo $row['nautor']; ?></p></a>
              </div>
            </div>
          </div>
    <?php
      if ($re==4) {
        echo "</div>";
        $re=0;
        $cierre="ok";
      }
      $re ++;
     } //Finalizamos el foreach($model as $row){
  //cerramos contenedor row(en caso este quede abierto)
  if ($cierre!="ok") {
    echo "</div>";
  }
?>
  </div><!-- cierre del contenedor -->
<!-- Posicionamos los valores de paginación -->
<div class="table-pagination pull-right">
  <?php echo paginate($reload, $page, $total_pages, $adjacents)?>
</div>
<div class="table-pagination pull-left">
  <br>
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