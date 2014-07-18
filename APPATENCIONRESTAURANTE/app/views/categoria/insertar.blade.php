@extends('template')
@section('sectionCuerpo')
	<h2 class="tituloCabecera textAlignRight">REGISTRAR CATEGORÍA</h2>
	<div class="displayInlineBlock">
		<form id="frmInsertarCategoria" action="/APPATENCIONRESTAURANTE/public/categoria/insertar" method="post" class="formulario labelMediano">
			<div class="tituloFormulario textAlignCenter">Datos de categoría</div>
			<div class="contenidoTop textAlignLeft">
				<label for="txtNombre">Nombre</label>
				<input type="text" id="txtNombre" name="txtNombre" size="50" value="{{$txtNombre or ''}}">
			</div>
			<div class="seccionBotones bordeArriba">
				<input type="button" value="Guardar datos" onclick="enviarFrmInsertarCategoria();">
			</div>
		</form>
	</div>
	<script>
		function enviarFrmInsertarCategoria()
		{
			var alertaMensajeGlobal='';

			alertaMensajeGlobal+=(!valVacio($('#txtNombre').val()) ? 'Complete el campo Nombre<br>' : '');

			if(alertaMensajeGlobal!='')
			{
				animacionAlertaMensajeGeneral(alertaMensajeGlobal, 'red');

				return;
			}

			if(confirm('Confirmar operación'))
			{
				$('#frmInsertarCategoria').submit();

				return;
			}

			alert('Operación cancelada');
		}
	</script>
@stop