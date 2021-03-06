@extends('template')
@section('sectionCuerpo')
	<script>
		$(function()
		{
			$('.cajonDragAndDrop').sortable({
				connectWith: '.cajonDragAndDrop',
				opacity: 0.4,
				stop: function(event, ui)
				{
					$('#txtArrayAsignados').val('');

					var ids='';

					$('#contenedor1').find('.dragAndDrop1').each(function(index, elemento)
					{
						ids=ids+elemento.id+',';
					});

					ids=ids.substring(0, ids.length-1);

					$('#txtArrayAsignados').val(ids);
				}
			}).disableSelection();
		});
	</script>
	<h2 class="tituloCabecera textAlignRight">REGISTRAR PRODUCTOS</h2>
	<div class="displayInlineBlock">
		<form id="frmInsertarProducto" action="/APPATENCIONRESTAURANTE/public/producto/insertar" method="post" class="formulario labelMediano">
			<div class="tituloFormulario textAlignCenter">Datos de producto</div>
			<div class="contenidoTop textAlignLeft">
				<label for="txtNombre">Nombre</label>
				<input type="text" id="txtNombre" name="txtNombre" class="contenidoMiddle" size="50" value="{{$txtNombre or ''}}">
				<input type="button" class="button contenidoMiddle" value="Buscar Producto" onclick="mostrarApartadoBuscar();">
				<br>
				<label for="txtDescripcion">Descripción</label>
				<textarea name="txtDescripcion" id="txtDescripcion" cols="30" rows="7">{{$txtDescripcion or ''}}</textarea>
				<br>
				<label for="txtPrecioVentaUnitario">Precio de venta unitario</label>
				<input type="text" id="txtPrecioVentaUnitario" name="txtPrecioVentaUnitario" size="50" value="{{$txtPrecioVentaUnitario or ''}}">
				<br>
				<label for="txtCantidad">Cantidad</label>
				<input type="text" id="txtCantidad" name="txtCantidad" size="50" value="{{$txtCantidad or ''}}">
				<br>
				<label for="txtFechaVencimiento">Fecha de vencimiento</label>
				<input type="date" id="txtFechaVencimiento" name="txtFechaVencimiento" value="{{$txtFechaVencimiento or ''}}">
				<br>
				<label>Asigne categorías</label>
				<hr>
				<div class="textAlignCenter">
					<input type="button" value="Registrar categoría" onclick="dialogoAjax('dialogo', 680, true, 'Datos de categoría', 'top', null, '/APPATENCIONRESTAURANTE/public/categoria/insertarconajax', 'GET', null, null, false, true);">
					<label for="txtBuscarCategoria">Buscar categoría</label>
					<input type="text" id="txtBuscarCategoria" name="txtBuscarCategoria" onkeyup="buscarEnClass('buscarEnCategoria', this.value)">
					<hr>
					<div id="contenedor1" class="cajonDragAndDrop">

					</div>
					<div id="contenedor2" class="cajonDragAndDrop buscarEnCategoria">
						@foreach($listaTCategoria as $item)
							<div id="{{$item->codigoCategoria}}" class="dragAndDrop1 elementoBuscar">
								{{$item->nombre}}
							</div>
						@endforeach
					</div>
					<input type="hidden" id="txtArrayAsignados" name="txtArrayAsignados" value="{{$txtArrayAsignados or ''}}">
				</div>
			</div>
			<div class="seccionBotones bordeArriba">
				<input type="button" value="Guardar datos" onclick="enviarFrmInsertarProducto();">
			</div>
		</form>
	</div>
	<div id="divBuscar" class="apartadoBuscar">
		<div id="divBuscarProducto">
			<script>
				paginaAjax('divBuscarProducto', null, '/APPATENCIONRESTAURANTE/public/producto/buscarproducto', 'POST', null, null, false, true);
			</script>
		</div>
	</div>
	<script>
		$(document).on('ready', function()
		{
			if($('#txtArrayAsignados').val()!='')
			{
				var arrayCategoriaAsignada=$('#txtArrayAsignados').val().split(',');

				for(var i=0; i<arrayCategoriaAsignada.length; i++)
				{
					trasladarHtml('contenedor2', '#'+arrayCategoriaAsignada[i], 'contenedor1');
				}
			}
		});

		function seleccionarRegistroTProducto(codigo)
		{
			$('#txtNombre').val($('#nombreProducto'+codigo).text());
			$('#txtDescripcion').val($('#descripcionProducto'+codigo).text());
			$('#txtPrecioVentaUnitario').val($('#precioVentaUnitarioProducto'+codigo).text());
			$('#txtFechaVencimiento').val($('#fechaVencimientoProducto'+codigo).text());

			ocultarApartadoBuscar();
		}

		function enviarFrmInsertarProducto()
		{
			var alertaMensajeGlobal='';

			alertaMensajeGlobal+=(!valVacio($('#txtNombre').val()) ? 'Complete el campo Nombre<br>' : '');
			alertaMensajeGlobal+=(!valDosDecimales($('#txtPrecioVentaUnitario').val()) ? 'El precio de venta unitario debe ser en soles<br>' : '');
			alertaMensajeGlobal+=(!valEntero($('#txtCantidad').val()) ? 'La cantidad debe ser un valor entero<br>' : '');
			alertaMensajeGlobal+=(!valFechaYYYYMMDD($('#txtFechaVencimiento').val()) ? 'La fecha de vencimiento no es válida<br>' : '');

			if(parseFloat($('#txtPrecioVentaUnitario').val())<=0)
			{
				alertaMensajeGlobal+='El precio de venta no puede ser 0 ni menor a este<br>';
			}

			if(alertaMensajeGlobal!='')
			{
				animacionAlertaMensajeGeneral(alertaMensajeGlobal, 'red');

				return;
			}

			if(confirm('Confirmar operación'))
			{
				$('#frmInsertarProducto').submit();

				return;
			}

			alert('Operación cancelada');
		}
	</script>
@stop