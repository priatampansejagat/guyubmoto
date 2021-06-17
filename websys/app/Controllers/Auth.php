<?php

namespace App\Controllers;

class Auth extends BaseController{

	public function index(){
		return redirect()->to(base_url().'/auth/login/');
	}

	public function redirect(){

		if (isset($_GET['redirect'])) {

			if ($_GET['redirect'] == 'login') {

				$encoded_flash = json_encode($this->session->getFlashdata());
				$flash_data = json_decode($encoded_flash, true);

				if (count($flash_data) > 0) {
					// dd($flash_data);
					if ($flash_data['response']['data']['status'] == 'success') {
						if ($flash_data['send']['param']['keep_login'] == true) {
							// create session login
							$data_login = array('data_login' =>
																							array(	'user_id' => $flash_data['response']['data']['data_login']['id'],
																											'username' => $flash_data['send']['param']['username'],
																											'keep_login' => $flash_data['send']['param']['keep_login'],
																											'status' => 'true',
																											'level'	=> $flash_data['response']['data']['data_login']['level'],
																											'admission' => $flash_data['response']['data']['data_login']['admission']
																							));

							// Harusnya simpan ke cookie
							$this->session->set($data_login);
							$this->session->markAsTempdata('data_login', 7776000); //expired 3 bulan "MANA ADAAA WKWKWK, kalau mau 3 bulan pake cookie"
						}else{
							// create session login
							$data_login = array('data_login' =>
																							array(	'username' => $flash_data['send']['param']['username'],
																											'keep_login' => $flash_data['send']['param']['keep_login'],
																											'status' => 'true',
																											'level'	=> $flash_data['response']['data']['data_login']['level'],
																											'admission' => $flash_data['response']['data']['data_login']['admission']
																							));

							$this->session->set($data_login);
							$this->session->markAsTempdata('data_login', 86400); //expired 1 hari

						}

						return redirect()->to(base_url().'/family/home');

					}else {
						// gagal login
						return redirect()->to(base_url().'/auth/login?status=failed');
					}
				}else {
					// gagal login
					return redirect()->to(base_url().'/auth/login?status=failed');
				}

			}else {
				// gagal home publik
				return redirect()->to(base_url());
			}
		}else {
			// gagal home publik
			return redirect()->to(base_url());
		}
	}

  public function login(){

		$data = array();

		if (isset($_GET['status'])) {
			$data['status'] = $_GET['status'];
			if ($_GET['status'] == 'sukses') {

				$data['regis_header'] = 'Hai kamu, Selamat Ya! :)';
				$data['regis_message'] = 'Kamu telah terdaftar menjadi salah satu kandidat untuk bergabung di keluarga Guyubmoto! Yuk lakukan login dan ikuti langkah selanjutnya.';

			}else{
				$data['regis_header'] = '';
				$data['regis_message'] = 'Login gagal, coba lagi...';
			}
		}

		deployView(['header','Auth/login','js_handler'],$data);
	}

	public function join(){
		deployView(['header','Auth/join','js_handler']);
	}

	public function reset_password(){
		deployView(['header','Auth/reset_password','js_handler']);
	}

	public function logout(){
		$this->session->destroy();
		return redirect()->to(base_url());
	}

}

?>
