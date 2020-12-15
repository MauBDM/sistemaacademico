
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
<div class="modal fade" id="modal_notas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<center><h4 class="modal-title">Notas Vigentes</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">Ingrese Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Alumno Inscrito:</label>
<div class="col-sm-9">
    <select class="form-control" name="alumno" required="">
      <option disabled="" selected=""></option>
      <?php
  require_once '../conexion/conexion.php';
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
  }
  ?>
    </select>
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Asignatura:</label>
<div class="col-sm-9">
    <select class="form-control" name="asignatura" required="">
      <option disabled="" selected=""></option>
      <?php
  require_once '../conexion/conexion.php';
  $conn   = conexion();
  $sql    = "SELECT * FROM asignatura WHERE idestado='1'";
  $result = $conn->query($sql);
  $rows   = $result->fetchAll();
  foreach ($rows as $per) {
      echo "<option value='";
      echo $per['idasignatura'];
      echo "'>";
      echo $per['nombre'];
      echo "</option>";
  }
  ?>
    </select>
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Primer Trimestre:</label>
<div class="col-sm-9">
  <!-- Evento solo numeros-->
  <input type="text" class="form-control" title="Ingresa nota 1" placeholder="Ingresar la nota." name="nota1" id="nota1">
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Segundo Trimestre:</label>
<div class="col-sm-9">
  <!-- Evento solo numeros-->
  <input type="text" class="form-control" title="Ingresa nota 2" placeholder="Ingresar la nota." name="nota2" id="nota2">
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Tercer Trimestre:</label>
<div class="col-sm-9">
  <!-- Evento solo numeros-->
  <input type="text" class="form-control" title="Ingresa nota 3" placeholder="Ingresar la nota." name="nota3" id="nota3">
</div>
</div>
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
<label for="bussines_name" class="col-sm-3 control-label">Alumno Inscrito:</label>
<div class="col-sm-9">
    <select class="form-control" name="mod_alumno" required="">
      <option disabled="" selected=""></option>
      <?php
  require_once '../conexion/conexion.php';
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
  }
  ?>
    </select>
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Asignatura:</label>
<div class="col-sm-9">
    <select class="form-control" name="mod_asignatura" required="">
      <option disabled="" selected=""></option>
      <?php
  require_once '../conexion/conexion.php';
  $conn   = conexion();
  $sql    = "SELECT * FROM asignatura WHERE idestado='1'";
  $result = $conn->query($sql);
  $rows   = $result->fetchAll();
  foreach ($rows as $per) {
      echo "<option value='";
      echo $per['idasignatura'];
      echo "'>";
      echo $per['nombre'];
      echo "</option>";
  }
  ?>
    </select>
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Primer Trimestre:</label>
<div class="col-sm-9">
  <!-- Evento solo numeros-->
  <input type="text" class="form-control" title="Ingresa nota 1" placeholder="Ingresar la nota." name="mod_nota1" id="mod_nota1">
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Segundo Trimestre:</label>
<div class="col-sm-9">
  <!-- Evento solo numeros-->
  <input type="text" class="form-control" title="Ingresa nota 2" placeholder="Ingresar la nota." name="mod_nota2" id="mod_nota2">
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Tercer Trimestre:</label>
<div class="col-sm-9">
  <!-- Evento solo numeros-->
  <input type="text" class="form-control" title="Ingresa nota 3" placeholder="Ingresar la nota." name="mod_nota3" id="mod_nota3">
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
<!-- Evento solo minusculas-->
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
