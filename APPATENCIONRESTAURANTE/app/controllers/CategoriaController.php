<?php
class CategoriaController extends BaseController
{
	public function actionInsertar()
	{
		if($_POST)
		{
			$alertaMensajeGlobal='';

			$validator=Validator::make
			(
				[
					'nombre' => Input::get('txtNombre')
				],
				[
					'nombre' => 'unique:TCategoria'
				]
			);

			if($validator->fails())
			{
				$alertaMensajeGlobal.='La categoría ya se encuentra registrado en el sistema<br>';
			}

			if($alertaMensajeGlobal!='')
			{
				return View::make('categoria/insertar', Input::all(), ['color' => 'red', 'alertaMensajeGlobal' => $alertaMensajeGlobal]);
			}

			$tCategoria=new TCategoria;

			$tCategoria->nombre=Input::get('txtNombre');

			$tCategoria->save();

			return View::make('categoria/insertar', ['color' => '#3D89BB', 'alertaMensajeGlobal' => 'Operación realizada correctamente']);
		}

		return View::make('categoria/insertar');
	}

	public function actionInsertarConAjax()
	{
		if($_POST)
		{
			$alertaMensajeGlobal='';

			$validator=Validator::make
			(
				[
					'nombre' => Input::get('nombre')
				],
				[
					'nombre' => 'unique:TCategoria'
				]
			);

			if($validator->fails())
			{
				$alertaMensajeGlobal.='La categoría ya se encuentra registrado en el sistema<br>';
			}

			if($alertaMensajeGlobal!='')
			{
				$listaTCategoria=TCategoria::all();

				return View::make('categoria/vercategoriaconajax', ['color' => 'red', 'alertaMensajeGlobal' => $alertaMensajeGlobal, 'listaTCategoria' => $listaTCategoria]);
			}

			$tCategoria=new TCategoria;

			$tCategoria->nombre=Input::get('nombre');

			$tCategoria->save();

			$listaTCategoria=TCategoria::all();

			return View::make('categoria/vercategoriaconajax', ['color' => '#3D89BB', 'alertaMensajeGlobal' => 'Operación realizada correctamente', 'listaTCategoria' => $listaTCategoria]);
		}

		return View::make('categoria/insertarconajax');
	}

	public function actionVer()
	{
		$listaTCategoria=TCategoria::all();

		return View::make('categoria/ver', ['listaTCategoria' => $listaTCategoria]);
	}

	public function actionEditar()
	{
		if(Input::get('txtCodigoCategoria'))
		{
			$alertaMensajeGlobal='';

			if(TCategoria::whereRaw('codigoCategoria!=? and nombre=?', [Input::get('txtCodigoCategoria'), Input::get('txtNombre')])->count()>0)
			{
				$alertaMensajeGlobal.='Categoría existente en el sistema<br>';
			}

			if($alertaMensajeGlobal!='')
			{
				$listaTCategoria=TCategoria::all();

				return View::make('categoria/ver', ['color' => 'red', 'alertaMensajeGlobal' => $alertaMensajeGlobal, 'listaTCategoria' => $listaTCategoria]);
			}

			$tCategoria=TCategoria::find(Input::get('txtCodigoCategoria'));

			$tCategoria->nombre=Input::get('txtNombre');

			$tCategoria->save();

			$listaTCategoria=TCategoria::all();

			return View::make('categoria/ver', ['color' => '#3D89BB', 'alertaMensajeGlobal' => 'Operación realizada correctamente', 'listaTCategoria' => $listaTCategoria]);
		}

		$tCategoria=TCategoria::find(Input::get('codigo'));

		return View::make('categoria/editar', ['tCategoria' => $tCategoria]);
	}
}
?>