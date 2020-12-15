
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
<!-- Este es otro modal con php para ingresar datos via mysql -->
<!-- Para mayor información acerca de los modales visite www.bootstrap.com-->
<form class="form-horizontal" action="guardar.php" method="POST" accept-charset="utf-8"   autocomplete="off" role="form">
<!-- Metodo POST envia los valores a guardar.php-->
<div class="modal fade" id="modal_gradoDocente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<center><h4 class="modal-title">Año lectivo</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">Ingrese Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">

<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Año:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
    <select class="form-control" name="año_grd" required="">
      <option disabled="" selected=""></option>
        <?php
            //Extreamos el año actual
            date_default_timezone_set('America/El_Salvador');
            $añoActual = date('Y');
            $año=$añoActual;
            while ( $año >= 2005) {
                if ($año==$añoActual) {
                    echo "<option value='";
                    echo $año;
                    echo "' selected=''>";
                    echo $año;
                    echo "</option>";
                }else{
                    echo "<option value='";
                    echo $año;
                    echo "'>";
                    echo $año;
                    echo "</option>";
                }
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
    <select class="form-control" name="turno_grd" required="">
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
    <select class="form-control" name="tipo_grd" required="">
        <option disabled="" selected=""></option>
        <option value="Unica"> Única </option>
        <option value="Integrada"> Integrada </option>
    </select>
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Grado:</label>
<div class="col-sm-9">
<select class="form-control" name="grado_grd" required="">
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
<select class="form-control" name="guia_grd" required="">
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
<hr>
    <h5 align="center">Elegir docentes por materia</h5>
<hr>
<?php
    $connection = conexion();
    $sql = "SELECT * FROM asignatura WHERE idestado='1'";
    $query = $connection->prepare($sql);
    $query->execute();
    $rowcount = $query->rowcount();
    $model = array();
    while($rows = $query->fetch()){
        $model[] = $rows;
    }
    $i=0;
    foreach($model as $row){
        ?>
            <div class="form-group">
                <label for="bussines_name" class="col-sm-3 control-label"><?php echo $row['nombre'];?>:</label>
                <div class="col-sm-9">
                    <input type="hidden" name="asignatura[]" value="<?php echo $row['idasignatura'];?>">
                    <select class="form-control" name="docente[]" required="">
                        <option disabled="" selected=""></option>
                        <?php
                            require_once '../conexion/conexion.php';
                            $conn1 = conexion();
                            $sql1 = "SELECT * FROM docente WHERE idestado='1'";
                            $result1 = $conn1->query($sql1);
                            $rows1   = $result1->fetchAll();
                            foreach ($rows1 as $per) {
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
        <?php
        $i ++;
    }
 ?>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cerrar</button>
<button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-save"> </span> Registrar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>

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
      <option disabled="" selected=""></option>
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

<!-- Modal para actualizar datos desde la bd -->

<form class="form-horizontal" action="editar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">

<div class="modal fade" id="modal_updateDocente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<center><h4 class="modal-title">Editar Docente</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs"><br>
<li class="active"><a href="#activity" data-toggle="tab">Modifique Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">
<input type="hidden" name="mod_idd" id="mod_idd" value="">
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Asignatura:</label>
<div class="col-sm-9">
<input type="text" class="form-control" pattern=".{3,44}" placeholder="Ingresar asignatura" title="Ingresar más de 3 letras" name="mod_asignatura" id="mod_asignatura" required="" readonly="">
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Docente:</label>
<div class="col-sm-9">
<select class="form-control" name="mod_docente" id="mod_docente" required="">
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
<!-- Modal para desactivar un dato de x valor -->
<!--SE CONSIDERA QUE ES MEJOR EDITAR PERO POR SI ACASO LO DEJAMOS PARA FUTURO-->
<form class="form-horizontal" action="on_off.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_rojo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Desactivar</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/warning.png">  <font size="4"> ¿Realmente desea desactivar este registro?</font>

<input type="hidden" name="mod" id="mod" value="">

<div class="modal-footer">
<button type="button" class="btn btn-success" data-dismiss="modal"><span class="fa fa-close"> </span> Cancelar</button>
<button type="submit" id="guardar_datos" class="btn btn-danger"><span class="fa fa-trash-o"> </span> Aceptar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
<!-- Modal para activar un dato de x valor -->
<form class="form-horizontal" action="on_off.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_verde" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Activar</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/success.png">  <font size="4"> ¿Realmente desea activar este registro?</font>
<input type="hidden" name="mod-activar" id="mod-activar" value="">

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
