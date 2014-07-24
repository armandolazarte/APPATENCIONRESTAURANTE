<div class="displayInlineBlock">
	<form id="frmInsertarCategoria" method="post" class="formulario labelMediano">
		<div class="contenidoTop textAlignLeft">
			<label for="txtNombreCategoria">Nombre</label>
			<input type="text" id="txtNombreCategoria" name="txtNombreCategoria" size="50">
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

		alertaMensajeGlobal+=(!valVacio($('#txtNombreCategoria').val()) ? 'Complete el campo Nombre<br>' : '');

		if(alertaMensajeGlobal!='')
		{
			animacionAlertaMensajeGeneral(alertaMensajeGlobal, 'red');

			return;
		}

		if(confirm('Confirmar operación'))
		{
			paginaConAjaxPorCodigo('contenedor2', $('#txtNombreCategoria').val(), '/APPATENCIONRESTAURANTE/public/categoria/insertarconajax', 'POST', null, function(){$('#txtNombreCategoria').val('');}, false, true);

			return;
		}

		alert('Operación cancelada');
	}
</script>