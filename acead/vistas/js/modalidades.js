
/*=============================================
EDITAR MODALIDADES
=============================================*/

$(".tablas").on("click", ".btnEditarModalidad", function(){

	var idModalidad = $(this).attr("idModalidad");

	var datos = new FormData();

	datos.append("idModalidad", idModalidad);

	$.ajax({

		url:"ajax/modalidades.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

                        //alert(respuesta);
			$("#editarIdModalidad").val(respuesta["Id_Modalidad"]);
			$("#editarModalidad").val(respuesta["DescripModalidad"]);

		},
                error: function(xhr, status){
                    alert("ERROR: " + xhr + " >> " + status);
                }

	});

})

/*=============================================
ELIMINAR MODALIDAD
=============================================*/
$(".tablas").on("click", ".btnEliminarModalidad", function(){

  var idModalidad = $(this).attr("idModalidad");


  swal({
    title: '¿Está seguro de borrar esta modalidad?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar Modalidad!'
  }).then((result)=>{

    if(result.value){


      window.location = "index.php?ruta=modalidades&idModalidad="+idModalidad;


    }

  })

})
