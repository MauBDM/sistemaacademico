function editar(nie){
	var nombres = $("#nombres"+nie).val();
	var apellidos = $("#apellidos"+nie).val();
	var nacimiento = $("#nacimiento"+nie).val();
	var genero = $("#genero"+nie).val();
	var telefono = $("#telefono"+nie).val();
	var direccion = $("#direccion"+nie).val();

	$("#mod_nie").val(nie);
	$("#mod_nombres").val(nombres);
	$("#mod_apellidos").val(apellidos);
	$("#mod_nacimiento").val(nacimiento);
	$("#mod_genero").val(genero);
	$("#mod_telefono").val(telefono);
	$("#mod_direccion").val(direccion);
}

function desactivar(ide){
	$("#mod").val(ide);
}

function activar(ide){
	$("#mod-activar").val(ide);
}
