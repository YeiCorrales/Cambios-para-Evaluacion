
/*=============================================
EDITAR PARAMETRO
=============================================*/

$(".tablas").on("click", ".btnEditarParametro", function(){

	var idParametro = $(this).attr("idParametro");

	var datos = new FormData();
	datos.append("idParametro", idParametro);

	$.ajax({

		url:"ajax/configuracion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#editarParametro").val(respuesta["Parametro"]);
			$("#editarVal").val(respuesta["Valor"]);

		}

	});

})


/*=============================================
EDITAR PRECIO
=============================================*/

$(".tablas").on("click", ".btnEditarPrecio", function(){

	var idPrecio = $(this).attr("idPrecio");

	var datos = new FormData();
	datos.append("idPrecio", idPrecio);

	$.ajax({

		url:"ajax/configuracion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#editarDescripPrecio").val(respuesta["Descripcion"]);
			$("#editarPrecio").val(respuesta["Precio"]);

		}

	});

})

/*=============================================
EDITAR DESCUENTO
=============================================*/

$(".tablas").on("click", ".btnEditarDescuento", function(){

	var idDescuento = $(this).attr("idDescuento");

	var datos = new FormData();
	datos.append("idDescuento", idDescuento);

	$.ajax({

		url:"ajax/configuracion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#editarDescripDescuento").val(respuesta["Descuento"]);
			$("#editarDescuento").val(respuesta["ValorDesc"]);

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
