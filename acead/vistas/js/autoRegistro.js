$( document ).ready(function() {

	getGeneros();
	getEstadoCiviles();
	getDepartamento();
});

$('#guardar').click(function()
{
	var usuario = $('#usuario').val();
	var contrasena = $('#contrasena').val();
	var confirmarContrasena = $('#confirmarContrasena').val();
	var pNombre  = $('#pNombre').val();
	var sNombre = $('#sNombre').val();
	var pApellido = $('#pApellido').val();
	var sApellido = $('#sApellido').val();
	var telefono = $('#telefono').val();
	var cedula = $('#cedula').val();
	var correo = $('#correo').val();
	var departamento = $("#departamento").val();
	var estadoCivil = $("#estadoCivil").val();
	var genero = $("#genero").val();

	if(ValidarContrasena(contrasena,confirmarContrasena ))
	{
		if(validarGenero(genero))
		{
			if (validarEstadoCivil(estadoCivil))
			{
				if(validarDepartamento(departamento))
				{
					if(ValidarCedula(cedula))
					{
						if (ValidarTelefono(telefono))
						{
							if (ValidarUsuario(usuario))
							{
								datos =
						        {
									pcUsuario : usuario,
									pcContrasena : contrasena,
									pcPrimerNombre : pNombre,
									pcSegundoNombre : sNombre,
									pcPrimerApellido : pApellido,
									pcSegundoApellido : sApellido,
									pcTelefono : telefono,
									pcCedula : cedula,
									pcCorreoElectronico : correo,
									pcId_Departamento : departamento,
									pcId_EstadoCivil : estadoCivil,
									pcId_Genero : genero,
									accion : 4
						        };

							    $.ajax({
							        type: "POST",
							        url: "ajax/ajaxAutoRegistro.php",
							        data: datos,
							        success: function(response)
							        {
							        	var da = JSON.parse(response);

							        	if (da.error == null)
							        	{
							        		alert("¡Usuario registrado éxitosamente!");
							        		limpiarControles();
							        	}
							        	else
							        	{
							        		alert('¡Error al registrar el usuario!');
							        	}
							        }
							    });
							}
							else
							{
								alert("El nombre del usuario debe ser mayor a 5 caracteres");
							}
						}
						else
						{
							alert("El teléfono excede el tamaño de caracteres permitidos");
						}
					}
					else
					{
						alert("La Cedula excede el tamaño de caracteres permitidos");
					}
				}
				else
				{
					alert("Debes seleccionar un departamento");
				}
			}
			else
			{
				alert("Debes de seleccionar un estado civil");
			}
		}
		else
		{
			alert("Debes seleccionar un genero");
		}
	}
	else
	{
		alert("Las contraseñas no son iguales");
	}
});

function limpiarControles()
{
	$('#usuario').val('');
	$('#contrasena').val('');
	$('#confirmarContrasena').val('');
	$('#pNombre').val('');
	$('#sNombre').val('');
	$('#pApellido').val('');
	$('#sApellido').val('');
	$('#telefono').val('');
	$('#cedula').val('');
	$('#correo').val('');
	$("#departamento").val('null');
	$("#estadoCivil").val('null');
	$("#genero").val('null');
}

function ValidarContrasena(contrasena, confirmarContrasena)
{
	var valida = false;
	if (contrasena == confirmarContrasena)
	{
		valida = true;
	}

	return valida;
}

function ValidarUsuario(usuario)
{
	var valida = false;

	if (usuario.length > 5)
	{
		valida = true;
	}

	return valida;
}

function ValidarCedula(cedula)
{
	var valida = false;
	if (cedula.length <= 13)
	{
		valida = true;
	}

	return valida;
}

function ValidarTelefono(telefono)
{
	var valida = false;
	if (telefono.length <= 11 )
	{
		valida = true;
	}

	return valida;
}

function validarGenero(genero)
{
	var valida = false;

	if(genero != null && genero > 0)
	{
		valida = true;
	}

	return valida;
}

function validarEstadoCivil(estadoCivil)
{
	var valida = false;

	if(estadoCivil != null && estadoCivil > 0)
	{
		valida = true;
	}

	return valida;
}

function validarDepartamento(departamento)
{
	var valida = false;

	if(departamento != null && departamento > 0)
	{
		valida = true;
	}

	return valida;
}

//llenar combobox de generos
function getGeneros()
{
    $.ajax({
        type: "POST",
        url: "ajax/ajaxAutoRegistro.php",
        data: {accion: 1},
        success: function(response)
        {
            var data = JSON.parse(response);
            var resultHTML = '';

            for (var index = 0; index < data.length; index++)
            {
                resultHTML += '<option value="'+data[index].codigo+'">'+ data[index].nombre+ '</option>';
            }

            $("#genero").append(resultHTML);
        }
    });
}

//llenar combobox de estado civil
function getEstadoCiviles()
{
    $.ajax({
        type: "POST",
        url: "ajax/ajaxAutoRegistro.php",
        data: {accion: 2},
        success: function(response)
        {
            var data = JSON.parse(response);
            var resultHTML = '';

            for (var index = 0; index < data.length; index++)
            {
                resultHTML += '<option value="'+data[index].codigo+'">'+ data[index].nombre+ '</option>';
            }

            $("#estadoCivil").append(resultHTML);
        }
    });
}

//llenar combobox de
function getDepartamento()
{
    $.ajax({
        type: "POST",
        url: "ajax/ajaxAutoRegistro.php",
        data: {accion: 3},
        success: function(response)
        {
            var data = JSON.parse(response);
            var resultHTML = '';

            for (var index = 0; index < data.length; index++)
            {
                resultHTML += '<option value="'+data[index].codigo+'">'+ data[index].nombre+ '</option>';
            }

            $("#departamento").append(resultHTML);
        }
    });
}

$( "input" ).keydown(function() {
    if (event.keyCode == 32 )
	{
		event.preventDefault();
	  }
});
