<div class="displayInlineBlock">
	<form id="frmEditarUsuario" action="/APPATENCIONRESTAURANTE/public/usuario/editar" method="post" class="formulario labelMediano">
		<div class="contenidoTop textAlignLeft">
			<input type="hidden" id="txtCodigoUsuario" name="txtCodigoUsuario" value="{{$tUsuario->codigoUsuario}}">
			<label for="txtNombre">Nombres</label>
			<input type="text" id="txtNombre" name="txtNombre" size="40" value="{{$tUsuario->nombre}}">
			<br>
			<label for="txtApellido">Apellidos</label>
			<input type="text" id="txtApellido" name="txtApellido" size="40" value="{{$tUsuario->apellido}}">
			<br>
			<label for="txtDni">Dni</label>
			<input type="text" id="txtDni" name="txtDni" size="40" value="{{$tUsuario->dni}}">
			<br>
			<label for="txtFechaNacimiento">Fecha de nacimiento</label>
			<input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento" value="{{$tUsuario->fechaNacimiento}}">
			<br>
			<label for="txtCorreoElectronico">Correo electrónico</label>
			<input type="text" id="txtCorreoElectronico" name="txtCorreoElectronico" size="40" value="{{$tUsuario->correoElectronico}}">
			<br>
			<label for="cbxRol">Rol</label>
			<select name="cbxRol" id="cbxRol">
				<option value="A" {{(isset($tUsuario) && $tUsuario->rol=='A') ? 'selected' : ''}}>Administrador</option>
				<option value="U" {{(isset($tUsuario) && $tUsuario->rol=='U') ? 'selected' : ''}}>Usuario normal</option>
			</select>
		</div>
		<div class="seccionBotones bordeArriba">
			<input type="button" value="Guardar datos" onclick="enviarFrmEditarUsuario();">
		</div>
	</form>
</div>
<script>
	function enviarFrmEditarUsuario()
	{
		var alertaMensajeGlobal='';

		alertaMensajeGlobal+=(!valVacio($('#txtNombre').val()) ? 'Complete el campo Nombre<br>' : '');
		alertaMensajeGlobal+=(!valVacio($('#txtApellido').val()) ? 'Complete el campo Apellido<br>' : '');
		alertaMensajeGlobal+=(!valDni($('#txtDni').val()) ? 'Dni incorrecto<br>' : '');
		alertaMensajeGlobal+=(!valFechaYYYYMMDD($('#txtFechaNacimiento').val()) ? 'Fecha de nacimiento incorrecto<br>' : '');
		alertaMensajeGlobal+=(!valVacio($('#txtCorreoElectronico').val()) ? 'Complete el campo Correo electrónico<br>' : '');
		alertaMensajeGlobal+=(!valEmail($('#txtCorreoElectronico').val()) ? 'Correo electronico incorrecto<br>' : '');

		if(alertaMensajeGlobal!='')
		{
			animacionAlertaMensajeGeneral(alertaMensajeGlobal, 'red');

			return;
		}

		if(confirm('Confirmar operación'))
		{
			$('#frmEditarUsuario').submit();

			return;
		}

		alert('Operación cancelada');
	}
</script>