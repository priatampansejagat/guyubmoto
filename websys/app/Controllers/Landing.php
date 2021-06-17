<?php

namespace App\Controllers;

class Landing extends BaseController
{

	public function index($username = ''){
				// deployView(['Landing/landing_page']);
				if ($username!= '') {
					$data = array('username' => $username );
					deployView(['header','bar_top','Landing/member_profile','footer','js_handler'], $data);
				}else {
					deployView(['header','bar_top','Landing/landing_page','footer','js_handler']);
				}

	}

	public function rules(){
		// $data = array('page' => 'family', 'title' => 'Rules' );
		deployView(['header','bar_top','Landing/rules','footer','js_handler']);
	}

	public function heroes(){
		// $data = array('page' => 'family', 'title' => 'Rules' );
		deployView(['header','bar_top','Landing/heroes','footer','js_handler']);
	}

}

?>
