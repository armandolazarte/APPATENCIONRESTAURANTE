<h2 class="textAlignCenter">BUSCAR PRODUCTOS</h2>
<div class="textAlignLeft backGroundColorGrisClaro">
	<div class="contenidoTop">
		<label for="txtBuscarEnTablaProducto">Buscar</label>
		<input type="text" id="txtBuscarEnTablaProducto" name="txtBuscarEnTablaProducto" class="text" size="50" onkeyup="buscarEnClass('buscarEnTablaProducto', this.value)">
		<input type="button" class="button" value="Ocultar apartado buscar" onclick="ocultarApartadoBuscar();">
	</div>
</div>
<table class="table buscarEnTablaProducto">
	<thead>
		<th>NOMBRE</th>
		<th>DESCRIPCIÓN</th>
		<th>PRECIO DE VENTA U.</th>
		<th>CANTINDAD</th>
		<th>FECHA VENCIMIENTO</th>
		<th>ESTADO</th>
		<th>FECHA REGISTRO</th>
		<th style="display: none;"></th>
		<th></th>
	</thead>
	<tbody>
		@foreach($listaTProducto as $item)
			<tr class="elementoBuscar">
				<td id="nombreProducto{{$item->codigoProducto}}">{{$item->nombre}}</td>
				<td id="descripcionProducto{{$item->codigoProducto}}">{{$item->descripcion}}</td>
				<td id="precioVentaUnitarioProducto{{$item->codigoProducto}}">{{$item->precioVentaUnitario}}</td>
				<td id="cantidadProducto{{$item->codigoProducto}}">{{$item->cantidad}}</td>
				<td id="fechaVencimientoProducto{{$item->codigoProducto}}">{{$item->fechaVencimiento}}</td>
				<td id="disponibleProducto{{$item->codigoProducto}}">{{$item->estado ? 'Habilitado' : 'No disponible'}}</td>
				<td id="fechaRegistroProducto{{$item->codigoProducto}}">{{$item->fechaRegistro}}</td>
				<td id="codigoProductoProducto{{$item->codigoProducto}}" style="display: none;">{{$item->codigoProducto}}</td>
				<td><input id="btnBuscarEnTablaProducto{{$item->codigoProducto}}" class="btnBuscarEnTablaProducto" type="button" value="Seleccionar"></td>
			</tr>
		@endforeach
	</tbody>
</table>
<script>
	$('.btnBuscarEnTablaProducto').on('click', function()
	{
		var codigo=this.id.substring(24);

		seleccionarRegistroTProducto(codigo);
	});
</script>