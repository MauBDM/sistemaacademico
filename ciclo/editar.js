function editar(id){
	var nombre = $("#nombre"+id).val();
				
	$("#mod_id").val(id);
	$("#mod_nombre").val(nombre);
}

function desactivar(ide){
	$("#mod").val(ide);
}

function activar(ide){
	$("#mod-activar").val(ide);
}
