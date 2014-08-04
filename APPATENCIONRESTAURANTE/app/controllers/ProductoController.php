<?php
class ProductoController extends BaseController
{
	public function actionInsertar()
	{
		if($_POST)
		{
			DB::beginTransaction();

			try
			{
				$nombreProducto=str_replace(' ', '', Input::get('txtNombre'));

				if(TProducto::whereRaw('replace(nombre, " ", "")=?', [$nombreProducto])->count()>0)
				{
					$listaTCategoria=TCategoria::all();

					return View::make('producto/insertar', Input::all(), ['color' => 'red', 'alertaMensajeGlobal' => 'El producto ya existe en el sistema', 'listaTCategoria' => $listaTCategoria]);
				}

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

				if(Input::get('txtArrayAsignados')=='')
				{
					$codigosProductoTCategoria=[];
				}

				foreach($codigosProductoTCategoria as $key => $value)
				{
					$tProductoTCategoria=new TProductoTCategoria;

					$tProductoTCategoria->codigoProducto=$tProducto[0]->codigoProducto;
					$tProductoTCategoria->codigoCategoria=$value;

					$tProductoTCategoria->save();
				}

				$listaTCategoria=TCategoria::all();

				DB::commit();

				return View::make('producto/insertar', ['color' => '#3D89BB', 'alertaMensajeGlobal' => 'Operación realizada correctamente', 'listaTCategoria' => $listaTCategoria]);
			}
			catch(Exception $ex)
			{
				DB::rollback();

				$listaTCategoria=TCategoria::all();

				return View::make('producto/insertar', Input::all(), ['color' => 'red', 'alertaMensajeGlobal' => 'Error inesperado. Por favor contacte con el administrador del sistema', 'listaTCategoria' => $listaTCategoria]);
			}
		}

		$listaTCategoria=TCategoria::all();

		return View::make('producto/insertar', ['listaTCategoria' => $listaTCategoria]);
	}

	public function actionBuscarProducto()
	{
		$listaTProducto=TProducto::all();

		return View::make('producto/buscarproducto', ['listaTProducto' => $listaTProducto]);
	}
}
?>