
/*=============================================

=============================================*/

$(".tablas").on("click", ".btnCobroMatricula", function()
{
  var idAlumno = $(this).attr("idAlumno");
  var datos = new FormData();
  datos.append("idAlumno", idAlumno);
  $.ajax({
    url:"ajax/mostrarprecio.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta)
    {
      $("#codigoprecio").val(respuesta["Id_Precio"]);
      $("#nuevoTotalMatricula").val(respuesta["Precio"]);
      $("#descprecio").val(respuesta["Descripcion"]);
    }
  });
});



