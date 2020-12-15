function editar(id){
	var idtipousuario = $("#idtipousuario"+id).val();
			
	$("#mod_id").val(id);
	$("#mod_idtipousuario").val(idtipousuario);
}

function desactivar(ide){
	$("#mod").val(ide);
}

function activar(ide){
	$("#mod-activar").val(ide);
}

function contra(ide){
	$("#mod-contra").val(ide);
}
