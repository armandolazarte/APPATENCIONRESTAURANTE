<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Atención de Restaurantes</title>

	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/normalize.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssTemplate.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssMenuPrincipal.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssContenido.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssComponente.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssFormulario.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssLoading.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/cssDragAndDrop.css">
	<link rel="stylesheet" href="/APPATENCIONRESTAURANTE/public/css/jquery-ui.css">

	<script src="/APPATENCIONRESTAURANTE/public/js/jquery-2.0.3.min.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/jquery-ui.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/prefixfree.min.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/jsAccion.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/jsAjax.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/jsValidacion.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/jsAnimacion.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/jsBuscar.js"></script>
	<script src="/APPATENCIONRESTAURANTE/public/js/jsControl.js"></script>
</head>
<body>
	<header>
		<div id="contenedorHeader">
			<div id="divLogo" class="contenidoMiddle"><img src="/APPATENCIONRESTAURANTE/public/img/logo.jpg" height="85" width="110"></div>
			<h1 class="contenidoMiddle">Sistema Atención de Restaurantes</h1>
		</div>
		<div id="divLogin">
			<b class="contenidoMiddle">Nombre del usuario actual: </b>
			<div class="contenidoMiddle">{{Session::get('correoElectronico')}}</div>
			<br>
			<b class="contenidoMiddle">Fecha actual del sistema: </b>
			<div class="contenidoMiddle">{{date('Y-m-d')}}</div>
			<br>
			<div class="contenidoMiddle"><a href="/APPATENCIONRESTAURANTE/public/usuario/cerrarsesion">Cerrar Sesión</a></div>
		</div>
		<div id="itemMenu"><div>Menú</div></div>
		<nav id="menuPrincipal">
			<ul>
				<li>
					<a href="#">
						<img src="/APPATENCIONRESTAURANTE/public/img/imgMenu/itemUsuario.png">
						<div>Módulo de usuarios</div>
					</a>
					<ul>
						<li><a href="/APPATENCIONRESTAURANTE/public/usuario/insertar">Registrar usuario</a></li>
						<li><a href="/APPATENCIONRESTAURANTE/public/usuario/ver">Ver usuarios</a></li>
					</ul>
				</li><li>
					<a href="#">
						<img src="/APPATENCIONRESTAURANTE/public/img/imgMenu/itemUsuario.png">
						<div>Módulo de productos</div>
					</a>
					<ul>
						<li><a href="/APPATENCIONRESTAURANTE/public/categoria/insertar">Registrar categoría</a></li>
						<li><a href="/APPATENCIONRESTAURANTE/public/categoria/ver">Ver categorías</a></li>
						<li><a href="/APPATENCIONRESTAURANTE/public/producto/insertar">Registrar productos</a></li>
					</ul>
				</li><li>
					<a href="#">
						<img src="/APPATENCIONRESTAURANTE/public/img/imgMenu/itemUsuario.png">
						<div>Item 3</div>
					</a>
				</li><li>
					<a href="#">
						<img src="/APPATENCIONRESTAURANTE/public/img/imgMenu/itemUsuario.png">
						<div>Item 4</div>
					</a>
				</li>
			</ul>
		</nav>
	</header>
	<section id="cuerpoTemplate">
		<div class="alertaMensajeGlobal"></div>
		<div id="divVerDetalle"></div>
		<div id="dialogo"></div>
		@if(isset($alertaMensajeGlobal) && $alertaMensajeGlobal!='')
		    <script>animacionAlertaMensajeGeneral('{{$alertaMensajeGlobal}}', '{{$color}}');</script>
		@endif
		<div id="cuerpoInterno">
			@yield('sectionCuerpo')
		</div>
	</section>
	<footer>
		<div id="contenidoFooter">
			&copy;En la Web de KAAF
		</div>
	</footer>
</body>
</html>