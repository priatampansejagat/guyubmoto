<?php

namespace App\Controllers;

class Family extends BaseController{

	public function index(){
		return redirect()->to(base_url().'/family/home/');
	}

  public function home(){
		// echo $_SERVER['CI_ENVIRONMENT'];
		$data = array('page' => 'family' );
		deployView(['Family/home'],	$data);
	}



}

?>
