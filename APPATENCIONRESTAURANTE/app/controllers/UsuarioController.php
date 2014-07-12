<?php
class UsuarioController extends BaseController
{
	public function actionLogin()
	{
		return View::make('usuario/login');
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
				return View::make('usuario/insertar', Input::all(), ['alertaMensajeGlobal' => $alertaMensajeGlobal]);
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

			return View::make('usuario/insertar', ['correcto' => 'Operacion realizada correctamente']);
		}
		
		return View::make('usuario/insertar');
	}
}
?>