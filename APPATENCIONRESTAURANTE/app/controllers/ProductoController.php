<?php
class ProductoController extends BaseController
{
	public function actionInsertar()
	{
		if($_POST)
		{
			$tProducto=new TProducto;

			$tProducto->nombre=Input::get('txtNombre');
			$tProducto->descripcion=Input::get('txtDescripcion');
			$tProducto->precioVentaUnitario=Input::get('txtPrecioVentaUnitario');
			$tProducto->cantidad=Input::get('txtCantidad');
			$tProducto->fechaVencimiento=Input::get('txtFechaVencimiento');
			$tProducto->estado=true;

			$tProducto->save();

			$tProducto=TProducto::whereRaw('codigoProducto=(select max(codigoProducto) from TProducto)')->get();

			$codigosProductoTCategoria=explode(',', Input::get('txtArrayAsignados'));

			foreach($codigosProductoTCategoria as $key => $value)
			{
				$tProductoTCategoria=new TProductoTCategoria;

				$tProductoTCategoria->codigoProducto=$tProducto[0]->codigoProducto;
				$tProductoTCategoria->codigoCategoria=$value;

				$tProductoTCategoria->save();
			}

			$listaTCategoria=TCategoria::all();

			return View::make('producto/insertar', ['color' => '#3D89BB', 'alertaMensajeGlobal' => 'Operación realizada correctamente', 'listaTCategoria' => $listaTCategoria]);
		}

		$listaTCategoria=TCategoria::all();

		return View::make('producto/insertar', ['listaTCategoria' => $listaTCategoria]);
	}
}
?>