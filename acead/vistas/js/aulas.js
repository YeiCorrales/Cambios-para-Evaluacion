
/*=============================================
EDITAR AULAS
=============================================*/

$(".tablas").on("click", ".btnEditarAula", function(){

	var idAula = $(this).attr("idAula");

	var datos = new FormData();

	datos.append("idAula", idAula);

	$.ajax({

		url:"ajax/Aulas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

                        //alert(respuesta);
			$("#editarIdAula").val(respuesta["Id_Aula"]);
			$("#editarAula").val(respuesta["Num_Aula"]);

		},
                error: function(xhr, status){
                    alert("ERROR: " + xhr + " >> " + status);
                }

	});

})
