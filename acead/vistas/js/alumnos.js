
/*=============================================
EDITAR ALUMNOS
=============================================*/

$(".tablas").on("click", ".btnEditarAlumno", function(){

	var idAlumno = $(this).attr("idAlumno");

	var datos = new FormData();

	datos.append("idAlumno", idAlumno);

	$.ajax({

		url:"ajax/alumnos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

                        //alert(respuesta);
			$("#editarAlumno").val(respuesta["Id_Alumno"]);
			$("#editarNombre1").val(respuesta["PrimerNombre"]);
			$("#editarNombre2").val(respuesta["SegundoNombre"]);
			$("#editarApellido1").val(respuesta["PrimerApellido"]);
			$("#editarApellido2").val(respuesta["SegundoApellido"]);
			$("#editarFechaNac").val(respuesta["FechaNacimiento"]);
			$("#editarTelefono").val(respuesta["Telefono"]);
			$("#editarCedula").val(respuesta["Cedula"]);
			$("#editarEmail").val(respuesta["CorreoElectronico"]);
			$("#editarEstCivil").val(respuesta["Id_estadocivil"]);
			$("#editarGenero").val(respuesta["Id_genero"]);
			$("#editarDireccion").val(respuesta["Direccion"]);


		},
                error: function(xhr, status){
                    alert("ERROR: " + xhr + " >> " + status);
                }

	});

})



/*=============================================
ELIMINAR ALUMNO
=============================================*/
$(".tablas").on("click", ".btnEliminarAlumno", function(){

  var idAlumno = $(this).attr("idAlumno");


  swal({
    title: '¿Está seguro de borrar el alumno?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar alumno!'
  }).then((result)=>{

    if(result.value){


      window.location = "index.php?ruta=alumnos&idAlumno="+idAlumno;


    }

  })

})


/*=============================================
MATRICULA ALUMNO
=============================================*/

$(".tablas").on("click", ".btnMatriculaAlumno", function(){


 var idAlumno = $(this).attr("idAlumno");

 var datos = new FormData();

  datos.append("idAlumno", idAlumno);

  $.ajax({

    url:"ajax/alumnos.ajax.php",
    method: "POST",
    data: datos,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

                        //alert(respuesta);
      $("#IdAlumno").val(respuesta["Id_Alumno"]);
      $("#nombreAlumno").val(respuesta["PrimerNombre"]);


  },
                error: function(xhr, status){
                    alert("ERROR: " + xhr + " >> " + status);
              }

  });

})

/*=============================================
CONTACTO RESPONSABLE ALUMNO
=============================================*/

$(".tablas").on("click", ".btnContactoResponsable", function(){


 var idAlumno = $(this).attr("idAlumno");

 var datos = new FormData();

  datos.append("idAlumno", idAlumno);

  $.ajax({

    url:"ajax/alumnos.ajax.php",
    method: "POST",
    data: datos,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

                        //alert(respuesta);
      $("#editarAlumnoContact").val(respuesta["Id_Alumno"]);


  },
                error: function(xhr, status){
                    alert("ERROR: " + xhr + " >> " + status);
              }

  });

})

/*IMPRIMIR FACTURA*/
$(".tablas").on("click", ".btnInfoAlumno", function()
{
  var $idAlumnoInfo = $(this).attr("idAlumno"); 
  //alert(ida);
  window.open("../acead/extensiones/tcpdf/examples/InfoAlumno.php?idAlumno="+idAlumnoInfo, "_blank");
});
