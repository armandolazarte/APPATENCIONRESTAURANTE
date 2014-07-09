<?php
class UsuarioController extends BaseController
{
	public function actionLogin()
	{
		return View::make('usuario/login');
	}
}
?>