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
			$tUsuario=new TUsuario;

			$tUsuario->nombre=Input::get('txtNombre');
			$tUsuario->apellido=Input::get('txtApellido');
			$tUsuario->dni=Input::get('txtDni');
			$tUsuario->fechaNacimiento=Input::get('txtFechaNacimiento');
			$tUsuario->correoElectronico=Input::get('txtCorreoElectronico');
			$tUsuario->contrasenia=Crypt::encrypt(Input::get('txtContrasenia'));
			$tUsuario->rol=Input::get('cbxRol');

			$tUsuario->save();

			return View::make('usuario/insertar');
		}
		
		return View::make('usuario/insertar');
	}
}
?>