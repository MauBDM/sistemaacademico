function editar(id){
	var nombre = $("#nombre"+id).val();
	var apellido = $("#apellido"+id).val();
	var direccion = $("#direccion"+id).val();
	var telefono = $("#telefono"+id).val();
	var email = $("#email"+id).val();
	var dui = $("#dui"+id).val();
	var nit = $("#nit"+id).val();
				
	$("#mod_id").val(id);
	$("#mod_nombre").val(nombre);
	$("#mod_apellido").val(apellido);
	$("#mod_direccion").val(direccion);
	$("#mod_telefono").val(telefono);
	$("#mod_email").val(email);
	$("#mod_dui").val(dui);
	$("#mod_nit").val(nit);
}

function desactivar(ide){
	$("#mod").val(ide);
}

function activar(ide){
	$("#mod-activar").val(ide);
}