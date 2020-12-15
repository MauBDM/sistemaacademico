function editar(id){
	var año = $("#año"+id).val();
	var turno = $("#turno"+id).val();
	var tipo = $("#tipo"+id).val();
	var guia = $("#guia"+id).val();
	var idgrado = $("#idgrado"+id).val();

	$("#mod_id").val(id);
	$("#mod_año").val(año);
	$("#mod_turno").val(turno);
	$("#mod_tipo").val(tipo);
	$("#mod_guia").val(guia);
	$("#mod_grado").val(idgrado);
}
function editarDocente(idd){
	var asignatura = $("#asignatura"+idd).val();
	var iddocente = $("#iddocente"+idd).val();
	$("#mod_idd").val(idd);
	$("#mod_docente").val(iddocente);
	$("#mod_asignatura").val(asignatura);
}
