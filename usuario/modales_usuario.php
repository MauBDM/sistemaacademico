
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
<div class="modal fade" id="modal_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<center><h4 class="modal-title">Nuevo Usuario.</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">Ingrese Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity"><br>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Usuario:</label>
<div class="col-sm-9">
  <input type="text" class="form-control" name="usu_grd" id="usu_grd">
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Clave:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="password" class="form-control" minlength="8" maxlength="40"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w\S{6,}" title="Debe incluir signos, números, y letras mayúsculas y minúsculas." placeholder="Ingresar la clave del usuario." id="clave_grd" name="clave_grd" required="">

</div>
</div>
<div class="form-group">
<label for="tax_number" class="col-sm-3 control-label">Repetir Contrase&ntilde;a:</label>
<div class="col-sm-9">
<input type="password" class="form-control" onchange="if(this.value != clave_grd.value) { alert('Su contraseña es diferente a la ingresada anteriormente.'); this.value='';}"  placeholder="compruebe su contrase&ntilde;a"  name="clave_grd1" id="clave_grd1" required="">
</div>
</div>

<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Tipo de usuario:</label>
<div class="col-sm-9">
<select class="form-control" name="idtipousuario_grd" required="">
	<?php
require_once '../conexion/conexion.php';
$conn   = conexion();
$sql    = "SELECT * FROM tipousuario WHERE idestado='1'";
$result = $conn->query($sql);
$rows   = $result->fetchAll();
foreach ($rows as $per) {
    echo "<option value='";
    echo $per['idtipoUsuario'];
    echo "'>";

    echo $per['nombre'];
    echo "</option>";
}
?>

</select>
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Estado:</label>
<div class="col-sm-9">
<select class="form-control" name="estado_grd" required="">
	<option value='Activo' selected>Activo</option>
	<option value='Inactivo'>Inactivo</option>
</select>
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
<input type="hidden" name="mod_id" id="mod_id" value=""><br>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Usuario:</label>
<div class="col-sm-9">
  <input type="text" class="form-control" name="mod_usu" id="mod_usu" value="">
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Tipo de usuario:</label>
<div class="col-sm-9">
<select class="form-control" name="mod_idtipousuario" id="mod_idtipousuario" required="">
	<?php
require_once '../conexion/conexion.php';
$conn   = conexion();
$sql    = "SELECT * FROM tipousuario WHERE idestado='1'";
$result = $conn->query($sql);
$rows   = $result->fetchAll();
foreach ($rows as $per) {
    echo "<option value='";
    echo $per['idtipoUsuario'];
    echo "' selected>";

    echo $per['nombre'];
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
<button type="submit" id="guardar_datos" class="btn btn-success"><span class="glyphicon glyphicon-saved"> </span> Aceptar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>

<!-- Modal para actualizar contraseña -->

<form class="form-horizontal" action="on_off.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">

<div class="modal fade" id="modal_contra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<center><h4 class="modal-title">Editar Contraseña</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs"><br>
<li class="active"><a href="#activity" data-toggle="tab">Modifique la Contraseña</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">
<input type="hidden" name="mod-contra" id="mod-contra" value="">

<div class="form-group"><br>
	<label for="bussines_name" class="col-sm-3 control-label">Contraseña Actual:</label>
		<div class="col-sm-9">
			<input type="password" class="form-control" placeholder="Escriba su contraseña actual" name="actual" id="actual" required="">
		</div>
</div>
<div class="form-group">
	<label for="bussines_name" class="col-sm-3 control-label">Contraseña Nueva:</label>
		<div class="col-sm-9">
            <input type="password" class="form-control" minlength="8" maxlength="40"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w\S{6,}" title="Debe incluir signos, números, y letras mayúsculas y minúsculas." placeholder="Escriba su contraseña nueva" name="nueva" id="nueva" required="">
		</div>
</div>
<div class="form-group">
<label for="tax_number" class="col-sm-3 control-label">Repetir Contrase&ntilde;a:</label>
<div class="col-sm-9">
<input type="password" class="form-control" onchange="if(this.value != nueva.value) { alert('Su contraseña es diferente a la ingresada anteriormente.'); this.value='';}"  placeholder="compruebe su contrase&ntilde;a"  name="clave_grd1" id="clave_grd1" required="">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cerrar</button>
<button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-lock"> </span> Actualizar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
