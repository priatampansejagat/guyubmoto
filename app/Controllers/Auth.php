<?php

namespace App\Controllers;

class Auth extends BaseController{

	public function index(){
		return redirect()->to(base_url().'/auth/login/');
	}

  public function login(){
		// echo $_SERVER['CI_ENVIRONMENT'];

		deployView(['header','Auth/login','js_handler']);
	}

	// public function login_check(){
	// 	echo json_encode($_POST);
	// }

	public function register(){
		deployView(['header','Auth/register','js_handler']);
	}

	public function reset_password(){
		deployView(['header','Auth/reset_password','js_handler']);
	}


}

?>