<?php
class UsuarioController extends BaseController
{
	public function actionLogin()
	{
		if($_POST)
		{
			$tUsuario=TUsuario::whereRaw('correoElectronico=?', [Input::get('txtCorreoElectronico')])->get();

			if(count($tUsuario)==0)
			{
				return View::make('usuario/login', ['color' => 'red', 'alertaMensajeGlobal' => 'Usuario o contraseña incorrecto']);
			}
			else
			{
				if(Crypt::decrypt($tUsuario[0]->contrasenia)==Input::get('txtContrasenia'))
				{
					Session::put('correoElectronico', $tUsuario[0]->correoElectronico);
					Session::put('codigoUsuario', $tUsuario[0]->codigoUsuario);

					return Redirect::to('venta/insertar');
				}
				else
				{
					return View::make('usuario/login', ['color' => 'red', 'alertaMensajeGlobal' => 'Usuario o contraseña incorrecto']);
				}
			}
		}

		if(Session::has('sesionVacia'))
		{
			return View::make('usuario/login', ['color' => 'red', 'alertaMensajeGlobal' => Session::get('sesionVacia')]);
		}

		return View::make('usuario/login');
	}

	public function actionCerrarSesion()
	{
		Session::forget('correoElectronico');
		Session::forget('codigoUsuario');

		return Redirect::to('usuario/login');
	}

	public function actionInsertar()
	{
		if($_POST)
		{
			$alertaMensajeGlobal='';

			$validator=Validator::make
			(
				[
					'dni' => Input::get('txtDni'),
					'correoElectronico' => Input::get('txtCorreoElectronico')
				],
				[
					'dni' => 'unique:TUsuario',
					'correoElectronico' => 'unique:TUsuario'
				]
			);

			if($validator->fails())
			{
				if($validator->messages()->first('dni')!='')
				{
					$alertaMensajeGlobal.='Dni existente en el sistema<br>';
				}

				if($validator->messages()->first('correoElectronico')!='')
				{
					$alertaMensajeGlobal.='Correo electrónico existente en el sistema<br>';
				}
			}

			if($alertaMensajeGlobal!='')
			{
				return View::make('usuario/insertar', Input::all(), ['color' => 'red', 'alertaMensajeGlobal' => $alertaMensajeGlobal]);
			}

			$tUsuario=new TUsuario;

			$tUsuario->nombre=Input::get('txtNombre');
			$tUsuario->apellido=Input::get('txtApellido');
			$tUsuario->dni=Input::get('txtDni');
			$tUsuario->fechaNacimiento=Input::get('txtFechaNacimiento');
			$tUsuario->correoElectronico=Input::get('txtCorreoElectronico');
			$tUsuario->contrasenia=Crypt::encrypt(Input::get('txtContrasenia'));
			$tUsuario->rol=Input::get('cbxRol');

			$tUsuario->save();

			return View::make('usuario/insertar', ['color' => '#3D89BB', 'alertaMensajeGlobal' => 'Operación realizada correctamente']);
		}
		
		return View::make('usuario/insertar');
	}

	public function actionVer()
	{
		$listaTUsuario=TUsuario::all();

		return View::make('usuario/ver', ['listaTUsuario' => $listaTUsuario]);
	}

	public function actionEditar()
	{
		if(Input::has('txtCodigoUsuario'))
		{
			$alertaMensajeGlobal='';

			if(TUsuario::whereRaw('codigoUsuario!=? and (dni=? or correoElectronico=?)', [Input::get('txtCodigoUsuario'), Input::get('txtDni'), Input::get('txtCorreoElectronico')])->count()>0)
			{
				$alertaMensajeGlobal.='Usuario existente en el sistema<br>';
			}

			if($alertaMensajeGlobal!='')
			{
				$listaTUsuario=TUsuario::all();

				return View::make('usuario/ver', Input::all(), ['color' => 'red', 'alertaMensajeGlobal' => $alertaMensajeGlobal, 'listaTUsuario' => $listaTUsuario]);
			}

			$tUsuario=TUsuario::find(Input::get('txtCodigoUsuario'));

			$tUsuario->nombre=Input::get('txtNombre');
			$tUsuario->apellido=Input::get('txtApellido');
			$tUsuario->dni=Input::get('txtDni');
			$tUsuario->fechaNacimiento=Input::get('txtFechaNacimiento');
			$tUsuario->correoElectronico=Input::get('txtCorreoElectronico');
			$tUsuario->rol=Input::get('cbxRol');

			$tUsuario->save();

			$listaTUsuario=TUsuario::all();

			return View::make('usuario/ver', ['color' => '#3D89BB', 'alertaMensajeGlobal' => 'Operación realizada correctamente', 'listaTUsuario' => $listaTUsuario]);

		}

		$tUsuario=TUsuario::find(Input::get('codigo'));

		return View::make('usuario/editar', ['tUsuario' => $tUsuario]);
	}
}
?>