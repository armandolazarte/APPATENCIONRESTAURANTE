@extends('template')
@section('sectionCuerpo')
	<div class="displayInlineBlock">
		<form id="frmInsertarTUsuario" action="/APPATENCIONRESTAURANTE/public/usuario/insertar" method="post" class="formulario labelMediano">
			<div class="tituloFormulario textAlignCenter">Datos de usuario</div>
			<div class="contenidoTop textAlignLeft">
				<label for="txtNombre">Nombres</label>
				<input type="text" id="txtNombre" name="txtNombre" size="40">
				<br>
				<label for="txtApellido">Apellidos</label>
				<input type="text" id="txtApellido" name="txtApellido" size="40">
				<br>
				<label for="txtDni">Dni</label>
				<input type="text" id="txtDni" name="txtDni" size="40">
				<br>
				<label for="txtFechaNacimiento">Fecha de nacimiento</label>
				<input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento">
				<br>
				<label for="txtCorreoElectronico">Correo electrónico</label>
				<input type="text" id="txtCorreoElectronico" name="txtCorreoElectronico" size="40">
				<br>
				<label for="txtContrasenia">Contraseña</label>
				<input type="password" id="txtContrasenia" name="txtContrasenia" size="40">
				<br>
				<label for="cbxRol">Rol</label>
				<select name="cbxRol" id="cbxRol">
					<option value="A">Administrador</option>
					<option value="U">Usuario normal</option>
				</select>
			</div>
			<div class="seccionBotones bordeArriba">
				<input type="button" value="Guardar datos" onclick="enviarFrmInsertarTUsuario();">
			</div>
		</form>
	</div>
	<script>
		function enviarFrmInsertarTUsuario()
		{
			if(confirm('Confirmar operación'))
			{
				$('#frmInsertarTUsuario').submit();

				return;
			}

			alert('Operación cancelada');
		}
	</script>
@stop