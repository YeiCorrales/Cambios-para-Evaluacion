/*=============================================     MOSTRAR ALUMNOS     =============================================
*/
$(".tablas").on("click", ".btnCobroMatricula", function(){

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
      $("#editarApellido1").val(respuesta["PrimerApellido"]);
      },
                error: function(xhr, status)
                {
                    alert("ERROR: " + xhr + " >> " + status);
                }
  });

})

/*IMPRIMIR FACTURA*/
$(".tablas").on("click", ".btnfacturamatri", function()
{
  var ida = $(this).attr("idalumno");
  //alert(ida);
  window.open("../acead/extensiones/tcpdf/examples/factura.php?idAlumno="+ida, "_blank");
});

/*::::::::::::::::::::::::::::::::::::  ::::::::::::::::::::*/

$("#nuevoTotalMatricula").change(function()
{ //alert("monto Matriculada");
    alumno =  $('#editarAlumno').val();
    modalidad = $('#modalEditarCobroMatricula').val();
    monto =   $('#nuevoTotalMatricula').val();

    var datos = {
        "Id_Alumno":  alumno,
        "Id_Modalidad": modalidad,
        "Id_Monto":   monto,
      };

   $.ajax({

        url:"../acead/modelos/cobromatricula.modelo.php?caso=verificarmatricula",
        data: datos,
        type:"post",
        dataType: 'json',
        success:function(data)
        {   //alert(data);
            //Aqui se filtra lo que se quiera hacer si recibe 1 permite matricular, si recibe 0 no permite la matricula
            if(data === 1 || data === '1')
            {
                //Codigo para mandar a matricular
            }
            else
            {
                //Codigo para evitar la matricula
                alert('El Alumno ya se encuentra matriculado en esa seccion.');
                $("#modalEditarCobroMatricula").val("");
                $("#editarAlumno").empty();
                $("#nuevoTotalMatricula").empty();
            }
        },
        error:function(xhr, status){
            alert("¡Algo salió mal! : " + xhr + "(" + status + ")");
        }

    });
});