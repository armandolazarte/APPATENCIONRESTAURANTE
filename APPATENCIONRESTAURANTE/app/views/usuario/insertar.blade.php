@extends('template')
@section('sectionCuerpo')
	<h2 class="tituloCabecera textAlignRight">REGISTRAR USUARIO</h2>
	<div class="displayInlineBlock">
		<form id="frmInsertarUsuario" action="/APPATENCIONRESTAURANTE/public/usuario/insertar" method="post" class="formulario labelMediano">
			<div class="tituloFormulario textAlignCenter">Datos de usuario</div>
			<div class="contenidoTop textAlignLeft">
				<label for="txtNombre">Nombres</label>
				<input type="text" id="txtNombre" name="txtNombre" size="40" value="{{$txtNombre or ''}}">
				<br>
				<label for="txtApellido">Apellidos</label>
				<input type="text" id="txtApellido" name="txtApellido" size="40" value="{{$txtApellido or ''}}">
				<br>
				<label for="txtDni">Dni</label>
				<input type="text" id="txtDni" name="txtDni" size="40" value="{{$txtDni or ''}}">
				<br>
				<label for="txtFechaNacimiento">Fecha de nacimiento</label>
				<input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento" value="{{$txtFechaNacimiento or ''}}">
				<br>
				<label for="txtCorreoElectronico">Correo electrónico</label>
				<input type="text" id="txtCorreoElectronico" name="txtCorreoElectronico" size="40" value="{{$txtCorreoElectronico or ''}}">
				<br>
				<label for="txtContrasenia">Contraseña</label>
				<input type="password" id="txtContrasenia" name="txtContrasenia" size="40">
				<br>
				<label for="txtContraseniaRepita">Repita contraseña</label>
				<input type="password" id="txtContraseniaRepita" name="txtContraseniaRepita" size="40">
				<br>
				<label for="cbxRol">Rol</label>
				<select name="cbxRol" id="cbxRol">
					<option value="A" {{isset($cbxRol) && $cbxRol=='A' ? 'selected' : ''}}>Administrador</option>
					<option value="U" {{isset($cbxRol) && $cbxRol=='U' ? 'selected' : ''}}>Usuario normal</option>
				</select>
			</div>
			<div class="seccionBotones bordeArriba">
				<input type="button" value="Guardar datos" onclick="enviarFrmInsertarUsuario();">
			</div>
		</form>
	</div>
	<script>
		function enviarFrmInsertarUsuario()
		{
			var alertaMensajeGlobal='';

			alertaMensajeGlobal+=(!valVacio($('#txtNombre').val()) ? 'Complete el campo Nombre<br>' : '');
			alertaMensajeGlobal+=(!valVacio($('#txtApellido').val()) ? 'Complete el campo Apellido<br>' : '');
			alertaMensajeGlobal+=(!valDni($('#txtDni').val()) ? 'Dni incorrecto<br>' : '');
			alertaMensajeGlobal+=(!valFechaYYYYMMDD($('#txtFechaNacimiento').val()) ? 'Fecha de nacimiento incorrecto<br>' : '');
			alertaMensajeGlobal+=(!valVacio($('#txtCorreoElectronico').val()) ? 'Complete el campo Correo electrónico<br>' : '');
			alertaMensajeGlobal+=(!valEmail($('#txtCorreoElectronico').val()) ? 'Correo electronico incorrecto<br>' : '');
			alertaMensajeGlobal+=(!valVacio($('#txtContrasenia').val()) ? 'Complete el campo Contraseña<br>' : '');

			if($('#txtContrasenia').val()!=$('#txtContraseniaRepita').val())
			{
				alertaMensajeGlobal+='Las contraseñas no coenciden<br>';
			}

			if(alertaMensajeGlobal!='')
			{
				animacionAlertaMensajeGeneral(alertaMensajeGlobal, 'red');

				return;
			}

			if(confirm('Confirmar operación'))
			{
				$('#frmInsertarUsuario').submit();

				return;
			}

			alert('Operación cancelada');
		}
	</script>
@stop