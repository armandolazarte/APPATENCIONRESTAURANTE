<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/normalize.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssContenido.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssFormulario.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssComponente.css">

	<script src="/APPATENCIONRESTAURANTE/public/js/jquery-2.0.3.min.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/prefixfree.min.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/jsAnimacion.js"></script>
</head>
<body style="text-align: center;">
	<div class="alertaMensajeGlobal"></div>
	<div id="divVerDetalle"></div>
	@if(isset($alertaMensajeGlobal) && $alertaMensajeGlobal!='')
	    <script>animacionAlertaMensajeGeneral('{{$alertaMensajeGlobal}}', '{{$color}}');</script>
	@endif
	<div class="displayInlineBlock" style="margin-top: 170px;">
		<form action="/APPATENCIONRESTAURANTE/public/usuario/login" method="post" class="formulario labelPequenio">
			<div class="tituloFormulario textAlignCenter">Acceso de usuario</div>
			<div class="contenidoTop textAlignLeft">
				<label for="txtCorreoElectronico">Correo electrónico</label>
				<input type="text" id="txtCorreoElectronico" name="txtCorreoElectronico">
				<br>
				<label for="txtContrasenia">Contraseña</label>
				<input type="password" id="txtContrasenia" name="txtContrasenia">
			</div>
			<div class="seccionBotones bordeArriba">
				<input type="submit" value="Acceder">
			</div>
		</form>
	</div>
</body>
</html>