/*=============================================
EDITAR CLASES-ORIENTACION MOMDALIDAD
=============================================*/

$(".tablas").on("click", ".btnEditarClase", function(){
	//alert($(this).attr("idClase"));
	var idClase = $(this).attr("idClase");

	var datos = new FormData();

	datos.append("idClase", idClase);

	$.ajax({

		url:"ajax/orientacionmodalidad.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

                        //alert(respuesta);
			$("#editarIdClase").val(respuesta["Id_Clase"]);
			$("#editarSelecModalidad").val(respuesta["DescripModalidad"]);
			$("#editarSelecOrientacion").val(respuesta["Nombre"]);


		},
                error: function(xhr, status){
                    alert("ERROR: " + xhr + " >> " + status);
                }

	});

})
