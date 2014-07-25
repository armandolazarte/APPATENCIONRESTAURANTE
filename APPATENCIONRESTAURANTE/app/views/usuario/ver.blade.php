@extends('template')
@section('sectionCuerpo')
	<h2 class="tituloCabecera textAlignRight">LISTA DE USUARIOS</h2>
	<div class="textAlignLeft backGroundColorGrisClaro">
		<div class="contenidoTop">
			<label for="txtBuscar">Buscar</label>
			<input type="text" id="txtBuscar" name="txtBuscar" class="text" size="50" onkeyup="buscarEnClass('buscarEnTablaUsuario', this.value)">
		</div>
	</div>
	<table class="table buscarEnTablaUsuario">
		<thead>
			<th>NOMBRES</th>
			<th>APELLIDOS</th>
			<th>DNI</th>
			<th>FECHA DE NACIMIENTO</th>
			<th>CORREO ELECTRÓNICO</th>
			<th>ROL</th>
			<th>FECHA REGISTRO</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($listaTUsuario as $item)
				<tr class="elementoBuscar">
					<td>{{$item->nombre}}</td>
					<td>{{$item->apellido}}</td>
					<td>{{$item->dni}}</td>
					<td>{{$item->fechaNacimiento}}</td>
					<td>{{$item->correoElectronico}}</td>
					<td>{{$item->rol=='A' ? 'Administrador' : 'Usuario Normal'}}</td>
					<td>{{$item->fechaRegistro}}</td>
					<td><input id="{{$item->codigoUsuario}}" type="button" value="Editar" onclick="dialogoAjax('dialogo', '600', true, 'Editar usuario', 'top', {codigo : this.id}, '/APPATENCIONRESTAURANTE/public/usuario/editar', 'POST', null, null, false, true);"></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop