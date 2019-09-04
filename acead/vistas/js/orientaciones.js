
/*=============================================
EDITAR ORIENTACIONES
=============================================*/

$(".tablas").on("click", ".btnEditarOrientacion", function(){

	var idOrientacion = $(this).attr("idOrientacion");

	var datos = new FormData();

	datos.append("idOrientacion", idOrientacion);

	$.ajax({

		url:"ajax/orientaciones.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

                        //alert(respuesta);
			$("#editarIdOrientacion").val(respuesta["Id_orientacion"]);
			$("#editarOrientacion").val(respuesta["Nombre"]);

		},
                error: function(xhr, status){
                    alert("ERROR: " + xhr + " >> " + status);
                }

	});

})

/*=============================================
ELIMINAR ORIENTACION
=============================================*/
$(".tablas").on("click", ".btnEliminarOrientacion", function(){

  var idOrientacion = $(this).attr("idOrientacion");


  swal({
    title: '¿Está seguro de borrar esta orientacion?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar orientacion!'
  }).then((result)=>{

    if(result.value){


      window.location = "index.php?ruta=orientaciones&idOrientacion="+idOrientacion;


    }

  })

})
