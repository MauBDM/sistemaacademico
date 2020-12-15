function editar(dui){
	var nombres = $("#nombres"+dui).val();
	var apellidos = $("#apellidos"+dui).val();
	var nacimiento = $("#nacimiento"+dui).val();
	var estadoCivil = $("#estadoCivil"+dui).val();
	var profesion = $("#profesion"+dui).val();
	var ultimoGrado = $("#ultimoGrado"+dui).val();
	var telefono = $("#telefono"+dui).val();
	var zona = $("#zona"+dui).val();
	var direccion = $("#direccion"+dui).val();
				
	$("#mod_dui").val(dui);
	$("#mod_nombres").val(nombres);
	$("#mod_apellidos").val(apellidos);
	$("#mod_nacimiento").val(nacimiento);
	$("#mod_estadoCivil").val(estadoCivil);
	$("#mod_profesion").val(profesion);
	$("#mod_ultimoGrado").val(ultimoGrado);
	$("#mod_telefono").val(telefono);
	$("#mod_zona").val(zona);
	$("#mod_direccion").val(direccion);
}
