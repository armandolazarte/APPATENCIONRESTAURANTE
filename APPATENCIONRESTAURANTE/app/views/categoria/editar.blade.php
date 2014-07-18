<div class="displayInlineBlock">
		<form id="frmEditarCategoria" action="/APPATENCIONRESTAURANTE/public/categoria/editar" method="post" class="formulario labelMediano">
			<div class="contenidoTop textAlignLeft">
				<input type="hidden" id="txtCodigoCategoria" name="txtCodigoCategoria" value="{{$tCategoria->codigoCategoria}}">
				<label for="txtNombre">Nombre</label>
				<input type="text" id="txtNombre" name="txtNombre" size="50" value="{{$tCategoria->nombre}}">
			</div>
			<div class="seccionBotones bordeArriba">
				<input type="button" value="Guardar datos" onclick="enviarFrmEditarCategoria();">
			</div>
		</form>
	</div>
	<script>
		function enviarFrmEditarCategoria()
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
				$('#frmEditarCategoria').submit();

				return;
			}

			alert('Operación cancelada');
		}
	</script>