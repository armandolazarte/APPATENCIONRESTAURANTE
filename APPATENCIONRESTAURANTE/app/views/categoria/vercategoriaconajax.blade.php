@foreach($listaTCategoria as $item)
	<div id="{{$item->codigoCategoria}}" class="dragAndDrop1 elementoBuscar">
		{{$item->nombre}}
	</div>
@endforeach
@if(isset($alertaMensajeGlobal) && $alertaMensajeGlobal!='')
    <script>animacionAlertaMensajeGeneral('{{$alertaMensajeGlobal}}', '{{$color}}');</script>
@endif