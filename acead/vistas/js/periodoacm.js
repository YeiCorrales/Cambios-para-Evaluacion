

//Date picker
    $('#datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      autoclose: true
    })

    $('#datepicker2').datepicker({
      autoclose: true
    })

    $('#editardatepicker').datepicker({
      autoclose: true
    })

    $('#editardatepicker2').datepicker({
      autoclose: true
    })

    /*$('#editardatepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      autoclose: true
    })

    $('#editardatepicker2').datepicker({
      autoclose: true
    })*/




/*=============================================
EDITAR PERIODO
=============================================*/

$(".tablas").on("click", ".btnEditarPeriodo", function(){

	var idPeriodo = $(this).attr("idPeriodo");

	var datos = new FormData();
	datos.append("idPeriodo", idPeriodo);

	$.ajax({

		url:"ajax/periodoacm.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#editarPeriodo").val(respuesta["DescripPeriodo"]);
			$("#editardatepicker").val(respuesta["FechaInicio"]);
      $("#editardatepicker2").val(respuesta["FechaFin"]);
      $("#editarestadoperiodo").val(respuesta["Activo"]);

		}

	});

})




/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function(){

  var idUsuario = $(this).attr("idUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then((result)=>{

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario;

    }

  })

})
