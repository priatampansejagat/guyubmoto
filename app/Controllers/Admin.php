<?php

namespace App\Controllers;

class Admin extends BaseController{

	public function index(){
		echo "ini admin";
		// return redirect()->to(base_url().'/family/home/');
	}

  // public function home(){
	// 	// echo $_SERVER['CI_ENVIRONMENT'];
	// 	$data = array('page' => 'family' );
	// 	deployView(['Family/home'],	$data);
	// }



}

?>
