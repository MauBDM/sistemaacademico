
 <script type="text/javascript">

 //Funcion de validacion para que un input solo acepte letras

    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

<script type="text/javascript">
//Funcion de validacion para que un input solo acepte numeros.
function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 37) || (keynum == 39) || (keynum == 46))
        return true;

        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
<!-- <script type="text/javascript">
function validate(){
	if(document.getElementById('minchar').value.length < 5) {
		alert('El campo debe tener al menos 5 carácteres.');
		}else{
		document.getElementById('form').submit();
	}
}
</script> -->
<?php
include "../security/seguridad-secundary.php";
?>
<!-- Modal para actualizar datos desde la bd -->

<form class="form-horizontal" action="editar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">

<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<center><h4 class="modal-title">Editar</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs"><br>
<li class="active"><a href="#activity" data-toggle="tab">Modifique Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">
<input type="hidden" name="mod_id" id="mod_id" value="">

<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Año:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
    <select class="form-control" name="mod_año" id="mod_año" required="">
        <?php
            //Extreamos el año actual
            date_default_timezone_set('America/El_Salvador');
            $añoActual = date('Y');
            $año=$añoActual;
            while ( $año >= 2005) {
                    echo "<option value='";
                    echo $año;
                    echo "' selected=''>";
                    echo $año;
                    echo "</option>";
                $año=$año-1;
            }
         ?>
    </select>
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Turno:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
    <select class="form-control" name="mod_turno" id="mod_turno" required="">
        <option disabled="" selected=""></option>
        <option value="Matutino"> Matutino </option>
        <option value="Vespertino"> Vespertino </option>
    </select>
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Sección:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
    <select class="form-control" name="mod_tipo" id="mod_tipo" required="">
        <option disabled="" selected=""></option>
        <option value="Unica"> Única </option>
        <option value="Integrada"> Integrada </option>
    </select>
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Grado:</label>
<div class="col-sm-9">
<select class="form-control" name="mod_grado" id="mod_grado" required="">
    <option disabled="" selected=""></option>
    <?php
require_once '../conexion/conexion.php';
$conn   = conexion();
$sql    = "SELECT * FROM grado WHERE idestado='1'";
$result = $conn->query($sql);
$rows   = $result->fetchAll();
foreach ($rows as $per) {
    echo "<option value='";
    echo $per['idgrado'];
    echo "'>";
    echo $per['nombre'];
    echo "</option>";
}
?>
</select>
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Docente Guía:</label>
<div class="col-sm-9">
<select class="form-control" name="mod_guia" id="mod_guia" required="">
    <option disabled="" selected=""></option>
    <?php
require_once '../conexion/conexion.php';
$conn   = conexion();
$sql    = "SELECT * FROM docente WHERE idestado='1'";
$result = $conn->query($sql);
$rows   = $result->fetchAll();
foreach ($rows as $per) {
    echo "<option value='";
    echo $per['iddocente'];
    echo "'>";
    echo $per['nombres']." ".$per['apellidos'];
    echo "</option>";
}
?>
</select>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cerrar</button>
<button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-refresh"> </span> Actualizar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>

<!-- Modal para matricular un dato -->
<form class="form-horizontal" action="registrar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_matricula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Matrícula</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/success.png">  <font size="4"> ¿Desea registrar matrícula?</font>
<input type="hidden" name="id_grado" id="id_grado" value="">

<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> </span> Cancelar</button>
<button type="submit" id="guardar_datos" class="btn btn-success"><span class="fa fa-check-circle"> </span> Aceptar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>

<!-- Modal para matricular un dato -->
<form class="form-horizontal" action="calificar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_calificaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Calificar</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/success.png">  <font size="4"> ¿Desea registrar calificaciones?</font>
<input type="hidden" name="id_grado_calificacion" id="id_grado_calificacion" value="">
<!--?php
    include("../security/seguridad-primary.php");
    //include("../menu/principal.php");
    if(!empty($_POST)){
      $idgrado = $_POST["id_grado_calificacion"];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $consult = $conn->prepare("SELECT matricula.*,estudiante.nombre as nombreEst FROM matricula inner join estudiante on matricula.nie=estudiante.nie WHERE idestado='1'");
      $consult->execute();
      $data = $consult->fetch(PDO::FETCH_ASSOC);
      $nombreEst = $data['nombreEst'];
    }
?-->
<?php
/*require_once '../conexion/conexion.php';
//require_once 'editar.php';
$conn   = conexion();
$sql    = "SELECT * FROM matricula WHERE idestado='1'";
$result = $conn->query($sql);
$rows   = $result->fetchAll();
foreach ($rows as $per) {
    echo "<option value='";
    echo $per['idmatricula'];
    echo "'>";
    echo $per['nie'];
    echo "</option>";
}*/

?>
<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> </span> Cancelar</button>
<button type="submit" id="guardar_datos" class="btn btn-success"><span class="fa fa-check-circle"> </span> Aceptar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>

<!-- Modal para ver notas-->
<form class="form-horizontal" action="ver.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Ver y modificar calificaciones</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/success.png">  <font size="4"> ¿Desea ver las calificaciones?</font>
<input type="hidden" name="id_grado_ver" id="id_grado_ver" value="">

<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> </span> Cancelar</button>
<button type="submit" id="guardar_datos" class="btn btn-success"><span class="fa fa-check-circle"> </span> Aceptar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
