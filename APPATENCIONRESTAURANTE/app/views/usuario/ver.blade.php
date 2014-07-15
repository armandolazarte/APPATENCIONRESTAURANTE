@extends('template')
@section('sectionCuerpo')
	<table class="table">
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
				<tr>
					<td>{{$item->nombre}}</td>
					<td>{{$item->apellido}}</td>
					<td>{{$item->dni}}</td>
					<td>{{$item->fechaNacimiento}}</td>
					<td>{{$item->correoElectronico}}</td>
					<td>{{$item->rol=='A' ? 'Administrador' : 'Usuario Normal'}}</td>
					<td>{{$item->fechaRegistro}}</td>
					<td><input id="{{$item->codigoUsuario}}" type="button" value="Editar" onclick="editarUsuario(this.id);"></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script>
		function editarUsuario(codigoUsuario)
		{
			window.location.href='/APPATENCIONRESTAURANTE/public/usuario/editar/'+codigoUsuario;
		}
	</script>
@stop