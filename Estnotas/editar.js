function editar(id){
	var nota1 = $("#nota1"+id).val();
	var nota2 = $("#nota2"+id).val();
	var nota3 = $("#nota3"+id).val();
	var idasignatura = $("#idasignatura"+id).val();
	var idmatricula = $("#idmatricula"+id).val();

	$("#mod_id").val(id);
	$("#mod_nota1").val(nota1);
	$("#mod_nota2").val(nota2);
	$("#mod_nota3").val(nota3);
	$("#mod_asignatura").val(idasignatura);
	$("#mod_alumno").val(idmatricula);
}
