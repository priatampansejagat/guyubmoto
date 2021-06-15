<?php

namespace App\Controllers;

class Family extends BaseController{

	public function index(){
		return redirect()->to(base_url().'/family/home/');
	}

	public function admission(){
		$data = array('page' => 'admission', 'title' => 'Admission' );
		deployView(['Family/admission'],	$data);
	}

  public function home(){
		// echo $_SERVER['CI_ENVIRONMENT'];
		$data = array('page' => 'family', 'title' => 'Dashboard' );
		deployView(['Family/home'],	$data);
	}

	public function myworks($work){

		switch ($work) {
			case 'photography':
				$data = array('page' => 'family', 'title' => 'Photography' );
				deployView(['Family/MyWorks/photography'],	$data);
				break;

			default:
				$this->show404();
				break;
		}

	}

	public function aboutme($about){

		switch ($about) {
			case 'biography':
				$data = array('page' => 'family', 'title' => 'Biography' );
				deployView(['Family/AboutMe/biography'],	$data);
				break;

			default:
				$this->show404();
				break;
		}

	}



}

?>
