<?php

namespace App\Controllers;

class Landing extends BaseController
{

	public function index(){
        // echo ('hello auth');

				deployView(['Landing/landing_page']);
				
	}

}

?>
