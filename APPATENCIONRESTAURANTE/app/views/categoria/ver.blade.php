@extends('template')
@section('sectionCuerpo')
	<h2 class="tituloCabecera textAlignRight">LISTA DE CATEGORÍAS</h2>
	<div class="textAlignLeft backGroundColorGrisClaro">
		<div class="contenidoTop">
			<label for="txtBuscar">Buscar</label>
			<input type="text" id="txtBuscar" name="txtBuscar" class="text" size="50" onkeyup="buscarEnClass('buscarEnTablaCategoria', this.value)">
		</div>
	</div>
	<table class="table buscarEnTablaCategoria">
		<thead>
			<th>NOMBRE</th>
			<th>FECHA REGISTRO</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($listaTCategoria as $item)
				<tr class="elementoBuscar">
					<td>{{$item->nombre}}</td>
					<td>{{$item->fechaRegistro}}</td>
					<td><input id="{{$item->codigoCategoria}}" type="button" value="Editar" onclick="dialogoPorCodigo('dialogo', '680', true, 'Editar categoría', 'top', this.id, '/APPATENCIONRESTAURANTE/public/categoria/editar', 'POST', false, true);"></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop