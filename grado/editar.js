function editar(id){
	var nombre = $("#nombre"+id).val();
	var idciclo = $("#idciclo"+id).val();
				
	$("#mod_id").val(id);
	$("#mod_nombre").val(nombre);
	$("#mod_idciclo").val(idciclo);
}

function desactivar(ide){
	$("#mod").val(ide);
}

function activar(ide){
	$("#mod-activar").val(ide);
}
