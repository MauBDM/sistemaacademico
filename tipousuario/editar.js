function editar(id){
	var nombre = $("#nombre"+id).val();
	$("#mod_nombre").val(nombre);
	$("#mod_id").val(id);
}

function desactivar(ide){
	$("#mod").val(ide);
}

function activar(ide){
	$("#mod-activar").val(ide);
}

function permiso(ide){
	$("#mod_permiso").val(ide);
}
