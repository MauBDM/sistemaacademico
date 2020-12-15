<?php
	include("../security/seguridad-secundary.php");
 ?>

<!-- Modal para ver los datos del libro -->
<form class="form-horizontal" action="verLibro.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Ver Libro</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/success.png">  <font size="4"> ¿Desea ver más detalles del libro?</font>
<input type="hidden" name="mod-ver" id="mod-ver" value="">

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

<!-- Modal para ver los datos del autor -->
<form class="form-horizontal" action="../autor/verAutor.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_autor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Ver Autor</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/success.png">  <font size="4"> ¿Desea ver más detalles del autor?</font>
<input type="hidden" name="mod-autor" id="mod-autor" value="">

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