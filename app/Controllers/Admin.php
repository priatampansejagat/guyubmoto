<?php

namespace App\Controllers;

class Admin extends BaseController{

	public function index(){
		return redirect()->to(base_url().'/admin/home/');
	}

  public function home(){
		// echo $_SERVER['CI_ENVIRONMENT'];
		$data = array('page' => 'admin' );
		deployView(['Admin/home'],	$data);
	}

	public function users(){
		$data = array('page' => 'admin', 'title' => 'Users' );
		deployView(['Admin/users'],	$data);
	}



}

?>
