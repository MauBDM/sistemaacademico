<?php
 include("../security/seguridad-secundary.php");
 ?>
<!-- Este es otro modal con php para ingresar datos via mysql -->
<!-- Para mayor información acerca de los modales visite www.bootstrap.com-->
<form class="form-horizontal" action="guardar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
	<!-- Metodo POST envia los valores a guardar.php-->
	<div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<center><h4 class="modal-title">Nuevo Tipo de Usuario.</h4></center>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
				</div>
				<div class="modal-body">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs"><br>
						<li class="active"><a href="#activity" data-toggle="tab">Ingrese Datos</a></li>
						</ul>
						<div class="tab-content">
							<div class="active tab-pane" id="activity">

								<div class="form-group"><br>
									<label for="bussines_name" class="col-sm-3 control-label">Nombre:</label>
									<div class="col-sm-9">
									<!-- Evento solo minusculas-->
									<input type="text" class="form-control" onkeypress="return soloLetras(event);"   onkeyup ="javascript:this.value=this.value.toLowerCase();" placeholder="Ingresar el nombre del tipo de usuario."  name="tipo_grd" required="" >
									</div>
								</div>
								<div class="alert alert-warning alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><center><h4><i class="fa fa-angle-right"></i> Aviso de alerta</h4></center>
									<strong>Advertencia! </strong>En realidad, desea agregar un tipo de usuario más.
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
	<center><h4 class="modal-title">Editar</h4></center>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs"><br>
<li class="active"><a href="#activity" data-toggle="tab">Modifique Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">

<div class="form-group"><br>
	<label for="bussines_name" class="col-sm-3 control-label">Nombre:</label>
		<div class="col-sm-9">
			<input type="text" class="form-control" onkeypress="return soloLetras(event);"   onkeyup ="javascript:this.value=this.value.toLowerCase();" placeholder="Escriba un tipo de usuario" name="mod_nombre" id="mod_nombre" required="" >
		</div>
</div>
<input type="hidden" name="mod_id" id="mod_id" value="">
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


<!-- Modal para dar permisos, AUN NO SE USA -->
<form class="form-horizontal" action="mostrar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_azul" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Permisos de Usuario</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<input type="text" name="mod_permiso" id="mod_permiso" value="">
<div class="form-group"><br>
	<label for="bussines_name" class="col-sm-3 control-label">Seleccionar Permiso:</label>
	<div class="col-sm-9">
	<div class="form-check">
        <input type="checkbox" class="form-check-label" placeholder="Seleccione para dar permiso" name="mod_tipoUsuario" id="mod_tipoUsuario">
        <label class="form-check-label" for="gridCheck1">
          Tipo de Usuario
        </label>
    </div>
    <div class="form-check">
    	 <input type="checkbox" class="form-check-label" placeholder="Seleccione para dar permiso" name="mod_usuario" id="mod_usuario">
        <label class="form-check-label" for="gridCheck2">
          Usuario
        </label>
    </div>
    <div class="form-check">
    	 <input type="checkbox" class="form-check-label" placeholder="Seleccione para dar permiso" name="mod_docente" id="mod_docente">
        <label class="form-check-label" for="gridCheck3">
          Docente
        </label>
    </div>
    <div class="form-check">
        <input type="checkbox" class="form-check-label" placeholder="Seleccione para dar permiso" name="mod_alumno" id="mod_alumno">
        <label class="form-check-label" for="gridCheck4">
          Alumno
        </label>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-label" placeholder="Seleccione para dar permiso" name="mod_pago" id="mod_pago">
        <label class="form-check-label" for="gridCheck5">
          Pagos
        </label>
    </div>
    <div class="form-check">
    	 <input type="checkbox" class="form-check-label" placeholder="Seleccione para dar permiso" name="mod_grado" id="mod_grado">
        <label class="form-check-label" for="gridCheck6">
          Grado
        </label>
    </div>
    <div class="form-check">
    	 <input type="checkbox" class="form-check-label" placeholder="Seleccione para dar permiso" name="mod_ciclo" id="mod_ciclo">
        <label class="form-check-label" for="gridCheck7">
          Ciclo
        </label>
    </div>
    <div class="form-check">
    	 <input type="checkbox" class="form-check-label" placeholder="Seleccione para dar permiso" name="mod_materia" id="mod_materia">
        <label class="form-check-label" for="gridCheck8">
          Materia
        </label>
    </div>
	</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cancelar</button>
<button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-save"> </span> Guardar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
